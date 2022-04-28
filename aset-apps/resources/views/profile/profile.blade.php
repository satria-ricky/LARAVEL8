@extends('layouts.main')

@section('isi_konten')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">


        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">{{ $judul_navigasi }}</h2>
                <!-- <h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5> -->
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
            </div>
        </div>

        
    </div>
</div>
<div class="page-inner mt--5">


    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('storage/'.auth()->user()->user_foto) }}" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <b><h1>{{ auth()->user()->user_nama }}</h1></b>
                                            <p class="text-secondary mb-1"> {{ auth()->user()->email }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form action="/profile/{{ auth()->user()->user_id }}" method="post" id="form-edit" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                        <h6 class="mt-2 mb-0">Nama lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('user_nama') is-invalid @enderror" name="user_nama" value="{{ old('user_nama',auth()->user()->user_nama) }}" >
                                        @error('user_nama') 
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                        <h6 class="mt-2 mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',auth()->user()->email) }}" >
                                        @error('email') 
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                        <h6 class="mt-2 mb-0">Password Baru</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        
                                            <input type="password" id="input_password" name="password" class="form-control" >
                                        
                                        
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                        <h6 class="mt-1 mb-0">Ganti foto?</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" class="form-control-file" name="user_foto" accept="image/*" id="getFoto" onchange="cekFoto()" >
                                            <img class="img-priview rounded mt-2" width="150" id="priviewFoto">
                                            <input type="hidden" value="{{ auth()->user()->user_foto }}" name="fotoLama">
                                        </div>
                                       
                                    </div>
        
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                          <button type="button" class="btn btn-primary px-4" id="button-edit"> Simpan Perubahan </button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>             
    </div>

    
</div>
@endsection

@section('isi_js')
    @include('components.js_priviewImage')
	@include('components.js_edit')
@endsection