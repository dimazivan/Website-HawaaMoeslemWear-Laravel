<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
        if(Auth::check()){ 
            if(Auth::user()->role == 'user'){
                return redirect('home');
            }else if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }
        }else{
            return view('package/login');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            if(Auth::user()->role == 'user'){
                return redirect('/');
            }else if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }
            // else{
            //     return redirect('dashboard');
            // }
            
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
