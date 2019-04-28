<?php

use Illuminate\Http\Request;



Route::post('auth/register', 'API\Auth\RegisterController@register');
Route::post('otpverify', 'API\Auth\OtpVerifyController@otp_verify');
Route::post('auth/login', 'API\Auth\LoginController@login');
Route::post('resendotp', 'API\Auth\ResendOtpController@resend_otp');

Route::group(['middleware' => 'jwt.auth'], function(){
  	Route::get('auth/user', 'AuthController@user');
  	Route::post('auth/logout', 'AuthController@logout');

  	//user profile
  	Route::get('user_profile', 'API\User\UserDocumentController@user_profile');

  	//user document
  Route::get('document_type','API\User\UserDocumentController@document_type');
	Route::post('document_store', 'API\User\UserDocumentController@document_store');
	Route::post('formSubmit', 'API\User\UserDocumentController@formSubmit');

});

Route::group(['middleware' => 'jwt.refresh'], function(){
  	Route::get('auth/refresh', 'AuthController@refresh');
  	
});

//admin routes
//make
Route::get('make', 'API\Admin\MakeController@make');
Route::post('make_store', 'API\Admin\MakeController@make_store');
Route::get('make_edit/{id}', 'API\Admin\MakeController@make_edit');
Route::post('make_update/{id}', 'API\Admin\MakeController@make_update');

