<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function tampil_dashboard ()
    {
        $data1 = count(Pasar::all());
        $data2 = count(Produk::all());
        return view('dashboard.index',[
            'pasar' => $data1,
            'produk' => $data2
        ]);
    }

    public function tampil_pasar ()
    {
        $data1 = count(Pasar::all());
        $data2 = count(Produk::all());
        return view('dashboard.index',[
            'pasar' => $data1,
            'produk' => $data2
        ]);
    }


}
