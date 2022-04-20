<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use AuthenticatesUsers;

class LoginController extends Controller
{


    public function login (){

        return view('login/login');

    }

    public function cekLogin (Request $request){

    

        $credentials = $request->validate([
            'user_email' => ['required', 'email:dns'],
            'user_password' => ['required', 'min:3'],
        ]);
        
        if (Auth::attempt(['email' => $request->get('user_email'), 'password' => $request->get('user_password')])) {
            // $request->session()->regenerate();
            // dd(auth()->user());
            return redirect()->route('itu'); 
        }
        
        return back()->with('error', 'Login gagal!');
    }


    public function logout(Request $request){
        
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('pesan', 'Berhasil logout!');


    }



}
