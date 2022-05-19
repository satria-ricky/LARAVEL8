@extends('layout.app')
@section('title')
    <title>Pengambilan Sampel</title>
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Catatan Pengambilan Sampel</h1>
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
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Bahan Baku
                                </div>
                                <div class="card-body">
                                    <!-- pop up -->
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm4"
                                        onclick="setdatetoday1(1)">
                                        Tambah Sampel Bahan Baku
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm4" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Sampel Bahan Baku</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="card mb-4">
                                                        <div class="card-header" id='headertgl1'></div>
                                                        <div class="card-header">Bahan Baku</div>
                                                        <div class="card-body">
                                                            <p class="statusMsg"></p>
                                                            <form role="form" method="post" action="tambah_contohbahan"
                                                                id='forminput1'>
                                                                @csrf
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Kode
                                                                        Bahan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kode_bahan"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="Kode Bahan" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Nama
                                                                        Bahan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_bahan"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="Nama Bahan" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nobatch"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="tanggal" id='ambil_tanggal1'
                                                                    class="form-control 1" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Kedaluwarsa</label>
                                                                    <div class="col-sm">
                                                                        <input type="date" name="kedaluwarsa"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jumlah
                                                                        Bahan Baku dalam Box</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah_box"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="Jumlah Jumlah
                                                                                        Bahan Baku dalam Box" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jumlah
                                                                        Produk Yang Diambil</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah_ambil"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="Jumlah Produk Yang Diambil" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jenis
                                                                        dan Warna Kemasan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jenis_warna_kemasan"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="Jenis dan Warna Kemasan" />
                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-primary" onclick="salert1(1)" href="#"
                                                                    style="float:left; width: 100px;  margin-left:25px"
                                                                    role="button">Simpan</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pop up end -->

                                    <table class="table mt-5">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Bahan Baku</th>
                                                <th scope="col">Nama Bahan Baku</th>
                                                <th scope="col">No Batch</th>
                                                <th scope="col">Tanggal Pengambilan Sampel</th>
                                                <th scope="col">Kedaluwarsa</th>
                                                <th scope="col">Jumlah Bahan Baku Dalam Box</th>
                                                <th scope="col">Jumlah Produk Yang Diambil</th>
                                                <th scope="col">Jenis Dan warna kemasan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data as $row)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row['kode_bahan'] }}</td>
                                                    <td>{{ $row['nama_bahanbaku'] }}</td>
                                                    <td>{{ $row['no_batch'] }}</td>
                                                    <td>{{ $row['tanggal_ambil'] }}</td>
                                                    <td>{{ $row['kedaluwarsa'] }}</td>
                                                    <td>{{ $row['jumlah_kemasanbox'] }}</td>
                                                    <td>{{ $row['jumlah_produk'] }}</td>
                                                    <td>{{ $row['jenis_warnakemasan'] }}</td>
                                                    <td>
                                                        <form method="post" action="detil_batch">
                                                            <input type="hidden" name="_token" value="" />
                                                            <input type="hidden" name="nobatch" value="" />
                                                            <button type="submit" class="btn btn-primary">Buka</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Produk
                                </div>
                                <div class="card-body">
                                    <!-- pop up -->
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm5"
                                        onclick="setdatetoday1(2)">
                                        Tambah Sampel Produk
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm5" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Sampel Produk</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="card mb-4">
                                                        <div class="card-header" id='headertgl2'></div>
                                                        <div class="card-header">Produk</div>
                                                        <div class="card-body">
                                                            <p class="statusMsg"></p>
                                                            <form role="form" method="post" action="tambah_contohproduk"
                                                                id='forminput2'>
                                                                @csrf
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Kode
                                                                        Produk</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kode_produk"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="Kode Produk" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Nama
                                                                        Produk</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_produk"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="Nama Produk" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nobatch"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="tanggal" id='ambil_tanggal2'
                                                                    class="form-control 2" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Kedaluwarsa</label>
                                                                    <div class="col-sm">
                                                                        <input type="date" name="kedaluwarsa"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jumlah
                                                                        Produk dalam Box</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah_box"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="Jumlah Produk Dalam Box" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jumlah
                                                                        Produk Yang Diambil</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah_ambil"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="Jumlah Produk Yang Diambil" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jenis
                                                                        dan Warna Kemasan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jenis_warna_kemasan"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="Jenis dan Warna Kemasan" />
                                                                    </div>
                                                                </div>

                                                                <a class="btn btn-primary" onclick="salert1(2)" href="#"
                                                                    style="float:left; width: 100px;  margin-left:25px"
                                                                    role="button">Simpan</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pop up end -->

                                    <table class="table mt-5">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Produk</th>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">No Batch</th>
                                                <th scope="col">Tanggal Pengambilan Sampel</th>
                                                <th scope="col">Kedaluwarsa</th>
                                                <th scope="col">Jumlah Produk dalam Box</th>
                                                <th scope="col">Jumlah Produk Yang Diambil</th>
                                                <th scope="col">Jenis Dan warna kemasan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data1 as $row)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row['kode_produk'] }}</td>
                                                    <td>{{ $row['nama_produkjadi'] }}</td>
                                                    <td>{{ $row['no_batch'] }}</td>
                                                    <td>{{ $row['tanggal_ambil'] }}</td>
                                                    <td>{{ $row['kedaluwarsa'] }}</td>
                                                    <td>{{ $row['jumlah_kemasanbox'] }}</td>
                                                    <td>{{ $row['jumlah_produk'] }}</td>
                                                    <td>{{ $row['jenis_warnakemasan'] }}</td>
                                                    <td>
                                                        <form method="post" action="detil_batch">
                                                            <input type="hidden" name="_token" value="" />
                                                            <input type="hidden" name="nobatch" value="" />
                                                            <button type="submit" class="btn btn-primary">Buka</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Kemasan
                                </div>
                                <div class="card-body">
                                    <!-- pop up -->
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm6"
                                        onclick="setdatetoday1(3)">
                                        Tambah Sampel Kemasan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm6" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Sampel Kemasan</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="card mb-4">
                                                        <div class="card-header" id='headertgl3'></div>
                                                        <div class="card-header">Kemasan</div>
                                                        <div class="card-body">
                                                            <p class="statusMsg"></p>
                                                            <form role="form" method="post" action="tambah_contohkemasan"
                                                                id='forminput3'>
                                                                @csrf
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Kode
                                                                        Kemasan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kode_kemasan"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="Kode Kemasan" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Nama
                                                                        Kemasan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_kemasan"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="Nama Kemasan" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nobatch"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="tanggal" id='ambil_tanggal3'
                                                                    class="form-control 3" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Kedaluwarsa</label>
                                                                    <div class="col-sm">
                                                                        <input type="date" name="kedaluwarsa"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jumlah
                                                                        Kemasan dalam Box</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah_box"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="Jumlah Kemasan dalam Box" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jumlah
                                                                        Produk Yang Diambil</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah_ambil"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="Jumlah Produk Yang Diambil" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Jenis
                                                                        dan Warna Kemasan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jenis_warna_kemasan"
                                                                            class="form-control 3" id="inputEmail3"
                                                                            placeholder="Jenis dan Warna Kemasan" />
                                                                    </div>
                                                                </div>

                                                                <a class="btn btn-primary" onclick="salert1(3)" href="#"
                                                                    style="float:left; width: 100px;  margin-left:25px"
                                                                    role="button">Simpan</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pop up end -->

                                    <table class="table mt-5">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Bahan Baku</th>
                                                <th scope="col">Nama Bahan Baku</th>
                                                <th scope="col">No Batch</th>
                                                <th scope="col">Tanggal Pengambilan Sampel</th>
                                                <th scope="col">Kedaluwarsa</th>
                                                <th scope="col">Jumlah Kemasan Dalam Box</th>
                                                <th scope="col">Jumlah Produk Yang Diambil</th>
                                                <th scope="col">Jenis Dan warna kemasan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data2 as $row)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row['kode_kemasan'] }}</td>
                                                    <td>{{ $row['nama_kemasan'] }}</td>
                                                    <td>{{ $row['no_batch'] }}</td>
                                                    <td>{{ $row['tanggal_ambil'] }}</td>
                                                    <td>{{ $row['kedaluwarsa'] }}</td>
                                                    <td>{{ $row['jumlah_kemasanbox'] }}</td>
                                                    <td>{{ $row['jumlah_produk'] }}</td>
                                                    <td>{{ $row['jenis_warnakemasan'] }}</td>
                                                    <td>
                                                        <form method="post" action="detil_batch">
                                                            <input type="hidden" name="_token" value="" />
                                                            <input type="hidden" name="nobatch" value="" />
                                                            <button type="submit" class="btn btn-primary">Buka</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
