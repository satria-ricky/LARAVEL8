<?php

namespace App\Http\Controllers;

use App\Models\aturan;
use App\Models\pabrik;
use App\Models\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class superadmin extends Controller
{
    public function tampil_dashboard()
    {
        return view("admin.dashboard");
    }

    public function tampil_pabrik()
    {
        $data  = pabrik::all();
        return view("admin.tambahuser",['data'=> $data]);
    }

    public function tampil_audit()
    {
        $data = user::all()->where('level',4);
        return view("admin.tambahauditor",['data' => $data]);
    }


    public function register(Request $request)
    {

        $hasil = [
            'nama' => $request['pabrik'],
            'alamat' => 'Belum',
            'no_hp' => 'Belum',
            'logo' => 'logo.png',
            'struktur' => 'logo.png'
        ];

        pabrik::insert($hasil);
        $pabrik  = pabrik::all()->where('nama', $request['pabrik']);
        // dd($pabrik);
        $user = new User;
        $user->nama = ucwords(strtolower($request->username));
        $user->namadepan = $request->namadepan;
        $user->namabelakang = $request->namabelakang;
        $user->level = 1;
        foreach ($pabrik as $row) {
            $user->pabrik = $row['pabrik_id'];
        }
        $user->password = bcrypt($request->password);
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect('/dashboard');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect('showregister');
        }
    }

    public function register_audit(Request $request)
    {
        $user = new User;
        $user->nama = ucwords(strtolower($request->username));
        $user->namadepan = $request->namadepan;
        $user->namabelakang = $request->namabelakang;
        $user->level = 4;
        $user->pabrik = 0;
        $user->password = bcrypt($request->password);
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect('/audit');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect('audit');
        }
    }

    public function tampil_protap()
    {
        $Baru = aturan::all()->where('kategori', 'Aturan Baru');
        $Produk = aturan::all()->where('kategori', 'Aturan Produk');
        $Pabrik = aturan::all()->where('kategori', 'Aturan Pabrik');
        $Iklan = aturan::all()->where('kategori', 'Aturan Iklan');
        return view("admin.protap", compact("Baru","Produk", "Pabrik", "Iklan"));
    }
    public function tampil_updateprotap()
    {
        $isibaru = aturan::all()->where('kategori', 'Aturan Baru')->sortByDesc('tgl_upload')->first();
        $isiproduk = aturan::all()->where('kategori', 'Aturan Produk')->sortByDesc('tgl_upload')->first();
        $isipabrik = aturan::all()->where('kategori', 'Aturan Pabrik')->sortByDesc('tgl_upload')->first();
        $isiiklan = aturan::all()->where('kategori', 'Aturan Iklan')->sortByDesc('tgl_upload')->first();

        $baru = isset($isibaru) ? 'asset/aturam/' . $isibaru['nama'] : '#';
        $pabrik = isset($isipabrik['nama']) ?  'asset/aturam/' . $isipabrik['nama'] : '#';
        $produk = isset($isiproduk) ?  'asset/aturam/' . $isiproduk['nama'] : '#';
        $iklan = isset($isiiklan) ?  'asset/aturam/' . $isiiklan['nama'] : '#';

        return view('admin.protap', ['struktur' => $struktur ??  '', 'baru' => $baru, 'produk' => $produk, 'pabrik' => $pabrik, 'iklan' => $iklan]);
    }
    public function input_aturan(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $filename = md5(date('Y-m-d H:i:s:u'));
        $tujuan_upload = 'asset/aturan/';
        $file->move($tujuan_upload, $filename.'.pdf');
        // dd($filename.$nama);
        $data = [
            'nama' => $filename = md5(date('Y-m-d H:i:s:u')).'.pdf',
            'kategori' => $req['kategori'],
            'tgl_upload' => $req['tgl'],
        ];
        aturan::insert($data);
        // // user::deleted()
        return redirect('dashboard');
    }
}
