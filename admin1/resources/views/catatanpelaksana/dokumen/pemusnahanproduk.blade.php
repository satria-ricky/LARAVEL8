@extends('layout.app')
@section('title')
    <title>Catatan Pemusnahan</title>
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Catatan Pemusnahan</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">Bahan Baku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Bahan Kemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Produk Antara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab"
                        aria-controls="pills-detail" aria-selected="false">Produk Jadi</a>
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
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm1"
                                        onclick="setdatetoday1(1)">
                                        Tambah Pemusnahan Bahan Baku
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Pemusnahan Bahan Baku</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="card mb-4">
                                                        <div class="card-header" id='headertgl1'></div>
                                                        <div class="card-header">Bahan Baku</div>
                                                        <div class="card-body">
                                                            <p class="statusMsg"></p>
                                                            <form role="form" method="post" action="tambah_pemusnahanbahan"
                                                                id='forminput1'>
                                                                @csrf
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />
                                                                <div class="card-body">

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Kode
                                                                            Pemusnahan</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="kode_pemusnahan"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Kode Pemusnahan" />
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" id='ambil_tanggal1'
                                                                        class="form-control 1" name="tanggal"
                                                                        placeholder="" />

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Nama Bahan
                                                                            Baku</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="nama_bahanbaku"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Nama Bahan Baku" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">No
                                                                            Batch</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="no_batch"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="No Batch" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Asal Bahan
                                                                            Baku</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="asal_bahanbaku"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Asal Produk Jadi" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Jumlah
                                                                            Bahan Baku</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="jumlah_bahanbaku"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Jumlah Produk Jadi" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Alasan
                                                                            Pemusnahan</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="alasan_pemusnahan"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Alasan Pemusnahan" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Cara
                                                                            Pemusnahan</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="cara_pemusnahan"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Cara Pemusnahan" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Petugas</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="petugas"
                                                                                class="form-control 1" id="inputEmail3"
                                                                                placeholder="Petugas" />
                                                                        </div>
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
                                                <th scope="col">Kode Pemusnahan</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Bahan Baku</th>
                                                <th scope="col">No Batch</th>
                                                <th scope="col">Asal Bahan Baku</th>
                                                <th scope="col">Jumlah Bahan Baku</th>
                                                <th scope="col">Alasan Pemusnahan</th>
                                                <th scope="col">Cara Pemusnahan</th>
                                                <th scope="col">Petugas</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data as $row)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row['kode_pemusnahan'] }}</td>
                                                    <td>{{ $row['tanggal_pemusnahan'] }}</td>
                                                    <td>{{ $row['nama_bahanbaku'] }}</td>
                                                    <td>{{ $row['no_batch'] }}</td>
                                                    <td>{{ $row['asal_bahanbaku'] }}</td>
                                                    <td>{{ $row['jumlah_bahanbaku'] }}</td>
                                                    <td>{{ $row['alasan_pemusnahan'] }}</td>
                                                    <td>{{ $row['cara_pemunsnahan'] }}</td>
                                                    <td>{{ $row['nama_petugas'] }}</td>
                                                    <td><?php if ($row['status'] == 0) {
                                                        echo 'Diajukan';
                                                    } ?></td>
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
                                    Bahan Kemas
                                </div>
                                <div class="card-body">
                                    <!-- pop up -->
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm2"
                                        onclick="setdatetoday1(2)">
                                        Tambah Pemusnahan Bahan Kemas
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm2" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Pemusnahan Bahan Kemas</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="card mb-4">
                                                        <div class="card-header" id='headertgl2'></div>
                                                        <div class="card-header">Bahan Kemas</div>
                                                        <div class="card-body">
                                                            <p class="statusMsg"></p>
                                                            <form role="form" method="post"
                                                                action="tambah_pemusnahanbahankemas" id='forminput2'>
                                                                @csrf
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />
                                                                <div class="card-body">
                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Kode
                                                                            Pemusnahan</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="kode_pemusnahan"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Kode Pemusnahan" />
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" id='ambil_tanggal2'
                                                                        class="form-control 2" name="tanggal"
                                                                        placeholder="" />

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Nama Bahan
                                                                            Kemas</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="nama_bahankemas"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Nama Produk Jadi" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">No
                                                                            Batch</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="no_batch"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="No Batch" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Asal Bahan
                                                                            Kemas</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="asal_bahankemas"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Asal Produk Jadi" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Jumlah Bahan
                                                                            Kemas</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="jumlah_bahankemas"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Jumlah Produk Jadi" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Alasan
                                                                            Pemusnahan</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="alasan_pemusnahan"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Alasan Pemusnahan" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Cara
                                                                            Pemusnahan</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="cara_pemusnahan"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Cara Pemusnahan" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="inputEmail3"
                                                                            class="col-sm-3 col-form-label">Petugas</label>
                                                                        <div class="col-sm">
                                                                            <input type="text" name="petugas"
                                                                                class="form-control 2" id="inputEmail3"
                                                                                placeholder="Petugas" />
                                                                        </div>
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
                                                <th scope="col">Kode Pemusnahan Produk</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Bahan Kemas</th>
                                                <th scope="col">No Batch</th>
                                                <th scope="col">Asal Bahan Kemas</th>
                                                <th scope="col">Jumlah Bahan Kemas</th>
                                                <th scope="col">Alasan Pemusnahan</th>
                                                <th scope="col">Cara Pemusnahan</th>
                                                <th scope="col">Petugas</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data1 as $row)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row['kode_pemusnahan'] }}</td>
                                                    <td>{{ $row['tanggal_pemusnahan'] }}</td>
                                                    <td>{{ $row['nama_bahan_kemas'] }}</td>
                                                    <td>{{ $row['no_batch'] }}</td>
                                                    <td>{{ $row['asal_bahankemas'] }}</td>
                                                    <td>{{ $row['jumlah_bahankemas'] }}</td>
                                                    <td>{{ $row['alasan_pemusnahan'] }}</td>
                                                    <td>{{ $row['cara_pemunsnahan'] }}</td>
                                                    <td>{{ $row['nama_petugas'] }}</td>
                                                    <td><?php if ($row['status'] == 0) {
                                                        echo 'Diajukan';
                                                    } ?></td>
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
                            <div class="row">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Produk Antara
                                    </div>
                                    <div class="card-body">
                                        <!-- pop up -->
                                        <!-- Button to trigger modal -->
                                        <button class="btn btn-success btn-lg" data-toggle="modal"
                                            data-target="#modalForm3" onclick="setdatetoday1(3)">
                                            Tambah Pemusnahan Produk Antara
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalForm3" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Pemusnahan Produk
                                                            Antara</h4>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <div class="card mb-4">
                                                            <div class="card-header" id='headertgl3'></div>
                                                            <div class="card-header">Produk Antara</div>
                                                            <div class="card-body">
                                                                <p class="statusMsg"></p>
                                                                <form role="form" method="post"
                                                                    action="tambah_pemusnahanprodukantara" id='forminput3'>
                                                                    @csrf
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}" />
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Kode
                                                                                Pemusnahan</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="kode_pemusnahan"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Kode Pemusnahan" />
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" id='ambil_tanggal3'
                                                                            class="form-control 3" name="tanggal"
                                                                            placeholder="" />

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Nama Produk
                                                                                Antara</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="nama_produkantara"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Nama Produk Antara" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">No
                                                                                Batch</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="no_batch"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="No Batch" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Asal Produk
                                                                                Antara</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="asal_produkantara"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Asal Produk Antara" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Jumlah
                                                                                Produk Antara</label>
                                                                            <div class="col-sm">
                                                                                <input type="text"
                                                                                    name="jumlah_produkantara"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Jumlah Produk Antara" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Alasan
                                                                                Pemusnahan</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="alasan_pemusnahan"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Alasan Pemusnahan" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Cara
                                                                                Pemusnahan</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="cara_pemusnahan"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Cara Pemusnahan" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Petugas</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="petugas"
                                                                                    class="form-control 3" id="inputEmail3"
                                                                                    placeholder="Petugas" />
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <a class="btn btn-primary" onclick="salert1(3)"
                                                                        href="#"
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
                                                    <th scope="col">Kode Pemusnahan</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Produk Antara</th>
                                                    <th scope="col">No Batch</th>
                                                    <th scope="col">Asal Produk Antara</th>
                                                    <th scope="col">Jumlah Produk Antara</th>
                                                    <th scope="col">Alasan Pemusnahan</th>
                                                    <th scope="col">Cara Pemusnahan</th>
                                                    <th scope="col">Petugas</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                @foreach ($data2 as $row)
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $row['kode_pemusnahan'] }}</td>
                                                        <td>{{ $row['tanggal_pemusnahan'] }}</td>
                                                        <td>{{ $row['nama_produkantara'] }}</td>
                                                        <td>{{ $row['no_batch'] }}</td>
                                                        <td>{{ $row['asal_produkantara'] }}</td>
                                                        <td>{{ $row['jumlah_produkantara'] }}</td>
                                                        <td>{{ $row['alasan_pemusnahan'] }}</td>
                                                        <td>{{ $row['cara_pemunsnahan'] }}</td>
                                                        <td>{{ $row['nama_petugas'] }}</td>
                                                        <td><?php if ($row['status'] == 0) {
                                                            echo 'Diajukan';
                                                        } ?></td>
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
                <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="row">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Produk Jadi
                                    </div>
                                    <div class="card-body">
                                        <!-- pop up -->
                                        <!-- Button to trigger modal -->
                                        <button class="btn btn-success btn-lg" data-toggle="modal"
                                            data-target="#modalForm4" onclick="setdatetoday1(4)">
                                            Tambah Pemusnahan Produk Jadi
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalForm4" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Pemusnahan Produk
                                                            Jadi</h4>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <div class="card mb-4">
                                                            <div class="card-header" id='headertgl4'></div>
                                                            <div class="card-header">Produk Jadi</div>
                                                            <div class="card-body">
                                                                <p class="statusMsg"></p>
                                                                <form role="form" method="post"
                                                                    action="tambah_pemusnahanprodukjadi" id='forminput4'>
                                                                    @csrf
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}" />
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Kode
                                                                                Pemusnahan</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="kode_pemusnahan"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Kode Pemusnahan" />
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" id='ambil_tanggal4'
                                                                            class="form-control 4" name="tanggal"
                                                                            placeholder="" />

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Nama Produk
                                                                                Jadi</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="nama_produkantara"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Nama Produk Jadi" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">No
                                                                                Batch</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="no_batch"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="No Batch" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Asal Produk
                                                                                Jadi</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="asal_produkantara"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Asal Produk Jadi" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Jumlah
                                                                                Produk Jadi</label>
                                                                            <div class="col-sm">
                                                                                <input type="text"
                                                                                    name="jumlah_produkantara"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Jumlah Produk Jadi" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Alasan
                                                                                Pemusnahan</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="alasan_pemusnahan"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Alasan Pemusnahan" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Cara
                                                                                Pemusnahan</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="cara_pemusnahan"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Cara Pemusnahan" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                class="col-sm-3 col-form-label">Petugas</label>
                                                                            <div class="col-sm">
                                                                                <input type="text" name="petugas"
                                                                                    class="form-control 4" id="inputEmail3"
                                                                                    placeholder="Petugas" />
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <a class="btn btn-primary" onclick="salert1(4)"
                                                                        href="#"
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
                                                    <th scope="col">Kode Pemusnahan</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Produk Jadi</th>
                                                    <th scope="col">No Batch</th>
                                                    <th scope="col">Asal Produk Jadi</th>
                                                    <th scope="col">Jumlah Produk Jadi</th>
                                                    <th scope="col">Alasan Pemusnahan</th>
                                                    <th scope="col">Cara Pemusnahan</th>
                                                    <th scope="col">Petugas</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                @foreach ($data3 as $row)
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $row['kode_pemusnahan'] }}</td>
                                                        <td>{{ $row['tanggal_pemusnahan'] }}</td>
                                                        <td>{{ $row['nama_produkjadi'] }}</td>
                                                        <td>{{ $row['no_batch'] }}</td>
                                                        <td>{{ $row['asal_produkjadi'] }}</td>
                                                        <td>{{ $row['jumlah_produkjadi'] }}</td>
                                                        <td>{{ $row['alasan_pemusnahan'] }}</td>
                                                        <td>{{ $row['cara_pemunsnahan'] }}</td>
                                                        <td>{{ $row['nama_petugas'] }}</td>
                                                        <td><?php if ($row['status'] == 0) {
                                                            echo 'Diajukan';
                                                        } ?></td>
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
        </div>
    </main>
@endsection
