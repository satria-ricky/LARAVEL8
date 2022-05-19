@extends('layout.app')
@section('title')
<title>Pemeriksaan/Pengujian Bahan</title>
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1>Pemeriksaan/Pengujian Bahan</h1>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bahan Baku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bahan Kemas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="false">Produk Jadi</a>
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
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm4" onclick="setdatetoday1(1)">
                                    Tambah Pengujian Bahan Baku
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="modalForm4" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pengujian Bahan Baku</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl1'></div>
                                                    <div class="card-header">Bahan Baku</div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_pemeriksaanbahan" id='forminput1'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Kode
                                                                        Pengujian</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kode_spesifikasi" class="form-control 1" id="kode_spesifikasi" placeholder="Kode Pengujian" />
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal1' class="form-control 1" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                                                        Baku</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 1" list="listnamabahanbaku" type="text" name='nama_bahanbaku' id="namabahanbaku" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamabahanbaku'>
                                                                            @foreach ($bahanbaku as $row)
                                                                            <option value="{{ $row['bahanbaku_nama'] }}">
                                                                                {{ $row['bahanbaku_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Sediaan
                                                                        Bahan Baku</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jenis_sediaan" class="form-control 1" id="jenis_sediaan" placeholder="Jenis Sediaan Bahan Baku" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Warna</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="warna" class="form-control 1" id="warna" placeholder="Warna" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Aroma</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="aroma" class="form-control 1" id="aroma" placeholder="Aroma" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tekstur</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="tekstur" class="form-control 1" id="tekstur" placeholder="Tekstur" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bobot</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="bobot" class="form-control 1" id="bobot" placeholder="Bobot" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(1)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
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
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Kode Bahan Baku</th>
                                            <th scope="col">Nama Bahan Baku</th>
                                            <th scope="col">Jenis Sediaan Bahan Baku</th>
                                            <th scope="col">Warna</th>
                                            <th scope="col">Aroma</th>
                                            <th scope="col">Tekstur</th>
                                            <th scope="col">Bobot</th>
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
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['kode_spesifikasi'] }}</td>
                                            <td>{{ $row['nama_bahanbaku'] }}</td>
                                            <td>{{ $row['jenis_sediaan'] }}</td>
                                            <td>{{ $row['warna'] }}</td>
                                            <td>{{ $row['aroma'] }}</td>
                                            <td>{{ $row['tekstur'] }}</td>
                                            <td>{{ $row['bobot'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm4" class="btn btn-primary" onclick="editdata1({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimapemeriksaanbahanbaku">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_spesifikasibahanbaku'] }}" />
                                                    <button type="submit" class="btn btn-primary">Terima</button>
                                                </form>
                                            </td>
                                            @endif
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
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm5" onclick="setdatetoday1(2)">
                                    Tambah Pengujian Bahan Kemas
                                </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm5" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pengujian Bahan Kemas
                                                </h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl2'></div>
                                                    <div class="card-header">Bahan Kemas</div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_pemeriksaanbahankemas" id='forminput2'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Kode
                                                                        Pengujian</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kode_spesifikasi" class="form-control 2" id="kode_spesifikasi1" placeholder="Kode Pengujian" />
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal2' class="form-control 2" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                                                        Kemas</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 2" list="listnamakemas" type="text" name='nama_bahankemas' id="namabahanbaku1" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamakemas'>
                                                                            @foreach ($kemasan as $row)
                                                                            <option value="{{ $row['kemasan_nama'] }}">
                                                                                {{ $row['kemasan_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Bahan
                                                                        Kemas</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jenis_bahankemas" class="form-control 2" id="jenis_bahankemas1" placeholder="Bahan Kemas" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Warna</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="warna" class="form-control 2" id="warna1" placeholder="Warna" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ukuran Bahan
                                                                        Kemas</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="ukuran_bahankemas" class="form-control 2" id="ukuran_bahankemas1" placeholder="Ukuran Bahan Kemas" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bocor/Cacat</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="bocor_cacat" class="form-control 2" id="bocor_cacat1" placeholder="Bocor/Cacat" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(2)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
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
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Kode Pengujian</th>
                                            <th scope="col">Nama Bahan Kemas</th>
                                            <th scope="col">Jenis Bahan Kemas</th>
                                            <th scope="col">Warna</th>
                                            <th scope="col">Ukuran Bahan Kemas</th>
                                            <th scope="col">r / Cacat</th>
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
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['kode_spesifikasi'] }}</td>
                                            <td>{{ $row['nama_bahankemas'] }}</td>
                                            <td>{{ $row['jenis_bahankemas'] }}</td>
                                            <td>{{ $row['warna'] }}</td>
                                            <td>{{ $row['ukuran'] }}</td>
                                            <td>{{ $row['bocorcacat'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm5" class="btn btn-primary" onclick="editdata2({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimapemeriksaanbahankemas">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_spesifikasibahankemas'] }}" />
                                                    <button type="submit" class="btn btn-primary">Terima</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Produk Jadi
                            </div>
                            <div class="card-body">
                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm6" onclick="setdatetoday1(3)">
                                    Tambah Pengujian Produk Jadi
                                </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm6" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pengujian Produk Jadi
                                                </h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl3'></div>
                                                    <div class="card-header">Produk Jadi</div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_pemeriksaanprodukjadi" id='forminput3'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Kode
                                                                        Pengujian</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kode_spesifikasi" class="form-control 3" id="kode_spesifikasi2" placeholder="Kode Pengujian" />
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal3' class="form-control 3" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                                        Produk</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 3" list="listnamaproduk" type="text" name='nama_produkjadi' id="namaproduk" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamaproduk'>
                                                                            @foreach ($produkjadi as $row)
                                                                            <option value="{{ $row['produk_nama'] }}">
                                                                                {{ $row['produk_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori Produk
                                                                        Jadi</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="kategori" class="form-control 3" id="kategori" placeholder="Kategori Produk
                                                                                                                                                                                                                                                                                                                                                                                                            Jadi" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="no_batch" class="form-control 3" id="no_batch" placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Warna Produk
                                                                        Jadi</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="warna" class="form-control 3" id="warna2" placeholder="Warna Produk Jadi" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Aroma</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="aroma" class="form-control 3" id="aroma2" placeholder="Aroma" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kemasan
                                                                        Bocor/Cacat</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="bocor_cacat" class="form-control 3" id="bocor_cacat2" placeholder="Bocor/Cacat" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(3)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
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
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Kode Pengujian</th>
                                            <th scope="col">Nama Produk Jadi</th>
                                            <th scope="col">Kategori Produk Jadi</th>
                                            <th scope="col">No Batch</th>
                                            <th scope="col">Warna</th>
                                            <th scope="col">Aroma</th>
                                            <th scope="col">Bocor / Cacat</th>
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
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['kode_spesifikasi'] }}</td>
                                            <td>{{ $row['nama_produkjadi'] }}</td>
                                            <td>{{ $row['kategori'] }}</td>
                                            <td>{{ $row['no_batch'] }}</td>
                                            <td>{{ $row['warna'] }}</td>
                                            <td>{{ $row['aroma'] }}</td>
                                            <td>{{ $row['bocorcacat'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm6" class="btn btn-primary" onclick="editdata3({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimapemeriksaanprodukjadi">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_spesifikasiprodukjadi'] }}" />
                                                    <button type="submit" class="btn btn-primary">Terima</button>
                                                </form>
                                            </td>
                                            @endif
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
<script>
    function editdata1(params) {
        setdatetoday1(1)
        $("#forminput1").attr("action", "edit_pemeriksaanbahan");
        var inputid = '<input type="hidden" name="id" class ="form-control 1" value="' + params
            .id_spesifikasibahanbaku + '"/>'
        $(inputid).insertAfter("#ambil_tanggal1")
        $("#kode_spesifikasi").val(params.kode_spesifikasi)
        $("#namabahanbaku").val(params.nama_bahanbaku)
        $("#jenis_sediaan").val(params.jenis_sediaan)
        $("#warna").val(params.warna)
        $("#aroma").val(params.aroma)
        $("#tekstur").val(params.tekstur)
        $("#bobot").val(params.bobot)
    }

    function editdata2(params) {
        setdatetoday1(2)
        $("#forminput2").attr("action", "edit_pemeriksaanbahankemas");
        var inputid = '<input type="hidden" name="id" class ="form-control 2" value="' + params
            .id_spesifikasibahankemas + '"/>'
        $(inputid).insertAfter("#ambil_tanggal2")
        $("#kode_spesifikasi1").val(params.kode_spesifikasi)
        $("#namabahanbaku1").val(params.nama_bahankemas)
        $("#jenis_sediaan1").val(params.jenis_sediaan)
        $("#warna1").val(params.warna)
        $("#jenis_bahankemas1").val(params.jenis_bahankemas)
        $("#ukuran_bahankemas1").val(params.ukuran)
        $("#bocor_cacat1").val(params.bocorcacat)
    }

    function editdata3(params) {
        setdatetoday1(3)
        $("#forminput3").attr("action", "edit_pemeriksaanprodukjadi");
        var inputid = '<input type="hidden" name="id" class ="form-control 3" value="' + params
            .id_spesifikasiprodukjadi + '"/>'
        $(inputid).insertAfter("#ambil_tanggal3")
        $("#kode_spesifikasi2").val(params.kode_spesifikasi)
        $("#namaproduk").val(params.nama_produkjadi)
        $("#kategori").val(params.kategori)
        $("#no_batch").val(params.no_batch)
        $("#warna2").val(params.warna)
        $("#aroma2").val(params.aroma)
        $("#bocor_cacat2").val(params.bocorcacat)
    }
</script>
@endsection