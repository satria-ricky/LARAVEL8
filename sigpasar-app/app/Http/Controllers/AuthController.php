<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index ()

    {   
        $produk = Produk::orderBy('rekomendasi','DESC')->get();
    
        $dataProduk =  DB::select('SELECT produks.*, produk_pasars.*, COUNT(produk_pasars.id_produk) as total_pasar FROM produks LEFT JOIN `produk_pasars` ON produk_pasars.id_produk = produks.id_produk GROUP BY produks.id_produk ORDER BY produks.rekomendasi DESC');

        // DB::table('produks')
        // ->select('produks.*','produk_pasars.*',DB::raw('COUNT(produk_pasars.id_produk) as total_pasar'))
        // ->leftJoin('produk_pasars', 'produk_pasars.id_produk', '=', 'produks.id_produk')
        // ->groupBy('produks.id_produk')
        // ->orderBy('produks.rekomendasi','DESC')
        // ->get();
        
        return view('home_page',[
            "produk" => $produk,
            "dataProduk" => $dataProduk
        ]);
    }

    public function login(Request $request)
    {

        // dd($request);
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
        // dd(Auth::user());
        if (Auth::attempt($data)) { 
            return redirect('/dashboard');
        } else { // false
            //Login Fail
            return redirect('/')->with('error', 'Username atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Berhasil Logout!');
    }
    
}
