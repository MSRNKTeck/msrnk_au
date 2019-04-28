<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class OtpVerifyController extends Controller
{
    public function otp_verify(Request $request)
    {
    	$user = User::where('phone','=',$request->get('phone'))->where('otp','=',$request->get('otp'))->first();
    	if($user){
    		//$otp = User::where('phone','=',$request->get('phone'));
    		$data['isVerified'] = 1;
    		$otp = User::where('id','=',$user->id)->update($data);
    		
    		return response()->json(['success' => 'Successfully Vefiried Your otp'], 200);
    	}else{
    		return response()->json(['error' => 'Your OTP is invalid or expired'], 401);
    	}
    }
}
