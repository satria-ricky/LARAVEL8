<?php

namespace App\Http\Controllers;

// use App\Models\{pabrik,bahanbaku, catatbersih, coa, company, contohbahanbaku, contohkemasan, contohprodukjadi, dip, distribusiproduk, Kalibrasialat, kartustok, kartustokbahan, kartustokbahankemas, kartustokprodukjadi, kemasan, perizinan, pobpabrik, komposisi, laporan, Pelatihancpkb, pelulusanproduk, pemusnahanbahanbaku, pemusnahanproduk, penanganankeluhan, penarikanproduk, pendistribusianproduk, pengolahanbatch, pengoprasianalat, pengorasianalat, peralatan, penimbangan, Periksaalat, Periksapersonil, periksaruang, PPbahanbakukeluar, PPbahanbakumasuk, PPkemasankeluar, PPkemasanmasuk, PPprodukjadikeluar, PPprodukjadimasuk, produk, produksi, programpelatihan, programpelatihanhiginitas, rekonsiliasi, ruangtimbang, timbangbahan, timbangproduk};
// use App\Models\{aturan, jabatan, pabrik, bahanbaku, catatbersih, coa, company, contohbahanbaku, contohkemasan, contohprodukjadi, cp_bahan, cp_kemasan, cp_produk, dip, distribusiproduk, Kalibrasialat, kartustok, kartustokbahan, kartustokbahankemas, kartustokprodukjadi, kemasan, perizinan, pobpabrik, komposisi, laporan, Pelatihancpkb, pelulusanproduk, pemusnahanbahanbaku, Pemusnahanbahankemas, pemusnahanproduk, Pemusnahanprodukantara, Pemusnahanprodukjadi, penanganankeluhan, penarikanproduk, pendistribusianproduk, pengolahanbatch, pengoprasianalat, pengorasianalat, peralatan, penimbangan, Periksaalat, Periksapersonil, periksaruang, PPbahanbakukeluar, PPbahanbakumasuk, PPkemasankeluar, PPkemasanmasuk, PPprodukjadikeluar, PPprodukjadimasuk, produk, produksi, programpelatihan, programpelatihanhiginitas, rekonsiliasi, ruangtimbang, Spesifikasibahanbaku, Spesifikasibahankemas, Spesifikasiprodukjadi, timbangbahan, timbangproduk};
use App\Models\{aturan, cp_bahan, cp_kemasan, cp_produk, jabatan, pabrik, bahanbaku, catatbersih, coa, company, contohbahanbaku, contohkemasan, contohprodukjadi, detilalat, detiltimbangbahan, detiltimbanghasil, detiltimbangproduk, dip, distribusiproduk, Kalibrasialat, kartustok, kartustokbahan, kartustokbahankemas, kartustokprodukantara, kartustokprodukjadi, kemasan, perizinan, pobpabrik, komposisi, laporan, Pelatihancpkb, pelulusanproduk, pemusnahanbahanbaku, Pemusnahanbahankemas, pemusnahanproduk, Pemusnahanprodukantara, Pemusnahanprodukjadi, penanganankeluhan, penarikanproduk, pendistribusianproduk, Pengemasanbatchproduk, pengolahanbatch, pengoprasianalat, pengorasianalat, peralatan, penimbangan, Periksaalat, Periksapersonil, periksaruang, PPbahanbakukeluar, PPbahanbakumasuk, PPkemasankeluar, PPkemasanmasuk, PPprodukjadikeluar, PPprodukjadimasuk, pr_bahankemas, produk, produkantara, produksi, programpelatihan, programpelatihanhiginitas, prosedur_isi, prosedur_tanda, rekonsiliasi, ruangtimbang, Spesifikasibahanbaku, Spesifikasibahankemas, Spesifikasiprodukjadi, timbangbahan, timbangproduk};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

$a = 0;
$b = 0;
class Admin extends Controller
{
    public function dashboard()
    {
        $pabrik = pabrik::all()->where('pabrik_id', Auth::user()->pabrik);
        foreach ($pabrik as $data) {
            $struktur = $data['struktur'];
        }
        $isibaru = aturan::all()->where('kategori', 'Aturan Baru')->sortByDesc('tgl_upload')->first();
        $isiproduk = aturan::all()->where('kategori', 'Aturan Produk')->sortByDesc('tgl_upload')->first();
        $isipabrik = aturan::all()->where('kategori', 'Aturan Pabrik')->sortByDesc('tgl_upload')->first();
        $isiiklan = aturan::all()->where('kategori', 'Aturan Iklan')->sortByDesc('tgl_upload')->first();

        $baru = isset($isibaru) ? 'asset/aturam/' . $isibaru['nama'] : '#';
        $pabrik = isset($isipabrik['nama']) ?  'asset/aturam/' . $isipabrik['nama'] : '#';
        $produk = isset($isiproduk) ?  'asset/aturam/' . $isiproduk['nama'] : '#';
        $iklan = isset($isiiklan) ?  'asset/aturam/' . $isiiklan['nama'] : '#';

        return view('dashboard', ['struktur' => $struktur ??  '', 'baru' => $baru, 'produk' => $produk, 'pabrik' => $pabrik, 'iklan' => $iklan]);
    }


    //COA
    public function tampil_coa()
    {
        $id = Auth::user()->pabrik;
        $data = coa::all()->where('user_id', $id);
        return view('/coa', ['list_coa' => $data]);
    }

    public function hapus_coa($id)
    {
        $data = coa::all()->where('coa_id', $id);
        // dd($data);
        unlink("asset/coa/" . $data[0]['coa_file']);
        $post = coa::all()->where('coa_id', $id)->each->delete();

        return redirect('/coa');
    }

    public function tambah_coa(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $filename = md5(date('Y-m-d H:i:s:u')) . '.pdf';
        $tujuan_upload = 'asset/coa/';
        $file->move($tujuan_upload, $filename);
        $id = Auth::user()->pabrik;
        $hasil = [
            'coa_file' => $nama,
            'coa_nama' => $req['nama'],
            'user_id' => $id,
        ];

        coa::insert($hasil);

        return redirect('/coa');
    }

    //DIP
    public function tampil_dip()
    {
        $id = Auth::user()->pabrik;
        $data = dip::all()->where('user_id', $id);
        return view('/dip', ['list_dip' => $data]);
    }

    public function hapus_dip($id)
    {
        $data = dip::all()->where('dip_id', $id);
        // dd($data);
        unlink("asset/dip/" . $data[0]['dip_file']);
        $post = dip::all()->where('dip_id', $id)->each->delete();

        return redirect('/dip');
    }

    public function tambah_dip(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $filename = md5(date('Y-m-d H:i:s:u')) . '.pdf';
        $tujuan_upload = 'asset/dip/';
        $file->move($tujuan_upload, $filename);
        $id = Auth::user()->pabrik;
        $hasil = [
            'dip_file' => $nama,
            'dip_nama' => $req['nama'],
            'user_id' => $id,
        ];

        dip::insert($hasil);

        return redirect('/dip');
    }

    //perizinan
    public function tampil_perizinan()
    {
        $id = Auth::user()->pabrik;
        $data = perizinan::all()->where('user_id', $id);
        return view('/perizinan', ['list_perizinan' => $data]);
    }

    public function hapus_perizinan($id)
    {
        $data = perizinan::all()->where('perizinan_id', $id);
        // dd($data);
        unlink("asset/perizinan/" . $data[0]['perizinan_file']);
        $post = perizinan::all()->where('perizinan_id', $id)->each->delete();

        return redirect('/perizinan');
    }

    public function tambah_perizinan(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $tujuan_upload = 'asset/perizinan/';
        $filename = md5(date('Y-m-d H:i:s:u')) . '.pdf';
        $file->move($tujuan_upload, $filename);
        $id = Auth::user()->pabrik;
        $hasil = [
            'perizinan_file' => $nama,
            'perizinan_nama' => $req['nama'],
            'user_id' => $id,
        ];

        perizinan::insert($hasil);

        return redirect('/perizinan');
    }

    //DIP
    public function tampil_jabatan()
    {
        $id = Auth::user()->pabrik;
        $data = jabatan::all()->where('user_id', $id);
        return view('jabatanpersonil', ['list_dip' => $data]);
    }

    public function hapus_jabatan($id)
    {
        $data = jabatan::all()->where('jabatan_id', $id);
        // dd($data);
        unlink("asset/dip/" . $data[0]['jabatan_file']);
        $post = jabatan::all()->where('jabatan_id', $id)->each->delete();

        return redirect('/jabatan');
    }

    public function tambah_jabatan(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $tujuan_upload = 'asset/dip/';
        $filename = md5(date('Y-m-d H:i:s:u')) . '.pdf';
        $file->move($tujuan_upload, $filename);
        $id = Auth::user()->pabrik;
        $hasil = [
            'jabatan_file' => $nama,
            'jabatan_nama' => $req['nama'],
            'user_id' => $id,
        ];

        jabatan::insert($hasil);

        return redirect('/jabatan');
    }

    //pob
    public function tampil_pobpabrik()
    {
        $id = Auth::user()->id;
        $data = pobpabrik::all()->where('user_id', $id);
        return view('/pobpabrik', ['list_pobpabrik' => $data]);
    }

    public function hapus_pobpabrik($id)
    {
        $data = pobpabrik::all()->where('pobpabrik_id', $id);
        // dd($data);
        unlink("asset/pobpabrik/" . $data[0]['pobpabrik_file']);
        $post = pobpabrik::all()->where('pobpabrik_id', $id)->each->delete();

        return redirect('/pobpabrik');
    }

    public function tambah_pobpabrik(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $tujuan_upload = 'asset/pobpabrik/';
        $filename = md5(date('Y-m-d H:i:s:u')) . '.pdf';
        $file->move($tujuan_upload, $filename);
        $id = Auth::user()->id;
        $hasil = [
            'pobpabrik_file' => $filename,
            'pobpabrik_nama' => $req['nama'],
            'user_id' => $id,
        ];

        pobpabrik::insert($hasil);

        return redirect('/pobpabrik');
    }

    //catat bersh ruangan

    public function tampil_detilbb(Request $req)
    {
        $pabrik = Auth::user()->pabrik;
        $induk = $req['induk'];
        $jenis = $req['jenis'];
        $nama = $req['nama'];
        session(['induk' => $induk]);
        session(['jenis' => $jenis]);
        session(['nama' => $nama]);
        if ($jenis == 1) {
            $data1 = PPbahanbakumasuk::all()->where('pabrik', $pabrik)->where('induk', $induk);
            $data2 = PPbahanbakukeluar::all()->where('pabrik', $pabrik)->where('induk', $induk);
        } elseif ($jenis == 2) {
            $data1 = PPprodukjadimasuk::all()->where('pabrik', $pabrik)->where('induk', $induk);
            $data2 = PPprodukjadikeluar::all()->where('pabrik', $pabrik)->where('induk', $induk);
        } else {
            $data1 = PPkemasanmasuk::all()->where('pabrik', $pabrik)->where('induk', $induk);
            $data2 = PPkemasankeluar::all()->where('pabrik', $pabrik)->where('induk', $induk);
        }
        return view('catatan.dokumen.detailpenerimaanBB', [
            'jenis' => $jenis, 'induk' => $induk, 'nama' => $nama,
            'data1' => $data1,
            'data2' => $data2
        ]);
    }

    public function tampil_detilbbid()
    {
        // global $a,$b;
        $jenis = session()->get('jenis');
        $induk =  session()->get('induk');
        $nama  =  session()->get('nama');
        $pabrik = Auth::user()->pabrik;        // dd($req);
        if ($jenis == 1) {
            $data1 = PPbahanbakumasuk::all()->where('pabrik', $pabrik)->where('induk', $induk);
            $data2 = PPbahanbakukeluar::all()->where('pabrik', $pabrik)->where('induk', $induk);
        } elseif ($jenis == 2) {
            $data1 = PPprodukjadimasuk::all()->where('pabrik', $pabrik)->where('induk', $induk);
            $data2 = PPprodukjadikeluar::all()->where('pabrik', $pabrik)->where('induk', $induk);
        } else {
            $data1 = PPkemasanmasuk::all()->where('pabrik', $pabrik)->where('induk', $induk);
            $data2 = PPkemasankeluar::all()->where('pabrik', $pabrik)->where('induk', $induk);
        }
        return view('catatan.dokumen.detailpenerimaanBB', [
            'jenis' => $jenis, 'induk' => $induk, 'nama' => $nama,
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }

    public function tampil_penerimaanbb()
    {
        $pabrik = Auth::user()->pabrik;
        $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);;
        $produk = produk::all()->where('user_id', $pabrik);;
        $kemasan = kemasan::all()->where('user_id', $pabrik);;
        if (Auth::user()->level == 2) {
            $data1 = cp_bahan::all()->where('pabrik', $pabrik);
            $data2 = cp_produk::all()->where('pabrik', $pabrik);
            $data3 = cp_kemasan::all()->where('pabrik', $pabrik);
        } else {
            $data1 = cp_bahan::all()->where('pabrik', $pabrik);
            $data2 = cp_produk::all()->where('pabrik', $pabrik);
            $data3 = cp_kemasan::all()->where('pabrik', $pabrik);
        }
        return view('catatan.dokumen.penerimaanBB', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'bahanbaku' => $bahanbaku, 'produk' => $produk, 'kemasan' => $kemasan]);
    }

    public function tambah_terimabahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $data = [
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ];

        $nomer = cp_bahan::insertGetId($data);

        $laporan = [
            'laporan_nama' => 'penerimaan bahan',
            'laporan_batch' => $nomer,
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect()->route('penerimaanBB');
    }

    public function tambah_terimaproduk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $data = [
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ];

        $nomer = cp_produk::insertGetId($data);

        $laporan = [
            'laporan_nama' => 'penerimaan produk',
            'laporan_batch' => $nomer,
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect()->route('penerimaanBB');
    }

    public function tambah_terimakemasan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $data = [
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ];

        $nomer = cp_kemasan::insertGetId($data);

        $laporan = [
            'laporan_nama' => 'penerimaan kemasan',
            'laporan_batch' => $nomer,
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect()->route('penerimaanBB');
    }

    public function edit_terimabahan(Request $req)
    {
        $id = Auth::user()->id;
        $cpid = $req['cpid'];
        $pabrik = Auth::user()->pabrik;
        // dd($req);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $data = [
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ];
        // dd($data);

        cp_bahan::all()->where('cp_bahan_id', $cpid)->first()->update([
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ]);
        return redirect()->route('penerimaanBB');
    }

    public function edit_terimaproduk(Request $req)
    {
        $id = Auth::user()->id;
        $cpid = $req['cpid'];
        $pabrik = Auth::user()->pabrik;

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $data = [
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ];

        $nomer = cp_produk::insertGetId($data);

        cp_produk::all()->where('cp_produk_id', $cpid)->first()->update($data);
        return redirect()->route('penerimaanBB');
    }

    public function edit_terimakemasan(Request $req)
    {
        $id = Auth::user()->id;
        $cpid = $req['cpid'];
        $pabrik = Auth::user()->pabrik;

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $data = [
            'nama' => $req['nama'],
            'jumlah' => $req['jumlah'],
            'kode' => $req['kode'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
        ];

        cp_kemasan::all()->where('cp_kemasan_id', $cpid)->first()->update($data);
        return redirect()->route('penerimaanBB');
    }

    public function tambah_penerimaanbbmasuk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $data = [
            'tanggal' => $req['tanggal'],
            'nama_bahan' => $req['nama_bahanbaku'],
            'no_pob' => $req['pob_no'],
            'no_loth' => $req['no_loth'],
            'pemasok' => $req['pemasok'],
            'jumlah' => $req['jumlah'],
            'no_kontrol' => $req['no_kontrol'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPbahanbakumasuk::insert($data);
        return redirect('/detilterimabbid');
    }
    public function tambah_penerimaanbbkeluar(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $data = [
            'tanggal' => $req['tanggal'],
            'nama_bahan' => $req['nama_bahanbaku'],
            'untuk_produk' => $req['untuk_produk'],
            'no_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'sisa' => $req['sisa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPbahanbakukeluar::insert($data);
        return redirect('/detilterimabbid');
    }
    public function tambah_penerimaanprdukmasuk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $data = [
            'tanggal' => $req['tanggal'],
            'nama_produkjadi' => $req['nama_produkjadi'],
            'no_pob' => $req['pob_no'],
            'no_loth' => $req['no_loth'],
            'pemasok' => $req['pemasok'],
            'jumlah' => $req['jumlah'],
            'no_kontrol' => $req['no_kontrol'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPprodukjadimasuk::insert($data);
        return redirect('/detilterimabbid');
    }
    public function tambah_penerimaanprodukkeluar(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $data = [
            'tanggal' => $req['tanggal'],
            'nama_produk' => $req['nama_produk'],
            'untuk_produk' => $req['untuk_produk'],
            'no_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'sisa' => $req['sisa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPprodukjadikeluar::insert($data);
        return redirect('/detilterimabbid');
    }
    public function tambah_penerimaakemasanmasuk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $data = [
            'tanggal' => $req['tanggal'],
            'nama_kemasan' => $req['nama_kemasan'],
            'no_pob' => $req['pob_no'],
            'no_loth' => $req['no_loth'],
            'pemasok' => $req['pemasok'],
            'jumlah' => $req['jumlah'],
            'no_kontrol' => $req['no_kontrol'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPkemasanmasuk::insert($data);
        return redirect('/detilterimabbid');
    }
    public function tambah_penerimaankemasankeluar(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $data = [
            'tanggal' => $req['tanggal'],
            'nama_kemasan' => $req['nama_kemasan'],
            'untuk_produk' => $req['untuk_produk'],
            'no_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'sisa' => $req['sisa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPkemasankeluar::insert($data);
        return redirect('/detilterimabbid');
    }

    public function edit_penerimaanbbmasuk(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $data = [
            'nama_bahan' => $req['nama_bahanbaku'],
            'no_pob' => $req['pob_no'],
            'no_loth' => $req['no_loth'],
            'pemasok' => $req['pemasok'],
            'jumlah' => $req['jumlah'],
            'no_kontrol' => $req['no_kontrol'],
            'kedaluwarsa' => $req['kedaluwarsa'],
        ];
        PPbahanbakumasuk::all()->where('id_ppbahanbaku', $id)->first()->update($data);
        return redirect('/detilterimabbid');
    }
    public function edit_penerimaanbbkeluar(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $data = [
            'nama_bahan' => $req['nama_bahanbaku'],
            'untuk_produk' => $req['untuk_produk'],
            'no_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'sisa' => $req['sisa'],
        ];
        PPbahanbakukeluar::all()->where('id_ppbahanbakukeluar', $id)->first()->update($data);
        return redirect('/detilterimabbid');
    }
    public function edit_penerimaanprdukmasuk(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        // dd($id);
        $data = [
            'nama_produkjadi' => $req['nama_produkjadi'],
            'no_pob' => $req['pob_no'],
            'no_loth' => $req['no_loth'],
            'pemasok' => $req['pemasok'],
            'jumlah' => $req['jumlah'],
            'no_kontrol' => $req['no_kontrol'],
            'kedaluwarsa' => $req['kedaluwarsa'],
        ];
        PPprodukjadimasuk::all()->where('id_produkjadimasuk', $id)->first()->update($data);
        return redirect('/detilterimabbid');
    }
    public function edit_penerimaanprodukkeluar(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $data = [
            'nama_produk' => $req['nama_produk'],
            'untuk_produk' => $req['untuk_produk'],
            'no_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'sisa' => $req['sisa'],
            'pabrik' => $pabrik,
            'induk' => $req['induk'],
            'user_id' => $id,
        ];
        PPprodukjadikeluar::all()->where('id_pprodukjadikeluar', $id)->first()->update($data);
        $induk = $req['induk'];
        $jenis = $req['jenis'];
        return redirect('/detilterimabbid');
    }
    public function edit_penerimaakemasanmasuk(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $data = [
            'nama_kemasan' => $req['nama_kemasan'],
            'no_pob' => $req['pob_no'],
            'no_loth' => $req['no_loth'],
            'pemasok' => $req['pemasok'],
            'jumlah' => $req['jumlah'],
            'no_kontrol' => $req['no_kontrol'],
            'kedaluwarsa' => $req['kedaluwarsa'],
        ];
        PPkemasanmasuk::all()->where('id_kemasanmasuk', $id)->first()->update($data);
        return redirect('/detilterimabbid');
    }
    public function edit_penerimaankemasankeluar(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $data = [
            'nama_kemasan' => $req['nama_kemasan'],
            'untuk_produk' => $req['untuk_produk'],
            'no_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'sisa' => $req['sisa'],
        ];
        PPkemasankeluar::all()->where('id_ppkemasankeluar', $id)->first()->update($data);
        return redirect('/detilterimabbid');
    }

    //tampil kemas batch
    public function tampil_kemasbatch()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = pengolahanbatch::all()->where('pabrik', $pabrik); //;
            // dd($pabrik);
        } else {
            $data = pengolahanbatch::all()->where('pabrik', $pabrik);
            // echo "halo";
        }
        $data2 = produk::all()->where('user_id', Auth::user()->pabrik);
        $data3 = kemasan::all()->where('user_id', Auth::user()->pabrik);

        return view('catatan.dokumen.pengemasanbatch', [
            'data' => $data,
            'data2' => $data2, 'data3' => $data3
        ]);
    }

    public function tampil_detilkemasbatch(Request $req)
    {
        // dd($req);

        $id = $req['nobatch'] ??  session()->get('detilkemasbatch');
        session(['detilkemasbatch' => $req['nobatch'] ??  $id]);
        $data = Pengemasanbatchproduk::all()->where('id_pengemasanbatchproduk', $id);
        // dd($id);
        $kemasan = kemasan::all();
        $prkemas = pr_bahankemas::all()->where('id_kemasbatch', $id);
        $proisi = prosedur_isi::all()->where('id_kemas', $id);
        $protanda  = prosedur_tanda::all()->where('id_kemas', $id);
        // dd($kemasan);
        return view('catatan.dokumen.detilkemasbatch', [
            'id' => $id,
            'data' => $data, 'kemasan' => $kemasan, 'prkemas' => $prkemas,
            'proisi' => $proisi, 'protanda' => $protanda
        ]);
    }

    public function tambah_protanda(Request $req)
    {
        $id = session()->get('detilkemasbatch');
        $pabrik = Auth::user()->pabrik;
        $data = [
            'isi' => $req['isi'],
            'id_kemas' => $id,
        ];
        prosedur_tanda::insert($data);
        return redirect('/detilkemasbatch');
    }

    public function tambah_proisi(Request $req)
    {
        $id = session()->get('detilkemasbatch');
        $pabrik = Auth::user()->pabrik;
        $data = [
            'isi' => $req['isi'],
            'id_kemas' => $id,
        ];
        prosedur_isi::insert($data);
        return redirect('/detilkemasbatch');
    }

    public function tambah_prkemas(Request $req)
    {
        $id = session()->get('detilkemasbatch');
        $pabrik = Auth::user()->pabrik;
        $data = [
            'kode_kemas' => $req['kode'],
            'nama_kemas' => $req['nama'],
            'j_butuh' => $req['jbutuh'],
            'j_tolak' => $req['jtolak'],
            'no_qc' => $req['noqc'],
            'j_pakai' => $req['jpakai'],
            'j_kembali' => $req['jkembali'],
            'id_kemasbatch' => $id,
        ];
        // dd($data);
        pr_bahankemas::insert($data);
        return redirect('/detilkemasbatch');
    }



    //tampil batch
    public function tampil_pengolahanbatch()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = pengolahanbatch::all()->where('pabrik', $pabrik); //;
            // dd($pabrik);
        } else {
            $data = pengolahanbatch::all()->where('pabrik', $pabrik);
            // echo "halo";
        }
        $data2 = produk::all()->where('user_id', Auth::user()->pabrik);
        $data3 = kemasan::all()->where('user_id', Auth::user()->pabrik);

        return view('catatan.dokumen.pengolahanbatch', ['data' => $data, 'data2' => $data2, 'data3' => $data3]);
    }



    // public function tampil_detilbatch(Request $req)
    // {
    //     // dd($req);
    //     $id = $req['nobatch'];
    //     $data = pengolahanbatch::all()->where('nomor_batch', $id);
    //     $kom = komposisi::all()->where('nomor_batch', $id);
    //     $alat = peralatan::all()->where('nomor_batch', $id);
    //     $nimbang = penimbangan::all()->where('nomor_batch', $id);
    //     return view('catatan.dokumen.detailbatch', [
    //         'id' => $id,
    //         'data' => $data, 'list_kom' => $kom, 'list_alat' => $alat, 'list_nimbang' => $nimbang
    //     ]);
    // }

    public function tampil_detilbatch(Request $req)
    {
        // dd($req);

        $id = $req['nobatch'] ??  session()->get('detilbatch');
        session(['detilbatch' => $req['nobatch'] ??  $id]);
        $data = pengolahanbatch::all()->where('nomor_batch', $id)->first();
        $data = [$data];
        // dd($id);
        $kom = komposisi::all()->where('nomor_batch', $id);
        $alat = peralatan::all()->where('nomor_batch', $id);
        $nimbang = penimbangan::all()->where('nomor_batch', $id);
        $olah = produksi::all()->where('id_batch', $id);
        $rekon = rekonsiliasi::all()->where('id_batch', $id);
        return view('catatan.dokumen.detailbatch', [
            'id' => $id,
            'data' => $data, 'list_kom' => $kom, 'list_alat' => $alat, 'list_nimbang' => $nimbang,
            'list_olah' => $olah, 'rekon' => $rekon
        ]);
    }

    public function ajukan_batch($id)
    {
        $user = pengolahanbatch::all()->where("nomor_batch", $id)->first()->update([
            'status' => 1,
        ]);
        $data = pengolahanbatch::all()->where('nomor_batch', $id);
        $kom = komposisi::all()->where('nomor_batch', $id);
        $alat = peralatan::all()->where('nomor_batch', $id);
        $nimbang = penimbangan::all()->where('nomor_batch', $id);
        $olah = produksi::all()->where('id_batch', $id);
        $rekon = rekonsiliasi::all()->where('id_batch', $id);
        return view('catatan.dokumen.detailbatch', [
            'id' => $id,
            'data' => $data, 'list_kom' => $kom, 'list_alat' => $alat, 'list_nimbang' => $nimbang,
            'list_olah' => $olah, 'rekon' => $rekon
        ]);
    }

    public function tambah_batch(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'pob' => $req['pob'],
            'kode_produk' => $req['kode_produk'],
            'nama_produk' => $req['nama_produk'],
            'nomor_batch' => $req['no_batch'],
            'besar_batch' => $req['besar_batch'],
            'bentuk_sedia' => $req['bentuk_sediaan'],
            'kategori' => $req['kategori'],
            'kemasan' => $req['kemasan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = pengolahanbatch::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');

        $laporan = [
            'laporan_nama' => 'pengolahan batch',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        // dd($hasil);
        laporan::insert($laporan);
        return redirect('/pengolahanbatch');
    }

    public function edit_batch(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'pob' => $req['pob'],
            'kode_produk' => $req['kode_produk'],
            'nama_produk' => $req['nama_produk'],
            'nomor_batch' => $req['no_batch'],
            'besar_batch' => $req['besar_batch'],
            'bentuk_sedia' => $req['bentuk_sediaan'],
            'kategori' => $req['kategori'],
            'kemasan' => $req['kemasan'],
        ];

        $nomer = pengolahanbatch::where('batch', $id)->update($hasil);
        return redirect('/pengolahanbatch');
    }

    //komposisi
    public function tambah_komposisi(Request $req)
    {
        $id = Auth::user()->id;
        $nobatch = $req['nobatch'];
        $hasil = [
            'komposisi_id' => $req['id'],
            'kompisisi_nama' => $req['nama'],
            'komposisi_persen' => $req['persen'],
            'nomor_batch' => $nobatch,
            'user_id' => $id,
        ];

        komposisi::insert($hasil);

        $to = $req['nobatch'];
        return redirect('/detil_batch/');
    }

    //peralatan
    public function tambah_peralatan(Request $req)
    {
        $id = Auth::user()->id;
        $nobatch = $req['nobatch'];
        $hasil = [
            'peralatan_id' => $req['kode'],
            'peralatan_nama' => $req['nama'],
            'nomor_batch' => $nobatch,
            'user_id' => $id,
        ];

        peralatan::insert($hasil);

        $to = $req['nobatch'];
        return redirect('/detil_batch/');
    }

    //catat penimbangan
    public function tambah_penimbangan(Request $req)
    {
        $id = Auth::user()->id;
        $nobatch = $req['nobatch'];
        $hasil = [
            'penimbangan_kodebahan' => $req['kode_bahan'],
            'penimbangan_namabahan' => $req['nama_bahan'],
            'penimbangan_loth' => $req['no_loth'],
            'penimbangan_jumlahbutuh' => $req['jumlah_butuh'],
            'penimbangan_jumlahtimbang' => $req['jumlah_timbang'],
            'penimbangan_timbangoleh' => $req['ditimbang'],
            'penimbangan_periksaoleh' => $req['diperiksa'],
            'nomor_batch' => $nobatch,
            'user_id' => $id,
        ];

        penimbangan::insert($hasil);

        $to = $req['nobatch'];
        return redirect('/detil_batch/');
    }

    //olah
    public function tambah_olah(Request $req)
    {
        $id = Auth::user()->id;
        $nobatch = $req['nobatch'];
        $hasil = [
            'isi' => $req['isi'],
            'id_batch' => $nobatch,
            'user_id' => $id,
        ];

        produksi::insert($hasil);

        $to = $req['nobatch'];
        return redirect('/detil_batch/');
    }

    public function tambah_rekonsiliasi(Request $req)
    {
        $id = Auth::user()->id;
        $nobatch = $req['nobatch'];
        $hasil = [
            'awal' => $req['awal'],
            'akhir' => $req['akhir'],
            'id_batch' => $nobatch,
            'user_id' => $id,
        ];

        rekonsiliasi::insert($hasil);

        $to = $req['nobatch'];
        return redirect('/detil_batch/');
    }

    public function hapus_komposisi($id)
    {

        $data = komposisi::all()->where('komposisi_id', $id);
        $post = komposisi::all()->where('komposisi_id', $id)->each->delete();
        return redirect('/detil_batch/');
    }

    public function hapus_peralatan($id)
    {
        $data = peralatan::all()->where('peralatan_id', $id);
        $post = peralatan::all()->where('peralatan_id', $id)->each->delete();

        return redirect('/detil_batch/');
    }

    public function hapus_penimbangan($id)
    {
        $data = penimbangan::all()->where('penimbangan_id', $id);
        $post = penimbangan::all()->where('penimbangan_id', $id)->each->delete();

        return redirect('/detil_batch/');
    }

    public function hapus_olah($id)
    {
        $data = produksi::all()->where('produksi_id', $id);
        $post = produksi::all()->where('produksi_id', $id)->each->delete();

        return redirect('/detil_batch/');
    }

    public function hapus_rekonsiliasi($id)
    {
        $data = rekonsiliasi::all()->where('rekonsiliasi_id', $id);
        $post = rekonsiliasi::all()->where('rekonsiliasi_id', $id)->each->delete();

        return redirect('/detil_batch/');
    }

    public function tambah_company(Request $req)
    {
        $file = $req->file('upload');
        $nama = $file->getClientOriginalName();
        $tujuan_upload = 'asset/logo/';
        $ext = pathinfo($nama, PATHINFO_EXTENSION);
        $file->move($tujuan_upload, session('pabrik') . '.' . $ext);
        $id = Auth::user()->pabrik;

        // dd($req);
        $user = pabrik::all()->where("pabrik_id", $id)->first()->update([
            'alamat' => $req['alamat'],
            'no_hp' => $req['telp'],
            'logo' =>  session('pabrik') . '.' . $ext,
        ]);

        return redirect('/setting');
    }

    public function tambah_produk(Request $req)
    {
        $id = Auth::user()->pabrik;
        $hasil = [
            'produk_nama' => $req['nama'],
            'produk_kode' => $req['kode'],
            'user_id' => $id,
        ];

        produk::insert($hasil);

        return redirect('/setting');
    }
    public function tambah_produkantara(Request $req)
    {
        $id = Auth::user()->pabrik;
        $hasil = [
            'produkantara_nama' => $req['nama'],
            'produkantara_kode' => $req['kode'],
            'user_id' => $id,
        ];

        produkantara::insert($hasil);

        return redirect('/setting');
    }

    public function tambah_kemasan(Request $req)
    {
        $id = Auth::user()->pabrik;
        $hasil = [
            'kemasan_nama' => $req['nama'],
            'kemasan_kode' => $req['kode'],
            'user_id' => $id,
        ];

        // dd($hasil);

        kemasan::insert($hasil);

        return redirect('/setting');
    }

    public function tambah_bahanbaku(Request $req)
    {
        $id = Auth::user()->pabrik;
        $hasil = [
            'bahanbaku_nama' => $req['nama'],
            'bahanbaku_kode' => $req['kode'],
            'user_id' => $id,
        ];

        bahanbaku::insert($hasil);

        return redirect('/setting');
    }

    public function hapus_produk($id)
    {
        produk::all()->where('produk_id', $id)->each->delete();
        return redirect('/setting');
    }

    public function hapus_kemasan($id)
    {
        kemasan::all()->where('kemasan_id', $id)->each->delete();
        return redirect('/setting');
    }

    public function hapus_bahanbaku($id)
    {
        bahanbaku::all()->where('bahanbaku_id', $id)->each->delete();
        return redirect('/setting');
    }
    public function hapus_produkantara($id)
    {
        produkantara::all()->where('produkantara_id', $id)->each->delete();
        return redirect('/setting');
    }

    public function tampil_setting()
    {
        if (Auth::user()->level < 0) {
            return view('tunggu');
        } else {
            $id = Auth::user()->pabrik;
            $pabrik = pabrik::all()->where('pabrik_id', Auth::user()->pabrik);

            foreach ($pabrik as $row) {
                $nama = $row['nama'];
                $alamat = $row['alamat'] ?? 'kosong';
                $no_hp = $row['no_hp'];
                $logo = $row['logo'];
            }
            $kom = company::all()->where('user_id', $id);
            $produk = produk::all()->where('user_id', $id);
            $produkantara = produkantara::all()->where('user_id', $id);
            $kemasan = kemasan::all()->where('user_id', $id);
            $bahanbaku = bahanbaku::all()->where('user_id', $id);
            return view('setting', [
                'alamat' => $alamat ?? "kosong", 'no_hp' => $no_hp ?? "kosong", 'nama' => $nama ?? "kosong", 'logo' => $logo ?? "kosong",
                'list_com' => $kom, 'list_produk' => $produk, 'list_produkantara' => $produkantara, 'list_kemasan' => $kemasan, 'list_bahanbaku' => $bahanbaku
            ]);
        }
    }

    public function tampil_laporan()
    {
        $id = Auth::user()->pabrik;
        $data = laporan::all()->where('pabrik_id', $id)->where('laporan_diterima', '!=', 'belum');
        return view('laporan', ['batch' => $data]);
    }

    public function tampil_periksapersonil()
    {
        $data = Periksapersonil::all()->where('pabrik', Auth::user()->pabrik);
        return view('catatan.higidansani.periksapersonil', ['data' => $data]);
    }

    public function tambah_periksapersonil(Request $req)
    {
        $file = $req->file('file');
        $exten = $file->getClientOriginalExtension();
        $nama = $req['nama_personil'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten;
        $tujuan_upload = 'asset/health_personil';
        $file->move($tujuan_upload, $nama);
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama' => $req['nama_personil'],
            'nama_file' => $nama,
            'pabrik' => $pabrik,
            'user_id' => $id,
        ];
        $nomer = Periksapersonil::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'Periksa Personil',
            'laporan_batch' => 'dummy',
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect('/periksapersonil');
    }
    public function edit_periksapersonil(Request $req)
    {
        $tujuan_upload = 'asset/health_personil';
        $nama = $req['filename'];
        $file = $req->file('file');
        $exten = $file->getClientOriginalExtension();
        $filedelete = $tujuan_upload . "/" . $nama;
        File::delete(public_path("/" . $filedelete));
        $file = $req->file('file');
        $namasimpan = $req['nama_personil'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten;
        $file->move($tujuan_upload, $namasimpan);
        Periksapersonil::where('personil_id', $req['id'])
            ->update([
                'nama' => $req['nama_personil'],
                'nama_file' => $req['nama_personil'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten,
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "Periksa Personil")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/periksapersonil');
    }

    public function tampil_periksasanialat()
    {
        $pabrik = Auth::user()->pabrik;
        $data1 = periksaruang::all();
        $data = Periksaalat::all()->where('pabrik', $pabrik);
        return view('catatan.higidansani.periksasanialat', ['data' => $data, 'data1' => $data1]);
    }
    public function tambah_periksaalat(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'nama_ruangan' => $req['nama_ruangan'],
            'nama_alat' => $req['nama_alat'],
            'bagian_alat' => $req['bagian_alat'],
            'cara_pembersihan' => $req['cara_pembersihan'],
            'pelaksana' => $req['pelaksana'],
            'keterangan' => $req['keterangan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = Periksaalat::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'periksa sanitasi alat',
            'laporan_batch' => $req['no_batch'] ?? 0,
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/periksasanialat');
    }
    public function edit_periksaalat(Request $req)
    {
        Periksaalat::where('id_periksaalat', $req['id'])
            ->update([
                'tanggal' => $req['tanggal'],
                'nama_ruangan' => $req['nama_ruangan'],
                'nama_alat' => $req['nama_alat'],
                'bagian_alat' => $req['bagian_alat'],
                'cara_pembersihan' => $req['cara_pembersihan'],
                'pelaksana' => $req['pelaksana'],
                'keterangan' => $req['keterangan'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "periksa sanitasi alat")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/periksasanialat');
    }
    public function tampil_periksasaniruang()
    {
        $pabrik = Auth::user()->pabrik;
        $data = periksaruang::all()->where('pabrik', $pabrik);
        return view('catatan.higidansani.periksasaniruang', ['data' => $data]);
    }
    public function tambah_periksaruang(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'waktu' => $req['waktu'],
            'nama_ruangan' => $req['nama_ruangan'],
            'lantai' => $req['lantai'],
            'dinding' => $req['dinding'],
            'meja' => $req['meja'],
            'jendela' => $req['jendela'],
            'kontainer' => $req['kontainer'],
            'langit' => $req['langit'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = periksaruang::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'periksa sanitasi ruangan',
            'laporan_batch' => $req['no_batch'] ?? 0,
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/periksasaniruang');
    }


    // Bagian Pengawas

    public function tampil_req_batch()
    {
        $data = pengolahanbatch::all()->where('status', 1);
        return view('catatanpelaksana.dokumen.pengolahanbatch', ['data' => $data]);
    }

    public function tolak_batch($id)
    {

        $pabrik = Auth::user()->pabrik;
        $user = pengolahanbatch::all()->where("nomor_batch", $id)->first()->update([
            'status' => 0,
        ]);
        $data = pengolahanbatch::all()->where('status', 1);
        return view('catatanpelaksana.dokumen.pengolahanbatch', ['data' => $data]);
    }


    //yusril
    public function tambah_pelatihanhiginitas(Request $req)
    {
        // dd($req);
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pelatihan' => $req['kode_pelatihan'],
            'materi_pelatihan' => $req['materi_pelatihan'],
            'peserta_pelatihan' => $req['peserta_pelatihan'],
            'pelatih' => $req['pelatih'],
            'metode_pelatihan' => $req['metode_pelatihan'],
            'jadwal_mulai_pelatihan' => $req['mulai'],
            'jadwal_berakhir_pelatihan' => $req['berakhir'],
            'metode_penilaian' => $req['metode_penilaian'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = programpelatihan::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pelatihan higiene dan sanitasi',
            'laporan_batch' => $req['kode_pelatihan'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/program-dan-pelatihan-higiene-dan-sanitasi');
    }
    public function tambah_pelatihancpkb(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pelatihan' => $req['kode_pelatihan'],
            'materi_pelatihan' => $req['materi_pelatihan'],
            'peserta_pelatihan' => $req['peserta_pelatihan'],
            'pelatih' => $req['pelatih'],
            'metode_pelatihan' => $req['metode_pelatihan'],
            'jadwal_mulai_pelatihan' => $req['mulai'],
            'jadwal_berakhir_pelatihan' => $req['berakhir'],
            'metode_penilaian' => $req['metode_penilaian'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = Pelatihancpkb::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pelatihan cpkb',
            'laporan_batch' => $req['kode_pelatihan'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/program-dan-pelatihan-higiene-dan-sanitasi');
    }

    public function edit_pelatihanhiginitas(Request $req)
    {
        // dd($req);
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pelatihan' => $req['kode_pelatihan'],
            'materi_pelatihan' => $req['materi_pelatihan'],
            'peserta_pelatihan' => $req['peserta_pelatihan'],
            'pelatih' => $req['pelatih'],
            'metode_pelatihan' => $req['metode_pelatihan'],
            'jadwal_mulai_pelatihan' => $req['mulai'],
            'jadwal_berakhir_pelatihan' => $req['berakhir'],
            'metode_penilaian' => $req['metode_penilaian'],
        ];
        // dd($hasil);

        $nomer = programpelatihan::all()->where('id_programpelatihan', $id)->first()->update($hasil);

        return redirect('/program-dan-pelatihan-higiene-dan-sanitasi');
    }
    public function edit_pelatihancpkb(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pelatihan' => $req['kode_pelatihan'],
            'materi_pelatihan' => $req['materi_pelatihan'],
            'peserta_pelatihan' => $req['peserta_pelatihan'],
            'pelatih' => $req['pelatih'],
            'metode_pelatihan' => $req['metode_pelatihan'],
            'jadwal_mulai_pelatihan' => $req['mulai'],
            'jadwal_berakhir_pelatihan' => $req['berakhir'],
            'metode_penilaian' => $req['metode_penilaian'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = Pelatihancpkb::all()->where('id_pelatihancpkb', $id)->first()->update($hasil);

        return redirect('/program-dan-pelatihan-higiene-dan-sanitasi');
    }

    public function tampil_programpelatihanhigienitasdansanitasi()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = programpelatihan::all()->where('pabrik', $pabrik);
            $data1 = Pelatihancpkb::all()->where('pabrik', $pabrik);
        } else {
            $data = programpelatihan::all()->where('pabrik', $pabrik);
            $data1 = Pelatihancpkb::all()->where('pabrik', $pabrik);
        }

        return view('catatan.dokumen.programpelatihanhiginitas', ['data' => $data, 'data1' => $data1]);
    }
    public function tambah_keluhan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_keluhan' => $req['kode_keluhan'],
            'nama_customer' => $req['nama_customer'],
            'tanggal_keluhan' => $req['tanggal_keluhan'],
            'keluhan' => $req['keluhan'],
            'tanggal_ditanggapi' => $req['tanggal_tanggapi_keluhan'],
            'produk_yang_digunakan' => $req['produk_yang_digunakan'],
            'penanganan_keluhan' => $req['penanganan_keluhan'],
            'tindak_lanjut' => $req['tindak_lanjut'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = penanganankeluhan::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penanganan keluhan',
            'laporan_batch' => 'dummy',
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/penanganan-keluhan');
    }
    public function edit_penanganankeluhan(Request $req)
    {
        penanganankeluhan::where('id_penanganankeluhan', $req['id'])
            ->update([
                'kode_keluhan' => $req['kode_keluhan'],
                'nama_customer' => $req['nama_customer'],
                'tanggal_keluhan' => $req['tanggal_keluhan'],
                'keluhan' => $req['keluhan'],
                'tanggal_ditanggapi' => $req['tanggal_tanggapi_keluhan'],
                'produk_yang_digunakan' => $req['produk_yang_digunakan'],
                'penanganan_keluhan' => $req['penanganan_keluhan'],
                'tindak_lanjut' => $req['tindak_lanjut'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "penanganan keluhan")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/penanganan-keluhan');
    }
    public function tampil_penanganankeluhan()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = penanganankeluhan::all()->where('pabrik', $pabrik);
        } else {
            $data = penanganankeluhan::all()->where('pabrik', $pabrik);
            $produk = produk::all()->where('user_id', $pabrik);
        }
        return view('catatan.dokumen.penanganankeluhan', ['data' => $data, 'produk' => $produk ?? ""]);
    }
    public function tambah_penarikan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_penarikan' => $req['kode_penarikan'],
            'tanggal_penarikan' => $req['tanggal'],
            'nama_distributor' => $req['nama_distributor'],
            'produk_ditarik' => $req['produk_ditarik'],
            'jumlah_produk_ditarik' => $req['jumlah_produk_ditarik'],
            'no_batch' => $req['no_batch'],
            'alasan_penarikan' => $req['alasan_penarikan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = penarikanproduk::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penarikan produk',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/penarikan-produk');
    }
    public function edit_penarikanproduk(Request $req)
    {
        penarikanproduk::where('id_produk_penarikan', $req['id'])
            ->update([
                'kode_penarikan' => $req['kode_penarikan'],
                'tanggal_penarikan' => $req['tanggal'],
                'nama_distributor' => $req['nama_distributor'],
                'produk_ditarik' => $req['produk_ditarik'],
                'jumlah_produk_ditarik' => $req['jumlah_produk_ditarik'],
                'no_batch' => $req['no_batch'],
                'alasan_penarikan' => $req['alasan_penarikan'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "penarikan produk")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/penarikan-produk');
    }
    public function tampil_penarikanproduk()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = penarikanproduk::all()->where('pabrik', $pabrik);
        } else {
            $data = penarikanproduk::all()->where('pabrik', $pabrik);
            $produk = produk::all()->where('user_id', $pabrik);
        }
        return view('catatan.dokumen.penarikanproduk', ['data' => $data, 'produk' => $produk ?? []]);
    }
    public function tambah_distribusi(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_distribusi' => $req['kode_distribusi'],
            'tanggal' => $req['tanggal'],
            'id_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'nama_distributor' => $req['nama_distributor'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = distribusiproduk::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'distribusi produk',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pendistribusian-produk');
    }
    public function edit_distribusi(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_distribusi' => $req['kode_distribusi'],
            'tanggal' => $req['tanggal'],
            'id_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'nama_distributor' => $req['nama_distributor'],
        ];

        $nomer = distribusiproduk::where('id_distribusi', $id)->update($hasil);
        return redirect('/pendistribusian-produk');
    }
    public function tampil_distribusi()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = distribusiproduk::all()->where('pabrik', $pabrik);
        } else
            $data = distribusiproduk::all()->where('pabrik', $pabrik);
        return view('catatan.dokumen.pendistribusianproduk', ['data' => $data]);
    }
    public function tambah_operasialat(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'pob' => $req['pelaksanaan_pob'],
            'tanggal' => $req['tanggal'],
            'nama_alat' => $req['nama_alat'],
            'tipe_merek' => $req['tipemerek'],
            'ruang' => $req['ruang'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = pengoprasianalat::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pengoperasian alat',
            'laporan_batch' => $req['no_batch'] ?? $nomer,
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect('/pengoprasian-alat');
    }

    public function edit_operasialat(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'pob' => $req['pelaksanaan_pob'],
            'nama_alat' => $req['nama_alat'],
            'tipe_merek' => $req['tipemerek'],
            'ruang' => $req['ruang'],
        ];
        // dd($req);
        $nomer = pengoprasianalat::where('id_operasi', $req['id'])->update($hasil);

        return redirect('/pengoprasian-alat');
    }
    public function tambah_detilalat(Request $req)
    {
        $id = Auth::user()->id;
        $induk =  $req['induk'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'mulai' => $req['mulai'],
            'selesai' => $req['selesai'],
            'oleh' => $req['oleh'],
            'ket' => $req['ket'],
            'induk' => session()->get('idoperasi'),
        ];

        $nomer = detilalat::insertGetId($hasil);

        return redirect('/detil-alat');
    }
    public function edit_detilalat(Request $req)
    {
        $id = Auth::user()->id;
        $induk =  $req['induk'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'mulai' => $req['mulai'],
            'selesai' => $req['selesai'],
            'oleh' => $req['oleh'],
            'ket' => $req['ket'],
        ];
        // dd($req);
        $nomer = detilalat::where('id_detilalat', $req['id'])->update($hasil);

        return redirect('/detil-alat');
    }
    public function tampil_pengorasianalat()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = pengoprasianalat::all()->where('pabrik', $pabrik);
        } else
            $data = pengoprasianalat::all()->where('pabrik', $pabrik);
        return view('catatan.dokumen.pengoprasianalat', ['data' => $data]);
    }
    public function tampil_detilalat(Request $req)
    {
        $pabrik = Auth::user()->pabrik;
        session(['idoperasi' => $req['induk']]);
        $data = detilalat::all()->where('induk', $req['induk']);
        return view('catatan.dokumen.detilalat', ['data' => $data]);
    }

    public function tampil_detilalatid()
    {
        $pabrik = Auth::user()->pabrik;
        $data = detilalat::all()->where('induk', session()->get('idoperasi'));
        return view('catatan.dokumen.detilalat', ['data' => $data]);
    }

    public function tambah_pelulusan(Request $req)
    {
        $pabrik = Auth::user()->pabrik;
        $id = Auth::user()->id;
        $hasil = [
            'nama_bahan' => $req['nama_bahan'],
            'no_batch' => $req['nobatch'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'nama_pemasok' => $req['nama_pemasok'],
            'tanggal' => $req['tanggal'],
            'warna' => $req['warna'],
            'bau' => $req['bau'],
            'ph' => $req['ph'],
            'berat_jenis' => $req['berat_jenis'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = pelulusanproduk::insertGetId($hasil);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pelulusan produk jadi',
            'laporan_batch' => $req['nobatch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pelulusan-produk');
    }

    public function edit_pelulusan(Request $req)
    {
        $id = $req['id'];

        $hasil = [
            'nama_bahan' => $req['nama_bahan'],
            'no_batch' => $req['nobatch'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'nama_pemasok' => $req['nama_pemasok'],
            'tanggal' => $req['tanggal'],
            'warna' => $req['warna'],
            'bau' => $req['bau'],
            'ph' => $req['ph'],
            'berat_jenis' => $req['berat_jenis'],
        ];
        $nomer = pelulusanproduk::where('id_pelulusan', $id)->update($hasil);

        return redirect('/pelulusan-produk');
    }
    public function tampil_pelulusanproduk()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = pelulusanproduk::all()->where('pabrik', $pabrik);
        } else {
            $data = pelulusanproduk::all()->where('pabrik', $pabrik);
            $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
        }
        return view('catatan.dokumen.pelulusanproduk', ['data' => $data, 'bahanbaku' => $bahanbaku ?? []]);
    }
    public function tambah_contohbahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_bahan' => $req['kode_bahan'],
            'nama_bahanbaku' => $req['nama_bahan'],
            'no_batch' => $req['nobatch'],
            'tanggal_ambil' => $req['tanggal'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'jumlah_kemasanbox' => $req['jumlah_box'],
            'jumlah_produk' => $req['jumlah_ambil'],
            'jenis_warnakemasan' => $req['jenis_warna_kemasan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = contohbahanbaku::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penambahan contoh bahan baku',
            'laporan_batch' => $req['nobatch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/ambilcontoh#pills-home');
    }
    public function tambah_contohproduk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_produk' => $req['kode_produk'],
            'nama_produkjadi' => $req['nama_produk'],
            'no_batch' => $req['nobatch'],
            'tanggal_ambil' => $req['tanggal'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'jumlah_kemasanbox' => $req['jumlah_box'],
            'jumlah_produk' => $req['jumlah_ambil'],
            'jenis_warnakemasan' => $req['jenis_warna_kemasan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = contohprodukjadi::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penambahan contoh produk',
            'laporan_batch' => $req['nobatch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/ambilcontoh#pills-profile');
    }
    public function tambah_contohkemasan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_kemasan' => $req['kode_kemasan'],
            'nama_kemasan' => $req['nama_kemasan'],
            'no_batch' => $req['nobatch'],
            'tanggal_ambil' => $req['tanggal'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'jumlah_kemasanbox' => $req['jumlah_box'],
            'jumlah_produk' => $req['jumlah_ambil'],
            'jenis_warnakemasan' => $req['jenis_warna_kemasan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];


        $nomer = contohkemasan::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penambahan contoh kemasan',
            'laporan_batch' => $req['nobatch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/ambilcontoh#pills-contact');
    }

    public function edit_contohbahan(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_bahan' => $req['kode_bahan'],
            'nama_bahanbaku' => $req['nama_bahan'],
            'no_batch' => $req['nobatch'],
            'tanggal_ambil' => $req['tanggal'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'jumlah_kemasanbox' => $req['jumlah_box'],
            'jumlah_produk' => $req['jumlah_ambil'],
            'jenis_warnakemasan' => $req['jenis_warna_kemasan'],
        ];

        contohbahanbaku::all()->where('id_bahanbaku', $id)->first()->update($hasil);

        return redirect('/ambilcontoh#pills-home');
    }
    public function edit_contohproduk(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_produk' => $req['kode_produk'],
            'nama_produkjadi' => $req['nama_produk'],
            'no_batch' => $req['nobatch'],
            'tanggal_ambil' => $req['tanggal'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'jumlah_kemasanbox' => $req['jumlah_box'],
            'jumlah_produk' => $req['jumlah_ambil'],
            'jenis_warnakemasan' => $req['jenis_warna_kemasan'],
        ];

        $nomer = contohprodukjadi::all()->where('id_produkjadi', $id)->first()->update($hasil);

        return redirect('/ambilcontoh#pills-profile');
    }
    public function edit_contohkemasan(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_kemasan' => $req['kode_kemasan'],
            'nama_kemasan' => $req['nama_kemasan'],
            'no_batch' => $req['nobatch'],
            'tanggal_ambil' => $req['tanggal'],
            'kedaluwarsa' => $req['kedaluwarsa'],
            'jumlah_kemasanbox' => $req['jumlah_box'],
            'jumlah_produk' => $req['jumlah_ambil'],
            'jenis_warnakemasan' => $req['jenis_warna_kemasan'],
        ];


        $nomer = contohkemasan::all()->where('id_kemasan', $id)->first()->update($hasil);

        return redirect('/ambilcontoh#pills-contact');
    }
    public function tampil_pengambilancontoh()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = contohbahanbaku::all()->where('pabrik', $pabrik);
            $data1 = contohprodukjadi::all()->where('pabrik', $pabrik);
            $data2 = contohkemasan::all()->where('pabrik', $pabrik);
        } else {
            $data = contohbahanbaku::all()->where('pabrik', $pabrik);
            $data1 = contohprodukjadi::all()->where('pabrik', $pabrik);
            $data2 = contohkemasan::all()->where('pabrik', $pabrik);
            $bahanbaku = bahanbaku::all();
            $produk = produk::all();
            $kemasan = kemasan::all();
        }
        $x = [];
        return view('catatan.dokumen.pengambilancontoh', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'bahanbaku' => $bahanbaku ?? $x, 'produk' => $produk ?? $x, 'kemasan' => $kemasan ?? $x]);
    }
    public function tambah_penimbanganbahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'no_loth' => $req['no_loth'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = timbangbahan::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penimbangan bahan',
            'laporan_batch' => $req['no_batch'] ?? $req['no_loth'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/penimbangan#pills-contact');
    }

    public function tambah_penimbanganprodukantara(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'no_batch' => $req['nobatch'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];
        // dd($hasil);

        $nomer = timbangproduk::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'penimbangan produk utama',
            'laporan_batch' => $req['nobatch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/penimbangan#pills-contact');
    }
    public function tambah_ruangtimbang(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'nama_bahan_baku' => $req['nama_bahanbaku'],

            'jumlah_bahan_baku' => $req['jumlah_bahanbaku'],
            'hasil_timbang' => $req['hasil_penimbangan'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = ruangtimbang::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'ruang timbang',
            'laporan_batch' => $req['no_batch'] ?? $req['no_loth'] ?? '-',
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/penimbangan#pills-contact');
    }
    public function edit_penimbanganbahan(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'no_loth' => $req['no_loth'],
        ];

        $nomer = timbangbahan::where('timbang_bahan_id', $id)->update($hasil);
        return redirect('/penimbangan#pills-contact');
    }
    public function edit_penimbanganprodukantara(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'no_batch' => $req['nobatch'],
        ];
        // dd($hasil);

        $nomer = timbangproduk::where('timbang_produk_id', $id)->update($hasil);

        return redirect('/penimbangan#pills-contact');
    }
    public function edit_ruangtimbang(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_bahan_baku' => $req['nama_bahanbaku'],
            'jumlah_bahan_baku' => $req['jumlah_bahanbaku'],
            'hasil_timbang' => $req['hasil_penimbangan'],
        ];
        $nomer = ruangtimbang::where('id_ruangtimbang', $id)->update($hasil);
        return redirect('/penimbangan#pills-contact');
    }
    public function tampil_penimbangan()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = timbangbahan::all()->where('pabrik', $pabrik);
            $data1 = timbangproduk::all()->where('pabrik', $pabrik);
            $data2 = ruangtimbang::all()->where('pabrik', $pabrik);
        } else {
            $data = timbangbahan::all()->where('pabrik', $pabrik);
            $data1 = timbangproduk::all()->where('pabrik', $pabrik);
            $data2 = ruangtimbang::all()->where('pabrik', $pabrik);
            $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
            $produkantara = produkantara::all()->where('user_id', $pabrik);
        }
        // dd($produkantara);
        return view('catatan.dokumen.penimbangan', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'bahanbaku' => $bahanbaku ?? [], 'produkantara' => $produkantara ?? []]);
    }

    //detil penimbangan
    public function tampil_detiltimbangbahan(Request $req)
    {
        $pabrik = Auth::user()->pabrik;
        // dd($req);
        $induk = $req['induk'] ?? session()->get('induk1');
        $status = $req['status'] ?? session()->get('status1');
        $noloth = $req['noloth'] ?? session()->get('noloth');
        session([
            'induk1' => $induk,
            'status1' => $status,
            'noloth' => $noloth,
        ]);
        $data = detiltimbangbahan::all()->where('induk', $pabrik);
        // $data1 = timbangproduk::all()->where('pabrik', $pabrik);
        // $data2 = ruangtimbang::all()->where('pabrik', $pabrik);
        $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
        // $produkantara = produkantara::all()->where('user_id', $pabrik);
        // dd($produkantara);
        return view('catatan.dokumen.detil.detiltimbangbahan', ['data' => $data, 'bahanbaku' => $bahanbaku]);
    }

    public function tampil_detiltimbangproduk(Request $req)
    {
        $pabrik = Auth::user()->pabrik;
        $induk = $req['induk'] ?? session()->get('induk2');
        $status = $req['status'] ?? session()->get('status2');
        $noloth = $req['nobatch'] ?? session()->get('nobatch');
        session([
            'induk2' => $induk,
            'status2' => $status,
            'nobatch' => $noloth,
        ]);

        $data = detiltimbangproduk::all()->where('induk', $pabrik);
        // dd($data);
        // $data1 = timbangproduk::all()->where('pabrik', $pabrik);
        // $data2 = ruangtimbang::all()->where('pabrik', $pabrik);
        // $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
        $produkantara = produkantara::all()->where('user_id', $pabrik);
        // dd($produkantara);
        return view('catatan.dokumen.detil.detiltimbangproduk', ['data' => $data, 'produkantara' => $produkantara]);
    }

    public function tampil_detiltimbangruang(Request $req)
    {
        $pabrik = Auth::user()->pabrik;
        $induk = $req['induk'] ?? session()->get('induk3');
        $status = $req['status'] ?? session()->get('status3');
        $bahan = $req['bahan'] ?? session()->get('bahan');
        session([
            'induk3' => $induk,
            'status3' => $status,
            'bahan' => $bahan,
        ]);

        $data = detiltimbanghasil::all()->where('induk', $pabrik);
        // $data1 = timbangproduk::all()->where('pabrik', $pabrik);
        // $data2 = ruangtimbang::all()->where('pabrik', $pabrik);
        $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
        // $produkantara = produkantara::all()->where('user_id', $pabrik);
        // dd($produkantara);
        return view('catatan.dokumen.detil.detiltimbanghasil', compact('data','bahanbaku'));
    }

    public function tambah_detiltimbangbahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'nama_bahan' => $req['nama_bahan'] ,
            'nama_suplier' => $req['nama_suplier'] ,
            'jumlah_bahan' => $req['jumlah_bahan'] ,
            'hasil_penimbangan' => $req['hasil_penimbangan'],
            'induk'  => session()->get('induk1'),
        ];

        $nomer = detiltimbangbahan::insertGetId($hasil);
        return redirect('/detilltimbangbahan');
    }

    public function tambah_detiltimbangproduk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'asal_produk' => $req['asal_produk'] ,
            'nama_produk_antara' => $req['nama_produk_antara'] ,
            'jumlah_produk' => $req['jumlah_produk'] ,
            'hasil_penimbangan' => $req['hasil_timbang'],
            'untuk_produk' => $req['untuk_produk'],
            'induk'  => session()->get('induk2'),
        ];
        // dd($hasil);

        $nomer = detiltimbangproduk::insertGetId($hasil);

        return redirect('/detiltimbangproduk');
    }
    public function tambah_detiltimbanghasil(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'tanggal' => $req['tanggal'],
            'no_loth' => $req['no_loth'],
            'jumlah_permintaan' => $req['jumlah_permintaan'],
            'hasil_penimbangan' => $req['hasil_timbang'],
            'sisa_bahan' => $req['sisa_bahan'],
            'untuk_produk' => $req['untuk_produk'],
            'induk'  => session()->get('induk3')
        ];

        $nomer = detiltimbanghasil::insertGetId($hasil);
        return redirect('/detiltimbanghasil');
    }
    public function edit_detiltimbangbahan(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'no_loth' => $req['no_loth'],
        ];

        $nomer = timbangbahan::where('timbang_bahan_id', $id)->update($hasil);
        return redirect('/penimbangan#pills-contact');
    }
    public function edit_detiltimbangprodukk(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'no_batch' => $req['nobatch'],
        ];
        // dd($hasil);

        $nomer = timbangproduk::where('timbang_produk_id', $id)->update($hasil);

        return redirect('/penimbangan#pills-contact');
    }
    public function edit_detiltimbanghasil(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_bahan_baku' => $req['nama_bahanbaku'],
            'jumlah_bahan_baku' => $req['jumlah_bahanbaku'],
            'hasil_timbang' => $req['hasil_penimbangan'],
        ];
        $nomer = ruangtimbang::where('id_ruangtimbang', $id)->update($hasil);
        return redirect('/penimbangan#pills-contact');
    }
    //enddetilpenimbangan

    public function tambah_kartustokbahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_bahan' => $req['nama'],
            'tanggal' => $req['tanggal'],
            'id_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'nama_distributor' => $req['nama_distributor'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = kartustokbahan::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'kartu stok bahan baku',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/kartu-stok');
    }
    public function edit_kartustockbahan(Request $req)
    {
        kartustokbahan::where('id_kartustokbahan', $req['id'])
            ->update([
                'nama_bahan' => $req['nama'],
                'tanggal' => $req['tanggal'],
                'id_batch' => $req['no_batch'],
                'jumlah' => $req['jumlah'],
                'nama_distributor' => $req['nama_distributor'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "kartu stok bahan baku")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/kartu-stok');
    }
    public function tambah_kartustokbahankemas(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_bahankemas' => $req['nama'],
            'tanggal' => $req['tanggal'],
            'id_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'nama_distributor' => $req['nama_distributor'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = kartustokbahankemas::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'kartu stok bahan kemas',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/kartu-stok');
    }
    public function edit_kartustockbahankemas(Request $req)
    {
        kartustokbahankemas::where('id_kartustokbahankemas', $req['id'])
            ->update([
                'nama_bahankemas' => $req['nama'],
                'tanggal' => $req['tanggal'],
                'id_batch' => $req['no_batch'],
                'jumlah' => $req['jumlah'],
                'nama_distributor' => $req['nama_distributor'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "kartu stok bahan kemas")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/kartu-stok');
    }
    public function tambah_kartustokprodukantara(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_produkantara' => $req['nama'],
            'tanggal' => $req['tanggal'],
            'id_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'nama_distributor' => $req['nama_distributor'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = kartustokprodukantara::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'kartu stok produk antara',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/kartu-stok');
    }
    public function edit_kartustockprodukantara(Request $req)
    {
        kartustokprodukantara::where('id_kartustokprodukantara', $req['id'])
            ->update([
                'nama_produkantara' => $req['nama'],
                'tanggal' => $req['tanggal'],
                'id_batch' => $req['no_batch'],
                'jumlah' => $req['jumlah'],
                'nama_distributor' => $req['nama_distributor'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "kartu stok produk antara")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/kartu-stok');
    }
    public function tambah_kartustokprodukjadi(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_produkjadi' => $req['nama'],
            'tanggal' => $req['tanggal'],
            'id_batch' => $req['no_batch'],
            'jumlah' => $req['jumlah'],
            'nama_distributor' => $req['nama_distributor'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = kartustokprodukjadi::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'kartu stok produk jadi',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/kartu-stok');
    }
    public function edit_kartustockprodukjadi(Request $req)
    {
        kartustokprodukjadi::where('id_kartustokprodukjadi', $req['id'])
            ->update([
                'nama_produkjadi' => $req['nama'],
                'tanggal' => $req['tanggal'],
                'id_batch' => $req['no_batch'],
                'jumlah' => $req['jumlah'],
                'nama_distributor' => $req['nama_distributor'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "kartu stok produk jadi")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/kartu-stok');
    }
    public function tampil_kartustok()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = kartustokbahan::all()->where('pabrik', $pabrik);
            $data1 = kartustokbahankemas::all()->where('pabrik', $pabrik);
            $data2 = kartustokprodukantara::all()->where('pabrik', $pabrik);
            $data3 = kartustokprodukjadi::all()->where('pabrik', $pabrik);
        } else {
            $data = kartustokbahan::all()->where('pabrik', $pabrik);
            $data1 = kartustokbahankemas::all()->where('pabrik', $pabrik);
            $data2 = kartustokprodukantara::all()->where('pabrik', $pabrik);
            $data3 = kartustokprodukjadi::all()->where('pabrik', $pabrik);
            $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
            $kemasan = kemasan::all()->where('user_id', $pabrik);
            $produkantara = produkantara::all()->where('user_id', $pabrik);
            $produkjadi = produk::all()->where('user_id', $pabrik);
        }
        return view('catatan.dokumen.kartustok', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'produkjadi' => $produkjadi ?? '', 'produkantara' => $produkantara ?? '', 'bahanbaku' => $bahanbaku ?? '', 'kemasan' => $kemasan ?? '']);
    }
    public function tambah_pemusnahanbahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pemusnahan' => $req['kode_pemusnahan'],
            'tanggal_pemusnahan' => $req['tanggal'],
            'nama_bahanbaku' => $req['nama_bahanbaku'],
            'no_batch' => $req['no_batch'],
            'asal_bahanbaku' => $req['asal_bahanbaku'],
            'jumlah_bahanbaku' => $req['jumlah_bahanbaku'],
            'alasan_pemusnahan' => $req['alasan_pemusnahan'],
            'cara_pemunsnahan' => $req['cara_pemusnahan'],
            'nama_petugas' => $req['petugas'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = pemusnahanbahanbaku::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pemusnahan bahan',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pemusnahan-produk');
    }
    public function edit_pemusnahanbahan(Request $req)
    {
        pemusnahanbahanbaku::where('id_pemusnahanbahan', $req['id'])
            ->update([
                'kode_pemusnahan' => $req['kode_pemusnahan'],
                'tanggal_pemusnahan' => $req['tanggal'],
                'nama_bahanbaku' => $req['nama_bahanbaku'],
                'no_batch' => $req['no_batch'],
                'asal_bahanbaku' => $req['asal_bahanbaku'],
                'jumlah_bahanbaku' => $req['jumlah_bahanbaku'],
                'alasan_pemusnahan' => $req['alasan_pemusnahan'],
                'cara_pemunsnahan' => $req['cara_pemusnahan'],
                'nama_petugas' => $req['petugas'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "pemusnahan bahan")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemusnahan-produk');
    }
    public function tambah_pemusnahanbahankemas(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pemusnahan' => $req['kode_pemusnahan'],
            'tanggal_pemusnahan' => $req['tanggal'],
            'nama_bahan_kemas' => $req['nama_bahankemas'],
            'no_batch' => $req['no_batch'],
            'asal_bahankemas' => $req['asal_bahankemas'],
            'jumlah_bahankemas' => $req['jumlah_bahankemas'],
            'alasan_pemusnahan' => $req['alasan_pemusnahan'],
            'cara_pemunsnahan' => $req['cara_pemusnahan'],
            'nama_petugas' => $req['petugas'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = Pemusnahanbahankemas::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pemusnahan bahan kemas',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pemusnahan-produk');
    }
    public function edit_pemusnahanbahankemas(Request $req)
    {
        Pemusnahanbahankemas::where('id_pemusnahanbahankemas', $req['id'])
            ->update([
                'kode_pemusnahan' => $req['kode_pemusnahan'],
                'tanggal_pemusnahan' => $req['tanggal'],
                'nama_bahan_kemas' => $req['nama_bahankemas'],
                'no_batch' => $req['no_batch'],
                'asal_bahankemas' => $req['asal_bahankemas'],
                'jumlah_bahankemas' => $req['jumlah_bahankemas'],
                'alasan_pemusnahan' => $req['alasan_pemusnahan'],
                'cara_pemunsnahan' => $req['cara_pemusnahan'],
                'nama_petugas' => $req['petugas'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "pemusnahan bahan kemas")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemusnahan-produk');
    }
    public function tambah_pemusnahanprodukantara(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pemusnahan' => $req['kode_pemusnahan'],
            'tanggal_pemusnahan' => $req['tanggal'],
            'nama_produkantara' => $req['nama_produkantara'],
            'no_batch' => $req['no_batch'],
            'asal_produkantara' => $req['asal_produkantara'],
            'jumlah_produkantara' => $req['jumlah_produkantara'],
            'alasan_pemusnahan' => $req['alasan_pemusnahan'],
            'cara_pemunsnahan' => $req['cara_pemusnahan'],
            'nama_petugas' => $req['petugas'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = Pemusnahanprodukantara::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pemusnahan produk antara',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pemusnahan-produk');
    }
    public function edit_pemusnahanprodukantara(Request $req)
    {
        Pemusnahanprodukantara::where('id_pemusnahanprodukantara', $req['id'])
            ->update([
                'kode_pemusnahan' => $req['kode_pemusnahan'],
                'tanggal_pemusnahan' => $req['tanggal'],
                'nama_produkantara' => $req['nama_produkantara'],
                'no_batch' => $req['no_batch'],
                'asal_produkantara' => $req['asal_produkantara'],
                'jumlah_produkantara' => $req['jumlah_produkantara'],
                'alasan_pemusnahan' => $req['alasan_pemusnahan'],
                'cara_pemunsnahan' => $req['cara_pemusnahan'],
                'nama_petugas' => $req['petugas'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "pemusnahan produk antara")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemusnahan-produk');
    }
    public function tambah_pemusnahanprodukjadi(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_pemusnahan' => $req['kode_pemusnahan'],
            'tanggal_pemusnahan' => $req['tanggal'],
            'nama_produkjadi' => $req['nama'],
            'no_batch' => $req['no_batch'],
            'asal_produkjadi' => $req['asal_produkantara'],
            'jumlah_produkjadi' => $req['jumlah_produkantara'],
            'alasan_pemusnahan' => $req['alasan_pemusnahan'],
            'cara_pemunsnahan' => $req['cara_pemusnahan'],
            'nama_petugas' => $req['petugas'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];

        $nomer = Pemusnahanprodukjadi::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pemusnahan produk jadi',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pemusnahan-produk');
    }
    public function edit_pemusnahanprodukjadi(Request $req)
    {
        Pemusnahanprodukjadi::where('id_pemusnahanprodukjadi', $req['id'])
            ->update([
                'kode_pemusnahan' => $req['kode_pemusnahan'],
                'tanggal_pemusnahan' => $req['tanggal'],
                'nama_produkjadi' => $req['nama'],
                'no_batch' => $req['no_batch'],
                'asal_produkjadi' => $req['asal_produkantara'],
                'jumlah_produkjadi' => $req['jumlah_produkantara'],
                'alasan_pemusnahan' => $req['alasan_pemusnahan'],
                'cara_pemunsnahan' => $req['cara_pemusnahan'],
                'nama_petugas' => $req['petugas'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "pemusnahan produk jadi")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemusnahan-produk');
    }
    public function tampil_pemusnahanproduk()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = pemusnahanbahanbaku::all()->where('pabrik', $pabrik);
            $data1 = Pemusnahanbahankemas::all()->where('pabrik', $pabrik);
            $data2 = Pemusnahanprodukantara::all()->where('pabrik', $pabrik);
            $data3 = Pemusnahanprodukjadi::all()->where('pabrik', $pabrik);
        } else {
            $data = pemusnahanbahanbaku::all()->where('pabrik', $pabrik);
            $data1 = Pemusnahanbahankemas::all()->where('pabrik', $pabrik);
            $data2 = Pemusnahanprodukantara::all()->where('pabrik', $pabrik);
            $data3 = Pemusnahanprodukjadi::all()->where('pabrik', $pabrik);
            $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
            $produkantara = produkantara::all()->where('user_id', $pabrik);
            $kemasan = kemasan::all()->where('user_id', $pabrik);
            $produkjadi = produk::all()->where('user_id', $pabrik);
        }
        return view('catatan.dokumen.pemusnahanproduk', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'data3' => $data3,  'bahanbaku' => $bahanbaku ?? [], 'produkantara' => $produkantara ?? [], 'produkjadi' => $produkjadi ?? [], 'kemasan' => $kemasan ?? []]);
    }
    public function tambah_kalibrasialat(Request $req)
    {
        $file = $req->file('file');
        $exten = $file->getClientOriginalExtension();
        $nama = $req['nama_alat'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten;
        $tujuan_upload = 'asset/kalibrasi_alat';
        $file->move($tujuan_upload, $nama);
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nama_alat' => $req['nama_alat'],
            'nama_file' => $nama,
            'pabrik' => $pabrik,
            'user_id' => $id,
        ];
        $nomer = Kalibrasialat::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'Kalibrasi Alat',
            'laporan_batch' => "dummy",
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/kalibrasi-alat');
    }
    public function edit_kalibrasialat(Request $req)
    {
        $tujuan_upload = 'asset/kalibrasi_alat';
        $nama = $req['filename'];
        $file = $req->file('file');
        $exten = $file->getClientOriginalExtension();
        $filedelete = $tujuan_upload . "/" . $nama;
        Storage::delete($filedelete);
        $file = $req->file('file');
        $namasimpan = $req['nama_alat'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten;
        $file->move($tujuan_upload, $namasimpan);
        Kalibrasialat::where('kalibrasi_id', $req['id'])
            ->update([
                'nama_alat' => $req['nama_alat'],
                'nama_file' => $req['nama_alat'] . '_' . substr($req['tanggal'], 0, 10) . '.' . $exten,
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "Kalibrasi Alat")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/kalibrasi-alat');
    }
    public function tampil_kalibrasialat()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = Kalibrasialat::all()->where('pabrik', $pabrik);
        } else {
            $data = Kalibrasialat::all()->where('pabrik', $pabrik);
        }
        return view('catatan.dokumen.kalibrasialat', ['data' => $data]);
    }
    public function tambah_pemeriksaanbahan(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_spesifikasi' => $req['kode_spesifikasi'],
            'nama_bahanbaku' => $req['nama_bahanbaku'],
            'jenis_sediaan' => $req['jenis_sediaan'],
            'warna' => $req['warna'],
            'aroma' => $req['aroma'],
            'tekstur' => $req['tekstur'],
            'bobot' => $req['bobot'],
            'tanggal' => $req['tanggal'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];
        $nomer = Spesifikasibahanbaku::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'Pemeriksaan Bahan Baku',
            'laporan_batch' => $req['kode_spesifikasi'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);

        return redirect('/pemeriksaan-bahan');
    }
    public function edit_pemeriksaanbahan(Request $req)
    {
        Spesifikasibahanbaku::where('id_spesifikasibahanbaku', $req['id'])
            ->update([
                'kode_spesifikasi' => $req['kode_spesifikasi'],
                'nama_bahanbaku' => $req['nama_bahanbaku'],
                'jenis_sediaan' => $req['jenis_sediaan'],
                'warna' => $req['warna'],
                'aroma' => $req['aroma'],
                'tekstur' => $req['tekstur'],
                'bobot' => $req['bobot'],
                'tanggal' => $req['tanggal'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "Pemeriksaan Bahan Baku")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemeriksaan-bahan');
    }
    public function tambah_pemeriksaanbahankemas(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_spesifikasi' => $req['kode_spesifikasi'],
            'nama_bahankemas' => $req['nama_bahankemas'],
            'jenis_bahankemas' => $req['jenis_bahankemas'],
            'warna' => $req['warna'],
            'ukuran' => $req['ukuran_bahankemas'],
            'bocorcacat' => $req['bocor_cacat'],
            'tanggal' => $req['tanggal'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];
        $nomer = Spesifikasibahankemas::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'Pemeriksaan Bahan Kemas',
            'laporan_batch' => $req['kode_spesifikasi'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect('/pemeriksaan-bahan');
    }
    public function edit_pemeriksaanbahankemas(Request $req)
    {
        Spesifikasibahankemas::where('id_spesifikasibahankemas', $req['id'])
            ->update([
                'kode_spesifikasi' => $req['kode_spesifikasi'],
                'nama_bahankemas' => $req['nama_bahankemas'],
                'jenis_bahankemas' => $req['jenis_bahankemas'],
                'warna' => $req['warna'],
                'ukuran' => $req['ukuran_bahankemas'],
                'bocorcacat' => $req['bocor_cacat'],
                'tanggal' => $req['tanggal'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "Pemeriksaan Bahan Kemas")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemeriksaan-bahan');
    }
    public function tambah_pemeriksaanprodukjadi(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_spesifikasi' => $req['kode_spesifikasi'],
            'nama_produkjadi' => $req['nama_produkjadi'],
            'kategori' => $req['kategori'],
            'no_batch' => $req['no_batch'],
            'warna' => $req['warna'],
            'aroma' => $req['aroma'],
            'bocorcacat' => $req['bocor_cacat'],
            'tanggal' => $req['tanggal'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];
        $nomer = Spesifikasiprodukjadi::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'Pemeriksaan Produk Jadi',
            'laporan_batch' => $req['kode_spesifikasi'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect('/pemeriksaan-bahan');
    }
    public function edit_pemeriksaanprodukjadi(Request $req)
    {
        Spesifikasiprodukjadi::where('id_spesifikasiprodukjadi', $req['id'])
            ->update([
                'kode_spesifikasi' => $req['kode_spesifikasi'],
                'nama_produkjadi' => $req['nama_produkjadi'],
                'kategori' => $req['kategori'],
                'no_batch' => $req['no_batch'],
                'warna' => $req['warna'],
                'aroma' => $req['aroma'],
                'bocorcacat' => $req['bocor_cacat'],
                'tanggal' => $req['tanggal'],
                'status' => 0
            ]);
        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        laporan::where('laporan_nomor', $req['id'])->where('laporan_nama', "Pemeriksaan Produk Jadi")->update([
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
        ]);
        return redirect('/pemeriksaan-bahan');
    }
    public function tampil_pemeriksaan()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = Spesifikasibahanbaku::all()->where('pabrik', $pabrik);
            $data1 = Spesifikasibahankemas::all()->where('pabrik', $pabrik);
            $data2 = Spesifikasiprodukjadi::all()->where('pabrik', $pabrik);
        } else {
            $data = Spesifikasibahanbaku::all()->where('pabrik', $pabrik);
            $data1 = Spesifikasibahankemas::all()->where('pabrik', $pabrik);
            $data2 = Spesifikasiprodukjadi::all()->where('pabrik', $pabrik);
            $bahanbaku = bahanbaku::all()->where('user_id', $pabrik);
            $kemasan = kemasan::all()->where('user_id', $pabrik);
            $produkjadi = produk::all()->where('user_id', $pabrik);
        }
        return view('catatan.dokumen.pemeriksaanpengujian', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'produkjadi' => $produkjadi ?? [], 'bahanbaku' => $bahanbaku ?? [], 'kemasan' => $kemasan ?? []]);
    }
    public function tambah_pengemasanbatchproduk(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_produk' => $req['kode_produk'],
            'nama_produk' => $req['nama_produk'],
            'no_batch' => $req['no_batch'],
            'protap' => $req['protap'],
            'besar_batch' => $req['besar_batch'],
            'bentuksediaan' => $req['bentuk_sediaan'],
            'kemasan' => $req['kemasan'],
            'mulai' => $req['mulai'],
            'selesai' => $req['selesai'],
            'pabrik' => $pabrik,
            'status' => 0,
            'user_id' => $id,
        ];
        $nomer = Pengemasanbatchproduk::insertGetId($hasil);

        date_default_timezone_set("Asia/Jakarta");
        $tgl = new \DateTime(Carbon::now()->toDateTimeString());
        $tgl = $tgl->format('Y-m-d');
        $laporan = [
            'laporan_nama' => 'pengemasan batch produk',
            'laporan_batch' => $req['no_batch'],
            'laporan_nomor' => $nomer,
            'laporan_diajukan' => Auth::user()->namadepan . ' ' . Auth::user()->namabelakang,
            'laporan_diterima' => "belum",
            'tgl_diajukan' => $tgl,
            'tgl_diterima' => $tgl,
            'pabrik_id'  =>  $pabrik,
            "user_id" => $id,
        ];

        laporan::insert($laporan);
        return redirect('/pengemasan-batch');
    }
    public function edit_pengemasanbatchproduk(Request $req)
    {
        $id = $req['id'];
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'kode_produk' => $req['kode_produk'],
            'nama_produk' => $req['nama_produk'],
            'no_batch' => $req['no_batch'],
            'protap' => $req['protap'],
            'besar_batch' => $req['besar_batch'],
            'bentuksediaan' => $req['bentuk_sediaan'],
            'kemasan' => $req['kemasan'],
            'mulai' => $req['mulai'],
            'selesai' => $req['selesai'],
        ];
        $nomer = Pengemasanbatchproduk::where('id_pengemasanbatchproduk', $id)->update($hasil);
        return redirect('/pengemasan-batch');
    }
    public function tampil_pengemasanbatch()
    {
        $pabrik = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = Pengemasanbatchproduk::all()->where('pabrik', $pabrik);
        } else {
            $data = Pengemasanbatchproduk::all()->where('pabrik', $pabrik);
            $produk = produk::all(); //->where('user_id', Auth::user()->pabrik);
            $kemasan = kemasan::all(); //->where('user_id', Auth::user()->pabrik);
        }
        // dd($produk);
        return view('catatan.dokumen.pengemasanbatch', ['data' => $data, 'produk' => $produk ?? [], 'kemasan' => $kemasan ?? []]);
    }
}
