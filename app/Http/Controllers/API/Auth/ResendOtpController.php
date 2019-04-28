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

	        $url= "https://api.smsu.in/smpp/?username=tridentnew&password=PXjWaj5Hd&from=TRIDNT&to=".$mobile_no."&text=".urlencode($message)."";
	        $curl_session = curl_init();
	        curl_setopt($curl_session, CURLOPT_URL, $url);
	        curl_setopt($curl_session, CURLOPT_HTTPGET, true);
	        //curl_setopt($curl_session, CURLOPT_HTTPHEADER, true);
	        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER,false);
	        curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);    
	        $res=curl_exec($curl_session);
	        curl_close($curl_session);

	        $data['isVerified'] = 0;
	        $data['otp'] = $OTP;

	        $user = User::where('id','=',$resendotp->id)->update($data);

	        return response()->json(['msg'=> 'Successfully generated new OTP'],200);
    	}else{
    		return response()->json(['msg'=> 'Phone number is not exit please enter valid phone number'],401);
    	}
    }
}
