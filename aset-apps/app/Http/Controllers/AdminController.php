<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function beranda(){
        return view('admin/beranda', [
            "is_aktif" => "beranda",
            "judul_navigasi" => "Beranda"
        ]);
    }

    public function getAset(){
        return view('admin/daftar_aset', [
            "is_aktif" => "aset",
            "judul_navigasi" => "Daftar Aset",
            "data" => Aset::all()
        ]);
    }
    
    public function tambahAset(){
        return view('admin/tambah_aset', [
            "is_aktif" => "aset",
            "judul_navigasi" => "Tambah Aset"
        ]);
    }
    
    public function createAset(Request $request){
        
        $data = $request->validate([
            'aset_gssl_induk' => 'required',
            'aset_no_rekening' => 'required|unique:tb_aset,aset_no_rekening',
            'aset_deskripsi' => 'required',
            'aset_qty' => 'required',
            'aset_tgl_perolehan' => 'required',
            'aset_tgl_akhir' => 'required',
            'aset_prs_susut' => 'required',
            'aset_sumber_perolehan' => 'required',
            'aset_saldo_perolehan' => 'required',
            'aset_nilai_buku' => 'required',
            'aset_akm_susut' => 'required',
            'aset_uraian' => 'required'
        ]);

        // dd('berhasil ditambah');
        Aset::create($data);

        $request->session()->flash('pesan', 'Data Berhasil Ditambah');
        return redirect('/daftar-aset');

    }
}
