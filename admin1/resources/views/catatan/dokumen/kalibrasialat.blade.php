@extends('layout.app')
@section('title')
<title>Kalibrasi Alat</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kalibrasi Alat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kalibrasi Alat</li>
        </ol>
        <div class="row">

            <div class="card mb-4">
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" onclick="setdatetoday()">
                        Tambah Kalibrasi Alat
                    </button>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Kalibrasi Alat
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form method="post" action="tambah_kalibrasialat" enctype="multipart/form-data" id='forminput'>
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                Kalibrasi Alat
                                            </div>
                                            <div class="card-header" id="headertgl">
                                            </div>
                                            @csrf
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="card-body">

                                                <input type="hidden" id='ambil_tanggal' class="form-control" name="tanggal" placeholder="" />

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                        Alat</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="nama_alat" class="form-control" id="nama_alat" placeholder="Nama Alat" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="exampleFormControlFile1">Dokumen Kalibrasi</label>
                                                    <div class="col-sm">
                                                        <input type="file" name="file" class="form-control" id="fileform" onchange="return filecheck()">
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

                </div>

                <table id="dataTable" class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Alat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($data as $row)
                        <?php
                        $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row['nama_alat'] }}</td>
                            <td>
                                <a href="asset/kalibrasi_alat/{{ $row['nama_file'] }}" class="btn btn-primary">Buka</a>
                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm" class="btn btn-primary" onclick="editdata({{ $row }})">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    })

    function editdata(params) {
        setdatetoday()
        $("#forminput").attr("action", "edit_kalibrasialat");
        var inputid = '<input type="hidden" id="id" name="id" class ="form-control" value="' + params
            .kalibrasi_id + '"/>'
        var filename = '<input type="hidden" id="filename" name="filename" class ="form-control" value="' + params
            .nama_file + '"/>'
        $(inputid).insertAfter("#ambil_tanggal")
        $(filename).insertAfter("#ambil_tanggal")
        $("#nama_alat").val(params.nama_alat)
        var source = '<p>' + params.nama_file + ' <i class="fas fa-download"></i> <a href="asset/kalibrasi_alat/' +
            params
            .nama_file +
            '" >Buka</a></p> '
        $(source).insertBefore("#fileform")
    }
</script>
@endsection