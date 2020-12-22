
<?php
Route::group(['middleware' => ['patient']], function () {
    Route::get('charge', 'PaymentController@charge');
    Route::get('paymentsuccess', 'PaymentController@payment_success');
    Route::get('paymenterror', 'PaymentController@payment_error');

    Route::get('charge', 'StripePaymentController@stripe');
    Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
});
// booking
Route::group(['middleware' => ['patient']], function () {
    Route::get('/booking', 'Admin\\BookingController@store');

});
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/admin/xray/message', "HomeController@xray");
    Route::get('/admin/xray/message/{id}', "HomeController@xrayShow");
    Route::post('/admin/lab-report/message', "HomeController@labReport");
    Route::get('/admin/lab-report/message/{id}', "HomeController@labReportShow");
    Route::post('/admin/referral/message', "HomeController@referral");
    Route::get('/admin/referral/message/{id}', "HomeController@referralShow");
    Route::post('/admin/certificate/message', "HomeController@certificate");
    Route::get('/admin/certificate/message/{id}', "HomeController@certificateShow");
});

//  video call twilio api

Route::get('/room', "VideoRoomsController@index")->middleware('auth');

Route::prefix('room')->middleware('auth')->group(function() {
   Route::get('join/{roomName}/{id}', 'VideoRoomsController@joinRoom');
   Route::post('create', 'VideoRoomsController@createRoom');

});
Route::view('/', 'front-end.home');
Route::view('/admin/calendar', 'calendar');


// pdf
Route::get('generate-pdf/{id}','HomeController@generatePDF');


Auth::routes(['register' => false]);
// sms api
Route::view('/sms/verify', 'auth.verify');

Route::post('/sms/verify', 'Auth\RegisterController@smsVerify');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


Route::get('/x-ray/{id}', 'Admin\\BookingController@viewBydoctorXray');
Route::get('/labreport/{id}', 'Admin\\BookingController@viewBydoctorLabreport');
Route::get('/medication/{id}', 'Admin\\BookingController@viewBydoctorMedication');




// Route::view('/doctor/signup', 'auth.doctor-signup');
Route::get('/doctor/list', 'HomeController@index');
Route::get('/doctor/search', 'HomeController@search');
Route::get('/doctor/details/{id}', 'HomeController@detail');

Route::view('/doctor/signup', 'front-end.doctor-signup');
Route::view('/doctor/signin', 'front-end.doctor-login');
Route::view('/patient/signup', 'front-end.patient-signup');
Route::view('/patient/signin', 'front-end.patient-login');
Route::get('admin/chat/inbox', 'Admin\\ChatController@inbox');
Route::post('treatment/save', 'Admin\\TreatmentInformationController@addNewTreatment');

// invoice

Route::get('admin/invoices/booking', 'Admin\\BookingInvoiceController@index');
Route::get('admin/invoice/booking/{id}', 'Admin\\BookingInvoiceController@show');

Route::get('admin/invoices/treatment', 'Admin\\TreatmentInvoiceController@index');
Route::get('admin/invoice/treatment/{id}', 'Admin\\TreatmentInvoiceController@show');

//upcoming
Route::get('admin/booking/upcoming', 'Admin\\BookingController@upcoming');


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::view('/dashboard', 'dashboard');
    Route::view('/patient/profile', 'admin.profile.patient');
    Route::get('admin/profile', 'Admin\NavbarController@profile');
    Route::get('admin/layoutSet/{layout}/{sidebar}/{minisidebar}', 'Admin\NavbarController@layoutStting');
    Route::get('admin/restore', 'Admin\NavbarController@restore');
    Route::post('admin/profile/save', 'Admin\NavbarController@profileStore');
    Route::get('admin/activities', 'Admin\ActivityController@activityAll');
    Route::view('admin/settings', 'admin.setting.index');
    Route::get('admin/sendGroupMail', 'EmailController@sendGroupMail');
    Route::post('admin/sendSingleMail', 'Admin\EmailController@sendSingleMail');
    Route::get('admin/email/send', 'Admin\EmailController@send');
    Route::get('admin/emails/mailbox', 'Admin\EmailController@mailbox');
    Route::get('admin/email/{id}', 'Admin\EmailController@showEdit');
    Route::get('admin/emails/delete', 'Admin\EmailController@destroyEmail');
    Route::get('admin/emails/draftbox', 'Admin\EmailController@draftbox');
    Route::get('admin/emails/draft/{id}', 'Admin\EmailController@draft');
    Route::resource('admin/person', 'Admin\\PersonController');
    Route::resource('admin/test', 'Admin\\TestController');

    Route::resource('admin/booking', 'Admin\\BookingController');
    Route::resource('admin/treatment-information', 'Admin\\TreatmentInformationController');
    Route::resource('admin/booking-fee', 'Admin\\BookingFeeController');
    Route::resource('admin/lab-report', 'Admin\\LabReportController');
    Route::resource('admin/x-ray', 'Admin\\XRayController');
    Route::resource('admin/medication', 'Admin\\MedicationController');
    Route::resource('admin/lab-report', 'Admin\\LabReportController');
    Route::resource('admin/chat', 'Admin\\ChatController');
    Route::resource('admin/account', 'Admin\\AccountController',["except"=>["create"]]);
    Route::get('admin/video-chat', 'VideoRoomsController@create');
    Route::resource('admin/blog', 'Admin\\BlogController');



});

//-----------------------------------------------------------//||
Route::get('/home', 'HomeController@index')->name('home'); //||
Route::get('/crudIndex', 'HomeController@crudIndex'); //||
Route::get('/crud2index', 'HomeController@crud2index'); //||
Route::post('/jsonSave', 'HomeController@jsonSave'); //||
Route::post('/crudMaker', 'HomeController@crudMaker'); //||
//-----------------------------------------------------------//||
Route::resource('admin/patient', 'Admin\\PatientController');
Route::resource('admin/doctor', 'Admin\\DoctorController');

Route::resource('admin/slider', 'Admin\\SliderController');
// Route::get('admin/page/{slug}/edit', 'Admin\\PageController@edit');
Route::resource('admin/page', 'Admin\\PageController')->only(['edit','update']);


Route::resource('admin/testimonials', 'Admin\\TestimonialsController');
Route::resource('admin/prescription', 'Admin\\PrescriptionController');
Route::resource('admin/doctor-available', 'Admin\\DoctorAvailableCon
troller');

Route::resource('admin/contact', 'Admin\\ContactController');
//blog
    Route::get('blog/{id}', 'HomeController@blogShow');



//pages
Route::get('/{slug}', 'HomeController@page');
