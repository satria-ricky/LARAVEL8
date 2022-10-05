<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasarController extends Controller
{
    public function tampil_pasar()
    {
        $data = Pasar::all();
        return view('pasar.index', [
            'data' => $data
        ]);
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

    public function edit_pasar(Request $req)
    {
        // $id = $req['id'] ??  session()->get('id');

        // // dd($id);
        // $data = Pasar::findOrFail($id);
        ddd($req);

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
        return redirect('/editPasar')->with('success', 'Data Berhasil Ditambah');
    }

}
