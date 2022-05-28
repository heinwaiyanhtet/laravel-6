<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    public function login(){
        return view("login");
    }
    public function loginAccount(Request $request){

        $request->validate([
            'aa' => 'required',
            'password'=>'required'
        ]);
        if(is_numeric($request->aa)){
                if (Auth::attempt(["phone"=>$request->aa,"password"=>$request->password,]))
                {
                    // Authentication passed...
                    return redirect()->route('home');
                }
            }
            else{
                if (Auth::attempt(["email"=>$request->aa,"password"=>$request->password,]))
                {
                    // Authentication passed...
                    return redirect()->route('home');
                }
            }
        return $request;
    }

    public function passcodeLogin(Request $request){
        $request->validate([
            'passcode' => 'required',
        ]);
        $user = User::where('pass_code',$request->passcode)->first();
        if(isset($user)){
            Auth::login($user);
            return redirect()->route('home');
        }
        return "No User";
    }
    public function logoutAccount(){
        Auth::logout();
        return redirect()->route('login');
    }
}
