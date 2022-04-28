<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user());
        return view('profile/profile', [
            "is_aktif" => "profile",
            "judul_navigasi" => "Profile"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // dd('ini');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $rules = [
            'user_nama' => 'required',
            'user_foto' => 'image|file|max:1024'
        ];

        if($request->email != auth()->user()->email) {
            $rules['email'] = 'required|unique:tb_user,email';
        }

        $data = $request->validate($rules);

        if($request->password != null){
            $data['password'] = Hash::make($request->password);
        }

        if($request->file('user_foto')){
            
            if($request->fotoLama != 'foto/user/default.jpg'){
                Storage::delete($request->fotoLama);
            }

            $data['user_foto'] = $request->file('user_foto')->store('foto/user');
        }
        
        User::where('user_id', auth()->user()->user_id)
                    ->update($data);

        $request->session()->flash('pesan', 'Data Berhasil Diubah');
        return redirect('/profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
