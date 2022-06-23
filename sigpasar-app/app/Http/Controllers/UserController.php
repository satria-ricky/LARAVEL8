<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasar;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{  

    public function tampil_reset_password ()
    {
        return view('reset_password.reset');
    }

    public function reset_password (Request $req)
    {
        User::all()->where('id', Auth::user()->id)->first()->update([
            'password' => Hash::make($req['password'])
        ]);

        return redirect('/profile')->with('success', 'Password Berhasil Diubah');

    }


    public function tampil_profile ()
    {
        return view('profile.index');
    }

    public function edit_profile (Request $req)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        // $tgl = Carbon::parse(date('Y-m-d H:i:s', strtotime($tgl1)));
        $tgl = $tgl->format('Y-m-d H:i:s');
        // dd($tgl);
        $hasil = [
            'nama' => $req['nama'],
            'username' => $req['username'],
            'updated_at' => $tgl
        ];

        if($req->file('foto')){
            
            if(Auth::user()->foto != 'foto-user/profile.jpg'){
                Storage::delete(Auth::user()->foto);
            }

            $hasil['foto'] = $req->file('foto')->store('foto-user/');
        }

        User::all()->where('id', Auth::user()->id)->first()->update($hasil);

        return redirect('/profile')->with('success', 'Profile Berhasil Diubah');

    }
    
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

    //GUEST
    public function peta_by_pasar ()
    {
        $data = Pasar::all();
        return response()->json($data);
    }

    public function detilPasar ()
    {
        $data = Pasar::all();
        return response()->json($data);
    }



}
