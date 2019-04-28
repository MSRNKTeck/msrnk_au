<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use JWTAuth;
use App\User;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = 1;
        $user->isVerified = 0;
        
        $OTP = rand(100000, 999999);
        $message='New OTP is:'.$OTP;
        $mobile_no = $request->phone;

        // $url= "https://api.smsu.in/smpp/?username=tridentnew&password=PXjWaj5Hd&from=TRIDNT&to=".$mobile_no."&text=".urlencode($message)."";
        // $curl_session = curl_init();
        // curl_setopt($curl_session, CURLOPT_URL, $url);
        // curl_setopt($curl_session, CURLOPT_HTTPGET, true);
        // //curl_setopt($curl_session, CURLOPT_HTTPHEADER, true);
        // curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER,false);
        // curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);    
        // $res=curl_exec($curl_session);
        // curl_close($curl_session);

        $user->otp = $OTP;
        $user->save();

        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }


}
