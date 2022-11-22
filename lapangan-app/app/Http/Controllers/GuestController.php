<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function dashboard () 
    {
        return view('guest.dashboard',[
            'title' => 'Sistem Informasi Lapangan'
        ]);
    }

    public function signin () 
    {
        return view('guest.signin');
    }

    
}
