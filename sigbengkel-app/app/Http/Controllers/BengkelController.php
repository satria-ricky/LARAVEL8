<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BengkelController extends Controller
{
    public function getPasarByjenis(Request $request)
    {
        
        $data = DB::select('SELECT bengkels.*,jenis_bengkels.* FROM bengkels LEFT JOIN jenis_bengkels ON bengkels.jenis_bengkel = jenis_bengkels.id_jenis_bengkel WHERE bengkels.jenis_bengkel = ?', [$request['id_jenis']]);
       
        return response()->json($data);
    }
}
