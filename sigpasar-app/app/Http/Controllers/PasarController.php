<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasar;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Foreach_;

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

    $cekKoordinat = DB::select('select * from pasars where latitude = ? AND longitude = ?', [$req['latitude'],$req['longitude']]);
        // ddd($cekKoordinat);

         if (!$cekKoordinat) {
            // dd('lokasi beda');
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

        } else {
            // dd('lokasi sama');
            return redirect('/tambah_pasar')->with('error', 'Harap memasukkan koordinat yg berbeda!');
         }
    }


    public function hapus_pasar(Request $req)
    {

        $data = Pasar::findOrFail($req['id']);
        // dd($data['foto']);
        $data->delete();

        if ($data['foto'] != 'foto-pasar/default.png') {
            Storage::delete($data['foto']);
        }

        return redirect('/pasar')->with('success', 'Data Berhasil Dihapus');
    }


    public function tampil_edit_pasar(Request $req)
    {
        $id = Crypt::decrypt($req->id_pasar);
        $data = Pasar::findOrFail($id);
        $dataProduk = DB::table('produk_pasars')
            ->leftJoin('pasars', 'produk_pasars.id_pasar', '=', 'pasars.id_pasar')
            ->leftJoin('produks', 'produk_pasars.id_produk', '=', 'produks.id_produk')
            ->where('produk_pasars.id_pasar',$id)
            ->orderByRaw('produks.nama_produk ASC')
            ->get(['pasars.nama_pasar','produks.nama_produk','produk_pasars.*']);

        // $colprodukpasar = pluck($dataProduk)->toArray();
        $colprodukpasar = DB::table('produk_pasars')
        ->leftJoin('pasars', 'produk_pasars.id_pasar', '=', 'pasars.id_pasar')
        ->leftJoin('produks', 'produk_pasars.id_produk', '=', 'produks.id_produk')
        ->where('produk_pasars.id_pasar',$id)
        ->pluck('produks.nama_produk')->toArray();

        // ddd($colprodukpasar);
        $produk = Produk::orderBy('nama_produk','ASC')->get();
        $colproduk = collect($produk);
       
        $tampung_produk = [];


        foreach($colproduk as $result) {
            if (in_array($result->nama_produk, $colprodukpasar)){}
            else{
                $tampung_produk[] = [
                    'id_produk' => $result->id_produk,
                    'nama_produk' => $result->nama_produk,
                ];
            }
        }
        
        return view('pasar.edit_pasar',[
            'data' => $data,
            'dataProduk' => $dataProduk,
            'dataProdukFormTambah' => $tampung_produk
        ]);
    }

    public function edit_pasar(Request $req)
    {
        $id = $req['id'] ??  session()->get('id');

        $data = Pasar::findOrFail($id);
        $cekKoordinat = DB::select('select * from pasars where latitude = ? AND longitude = ? AND id_pasar != ?', [$req['latitude'],$req['longitude'],$id]);
        // ddd($cekKoordinat);

        if (!$cekKoordinat) {
            // return 'beda';
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
    
                if ($data->foto != 'foto-pasar/default.png') {
                    Storage::delete($data->foto);
                }
    
                $hasil['foto'] = $req->file('foto')->store('foto-pasar');
            }
    
            Pasar::all()->where('id_pasar', $id)->first()->update($hasil);
            return redirect('/pasar')->with('success', 'Data Berhasil Diubah!');

        } else {
            // return 'sama';
            return redirect('/EditPasar/'.Crypt::encrypt($id))->with('error', 'Harap memasukkan koordinat yg berbeda!');
        }
        
        
    }


    public function tambah_produk_pasar(Request $req)
    {
        // ddd($req->id_produk);

        foreach ($req->id_produk as $row) {
            DB::table('produk_pasars')->insert([
                'id_pasar' => $req->id_pasar, 
                'id_produk' => $row
                ]);
        }

        return redirect('/EditPasar/'.Crypt::encrypt($req->id_pasar))->with('success', 'Data Produk Berhasil Ditambahkan!');
    }


}
