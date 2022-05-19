@extends('layout.app')
@section('title')
    <title>COA</title>
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Catatan Pengambilan Contoh</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">Bahan Baku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Produk Jadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Kemasan</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Catatan Pengambilan Contoh Bahan Baku</li>
                    </ol>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Bagian Produksi
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Nomor POB" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Batch</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Nomor Batch" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pengambilan
                                                Contoh</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Besar Batch" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Daftar dan Hasil Pemeriksaan
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Loth</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kadaluarsa</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Bahan Baku dalam
                                                Master Box</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Produk yang
                                                Diambil</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis dan Warna
                                                Kemasan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kesimpulan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Diterima</option>
                                                    <option value="2">Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="index"
                                style="float:left; width: 100px;  margin-left:25px">SIMPAN</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Catatan Pengambilan Contoh Produk Jadi</li>
                    </ol>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Bagian Produksi
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk
                                                Jadi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Nomor POB" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Batch</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Nomor Batch" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pengambilan
                                                Contoh</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Besar Batch" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Daftar dan Hasil Pemeriksaan
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk
                                                Jadi</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Loth</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kadaluarsa</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Produk Jadi
                                                dalam Master Box</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Produk yang
                                                Diambil</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis dan Warna
                                                Kemasan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kesimpulan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Diterima</option>
                                                    <option value="2">Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="index"
                                style="float:left; width: 100px;  margin-left:25px">SIMPAN</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Catatan Pengambilan Contoh Kemasan</li>
                    </ol>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Bagian Produksi
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kemasan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Nomor POB" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Batch</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Nomor Batch" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pengambilan
                                                Contoh</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Besar Batch" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Daftar dan Hasil Pemeriksaan
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kemasan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Loth</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kadaluarsa</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Kemasan dalam
                                                Master Box</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Produk yang
                                                Diambil</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis dan Warna
                                                Kemasan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Baik</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kesimpulan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inlineFormCustomSelect">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Diterima</option>
                                                    <option value="2">Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="index"
                                style="float:left; width: 100px;  margin-left:25px">SIMPAN</a>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </main>
@endsection
