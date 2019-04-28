<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ResendOtpController extends Controller
{
    public function resend_otp(Request $request)
    {
    	$resendotp = User::where('phone','=',$request->get('phone'))->first();
    	if($resendotp){
    		$OTP = rand(100000, 999999);
	        $message='New OTP is:'.$OTP;
	        $mobile_no = $resendotp->phone;

	        

	        $data['isVerified'] = 0;
	        $data['otp'] = $OTP;

	        $user = User::where('id','=',$resendotp->id)->update($data);

	        return response()->json(['msg'=> 'Successfully generated new OTP'],200);
    	}else{
    		return response()->json(['msg'=> 'Phone number is not exit please enter valid phone number'],401);
    	}
    }
}
