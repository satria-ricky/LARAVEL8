@extends('layout.app')
@section('title')
    <title>Pembersihan Ruangan</title>
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Catatan Pembersihan Ruangan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Catatan Pembersihan Ruangan</li>
            </ol>
            <form action="/input_catatbersih" method="post" id='forminput'>
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="row">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Kategori
                        </div>
                        <div class="card-body">

                            <div class="form-group row" margin-bottom=10px;>
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tahun" class="form-control" id="inputEmail3"
                                        placeholder="Tahun">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Bulan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="bulan" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Produk</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="produk_nama" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="Rosela">Rosela</option>
                                        <option value="Kunyit">Kunyit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Batch Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="batchnum" class="form-control" id="inputPassword3"
                                        placeholder="Batch Number">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Entry Data
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Prosedur Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" name="prosedurnum" class="form-control" id="inputEmail3"
                                        placeholder="Prosedur Nomor">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namaruang" class="form-control" id="inputEmail3"
                                        placeholder="Ruangan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Cara Pembersihan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="carabersih" class="form-control" id="inputEmail3"
                                        placeholder="Cara Pembersihan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Bagian Yang Dibersihkan
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pelaksana</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pelaksana" class="form-control" id="inputEmail3"
                                        placeholder="Pelaksana">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Diperiksa Oleh</label>
                                <div class="col-sm-10">
                                    <input type="text" name="periksa" class="form-control" id="inputEmail3"
                                        placeholder="Diperiksa Oleh">
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">Lantai/ Dinding</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="lantaidinding" class="custom-control-input"
                                        id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Sudah</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Meja</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="meja" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Sudah</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Jendela</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="jendela" class="custom-control-input" id="customSwitch3">
                                    <label class="custom-control-label" for="customSwitch3">Sudah</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Langit-langit/ Plafon</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="plafon" class="custom-control-input" id="customSwitch4">
                                    <label class="custom-control-label" for="customSwitch4">Sudah</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <a class="btn btn-primary" onclick="salert()" href="#" style="float:left; width: 100px;  margin-left:25px"
                    role="button">Simpan</a>
            </form>
            <!-- <div class="modal fade" id="modalSimpan">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Apakah data sudah benar</h4>

                                    </div>
                                </div>
                            </div>
                        </div> -->
        </div>
    </main>
@endsection
