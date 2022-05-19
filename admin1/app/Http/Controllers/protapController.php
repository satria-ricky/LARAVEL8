<?php

namespace App\Http\Controllers;

use App\Models\{pengolahanbatch, protap};


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class protapController extends Controller
{

   public function tampil_protap($jenis)
   {
      $id = Auth::user()->id;
      $data = protap::all()->where('protap_pabrik', auth::user()->pabrik)
         ->where('protap_jenis', $jenis)->sortByDesc('protap_id');
      if ($jenis == 1) {
         $judul = ["Penerimaan Penyerahan dan
            Penyimapanan", 'Bahan Baku', 'Produk Jadi', 'Kemasan'];
      }
      if ($jenis == 2) {
         $judul = ["Pengambilan Contoh", 'Bahan Baku', 'Produk Jadi', 'Kemasan'];
      }
      if ($jenis == 3) {
         $judul = ["Spesifikasi Bahan", 'Bahan Baku', 'Produk Jadi', 'Kemasan'];
      }
      if ($jenis == 4) {
         $judul =  ["Pelatihan Higiene dan Sanitasi Bagi
             Karyawan", 'Pelatihan Higiene', 'Pelatihan CPKB'];
      }
      if ($jenis == 5) {
         $judul = ["Pengoperasian Peralatan Utama"];
      }
      if ($jenis == 6) {
         $judul = ["Struktur Organisasi Personil yang
            Menjabat"];
      }
      if ($jenis == 7) {
         $judul = ["Penimbangan", 'Bahan Baku', 'Produk Antara', 'Ruang Timbang'];
      }
      if ($jenis == 8) {
         $judul = ["Pengolahan Batch"];
      }
      if ($jenis == 9) {
         $judul = ["Pengemasan Batch"];
      }
      if ($jenis == 10) {
         $judul = ["Pemberian Nomor Batch"];
      }
      if ($jenis == 11) {
         $judul = ["Pelulusan Produk Jadi"];
      }
      if ($jenis == 12) {
         $judul = ["Uji Ulang Bahan Baku"];
      }
      if ($jenis == 13) {
         $judul = ["Penanganan Keluhan"];
      }
      if ($jenis == 14) {
         $judul = ["Penarikan Produk"];
      }
      if ($jenis == 15) {
         $judul = ["Pemusnahan Produk"];
      }
      if ($jenis == 16) {
         $judul = ["Penanganan Contoh Tertinggal"];
      }
      if ($jenis == 17) {
         $judul = ["Pembuatan PROTAP dan Penomoran"];
      }
      if ($jenis == 18) {
         $judul = ["Ceklis & TTD Yang Sudah Dibersihkan"];
      }
      if ($jenis == 19) {
         $judul = ["Label Status Kebersihan
            Peralatan Sebelum Pengguanaan"];
      }
      if ($jenis == 20) {
         $judul = ["Program Pemeriksaan Kesehatan
            Untuk Personil"];
      }
      if ($jenis == 21) {
         $judul = ["Pembersihan dan Sanitasi"];
      }
      if ($jenis == 22) {
         $judul = ["Pembersihan dan Sanitasi Ruangan"];
      }
      if ($jenis == 23) {
         $judul = ["Penerapan Higieni Perorangan"];
      }
      if ($jenis == 24) {
         $judul = ["Pemeriksaan/Pengujian Bahan", "Bahan Baku", "Bahan Kemas", "Produk Jadi"];
      }

      return view('protap.tampil_protap', ['list_protap' => $data,  'jenis' => $jenis, 'judul'  => $judul]);
   }

   public function hapus_protap($id, $jenis)
   {
      //  echo  $id;
      $data = protap::all()
         ->where('protap_id', $id)->each->delete();;
      //  dd($data);

      return redirect('/tampil_protap/' . $jenis);
   }

   public function tambah_protap(Request $req)
   {
      $file = $req->file('upload');
      $exten = $file->getClientOriginalExtension();
      $nama = $req['nama'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten;
      $tujuan_upload = 'asset/protap/';
      $file->move($tujuan_upload, $nama);
      $jenis = $req['jenis'];
      $id = Auth::user()->id;
      $pabrik = Auth::user()->pabrik;
      $hasil = [
         'protap_file' => $nama,
         'protap_nama' => $req['nama'],
         'protap_ruangan' => $req['ruangan'],
         'protap_diajukan' => $req['diajukan'],
         'protap_tgl_diajukan' => $req['tgl_diajukan'],
         'protap_diterima' => $req['disetujui'],
         'protap_tgl_diterima' => $req['tgl_disetujui'],
         'protap_jenis' => $jenis,
         'protap_pabrik' => $pabrik,
         'user_id' => $id,
      ];

      protap::insert($hasil);
      // // user::deleted()
      return redirect('/tampil_protap/' . $jenis);
   }

   public function tolak(Request $req)
   {
      $data = pengolahanbatch::all()->where('status', 1);
      $post = protap::all()->where('id',  $req->id)->each->delete();
      return view("catatanpelaksana.pengolahanbatch", ['data' => $data]);
   }

   public function terima(Request $req)
   {

      // dd($req->id);
      $pabrik = Auth::user()->pabrik;
      $data = protap::all()->where('pabrik', $pabrik)
         ->where('level', -1);
      $user = protap::all()->where("id", $req->id)->first()->update([
         'status' => 2,
      ]);

      return view("catatanpelaksana.dokumen.pengolahanbatch", ['data' => $data]);
   }
}
