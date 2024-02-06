<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('/login');
    }

    public function register(){
        return view('/register');
    }

    public function registerProcess(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255' ,
            'username' => 'required|unique:users|max:255' ,
            'password' => 'required|unique:users|max:255' ,
            'phone' => 'required|unique:users|max:255' ,
            'address' => 'required|max:255' ,
        ]);
        $request['password'] = Hash::make($request->password);

        Session::flash('status', 'success');
        Session::flash('message', 'Register Success! Please contact Admin for Approval your Account!');
        User::create($request->all());
        return view('/register');
    }


    public function home(){
        return view('/welcome');
    }

    public function authenticating(Request $request){
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credential)) {
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet, Please contact Admin!');

                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('/dashboard');
            }
            
            if(Auth::user()->role_id == 2){
                return redirect('/profile');
            }
            // return redirect()->intended('dashboard');
        }
                Session::flash('status', 'failed');
                Session::flash('message', 'Login Invalid!');
                return redirect('/login');
    }
    public function logout(Request $request)
{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
}
}
