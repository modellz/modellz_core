<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/public/logout', 'public_users\IndexController@logout')->name('Public_Logout');

//Temp routes for voting
Route::group(['middleware' => ['public_pullback']],function () {
    Route::get('/public/login', 'public_users\IndexController@login')->name('Public_Login');
    Route::get('/public/register', 'public_users\IndexController@register')->name('Public_Registration');
    Route::get('/public/verify', 'public_users\IndexController@verify')->name('Public_Verification');
    Route::get('/public/register/api/{name}/{token}', 'public_users\IndexController@activate')->name('mail.activate');
    Route::post('/public/register/otp', 'public_users\IndexController@verifyOtp')->name('sms.activate');
    Route::post('/public/register/otp/resend', 'public_users\IndexController@resendSms')->name('public.otp.resend');
    Route::post('/public/register/mail/resend', 'public_users\IndexController@resendMail')->name('public.mail.resend');
    Route::post('/public/logme', 'public_users\IndexController@logme')->name('public.logme');
    Route::post('/public/register', 'public_users\IndexController@store')->name('public.store');
});
//logged persons
Route::group(['middleware' => ['public_check','revalidate']],function () {
    Route::get('/public', 'public_users\IndexController@dashboard')->name('Public_Dashboard');
    //Route::get('/public/sfa/movies', 'public_users\IndexController@dashboard')->name('SFA_Movies');
    //pagination
    Route::get( '/public/search','public_users\IndexController@dashboard')->name('SFA_Movies');
    Route::get( '/public/sfa/movies/{id}','public_users\IndexController@rateMovie')->name('SFA_Rate_Movie');


});

