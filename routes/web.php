<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/search-in-report','clientController@search_report');
Route::get('/','clientController@home');
Route::get('/how-it-works',function()
{
   return view('how_it_works'); 
});

Route::get('/support',function()
{
   return view('support'); 
});


Route::get('/pricing-and-plan',function()
{
   return view('price_plan'); 
});

Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);

Route::post('/contact_form','clientController@contact_form');

Route::get('/contact-us',function()
{
   return view('Contact_us'); 
});

Route::get('/about-us',function()
{
   return view('About_us'); 
});

Route::get('/Faq',function()
{
   return view('FAQ'); 
});

Route::get('/term-and-conditions',function()
{
   return view('Terms _Conditions'); 
});


Route::get('/home',function()
{
   return view('index'); 
});

/*

----- CLIENT -----

*/
Route::get('/city','clientController@city');
Route::get('/login','clientController@login_view');
Route::get('/register','clientController@register_view');
Route::post('/login','clientController@login');
Route::post('/register','clientController@register');
Route::get('/logout','clientController@logout');
Route::get('/dashboard','clientController@dashboard');
Route::get('/manage-users','clientController@manage_users_view');
Route::get('/create-users','clientController@create_users_view');
Route::post('/create-users','clientController@create_users');
Route::get('/records-view','clientController@records_view');
Route::get('/add-record','clientController@add_record_view');
Route::post('/add-record','clientController@add_record');

Route::post('/client-report-by-date','clientController@getreportByDate');

Route::get('/view-record/{id}','clientController@specific_view_record');

Route::get('/edit-record/{id}','clientController@eidt_record_view');
Route::post('/edit-record/{id}','clientController@edit_record');
Route::get('/view-record/{id}','clientController@specific_view_record');

Route::get('/delete-record/{id}','clientController@delete_record');

Route::get('/edit-user/{id}','clientController@edit_user_view');
Route::post('/edit-user/{id}','clientController@edit_user');
Route::get('/delete-user/{id}','clientController@delete_user');

Route::get('biltyrecords-report','clientController@reports');

Route::get('/view-subscription','clientController@view_subscription');

Route::get('paypal/create-plan/{plan}','PayPalController@create_plan');

Route::get('/paypal/execute/agreement/{type}/{plan?}','PayPalController@execute_plan');

Route::post('/cancel/webhook','PayPalController@webhook');

Route::post('paypal-complete-payment-webhook','PayPalController@complete_payment_webhook');

Route::get('/get/p','PayPalController@getAgreement');

Route::get('/cancel-agreement/{id}','PayPalController@cancel_agreement');
Route::get('profile-edit','clientController@profile_edit_view');
Route::post('profile/edit','clientController@profile_edit');

Route::post('upload-cash-slip/{id}/{month}','clientController@upload_cash_slip');

Route::get('/view-transactions','clientController@transaction_history');
Route::get('start-trial','clientController@start_trial');
/*

    Admin Controller

*/

Route::get('admin','adminController@login_view');
Route::post('/admin-login','adminController@login');

Route::get('/admin-dashboard','adminController@dashboard');

Route::get('/admin-view-users','adminController@view_user_list');

Route::get('/admin-user-detail/{id}','adminController@user_detail');

Route::get('admin-logout','adminController@logout');

Route::get('/admin-cash-pending-transactions','adminController@cash_pending_transaction_view');
Route::get('/admin-cash-declined-transactions','adminController@cash_declined_transaction_view');
Route::get('/admin-cash-transaction-approve/{id}','adminController@cash_transaction_approve');
Route::get('/admin-cash-transaction-decline/{id}','adminController@cash_transaction_decline_view');
Route::post('/admin-cash-transaction-decline-reason/{id}','adminController@cash_transaction_decline');

Route::get('/admin-cash-transaction-complete','adminController@cash_transaction_complete');
Route::get('/admin-paypal-transaction-complete','adminController@paypal_transaction_complete');

Route::post('/admin-get-transaction-date/{date}','adminController@getTransactionsByDate');
Route::post('/admin-get-paypal-transaction-date','adminController@getPayPalTransactionsByDate');

/*

END OF ADMIN


*/

Route::get('/ssendmail',function(Request $request)
{
Log::info("asd");
//$json = $request->input('id');
//DB::insert("insert into pwebhook (wid,status,text) values('1','2','$json')");


 $data = array(
    'name' => "Nouman Shoaib",
    'firstname'=> "nice",
);
    Mail::send('test', $data, function ($message) {

        $message->from('no-reply@biltybooks.com', 'test');

        $message->to('nouman.shoaib786@gmail.com')->subject('Learning Laravel test email');

    });
    return "asd";
});



Route::get('/reset/password','clientController@reset_password_view');

Route::post('/password/reset','clientController@reset_password');

Route::get('/verify/{username}/{verfication_code}','clientController@verify_code');
Route::post('/password/change/{username}','clientController@password_change');

Route::get('/test',function()
{
   return "asd";
});