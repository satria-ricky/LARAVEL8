<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login (){

        return view('login/login');

    }

    public function cekLogin (Request $request){

        $credentials = $request->validate([
            'user_email' => ['required', 'email'],
            'user_password' => ['required', 'min:3'],
        ]);
        
        if (Auth::attempt(['email' => $request->get('user_email'), 'password' => $request->get('user_password')])) {
            $request->session()->regenerate();
            // dd(auth()->user());
            return redirect()->intended('beranda'); 
        }
        
        return back()->with('error', 'Login gagal!');
    }


    public function logout(Request $request){
        
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('pesan', 'Berhasil logout!');


    }
    

}
