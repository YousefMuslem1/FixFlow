<?php

namespace App\Http\Controllers\Manager;

use App\Accountent;
use App\Http\Controllers\Controller;
use App\Notifications\PaymentNotificationPublicManager;
use App\Notifications\PaymentNotificationSpecialManager;
use App\Payment;
use App\PublicCompany;
use App\PublicManager;
use App\SpecialCompany;
use App\User;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PaymentNotification;
use Illuminate\Support\Facades\Crypt;
class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCompanyCapital');
    }

    public function index()
    {
        if(auth()->user()->type == 1) {
            $name = SpecialCompany::select('comp_man_name')->where('user_id', auth()->user()->id)->first();
            $managerName = $name->comp_man_name != null ?  $name->comp_man_name : 'UNKNOWN MANAGER';
            // Get Pending Payments
            $company = SpecialCompany::where('user_id', auth()->user()->id)->first();
            $pendingPayment = Payment::where('special_company_id', $company->id)->where('state', 1)->get()->count();
            $rejectedPayment = Payment::where('special_company_id', $company->id)->where('state', 0)->get()->count();
            $acceptedPayment = Payment::where('special_company_id', $company->id)->where('state', 2)->get()->count();
            $debt = $company->ex_dept;
            return view('manager.manager_home', compact('managerName', 'pendingPayment', 'rejectedPayment', 'acceptedPayment', 'debt'));
        } else {
            $manager = PublicManager::select('name', 'public_company_id')->where('user_id', auth()->user()->id)->get()->first();
            $managerName = $manager->name != null ?  $manager->name : 'UNKNOWN MANAGER';
            // Get Pending Payments
            $pendingPayment = Payment::where('public_company_id', $manager->public_company_id)->where('state', 1)->get()->count();
            $rejectedPayment = Payment::where('public_company_id', $manager->public_company_id)->where('state', 0)->get()->count();
            $acceptedPayment = Payment::where('public_company_id', $manager->public_company_id)->where('state', 2)->get()->count();
            $company = PublicCompany::where('id', $manager->public_company_id )->first();
            $debt = $company->ex_debt;
            $capital = $company->comp_capital;
            $companyManagers = PublicManager::where('public_company_id', $company->id)->count();
            return view('manager.manager_home', compact('managerName', 'pendingPayment', 'rejectedPayment', 'acceptedPayment', 'debt', 'capital', 'companyManagers'));

        }
    }

    //Get Manager Name
    public function getManagerName()
    {
        if(auth()->user()->type == 1) {
            $manager = SpecialCompany::where('user_id', '=', auth()->user()->id)->first();
            return response(['name' => $manager->comp_man_name !=null? $manager->comp_man_name : 'UNKNOWN MANAGER']);
        } else {
            $manager = PublicManager::where('user_id', '=', auth()->user()->id)->first();
            return response(['name' => $manager->name !=null ? $manager->name : 'UNKNOWN MANAGER']);
        }
    }

    // Get Manager Profile View
    public function managerProfile()
    {
        // if auth user is special company
        if(auth()->user()->type == 1) {
            $manager = SpecialCompany::where('user_id', '=', auth()->user()->id)->first();
            $accountent = Accountent::select('name', 'email', 'phone', 'address')->where('id', '=', $manager->accountent_user_id)->first();
            $view = view('manager.manager_profile', compact('manager', 'accountent'))->render();

        } else {
            $manager = PublicManager::where('user_id', '=', auth()->user()->id)->first();
            $company =  PublicCompany::where('id', '=', $manager->public_company_id)->first();
            $accountent = Accountent::select('name', 'email', 'phone', 'address')->where('id', '=', $company->accountent_user_id)->first();
            $view = view('manager.manager_profile', compact('manager','company' , 'accountent'))->render();
        }
        return response()->json(['html' => $view, 'manager' => $manager, 'accountent' => $accountent]);
    }

    // Update Manager Profile
    public function updateProfile(Request $request)
    {
         $request->validate([
            'phone' => 'numeric|required',
        ]);
         if(auth()->user()->type == 1) {
             $manager = SpecialCompany::where('user_id', '=', auth()->user()->id)->first();
             $manager->man_phone = $request->phone;
             $manager->save();
         } else {
             $manager = PublicManager::where('user_id', '=', auth()->user()->id)->first();
             $manager->phone = $request->phone;
             $manager->save();
         }
        if ($request['password'] !== null) {
            // If user wont to change password check old password
            if (Hash::check($request['password'], auth()->user()->password)) {
                $request->validate([
                     'newpassword' => 'required|min:8|max:100',
                ]);
                User::where('id' , '=', auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
                return response()->json(200);

            }  else {
                // old password error
                return response()->json(array("errors" => ["passwordError" => 'Password Error ']), 422);
            }
        }

    }

    //Make Payment For Manager
    public function makePayment(Request $request)
    {

        // if user a public manager check company capital
        if(auth()->user()->type == 2) {
            $manager = PublicManager::where('user_id', '=', auth()->user()->id)->first();
            $company =  PublicCompany::where('id', '=', $manager->public_company_id)->first();
            if($company->comp_capital === null) {
                return response()->json(array("errors" => ["companycapital" => "You Can't Make any Payment For Now"]), 422);
            }
        }
        // Validate user inputs
        $request->validate([
            'password' => 'required',
            'amount' => 'required|numeric'
        ]);
       // Check User Password
        if (Hash::check($request['password'], auth()->user()->password)) {
            // If a public company
            if(auth()->user()->type == 2) {
                $manager = PublicManager::where('user_id', '=', auth()->user()->id)->first();
                $company =  PublicCompany::where('id', '=', $manager->public_company_id)->first();

                $accountent = Accountent::where('id', $company->accountent_user_id)->first();
                $user = User::where('id', $accountent->user_id)->first();

                //update payment table
                $payment = Payment::create([
                   'public_company_id' => $company->id,
                   'manager_id' => $manager->id,
                   'amount' => $request->amount
                ]);
                // Send Notification for manager accountant
                if($payment) {
                     $p = new PaymentNotificationPublicManager($manager->name, $manager->id, $company->comp_name, $company->id,  $payment->id, $request->amount, $type= 2 , $request->notes);
                     $user->notify($p);
                    $payment->notification_id = $user->notifications[0]->id;
                    $payment->save();
                }

            } else { // Update Payment for special manager
                $manager = SpecialCompany::where('user_id', '=', auth()->user()->id)->first();
                $company = $manager;
                $accountent = Accountent::where('id', $company->accountent_user_id)->first();
                $user = User::where('id', $accountent->user_id)->first();
                $payment = Payment::create([
                    'special_company_id' => $manager->id,
                    'manager_id' => 0,
                    'amount' => $request->amount
                ]);
                // Send Notification for manager accountant
                if($payment) {
                     $user->notify(new PaymentNotificationSpecialManager($manager->comp_man_name, $manager->id, $company->comp_name, $company->id,  $payment->id, $request->amount, $type= 1, $request->notes));
                     $payment->notification_id = $user->notifications[0]->id;
                     $payment->save();
                }

            }
            return response()->json(array("success" => ["message" => 'New Payment Added Successfully! ']), 200);

        } else { // Password Error
            return response()->json(array("errors" => ["password" => 'Password Error ']), 422);
        }
    }
}
