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
        $data = Pasar::all();
        return view('pasar.index',[
            'data' => $data
        ]);
    }

    public function tampil_produk ()
    {
        $data = Produk::all();
        return view('produk.index',[
            'data' => $data
        ]);
    }


    public function tambah_pasar (Request $req)
    {
        return $req->file('foto')->store('foto-pasar');
        
    }

    public function tambah_produk (Request $req)
    {
        // dd($req);
        $validated = $req->validate([
            'nama' => 'required|unique:produks,nama|max:100'
        ]);
        
        Produk::create($validated);
            return redirect('/produk')->with('success', 'Data Berhasil Ditambah');
    
    }

    public function peta_by_pasar ()
    {
        $data = Pasar::all();
        return response()->json($data);
    }



}
