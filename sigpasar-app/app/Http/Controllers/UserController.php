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

    
    public function tambah_rekomendasi_produk($id) {
        
        // dd($id);
        $produk = Produk::findOrFail($id);
        $produk->rekomendasi += 1;
        $produk->save();
        
     }

    public function tampil_reset_password()
    {
        return view('reset_password.reset');
    }

    public function reset_password(Request $req)
    {
        User::all()->where('id', Auth::user()->id)->first()->update([
            'password' => Hash::make($req['password'])
        ]);

        return redirect('/profile')->with('success', 'Password Berhasil Diubah');
    }


    public function tampil_profile()
    {
        return view('profile.index');
    }

    public function edit_profile(Request $req)
    {

        $hasil = [
            'nama' => $req['nama'],
            'username' => $req['username']
        ];

        if ($req->file('foto')) {

            if (Auth::user()->foto != 'foto-user/profile.jpg') {
                Storage::delete(Auth::user()->foto);
            }

            $hasil['foto'] = $req->file('foto')->store('foto-user');
        }

        User::all()->where('id', Auth::user()->id)->first()->update($hasil);

        return redirect('/profile')->with('success', 'Profile Berhasil Diubah');
    }

    public function tampil_dashboard()
    {
        $data1 = count(Pasar::all());
        $data2 = count(Produk::all());
        return view('dashboard.index', [
            'pasar' => $data1,
            'produk' => $data2
        ]);
    }

    public function tampil_pasar()
    {
        $data = Pasar::all();
        return view('pasar.index', [
            'data' => $data
        ]);
    }

    


    


    

    


    


   

    //GUEST
    public function peta_by_pasar()
    {
        $data = Pasar::all();
        return response()->json($data);
    }


    public function detil_pasar(Request $req)
    {
        $data = Pasar::findOrFail($req['id']);
        // UserController::tambah_rekomendasi_produk($req['id']);
        return view('detail_pasar_page',[
            'data' => $data
        ]);
    }
}
