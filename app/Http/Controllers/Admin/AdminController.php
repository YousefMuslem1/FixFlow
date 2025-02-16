<?php

namespace App\Http\Controllers\Admin;

use App\Accountent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddNewAccountentRequest;
use App\Payment;
use App\PublicCompany;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
class AdminController extends Controller
{
    public function statistics(Request $request)
    {
        // Get Count of Accountents
        $accountents = User::where('level', 2)->count();
        // Get Count of Special Companies
        $specialManagers = User::where('type', 1)->count();
        // Get Count of Limited Companies
        $limitedCompanies = PublicCompany::all()->count();
        // Get Count of Limited Managers
        $limitedManagers = User::where('type', 2)->count();
        // Get Count of Accepted Payments
        $acceptedPayments = Payment::where('state', 2)->count();
        // Get Count of Rejected Payments
        $rejectedPayments = Payment::where('state', 0)->count();
        // Get Count of Pending Payments
        $pendingPayments = Payment::where('state', 1)->count();
        $view = view('admin.statistics', compact('accountents', 'specialManagers',
            'limitedCompanies', 'limitedManagers',
            'acceptedPayments', 'rejectedPayments',
            'pendingPayments'))->render();

        return response()->json(['html' => $view]);
    }

    // Show Admin Home Page
    public function index()
    {
        // Get Count of Accountents
        $accountents = User::where('level', 2)->count();
        // Get Count of Special Companies
        $specialManagers = User::where('type', 1)->count();
        // Get Count of Limited Companies
        $limitedCompanies = PublicCompany::all()->count();
        // Get Count of Limited Managers
        $limitedManagers = User::where('type', 2)->count();
        // Get Count of Accepted Payments
        $acceptedPayments = Payment::where('state', 2)->count();
        // Get Count of Rejected Payments
        $rejectedPayments = Payment::where('state', 0)->count();
        // Get Count of Pending Payments
        $pendingPayments = Payment::where('state', 1)->count();
        $view = view('admin.home', compact('accountents', 'specialManagers',
                                                       'limitedCompanies', 'limitedManagers',
                                                       'acceptedPayments', 'rejectedPayments',
                                                       'pendingPayments'));

        return $view;
    }


    public function viewAccountent($acc_id)
    {
        $acc_id=Crypt::decrypt($acc_id);
        $accountant = Accountent::select('accountents.*','users.username','users.state')->join('users','accountents.user_id','=','users.id')->where('accountents.user_id',$acc_id)->first();

        $data['accountant']=$accountant;
        // return response()->json($accountant);
        return view('admin.profile_accountent')->with($data);
        //
    }

    // Show Accountent Manage Home
    public function showActiveAccountents()
    {
        $data['accountents']=Accountent::join('users','accountents.user_id','=','users.id')->orderby('users.state','desc')->get();

        $view = view('admin.active_accountent')->with($data)->render();
        return response()->json(['html' => $view]);
    }
    public function showInactiveAccountents()
    {
        $data['accountents']=Accountent::join('users','accountents.user_id','=','users.id')->orderby('users.state','asc')->get();

        return view('admin.inactive_accountent')->with($data);

    }

    // Store New Accountent
    public function storeAccountent(Request $request)
    {
        $request->validate([
            'username' => 'required|min:8|max:50|unique:users',
            'password' => 'required|min:8|max:100'
        ]);
        // return response()->json( $request->input('username'));

        $user = User::create([
           'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'level' => 2
        ]);

            Accountent::create([
               'user_id' => $user->id,
               'name' => ''
            ]);
            $data=Accountent::join('users','accountents.user_id','=','users.id')->where('user_id',$user->id)->get();

        return response()->json($data);

    }

    public function updateAccountant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:8|max:50|string',
            'email' => 'required|email',
            'address' => 'required|min:10|max:100',
            'phone' => 'required|numeric',
            'bank_name' => 'required|string',
            'iban_name' => 'required|min:10',
            'username' => 'required|min:8|max:50',
            'iban' => 'required|min:5|max:36'
        ]);

        Accountent::where('id', $request->id)
        ->update(['name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
        'email' => $request->email,
        'bank_name' => $request->bank_name,
        'iban_name' => $request->iban_name,
        'iban' => $request->iban
        ]);
        $id=Accountent::select('user_id')->where('id', $request->id)->first();
        User::where('id', $id->user_id)
        ->update([
        'username' => $request->username
        ]);
        return response()->json();

    }

    //update accountent state
    public function updateAccountentState(Request $request, $id)
    {
        $id=Crypt::decrypt($id);
    $user=User::find($id);
        if($user->state == 1){
            User::where('id',$id)
        ->update([
        'state' =>0
        ]);}
        if($user->state == 0){
            User::where('id', $id)
            ->update([
            'state' =>1
            ]);}

        return back();

        //
    }

}
