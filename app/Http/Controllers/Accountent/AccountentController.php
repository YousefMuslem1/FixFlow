<?php

namespace App\Http\Controllers\Accountent;

use App\Accountent;
use App\ComplanyFile;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PublicCompany;
use App\PublicManager;
use App\SpecialCompany;
use App\User;
use http\Exception;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


use Illuminate\Support\Facades\Crypt;
class AccountentController extends Controller
{

    public function __construct()
    {
        $this->middleware('accountantCompleteProfile', ['except' => [
            'completeProfile', 'completeProfileProcess'
        ]]);
        $this->middleware('accountantProfileCompleted', ['only' => [
            'completeProfile', 'completeProfileProcess'
        ]]);
    }

    public function index()
    {
        $accountent = Accountent::select('name')->where('user_id', auth()->user()->id)->first();
        // return response()->json(auth()->user()->accountent()->name);

        return view('accountent.accountent_home', compact('accountent'));
    }

    // get accountent name
    public function getAccountentName()
    {
        $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
        return response()->json(['name' => $accountent->name]);
    }

    //Accountant Complete Profile
    public function completeProfile()
    {
        return view('accountent.complete_profile');
    }

    // Store Accountent Profile
    public function completeProfileProcess(Request $request)
    {
        //Request accountant validation
        $validated = $request->validate([
            'name' => 'required|min:8|max:50|string',
            'email' => 'required|email',
            'address' => 'required|min:10|max:100',
            'phone' => 'required|numeric',
            'bank_name' => 'required|string',
            'iban_name' => 'required|min:10',
            'iban' => 'required|min:5|max:36',
        ]);
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);
        // User Want To Change His Own Password
        if ($data['old'] !== null) {
            if (Hash::check($data['old'], $user->password)) {
                $request->validate([
                    'password' => 'required|min:8|max:25'
                ]);
                // if inputs accept rolls then rename image to current time
                User::where('id', $user->id)->update(['password' => Hash::make($data['password'])]);
            } else {
                // old password error
                return response()->json(array("errors" => ["passwordError" => 'Old Password Does Not Match Our Records ']), 422);
            }
        }
        Accountent::where('user_id', '=', auth()->user()->id)->update(array_merge($validated));
        return response()->json();
    }

    // Show Profile Page
    public function accountentProfile()
    {
        $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
        $pub_comp=PublicCompany::where('accountent_user_id',$accountent->id)->count();
        $spe_comp=SpecialCompany::where('accountent_user_id',$accountent->id)->count();
        $cash_spe=Payment::select('amount')->join('special_companies','special_companies.id','=','special_company_id')->where('accountent_user_id',$accountent->id)->where('payments.state',2)->sum('amount');
        $cash_pub=Payment::select('amount')->join('public_companies','public_companies.id','=','public_company_id')->where('accountent_user_id',$accountent->id)->where('payments.state',2)->sum('amount');
        $cash=$cash_spe+$cash_pub;
        $view = view('accountent.accountent_profile', compact('accountent','pub_comp','spe_comp','cash'))->render();
        return response()->json(['html' => $view]);
//        return view('accountent.accountent_profile', compact('accountent'));
    }

    //update Profile
    public function updateProfile(Request $request)
    {
        //Request accountant validation
        $validated = $request->validate([
            'name' => 'required|min:8|max:50|string',
            'email' => 'required|email',
            'address' => 'required|min:10|max:100',
            'phone' => 'required|numeric',
        ]);
        $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
        $accountent->name = $request->name;
        $accountent->email = $request->email;
        $accountent->address = $request->address;
        $accountent->phone = $request->phone;
        $accountent->save();
        // old password error

        return response()->json($accountent, 200);
    }

    // Update Bank Details
    public function updateBankDetails(Request $request)
    {
        //Request accountant validation
        $validated = $request->validate([
            'bank_name' => 'required|string',
            'iban_name' => 'required|min:10',
            'iban' => 'required|min:5|max:36',
        ]);
        if ($request['password'] !== null) {
            if (Hash::check($request['password'], auth()->user()->password)) {
                $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
                $accountent->bank_name = $request->bank_name;
                $accountent->iban_name = $request->iban_name;
                $accountent->iban = $request->iban;
                $accountent->save();
            } else {
                // old password error
                return response()->json(array("errors" => ["passwordError" => 'Password Error ']), 422);
            }
        } else {
            return response()->json(array("errors" => ["passwordError" => 'Password Required ']), 422);
        }
    }

    // Show Managers Table for an Accountant
    public function showManagers()
    {

        $view = view('accountent.manage_manager')->render();
        return response()->json(['html' => $view]);
    }

    // Return Partial Special Manager
    public function renderPartialViewSpManager(Request $request)
    {
        if ($request->id == 1) {
            $view = view("accountent.inc.partial_add_special_manager")->render();

            return response()->json(['html' => $view]);
        } else if ($request->id == 2) {
            $view = view("accountent.inc.partial_add_public_manager")->render();
            return response()->json(['html' => $view]);
        }
        return response()->json(['html' => '']);
    }

    // Store New Special Manager
    public function storeSpecialManager(Request $request)
    {
             $request->validate([
                 'comp_name' => 'required|string|min:7',
                 'username' => 'required|min:8|max:50|unique:users',
                 'password' => 'required|min:8|max:100'
            ]);

            try {
                DB::beginTransaction();
                $user = User::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'level' => 3,
                    'type' => 1
                ]);
                if($request->input('ex_dept') == null) {
                    $request['ex_dept'] = 0;
                } else {
                    $request['ex_dept'] = - $request['ex_dept'];
                }
                $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
                $company = SpecialCompany::create(array_merge($request->except(['username', 'password', 'files']), [
                    'user_id' => $user->id,
                    'accountent_user_id' => $accountent->id
                ]));
                // Store Company Files
                if($request->file('files') !=null) {
                    $files = $request->file('files');
                    foreach($files as $file)
                    {
                        //files/comp_name/image.jpg
                        $file_mame =  time() . $company->comp_name . '_' . '_'. rand() .'.' . $file->getClientOriginalExtension();
                        $file->move(public_path('files/sp_company/' . $company->comp_name), $file_mame);
                        ComplanyFile::create(['special_company_id' => $company->id, 'file_path' => $file_mame]);
                    }
                }
                DB::commit();
            } catch (\Exception $e) {

                DB::rollBack();
                return response()->json($e, 422);
            }
                return response()->json([]);
    }

    // Store New Public Company
    public function storePublicCompany(Request $request)
    {
        $request->validate([
            'comp_name' => 'required|string|min:7',
            'username' => 'required|min:8|max:50|unique:users',
            'password' => 'required|min:8|max:100'
        ]);
        DB::beginTransaction();

        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level' => 3,
                'type' => 2
            ]);
            $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
            $request['ex_debt'] = $request->input('ex_debt') != null ? - $request['ex_debt'] : 0;
            $company = PublicCompany::create(array_merge($request->except(['username', 'password', 'files'])));
            $company->update(['accountent_user_id' =>  $accountent->id]);
            $manager = PublicManager::create([
                'user_id' => $user->id,
                'public_company_id' => $company->id,
            ]);

            if($request->file('files') !=null) {
                $files = $request->file('files');
                foreach($files as $file)
                {
                    //files/comp_name/image.jpg
                    $file_mame =  time() . $company->comp_name . '_' . '_'. rand() .'.' . $file->getClientOriginalExtension();
                    $file->move(public_path('files/pub_company/' . $company->comp_name), $file_mame);
                    ComplanyFile::create(['public_company_id' => $company->id, 'file_path' => $file_mame]);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(['success' => $request->comp_name]);
    }

    // Return Add Manager To Current Public Company Partial View
    public function addCompanyManager()
    {
        $companies = PublicCompany::select('id','comp_name')->get();
        $view = view('accountent.inc.add_company_manager', compact('companies'))->render();

        return response()->json(['html' => $view]);
    }

    // Store New Public Manger for Current Company
    public function storeCompanyManager(Request $request)
    {
        $request->validate([
            'username' => 'required|min:8|max:50|unique:users',
            'password' => 'required|min:8|max:25',
            'comp_name' => 'numeric'
        ]);

        try{
            DB::beginTransaction();

            if( $request->input('comp_name') != 0) {

                $user = User::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'level' => 3,
                    'type' => 2
                ]);
                $accountent = Accountent::where('user_id', '=', auth()->user()->id)->first();
                $company = PublicCompany::where('id', '=', $request->comp_name)->first();
                $manager = PublicManager::create([
                    'user_id' => $user->id,
                    'public_company_id' => $request->comp_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'name' => $request->name
                ]);
                DB::commit();
            } else {
                throw new \Exception('Something Was Wrong');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => array( 'message' => 'Please Select A Company')], 422);
        }

        return response()->json([
            'company'=> $company->comp_name ,
            'user' => $user->username,
            'manager' => $manager->name
            ], 200);
    }

    // Return active companies partial view
    public function activeCompanies(Request $request)
    {
        $acc=Accountent::where('user_id',auth()->user()->id)->first();
        $companies = DB::table("public_companies")
            ->select("public_companies.id","public_companies.comp_name","public_companies.created_at","public_companies.state","temp.count_manager as count_managers")

            ->join(DB::raw("(SELECT public_company_id, count(*) as count_manager FROM public_managers
                                    GROUP BY public_managers.public_company_id) as temp"),function($join){
                                        $join->on("temp.public_company_id","=","public_companies.id");
            })
            ->where('public_companies.accountent_user_id',$acc->id)
            ->where('public_companies.state',1)
            ->get();
            //   return response()->json($companies);
            $view = view('accountent.ai_company_manager_partial_view', compact('companies'))->render();
            return response()->json(['html' => $view]);

    }

    // Return inactive companies partial view
    public function inactiveCompanies(Request $request)
    {
        $acc=Accountent::where('user_id',auth()->user()->id)->first();
        $companies = DB::table("public_companies")
                    ->select("public_companies.id","public_companies.comp_name","public_companies.created_at","public_companies.state","temp.count_manager as count_managers")
                    ->join(DB::raw("(SELECT
                    public_company_id,
                    count(*) as count_manager
                    FROM public_managers
                    GROUP BY public_managers.public_company_id
                    ) as temp"),function($join){
                        $join->on("temp.public_company_id","=","public_companies.id");
                    })
                    ->where('public_companies.state',0)
                    ->where('public_companies.accountent_user_id',$acc->id)
                    ->get();
                    $view = view('accountent.ai_company_manager_partial_view', compact('companies'))->render();

            return response()->json(['html' => $view]);

    }

    // Return Payment Partial View
    public function paymentView(Request $request)
    {

        $notificationData = DB::table('notifications')->where('id', $request->payment)->first();
        $data = json_decode($notificationData->data, true);
        $payment = Payment::where('id', $data['payment_id'])->first();
        if($data['type'] == 1) {
            $manager = SpecialCompany::where('id', $data['company_id'])->first();
            $type = 1;

            // Render View with data
            $view = view('accountent.paymentPartialView', ['manager' => $manager,
                'type' => $data['type'],
                'not_created_at' => $notificationData->created_at,
                'amount' => $data['amount'],
                'notes' => $data['notes'],
                'payment_id' => $data['payment_id'],
                'payment_amount' => $payment->amount,
                'state' => $payment->state,
                'notification' => $request->payment])->render();
        } else {
            $company = PublicCompany::where('id', $data['company_id'])->first();
            $manager = PublicManager::where('id', $data['manager_id'])->first();
            // Render view with data
            $view = view('accountent.paymentPartialView', ['manager' => $manager,
                'company' => $company,
                'not_created_at' => $notificationData->created_at,
                'amount' => $data['amount'],
                'notes'=>$data['notes'],
                'payment_id' => $data['payment_id'],
                'payment_amount' => $payment->amount,
                'state' => $payment->state,
                'notification' => $request->payment])->render();
        }
        return response()->json(['html' => $view]);
    }

    // Payment Process and update payment tabel and accept
    public function paymentAcceptProcess(Request $request)
    {
        $request->validate([
           'payment_edit' => 'required|numeric'
        ]);

        //Get Payment Recorde From Payment table
        $paymentData = Payment::where('id', $request->payment_id)->first();
        auth()->user()->unreadNotifications->where('id', $paymentData->notification_id)->markAsRead();

        //Check if state in pending
        if( $paymentData->state === 1) {
            try{
                DB::beginTransaction();
                // Check if accountant edit the payment amount
                if($request->payment_edit !== $paymentData->amount && $request->payment_edit != null) {
                    // Update Payment Record to state = 2 which mean accepted & amount field
                    $payment = Payment::where('id', $request->payment_id)->update(['state' => 2, 'amount' => $request->payment_edit]);
                    // update ex_debt field for public company
                    if($paymentData->public_company_id != null) {
                        $company = PublicCompany::findOrFail($paymentData->public_company_id);
                        $company->ex_debt += $request->payment_edit;
                        $company->save();
                    } else {
                        $company = SpecialCompany::findOrFail($paymentData->special_company_id);
                        $company->ex_dept += $request->payment_edit;
                        $company->save();
                    }

                } else {
                    // Update Payment Record to state = 2 which mean accepted
                    $payment = Payment::where('id', $request->payment_id)->update(['state' => 2]);
                    if($paymentData->public_company_id != null) {
                        $company = PublicCompany::findOrFail($paymentData->public_company_id);
                        $company->ex_debt += $request->amount;
                        $company->save();
                    } else {
                        $company = SpecialCompany::findOrFail($paymentData->special_company_id);
                        $company->ex_dept += $payment->amount;
                        $company->save();
                    }
                }

                //if updated successfully save updated payment
                if($payment) {
                    DB::commit();
                    //return success message
                    return response()->json('', 200);
                }
                //throw exception if something goes wrong while updating
                else throw new \Exception('Something Was Wrong');
//

            } catch (\Exception $exception) {

                DB::rollBack();
                return response()->json('', 422);
            }
        } else {// The Payment Request is not allowed
            return response()->json('Error', 404);
        }
    }

    // Payment Process and update payment table and reject
    public function paymentRejectProcess(Request $request)
    {
        $payment = Payment::where('id', $request->payment)->first();
        auth()->user()->unreadNotifications->where('id', $payment->notification_id)->markAsRead();

        if($payment->state == 1) {
                $payment->state = 0;
                $payment->save();
                return response()->json('', 200);
        } else {
            return response()->json('Error', 422);
        }
    }

    //view Public Company Profile
    public function viewPublicCompany($com_id)
    {
        $com_id=Crypt::decrypt($com_id);
        $public_companies = PublicCompany::find($com_id);

        $public_managers  = PublicManager::where('public_managers.public_company_id',$com_id)->get();
        $data['public_companies']=$public_companies;
        $data['public_managers']=$public_managers;
        // return response()->json($public_managers);

        return view('accountent.profile_public_company')->with($data);

    }

    // Get Manager Profile View
    public function getManagerProfile($id)
    {
            $id=Crypt::decrypt($id);
            $manager = PublicManager::where('id', '=', $id)->first();
            $company =  PublicCompany::where('id', '=', $manager->public_company_id)->first();
            $accountent = Accountent::select('name', 'email', 'phone', 'address')->where('id', '=', $company->accountent_user_id)->first();
            $view = view('accountent.manager_profile', compact('manager','company' , 'accountent'))->render();
            return response()->json(['html' => $view, 'manager' => $manager, 'accountent' => $accountent]);
    }

    //update public company state
    public function updatePublicCompanyState(Request $request, $id)
    {
        $id=Crypt::decrypt($id);
        $com=PublicCompany::find($id);
        if($com->state == 1){
            PublicCompany::where('id',$id)
                ->update([
                    'state' =>0
                ]);
        //Update state for all users who belongs to this company in users table
            $managers = PublicManager::where('public_company_id', $id)->get();
            $names = [];
            foreach ($managers as $manager) {
            $user = User::findOrFail($manager->user_id);
            $user->state = 0;
            $user->save();
            }
        }
        if($com->state == 0){
            PublicCompany::where('id', $id)
                ->update([
                    'state' =>1
                ]);
            //Update state for all users who belongs to this company in users table
            $managers = PublicManager::where('public_company_id', $id)->get();
            $names = [];
            foreach ($managers as $manager) {
                $user = User::findOrFail($manager->user_id);
                $user->state = 1;
                $user->save();
            }
        }

        return back();
    }


    //update public company
    public function updatePublicCompany(Request $request)
    {
        $validated = $request->validate([
            'comp_name' => 'required|string|min:7',
            'tax_number' => 'required|numeric',
            'mar_email' => 'required|email',
            'mar_password' => 'required|min:10|max:100',
            'comp_capital' => 'required|numeric',
            'tax_dept' => 'required|string',
            'indus_num' => 'required|numeric',
            'comer_no' => 'required|numeric',
            'comp_code' => 'required|string',
            'comp_fax' => 'required|string',
            'ex_debt' => 'required|min:5|max:36',
            'elect_portal' => 'required|min:5|max:36',
            'elect_portal_password' => 'required|min:5|max:36',
        ]);
        $company=PublicCompany::find($request->id);
        $company->update($request->except('_token'));
        return response()->json($request->except('_token'));

    }

    // Return active special companies partial view
    public function activeSpecialCompanies(Request $request)
    {
        $acc=Accountent::where('user_id',auth()->user()->id)->first();
        $companies = SpecialCompany::where('accountent_user_id',$acc->id)
            ->where('state',1)
            ->get();
        $view = view('accountent.ai_special_company_manager_partial_view', compact('companies'))->render();
        return response()->json(['html' => $view]);

    }

    // Return inactive special companies partial view
    public function inactiveSpecialCompanies(Request $request)
    {
        $acc=Accountent::where('user_id',auth()->user()->id)->first();
        $companies = SpecialCompany::where('accountent_user_id',$acc->id)
            ->where('state',0)
            ->get();
        $view = view('accountent.ai_special_company_manager_partial_view', compact('companies'))->render();
        return response()->json(['html' => $view]);

    }

    //view special Company Profile
    public function viewSpecialCompany($com_id)
    {
        $com_id=Crypt::decrypt($com_id);
        $special_companies = SpecialCompany::find($com_id);


        $data['special_companies']=$special_companies;

        return view('accountent.profile_special_company')->with($data);
        //

    }

    //update special company state
    public function updateSpecialCompanyState(Request $request, $id)
    {
        $id=Crypt::decrypt($id);
        $com=SpecialCompany::find($id);
        if($com->state == 1){
            SpecialCompany::where('id',$id)
                ->update([
                    'state' =>0
                ]);
            //Update state for user who belongs to this company in users table
          $user = User::findOfFail($id);
          $user->state = 0;
          $user->save();
        }
        if($com->state == 0){
            SpecialCompany::where('id', $id)
                ->update([
                    'state' =>1
                ]);
            //Update state for user who belongs to this company in users table
            $user = User::findOfFail($id);
            $user->state = 1;
            $user->save();
        }
        return back();
    }


    //update special company
    public function updateSpecialCompany(Request $request)
    {
        $validated = $request->validate([
            'comp_name' => 'required|string|min:7',
            'tax_number' => 'required|numeric',
            'email' => 'required|email',
            'id_num' => 'required|numeric',
            'comp_man_name' => 'required|string|min:5|max:36',
            'tax_dept' => 'required|string',
            'comp_address' => 'required|string',
            'man_phone' => 'required|string',
            'comp_code' => 'required|string',
            'comp_fax' => 'required|string',
            'ex_dept' => 'required|min:3|max:36',
            'elect_portal' => 'required|min:5|max:36',
            'elect_portal_password' => 'required|min:5|max:36',
        ]);
        $company=SpecialCompany::find($request->id);
        $company->update($request->except('_token'));
        return response()->json();

    }

       // Return Special Payment Companies
       public function getSpecialPaymentCompanies()
       {
           $acc=Accountent::where('user_id',auth()->user()->id)->first();
           $companies = SpecialCompany::where('accountent_user_id',$acc->id)->get();
           $view = view('accountent.payment_special_partial_view', compact('companies'))->render();
           return response()->json(['html' => $view]);
       }
        // Return public Payment Companies
        public function getPublicPaymentCompanies()
        {
            $acc=Accountent::where('user_id',auth()->user()->id)->first();
            $companies = PublicCompany::select('public_managers.id','public_managers.public_company_id','public_companies.comp_name','public_companies.state','public_companies.created_at')->join('public_managers','public_managers.public_company_id','=','public_companies.id')->where('public_companies.accountent_user_id',$acc->id)->get();
            $view = view('accountent.payment_public_partial_view', compact('companies'))->render();
            return response()->json(['html' => $view]);
        }
        
    // Return active special companies partial view
    public function getNotificationsUser(Request $request)
    {
        $acc=Accountent::where('user_id',auth()->user()->id)->first();
        $payment = Payment::where('id', $request->payment)->first();
        $view = view('accountent.ai_special_company_manager_partial_view', compact('companies'))->render();
        return response()->json(['html' => $view]);

    }


        // Get Notification
    public function notification() {
        $view = view('accountent.inc.notifications')->render();
        return response()->json(['html' => $view]);

    }

}
