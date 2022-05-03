<?php

namespace App\Http\Controllers;

use App\Models\JenisAset;
use App\Http\Requests\StoreJenisAsetRequest;
use App\Http\Requests\UpdateJenisAsetRequest;

class JenisAsetController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisAsetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisAsetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisAset  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function show(JenisAset $jenisAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisAset  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisAset $jenisAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisAsetRequest  $request
     * @param  \App\Models\JenisAset  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisAsetRequest $request, JenisAset $jenisAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisAset  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisAset $jenisAset)
    {
        //
    }
}
