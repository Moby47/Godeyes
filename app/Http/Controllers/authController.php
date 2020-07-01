<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class authcontroller extends Controller
{
    public function login(Request $request){
       
        $cre = $request->only('name','password');

        if(!$token=JWTAuth::attempt($cre)){
            return ['result'=>'2'];
        }

        $user = User::where('name','=',$request->name)->first();

        return ['token'=>$token, 'name'=>$request->name, 'id'=>$user->id];

    }

    public function reg(Request $request){
       
        //create
       $user = new User;
       $save->name = $request->input('name');
       $save->surname = $request->input('surname');
       $save->email = $request->input('email');
       $user->password = bcrypt($request->password);
       $user->save();
       
        //response
        return 1;
    }
}