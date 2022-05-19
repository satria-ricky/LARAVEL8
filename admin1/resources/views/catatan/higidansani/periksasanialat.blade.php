@extends('layout.app')
@section('title')
    <title>COA</title>
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Peralatan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Catatan Pembersihan Peralatan</li>
            </ol>
            <div class="row">
                <!-- Entry Data -->
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        <!-- Modal -->

                        <!-- pop up end -->
                        <div class="table-responsive-lg">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pembersihan Alat
                            </div>
                            <button class="btn btn-success btn-lg mt-3" data-toggle="modal" data-target="#modalForm">
                                Tambah Pembersihan Alat
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalForm" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">
                                                Tambah Pembersihan Alat
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="tambah_periksaalat" method="post" id="forminput">
                                                <div class="card-header" id='headertglx'></div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        @csrf
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="tanggal" id='ambil_tanggalx'
                                                            class="form-control" placeholder="" />
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Ruangan</label>
                                                        <div class="col-sm">
                                                            <select style="height: 35px;" class="form-control"
                                                                name="nama_ruangan" id="nama_ruangan">
                                                                <option value="">Choose...
                                                                </option>
                                                                @foreach ($data1 as $row)
                                                                    <option value="{{ $row['nama_ruangan'] }}">
                                                                        {{ $row['nama_ruangan'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Alat</label>
                                                        <div class="col-sm">
                                                            <input placeholder="Nama Alat" class="form-control"
                                                                name="nama_alat" type="text" id="nama_alat" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Bagian
                                                            Alat</label>
                                                        <div class="col-sm">
                                                            <input placeholder="Bagian Alat" class="form-control"
                                                                name="bagian_alat" id="bagian_alat" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Cara
                                                            Pembersihan</label>
                                                        <div class="col-sm">
                                                            <input placeholder="Cara Pembersihan" class="form-control"
                                                                name="cara_pembersihan" id="cara_pembersihan" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Pelaksana</label>
                                                        <div class="col-sm">
                                                            <input placeholder="Pelaksana" class="form-control"
                                                                name="pelaksana" id="pelaksana" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Keterangan</label>
                                                        <div class="col-sm">
                                                            <input placeholder="Keterangan" class="form-control"
                                                                name="keterangan" id="keterangan" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 d-flex justify-content-center">
                                                        <a class="btn btn-primary" onclick="salert()" href="#"
                                                            style="float:left;  margin-left:25px" role="button">Tambah
                                                            Catatan Pembersihan Alat</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Ruangan</th>
                                        <th scope="col">Nama Alat</th>
                                        <th scope="col">Bagian Alat</th>
                                        <th scope="col">Cara Pembersihan</th>
                                        <th scope="col">Pelaksana</th>
                                        <th scope="col">Persetujuan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($data as $row)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['nama_ruangan'] }}</td>
                                            <td>{{ $row['nama_alat'] }}</td>
                                            <td>{{ $row['bagian_alat'] }}</td>
                                            <td>{{ $row['cara_pembersihan'] }}</td>
                                            <td>{{ $row['pelaksana'] }}</td>
                                            <td>{{ $row['persetujuan'] }}</td>
                                            <td>{{ $row['keterangan'] }}</td>
                                            <td>
                                                @if ($row['status'] == 0)
                                                    Diajukan
                                                @else
                                                    Diterima
                                                @endif
                                            </td>
                                            @if (Auth::user()->level != 2)
                                                <td>
                                                    <a href="#" type="submit" data-toggle="modal" data-target="#modalForm"
                                                        class="btn btn-primary"
                                                        onclick="editdata({{ $row }})">Edit</a>
                                                </td>
                                            @else
                                                <td>
                                                    <form method="post" action="terimapemusnahanprodukjadi">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $row['id_periksaalat'] }}" />
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
                <script>
                    function editdata(params) {
                        $("#forminput").attr("action", "edit_periksaalat");
                        var inputid = '<input type="hidden" name="id" class ="form-control " value="' + params
                            .id_periksaalat + '"/>'
                        $(inputid).insertAfter("#ambil_tanggalx")
                        console.log(params);
                        $("#nama_ruangan").val(params.nama_ruangan)
                        $("#nama_alat").val(params.nama_alat)
                        $("#bagian_alat").val(params.bagian_alat)
                        $("#cara_pembersihan").val(params.cara_pembersihan)
                        $("#pelaksana").val(params.pelaksana)
                        $("#keterangan").val(params.keterangan)
                    }
                </script>
    </main>
@endsection
