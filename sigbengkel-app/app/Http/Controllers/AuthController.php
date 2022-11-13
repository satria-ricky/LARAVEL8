<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\JenisBengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index ()

    {   
        $jenisBengkel = JenisBengkel::all();
        
        return view('home_page',[
            "title" => "Sistem Informasi Geografis Pemetaan Lokasi Bengkel",
            "jenisBengkel" => $jenisBengkel
        ]);

    }

    public function login(Request $request)
    {

        // dd($request);
        $data = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ];
        // dd(Auth::user());
        if (Auth::attempt($data)) { 
            return redirect('/dashboard');
        } else { // false
            //Login Fail
            return redirect('/')->with('error', 'Username atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Berhasil Logout!');
    }
}
