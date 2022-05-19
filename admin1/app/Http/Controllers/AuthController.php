<?php

namespace App\Http\Controllers;

use App\Models\pabrik;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
// use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('auth.login');
        // $hhas =web
        // dd($hhas);
    }

    public function login(Request $request)
    {

        $data = [
            'nama'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);
        // dd(Auth::user());
        // echo Auth::user()->username;
        if (Auth::attempt($data)) { // true sekalian session field di users nanti bisa dipanggil via Auth
            // echo "Login Success";

            if (Auth::user()->level < 0) {
                Auth::logout();
                return  view('tunggu');
            } else {
                $data = pabrik::all()->where('pabrik_id', Auth::user()->pabrik);
                foreach ($data as $row) {
                    session(['pabrik' => $row['nama']]);
                }
                return redirect('/dashboard');
            }
        } else { // false

            //Login Fail


            return redirect('/login')->with('message', 'Username atau password salah');
        }
    }

    public function showFormRegister()
    {
        $data1 = user::all('nama');
        $data = pabrik::all();
        return view('auth.register', ['data' => $data, 'data1' => $data1]);
    }

    public function register(Request $request)
    {

        $user = new User;
        $user->nama = ucwords(strtolower($request->username));
        $user->namadepan = $request->namadepan;
        $user->namabelakang = $request->namabelakang;
        $user->pabrik = $request->search;
        $user->level = -1;
        $user->password = bcrypt($request->password);
        $simpan = $user->save();

        //YANG DIUBAH
        // if ($simpan) {
        //     Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
        //     return redirect('/login');
        // } else {
        //     Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
        //     return redirect('showregister');
        // }
        if ($simpan) {
            return redirect('/karyawan')->with('success', 'Data Karyawan Berhasil Disimpan');
        } else {
            return redirect('/karyawan')->with('error', 'Data Karyawan Gagal Disimpan');
        }
        //END
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('login');
    }

    public function tampil_ganti_password()
    {
        return view('auth.gantipassword');
    }

    public function ganti_password(Request $req)
    {
        if (Hash::check($req['lama'], Auth::user()->password)) {
            $id = Auth::user()->id;
            $user = User::all()->where("id", $id)->first()->update([
                'password' => Hash::make($req['baru']),
            ]);
        } else {
            return redirect('/gantipassword')->with('status', 'Kata sandi lama anda salah!');
        }

        return redirect('/'); //->with('status', 'Kata sandi lama anda salah!');
    }

    public function reset_pass(Request $req)
    {

            $id = $req['id'];
            $ganti = User::all()->where('pabrik',$id)->where('level',1)->first();
            // dd($ganti);
            $user = User::all()->where("id", $ganti['id'])->first()->update([
                'password' => Hash::make($req['baru']),
            ]);

        return redirect('/karyawan'); //->with('status', 'Kata sandi lama anda salah!');
    }

    public function reset_passu(Request $req)
    {
            $id = $req['id'];

            $user = User::all()->where("id", $id)->first()->update([
                'password' => Hash::make($req['baru']),
            ]);

        return redirect('/pabrik'); //->with('status', 'Kata sandi lama anda salah!');
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        //   dd($query);
        $filterResult = pabrik::select("nama")
            ->where("nama", "LIKE", "%{$query}%")
            ->get();
        $data =  json_decode($filterResult, true);
        //   dd( json_decode($data));
        $res = array();
        foreach ($data as $x => $x_value) {
            $i = 0;
            array_push($res, $x_value['nama']);
            $i++;
            // var_dump($x_value);
        }
        return ($res);
        // $json =response()->json($filterResult);
        // var_dump($json[]);
    }
}
