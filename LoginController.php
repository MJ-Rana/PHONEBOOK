<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registraionModel;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    function OnLogin(Request $request){

       function TokenTest(){
           return "Token is okk";
       }

       $username = $request->input('username');
       $password = $request->input('password');

        $countingResult =registraionModel::where([
            'username' => $username,
            'password' => $password
        ])->count();

       if ($countingResult==1){

           $key = env('TOKEN_KEY');

           $payload = array(
               "site" => "http://demo.org",
               "user" => $username,
               "iat" => time(),
               "exp" => time()+120
           );

           $jwt = JWT::encode($payload, $key);

           return response()->json(['Token' =>$jwt,'status'=>'Login Success']);

       }
       else{
           return "wrong ! username or password !! please try again.";
       }



    }
}
