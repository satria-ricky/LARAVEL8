@extends('layout.main_layout')

@section('isi_konten')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Profile</h2>
                        {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        {{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
					<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
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
                                                @if (Auth::user()->foto != '')
                                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Admin"
                                                        class="rounded-circle" width="150">
                                                @else
                                                    <img src="{{ url('assets_user') }}/img/profile.jpg" alt="Admin"
                                                        class="rounded-circle" width="150">
                                                @endif
                                                <div class="mt-3">
                                                    <b>
                                                        <h1>{{ Auth::user()->nama }}</h1>
                                                    </b>
                                                    <p class="text-secondary mb-1">Administrator</p>
                                                    <p class="text-muted font-size-sm">Terakhir diubah :{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', strtotime(Auth::user()->updated_at)))->locale('id')->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <form action="edit_profile" method="post" id="forminput1" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2 mb-0">Nama lengkap*</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control 1" name="nama"
                                                            value="{{ Auth::user()->nama }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2 mb-0">Username*</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control 1" name="username"
                                                            value="{{ Auth::user()->username }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-1 mb-0">Ganti foto?</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="file" class="form-control-file" name="foto"
                                                            accept="image/*" id="id_foto" onchange="cekFoto()">
                                                        <img class="img-priview rounded mt-2" width="150" id="priviewFoto">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <button type="button" onclick="buttonSimpan(1)"
                                                            class="btn btn-primary px-4"> Simpan </button>
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
    </div>
@endsection
