@extends('layout.app')
@section('title')
<title>Penanganan Keluhan</title>
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1>Catatan Penanganan Keluhan</h1>
        <ol class="breadcrumb mb-4">Penanganan Keluhan</li>
        </ol>
        <div class="row">

            <div class="card mb-4">
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" onclick="setdatetoday()">
                        Tambah Penanganan Keluhan
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Penanganan Keluhan
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form method="post" action="tambah_keluhan" id='forminput'>
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                Penanganan Keluhan
                                            </div>
                                            <div class="card-header" id="headertgl">
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                        Keluhan</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="kode_keluhan" class="form-control" id="kode_keluhan" placeholder="Kode Keluhan" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                        Customer</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="nama_customer" class="form-control" id="nama_customer" placeholder="Nama Customer" />
                                                    </div>
                                                </div>

                                                <input type="hidden" name="tanggal_keluhan" class="form-control" id="ambil_tanggal" placeholder="" />

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Keluhan</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="keluhan" class="form-control" id="keluhan" placeholder="Keluhan" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal
                                                        Tanggapi Keluhan</label>
                                                    <div class="col-sm">
                                                        <input type="date" name="tanggal_tanggapi_keluhan" class="form-control" id="tanggal_tanggapi_keluhan" placeholder="" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Produk
                                                        Yang
                                                        Digunakan</label>
                                                    <div class="col-sm">
                                                        <input list="listproduk" style="height: 35px;" id='produk_yang_digunakan' class="form-control 3" name="produk_yang_digunakan">
                                                        </input>
                                                        <datalist id="listproduk">
                                                            @foreach ($produk as $row)
                                                            <option value="{{ $row['produk_nama'] }}">
                                                                {{ $row['produk_nama'] }}
                                                            </option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penanganan
                                                        Keluhan</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="penanganan_keluhan" class="form-control" id="penanganan_keluhan" placeholder="Penanganan Keluhan" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tindak
                                                        Lanjut</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="tindak_lanjut" class="form-control" id="tindak_lanjut" placeholder="Tindak Lanjut" />
                                                    </div>
                                                </div>

                                            </div>
                                            <a class="btn btn-primary" onclick="salert()" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    @endif

                </div>

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Keluhan</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Tanggal Keluhan</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Tanggal Ditanggapi Keluhan</th>
                            <th scope="col">Produk Yang Digunakan</th>
                            <th scope="col">Penanganan Keluhan</th>
                            <th scope="col">Tindak Lanjut</th>
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
                            <td>{{ $row['kode_keluhan'] }}</td>
                            <td>{{ $row['nama_customer'] }}</td>
                            <td>{{ $row['tanggal_keluhan'] }}</td>
                            <td>{{ $row['keluhan'] }}</td>
                            <td>{{ $row['tanggal_ditanggapi'] }}</td>
                            <td>{{ $row['produk_yang_digunakan'] }}</td>
                            <td>{{ $row['penanganan_keluhan'] }}</td>
                            <td>{{ $row['tindak_lanjut'] }}</td>
                            <td><?php if ($row['status'] == 0) {
                                    echo 'Diajukan';
                                } elseif ($row['status'] == 1) {
                                    echo 'Diterima';
                                } ?></td>
                            @if (Auth::user()->level != 2)
                            <td>
                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm" class="btn btn-primary" onclick="editdata({{ $row }})">Edit</a>
                            </td>
                            @else
                            <td>
                                <form method="post" action="terimapenanganankeluhan">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $row['id_penanganankeluhan'] }}" />
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
</main>
<script>
    function editdata(params) {
        setdatetoday()
        $("#forminput").attr("action", "edit_keluhan");
        var inputid = '<input type="hidden" name="id" class ="form-control" value="' + params
            .id_penanganankeluhan + '"/>'
        $(inputid).insertAfter("#ambil_tanggal")
        $("#kode_keluhan").val(params.kode_keluhan)
        $("#nama_customer").val(params.nama_customer)
        $("#keluhan").val(params.keluhan)
        $("#tanggal_tanggapi_keluhan").val(params.tanggal_ditanggapi)
        $("#produk_yang_digunakan").val(params.produk_yang_digunakan)
        $("#penanganan_keluhan").val(params.penanganan_keluhan)
        $("#tindak_lanjut").val(params.tindak_lanjut)
    }
</script>
@endsection