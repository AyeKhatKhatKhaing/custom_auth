<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class CustomController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginAccount(Request $request){
        $request->validate([
            'userCredential'=>'required',
            'password'=>'required',
        ]);
        if(is_numeric($request->userCredential)){
            if (Auth::attempt(['phone'=>$request->userCredential,'password'=>$request->password])) {
                return redirect()->route('home');
            }
        }
        else{
            if (Auth::attempt(['email'=>$request->userCredential,'password'=>$request->password])) {
                return redirect()->route('home');
            }
        }
        
    }
    public function logoutAccount(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function passcodeLogin(Request $request){
        $request->validate([
            'passcode'=>'required',
        ]);
        $user=User::where('pass_code',$request->passcode)->first();
        if(isset($user)){
            Auth::login($user);
            return redirect()->route('home');
        }
        return $request;
    }
}