<?php

namespace App\Http\Controllers;

use App\Models\{audit, User, pabrik, laporan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class auditor extends Controller
{
    public function list_pabrik()
    {

        $data = pabrik::all();

        // dd($data);
        return view('auditor.listpabrik', ['pabrik' => $data]);
    }

    public function list_dokumen(Request $req)
    {
        $data = laporan::all()->where('pabrik_id', $req['pabrik']);
        return view('auditor.listdokumen', ['data' => $data]);
    }

    public function list_batch(Request $req)
    {
        // dd($id);
        $data = laporan::all()->where('pabrik_id', $req['pabrik']);
        return view('auditor.listbatch',  ['data' => $data]);
    }

    public function tambah_request(Request $req)
    {
        $id = Auth::user()->id;
        $pabrik = Auth::user()->pabrik;
        $hasil = [
            'nobatch' => $req['nobatch'],
            'audit_laporan' => $req['nama'],
            'audit_pabrik' => $req['pabrik'],
            'nama_audit' => Auth::user()->nama,
            'audit_status' => 0,
        ];

        // dd($hasil);
        audit::insert($hasil);
        return redirect('/list_audit');
    }

    public function list_request()
    {
        $data = audit::all()->where('nama_audit', Auth::user()->nama);
        return view('auditor.request', ['data' => $data]);
    }

    public function ajukan_request()
    {
        return view('auditor.request');
    }
}
