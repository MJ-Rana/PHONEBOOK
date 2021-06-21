<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\registraionModel;

class RegistrationController extends Controller
{
    function OnRegistration(Request $request){

       $firstname  = $request->input('firstname');
       $lastname  = $request->input('lastname');
        $city  = $request->input('city');
       $username  = $request->input('username');
       $password  = $request->input('password');
       $gender  = $request->input('gender');

        $userCount= registraionModel::where('username',$username)->count();

        if ($userCount!=0){
            return "User Already Exist ! Please Try another.";
        }
        else{
           $result = registraionModel::insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'city' => $city,
                'username' => $username,
                'password' => $password,
                'gender' => $gender
            ]);

           if ($result==true){
               return 'Registraion successfull';
           }
           else{
               return 'Registraion Fail ! Please Try again';
           }

        }

    }
}
