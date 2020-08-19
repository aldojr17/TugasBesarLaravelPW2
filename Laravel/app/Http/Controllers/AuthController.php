<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function reg(){
        return view('pages.register');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect('/home');
        }
        return redirect('/')->with('status', 'Username or Password Invalid');
    }

    public function register(Request $request){
        $newPassword = bcrypt($request->password);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $newPassword
        ]);

        if(Auth::attempt($request->only('username','password'))){
            return redirect('/home');
        } else {
            return redirect('/');
        };
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
