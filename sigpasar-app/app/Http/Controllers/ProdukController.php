<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

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
