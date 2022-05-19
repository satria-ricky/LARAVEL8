<?php

namespace App\Http\Controllers;

use App\Models\{cp_bahan, cp_kemasan, cp_produk, laporan, PPbahanbakukeluar, PPbahanbakumasuk, PPkemasankeluar, PPkemasanmasuk, PPprodukjadikeluar, PPprodukjadimasuk, user};
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dataPelaksana extends Controller
{
    public function dummy()
    {

        return view('dummy');
    }

    public function user()
    {
        $user = User::all();
        return DataTables::of($user)->make();
    }

    public function cp_bahan()
    {
        $id = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = cp_bahan::all()->where('pabrik', $id)->where('status', 0);
        } else {
            $data = cp_bahan::all()->where('pabrik', $id);
        }
        return DataTables::of($data)->editColumn('status', function ($data) {
            if ($data->status == 0) {
                return 'Diajukan';
            } elseif ($data->status == 1) {
                return 'Diterima';
            }
        })->editColumn('status', function ($data) {
            if ($data->status == 0) {
                return 'Diajukan';
            } elseif ($data->status == 1) {
                return 'Diterima';
            }
        })->addColumn('action', function ($data) {

            if (Auth::user()->level != 2) {
                return '<form method="post" class="float-left mr-1" action="detilterimabb">
                ' . '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' . '
                <input type="hidden" name="jenis" value=1 />
                <input type="hidden" name="induk"
                    value=' . $data->cp_bahan_id . ' />
                    <input type="hidden" name="nama"
                    value=' . $data->nama . ' />
                <button type="submit" class="btn btn-primary">Lihat</button>
            </form>' . '<button type="button" id="editbahan" class="btn btn-success" data-toggle="modal" data-target="#modaleditbahan"
            data-nama="' . $data->nama . '" data-ruangan=' . $data->ruang . ' data-jumlah=' . $data->jumlah . ' data-kode=' . $data->kode . ' data-cpid=' . $data->cp_bahan_id . '>Edit</button>';
            } else {
                return '<form method="post" action="terima_cpbahan">
            ' . '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' . '
            <input type="hidden" name="jenis" value=1 />
            <input type="hidden" name="nobatch"
                value=' . $data->cp_bahan_id . ' />
            <button type="submit" class="btn btn-primary">Terima</button>
        </form>';
            }
        })->rawColumns(['action'])->make();
    }

    public function cp_produk()
    {
        $id = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = cp_produk::all()->where('pabrik', $id)->where('status', 0);
        } else {
            $data = cp_produk::all()->where('pabrik', $id);
        }
        return DataTables::of($data)->editColumn('status', function ($data) {
            if ($data->status == 0) {
                return 'Diajukan';
            } elseif ($data->status == 1) {
                return 'Diterima';
            }
        })->addColumn('action', function ($data) {

            if (Auth::user()->level != 2) {
                return '<form method="post" class="float-left mr-1" action="detilterimabb">
                ' . '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' . '
                <input type="hidden" name="jenis" value=2 />
                <input type="hidden" name="induk"
                    value=' . $data->cp_produk_id . ' />
                    <input type="hidden" name="nama"
                    value=' . $data->nama . ' />
                <button type="submit" class="btn btn-primary">Lihat</button>
            </form>' . '<button type="button" id="editproduk" class="btn btn-success" data-toggle="modal" data-target="#modaleditproduk"
            data-nama="' . $data->nama . '" data-ruangan=' . $data->ruang . ' data-jumlah=' . $data->jumlah . ' data-kode=' . $data->kode . ' data-cpid=' . $data->cp_produk_id . '>Edit</button>';
            } else {
                return '<form method="post" action="terima_cpproduk">
            ' . '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' . '
            <input type="hidden" name="jenis" value=2 />
            <input type="hidden" name="nobatch"
                value=' . $data->cp_produk_id . ' />
            <button type="submit" class="btn btn-primary">Terima</button>
        </form>';
            }
        })->rawColumns(['action'])->make();
    }

    public function cp_kemasan()
    {
        $id = Auth::user()->pabrik;
        if (Auth::user()->level == 2) {
            $data = cp_kemasan::all()->where('pabrik', $id)->where('status', 0);
        } else {
            $data = cp_kemasan::all()->where('pabrik', $id);
        }
        return DataTables::of($data)->editColumn('status', function ($data) {
            if ($data->status == 0) {
                return 'Diajukan';
            } elseif ($data->status == 1) {
                return 'Diterima';
            }
        })->addColumn('action', function ($data) {
            if (Auth::user()->level != 2) {
                return '<form method="post" class="float-left mr-1" action="detilterimabb">
                ' . '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' . '
                <input type="hidden" name="jenis" value=3 />
                <input type="hidden" name="induk"
                    value=' . $data->cp_kemasan_id . ' />
                    <input type="hidden" name="nama"
                    value=' . $data->nama . ' />
                <button type="submit" class="btn btn-primary">Lihat</button>
            </form>' . '<button type="button" id="editkemasan" class="btn btn-success" data-toggle="modal" data-target="#modaleditkemasan"
            data-nama="' . $data->nama . '" data-ruangan=' . $data->ruang . ' data-jumlah=' . $data->jumlah . ' data-kode=' . $data->kode . 'data-cpid=' . $data->cp_kemasan_id . '>Edit</button>';
            } else {
                return '<form method="post" action="terima_cpkemasan">
            ' . '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' . '
            <input type="hidden" name="jenis" value=1 />
            <input type="hidden" name="nobatch"
                value=' . $data->cp_kemasan_id . ' />
            <button type="submit" class="btn btn-primary">Terima</button>
        </form>';
            }
        })->rawColumns(['action'])->make();
    }

    public function cp_bahanmasuk(Request $req)
    {
        $id = Auth::user()->pabrik;
        $data = PPbahanbakumasuk::all()->where('pabrik', $id)->where('induk', $req['induk']);
        return DataTables::of($data)->addColumn('action', function ($data) {
            return '<button type="submit" class="btn btn-primary">Edit</button>';
        })->rawColumns(['action'])->make();
    }
    public function cp_bahankeluar(Request $req)
    {
        $id = Auth::user()->pabrik;
        $data = PPbahanbakukeluar::all()->where('pabrik', $id)->where('induk', $req['induk']);
        return DataTables::of($data)->addColumn('action', function ($data) {
            return '<button type="submit" class="btn btn-primary">Edit</button>';
        })->rawColumns(['action'])->make();
    }

    public function cp_produkmasuk(Request $req)
    {
        $id = Auth::user()->pabrik;
        $data = PPprodukjadimasuk::all()->where('pabrik', $id)->where('induk', $req['induk']);
        return DataTables::of($data)->addColumn('action', function ($data) {
            return '<button type="submit" class="btn btn-primary">Edit</button>';
        })->rawColumns(['action'])->make();
    }
    public function cp_produkkeluar(Request $req)
    {
        $id = Auth::user()->pabrik;
        $data = PPprodukjadikeluar::all()->where('pabrik', $id)->where('induk', $req['induk']);
        return DataTables::of($data)->addColumn('action', function ($data) {
            return '<button type="submit" class="btn btn-primary">Edit</button>';
        })->rawColumns(['action'])->make();
    }

    public function cp_kemasanmasuk(Request $req)
    {
        $id = Auth::user()->pabrik;
        $data = PPkemasanmasuk::all()->where('pabrik', $id)->where('induk', $req['induk']);
        return DataTables::of($data)->addColumn('action', function ($data) {
            return '<button type="submit" class="btn btn-primary">Edit</button>';
        })->rawColumns(['action'])->make();
    }
    public function cp_kemasankeluar(Request $req)
    {
        $id = Auth::user()->pabrik;
        $data = PPkemasankeluar::all()->where('pabrik', $id)->where('induk', $req['induk']);
        return DataTables::of($data)->addColumn('action', function ($data) {
            return '<button type="submit" class="btn btn-primary">Edit</button>';
        })->rawColumns(['action'])->make();
    }

    public function laporan()
    {
        $data = laporan::all()->where('pabrik_id', Auth::user()->pabrik)->where('laporan_diterima', "!=", 'belum')->sortByDesc('tgl_diterima');
        // dd($data);
        return DataTables::of($data)->addColumn('action', function ($data) {
            if ($data->laporan_nama == 'pengolahan batch')
                $form = '<form target="_blank" method="post" action="/printpengolahanbatch">';
            elseif ($data->laporan_nama == 'pengemasan batch produk')
                $form = '<form target="_blank" method="post" action="/printpengemasanbatch">';
            elseif ($data->laporan_nama == 'penambahan contoh bahan baku')
                $form = '<form target="_blank" method="post" action="/printambilbahanbaku">';
            elseif ($data->laporan_nama == 'penambahan contoh produk')
                $form = '<form target="_blank" method="post" action="/printambilprodukjadi">';
            elseif ($data->laporan_nama == 'penambahan contoh kemasan')
                $form = '<form target="_blank" method="post" action="/printambilbahankemas">';
            elseif ($data->laporan_nama == 'penerimaan bahan')
                $form = '<form target="_blank" method="post" action="/printterimabahan">';
            elseif ($data->laporan_nama == 'penerimaan produk')
                $form = '<form target="_blank" method="post" action="/printterimaproduk">';
            elseif ($data->laporan_nama == 'penerimaan kemasan')
                $form = '<form target="_blank" method="post" action="/printterimakemasan">';
            elseif ($data->laporan_nama == 'pelatihan higiene dan sanitasi')
                $form = '<form target="_blank" method="post" action="/printlatihhigisani">';
            elseif ($data->laporan_nama == 'pelatihan cpkb')
                $form = '<form target="_blank" method="post" action="/printlatihcpkb">';
            elseif ($data->laporan_nama == 'pengoperasian alat')
                $form = '<form target="_blank" method="post" action="/printalatutama">';
            elseif ($data->laporan_nama == 'distribusi produk')
                $form = '<form target="_blank" method="post" action="/printdistribusiproduk">';
            elseif ($data->laporan_nama == 'penanganan keluhan')
                $form = '<form target="_blank" method="post" action="/printpenanganankeluhan">';

            elseif ($data->laporan_nama == 'pelulusan produk jadi')
                $form = '<form target="_blank" method="post" action="/printpelulusanproduk">';

            elseif ($data->laporan_nama == 'penarikan produk')
                $form = '<form target="_blank" method="post" action="/printpenarikanproduk">';

            elseif ($data->laporan_nama == 'pemusnahan bahan')
                $form = '<form target="_blank" method="post" action="/printpemusnahanbahan">';
            elseif ($data->laporan_nama == 'pemusnahan bahan kemas')
                $form = '<form target="_blank" method="post" action="/printpemusnahanbahankemas">';
            elseif ($data->laporan_nama == 'pemusnahan produk antara')
                $form = '<form target="_blank" method="post" action="/printpemusnahanprodukantara">';
            elseif ($data->laporan_nama == 'pemusnahan produk jadi')
                $form = '<form target="_blank" method="post" action="/printpemusnahanprodukjadi">';

            elseif ($data->laporan_nama == 'periksa sanitasi ruangan')
                $form = '<form target="_blank" method="post" action="/printperiksaruang">';
            elseif ($data->laporan_nama == 'periksa sanitasi alat')
                $form = '<form target="_blank" method="post" action="/printperiksaalat">';

            elseif ($data->laporan_nama == 'Pemeriksaan Bahan Baku')
                $form = '<form target="_blank" method="post" action="/printpemeriksaanbahan">';
            elseif ($data->laporan_nama == 'Pemeriksaan Produk Jadi')
                $form = '<form target="_blank" method="post" action="/printpemeriksaanproduk">';
            elseif ($data->laporan_nama == 'Pemeriksaan Bahan Kemas')
                $form = '<form target="_blank" method="post" action="/printpemeriksaankemasan">';

            elseif ($data->laporan_nama == 'pelatihan cpkb')
                $form = '<form target="_blank" method="post" action="/printlatihcpkb">';
            else
                $form = '<form target="_blank" method="post" action="/printterimakemasan">';
            $isi =
                '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' .
                '
                <input type="hidden" name="nobatch" value=' . $data->laporan_batch . ' />' .
                '<input type="hidden" name="id" value=' . $data->laporan_nomor . ' />' .
                '<button type="submit" class="btn btn-primary">Buka</button>
            </form>';
            return $form . $isi;
        })->rawColumns(['action'])->make();
    }
}
