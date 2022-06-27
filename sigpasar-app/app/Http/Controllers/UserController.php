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

    public function hapus_pasar(Request $req)
    {

        $data = Pasar::findOrFail($req['id']);
        // dd($data['foto']);
        $data->delete();

        if ($data['foto'] != 'foto-pasar/default.png' && $data['foto'] != '') {
            Storage::delete($data['foto']);
        }

        return redirect('/pasar')->with('success', 'Data Berhasil Dihapus');
    }


    public function tampil_tambah_pasar()
    {
        return view('pasar.tambah_pasar');
    }


    public function tambah_pasar(Request $req)
    {

        // return $req->file('foto')->store('foto-pasar');
        // dd($req);
        $hasil = [
            'nama_pasar' => $req['nama'],
            'alamat' => $req['alamat'],
            'deskripsi' => $req['deskripsi'],
            'tahun_didirikan' => $req['tahun_didirikan'],
            'perbaikan_terakhir' => $req['perbaikan_terakhir'],
            'status_kepemilikan' => $req['status_kepemilikan'],
            'luas_tanah' => $req['luas_tanah'],
            'luas_bangunan' => $req['luas_bangunan'],
            'kondisi' => $req['kondisi'],
            'komoditi' => $req['komoditi'],
            'jumlah_pedagang_los' => $req['jumlah_pedagang_los'],
            'jumlah_pedagang_kios' => $req['jumlah_pedagang_kios'],
            'aktivitas' => $req['aktivitas'],
            'type_pasar' => $req['type_pasar'],
            'latitude' => $req['latitude'],
            'longitude' => $req['longitude']
        ];


        if ($req->file('foto')) {
            $hasil['foto'] = $req->file('foto')->store('foto-pasar');
        } else {
            $hasil['foto'] = 'foto-pasar/default.png';
        }

        Pasar::create($hasil);
        return redirect('/pasar')->with('success', 'Data Berhasil Ditambah');
    }

    public function tampil_edit_pasar(Request $req)
    {
        $id = $req['id'] ??  session()->get('id');

        // dd($id);
        $data = Pasar::findOrFail($id);
        // dd($data);

        return view('pasar.edit_pasar',[
            'data' => $data
        ]);
    }


    public function tampil_produk()
    {
        $data = Produk::all();
        return view('produk.index', [
            'data' => $data
        ]);
    }

    public function edit_produk(Request $req)
    {
        // dd($req);
        $this->validate(
            $req,
            ['nama' => 'required|unique:produks,nama_produk'],
            ['nama.unique' => 'nama produk telah tersedia!']
        );

        Produk::all()->where('id_produk', $req['id'])->first()->update([
            'nama_produk' => $req['nama']
        ]);

        return redirect('/produk')->with('success', 'Data Berhasil Diubah');
    }


    public function tambah_produk(Request $req)
    {
        // dd($req);



        $this->validate(
            $req,
            ['nama' => 'required|unique:produks,nama_produk'],
            ['nama.unique' => 'nama produk telah tersedia!']
        );

        $hasil = [
            'nama_produk' => $req['nama'],
        ];

        Produk::create($hasil);
        return redirect('/produk')->with('success', 'Data Berhasil Ditambah');
    }


    public function hapus_produk(Request $req)
    {
        $data = Produk::findOrFail($req['id']);
        $data->delete();

        return redirect('/produk')->with('success', 'Data Berhasil Dihapus');
    }


    //GUEST
    public function peta_by_pasar()
    {
        $data = Pasar::all();
        return response()->json($data);
    }


    public function detil_pasar()
    {
        $data = Pasar::all();
        return response()->json($data);
    }
}
