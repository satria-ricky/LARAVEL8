<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreAsetRequest;
use App\Http\Requests\UpdateAsetRequest;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAsetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function show(Aset $aset)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function edit(Aset $aset)
    {
        return view('admin/edit_aset', [
            'is_aktif' => 'aset',
            'judul_navigasi' => 'Edit Aset',
            'data' => $aset
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsetRequest  $request
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsetRequest $request, Aset $aset)
    {

        $rules = [
            'aset_gssl_induk' => 'required',
            'aset_deskripsi' => 'required',
            'aset_qty' => 'required',
            'aset_tgl_perolehan' => 'required',
            'aset_tgl_akhir' => 'required',
            'aset_prs_susut' => 'required',
            'aset_sumber_perolehan' => 'required',
            'aset_saldo_perolehan' => 'required',
            'aset_nilai_buku' => 'required',
            'aset_akm_susut' => 'required',
            'aset_uraian' => 'required'
        ];

        if($request->aset_no_rekening != $aset->aset_no_rekening) {
            $rules['aset_no_rekening'] = 'required|unique:tb_aset,aset_no_rekening';
        }

        
        

        $data = $request->validate($rules);

        if($request->file('aset_foto')){
            $data['aset_foto'] = $request->file('aset_foto')->store('foto');
        }
        
        Aset::where('aset_id', $aset->aset_id)
                    ->update($data);

        $request->session()->flash('pesan', 'Data Berhasil Diubah');
        return redirect('/daftar-aset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aset $aset)
    {
        // Aset::destroy($aset->aset_id);
        
        $aset->delete();
        
        return redirect('/daftar-aset')->with('pesan', 'Data Berhasil Dihapus!');
    }
}
