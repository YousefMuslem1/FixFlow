<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

})->middleware('sessionTimeOut');

Auth::routes(['register' => false,
    'reset' => false,
    'forgot' => false,
    'confirm'=> false]);

Route::group(['prefix' => 'admin', 'as'=> 'admin.' , 'middleware' => ['auth', 'admin']], function () {
    //Show Admin Home Page
    Route::get('/home','Admin\AdminController@index')->name('home');
    // Statistics
    Route::post('/statistics','Admin\AdminController@statistics')->name('statistics');
    //Show Activate Accountents
    Route::post('/active_accountents', 'Admin\AdminController@showActiveAccountents')->name('active-accountent');
    //Show InActivate Accountents
    Route::get('/inactive_accountents', 'Admin\AdminController@showInactiveAccountents')->name('inactive-accountent');
    //Store New Accountent
    Route::post('/accountent', 'Admin\AdminController@storeAccountent')->name('store-accountent');
    Route::post('/update_accountant', 'Admin\AdminController@updateAccountant')->name('update-accountant');
    Route::get('/update_accountent_state/{id}', 'Admin\AdminController@updateAccountentState')->name('update-accountent-state');
    Route::get('/view_accountent_profile/{acc_id}', 'Admin\AdminController@viewAccountent')->name('view-accountent-profile');


});

Route::group(['prefix' => 'accountent', 'as'=> 'accountent.' , 'middleware' => ['auth','accountent']], function () {
    //Accountant Home Page
    Route::get('/home','Accountent\AccountentController@index')->name('home');
    //Accountant Complete Profile
    Route::get('/complete_profile', 'Accountent\AccountentController@completeProfile')->name('complete-profile');
    Route::post('/complete_profile', 'Accountent\AccountentController@completeProfileProcess')->name('process-acc-complete');
    // Show Profile Page
    Route::post('/accountent_profile', 'Accountent\AccountentController@accountentProfile')->name('show-profile');
    //Get Accountent Name
    Route::post('/accountent', 'Accountent\AccountentController@getAccountentName')->name('name');
    //Edit Profile
    Route::post('/accountent-update', 'Accountent\AccountentController@updateProfile')->name('update-profile');
    //Edit Bank Details
    Route::post('/accountent-update-bank', 'Accountent\AccountentController@updateBankDetails')->name('update-bank');
    // Show All Managers Manage Page (Manage Companies)
    Route::post('/manage_managers', 'Accountent\AccountentController@showManagers')->name('manage-manager');
    // Return special manager partial view
    Route::post('/add_manager_partial', 'Accountent\AccountentController@renderPartialViewSpManager')->name('add-partial-manager');
    // Store New Special Manager
    Route::post('/store_special_manager', 'Accountent\AccountentController@storeSpecialManager')->name('store-special-manager');
    // Store New Public Company
    Route::post('/store_public_manager', 'Accountent\AccountentController@storePublicCompany')->name('store-public-manager');
    // Add Public Manager to current company partial view
    Route::post( '/add_company_manager', 'Accountent\AccountentController@addCompanyManager')->name('add-company-manager');
    // Store Public Manager to Current Company
    Route::post( '/store_company_manager', 'Accountent\AccountentController@storeCompanyManager')->name('store-manager');
    Route::post( '/active_companies', 'Accountent\AccountentController@activeCompanies')->name('active-companies');
    // active companies partial view
    Route::post( '/inactive_companies', 'Accountent\AccountentController@inactiveCompanies')->name('inactive-companies');
    // Get Payment Partial View
    Route::post('/payment_partial_view', 'Accountent\AccountentController@paymentView')->name('payment-view');
    // Payment Request Process $ update payment table
    Route::post('/payment_accept_process', 'Accountent\AccountentController@paymentAcceptProcess')->name('payment-accept-process');
    // Payment Request Process $ update payment table
    Route::post('/payment_reject_process', 'Accountent\AccountentController@paymentRejectProcess')->name('payment-reject-process');
    //view public company profile
    Route::get('/view_public_company_profile/{com_id}', 'Accountent\AccountentController@viewPublicCompany')->name('view-public-company-profile');
    //update public company state
    Route::get('/update_public_company_state/{id}', 'Accountent\AccountentController@updatePublicCompanyState')->name('update-public-company-state');
    //update public company
    Route::post('/update_public_companies', 'Accountent\AccountentController@updatePublicCompany')->name('update-public-companies');
    // active special companies partial view
    Route::post( '/active_special_companies', 'Accountent\AccountentController@activeSpecialCompanies')->name('active-companies');
    // active special companies partial view
    Route::post( '/inactive_special_companies', 'Accountent\AccountentController@inactiveSpecialCompanies')->name('inactive-special-companies');
    //view special company profile
    Route::get('/view_special_company_profile/{com_id}', 'Accountent\AccountentController@viewSpecialCompany')->name('view-special-company-profile');
    //update special company state
    Route::get('/update_special_company_state/{id}', 'Accountent\AccountentController@updateSpecialCompanyState')->name('update-special-company-state');
    //update special company
    Route::post('/update_special_companies', 'Accountent\AccountentController@updateSpecialCompany')->name('update-special-companies');
    // Show profile manager in company accountant
    Route::post('/manager_profile/{id}', 'Accountent\AccountentController@getManagerProfile')->name('get-show-profile');
    // Show payments special company in company accountant
    Route::post('/special_payment_companies', 'Accountent\AccountentController@getSpecialPaymentCompanies')->name('get-special-payment-companies');
    // Show payments public company in company accountant
    Route::post('/public_payment_companies', 'Accountent\AccountentController@getPublicPaymentCompanies')->name('get-public-payment-companies');

    // Show notifications user in company accountant
    Route::post('/notifications_user', 'Accountent\AccountentController@getNotificationsUser')->name('get-notifications-user');

    // Render Notification bill
    Route::post('/notification', 'Accountent\AccountentController@notification')->name('notification');

});

Route::group(['prefix' => 'manager', 'as'=> 'manager.' , 'middleware' => ['auth','manager']], function () {
    Route::get('/manager_home','Manager\ManagerController@index')->name('home');
    //Get Manager Name
    Route::post('/manager', 'Manager\ManagerController@getManagerName')->name('name');
    // Show Profile Page
    Route::post('/manager_profile', 'Manager\ManagerController@managerProfile')->name('show-profile');

    // Update Manager Profile
    Route::post('/update_profile', 'Manager\ManagerController@updateProfile')->name('update-profile');
    //Make New Payment For Manager
    Route::post('/make_payment', 'Manager\ManagerController@makePayment')->name('make-payment');
});
