<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukPasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProdukController extends Controller
{
    public function tampil_produk()
    {
        $data = Produk::all();
        return view('produk.index', [
            'data' => $data
        ]);
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

    public function hapus_produk_pasar(Request $req)
    {
        $data = ProdukPasar::findOrFail($req['id']);
        $data->delete();

        return redirect('/EditPasar/'.Crypt::encrypt($req->id_pasar))->with('success', 'Data Produk Berhasil Dihapus!');
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

    
}
