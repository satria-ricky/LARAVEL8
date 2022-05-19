@extends('layout.app')
@section('title')
    <title>Pengoprasian Alat Utama</title>
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Catatan Pengoprasian Alat Utama</h1>
            <ol class="breadcrumb mb-4">Pengoprasian Alat Utama</li>
            </ol>
            <div class="row">

                <div class="card mb-4">

                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm"
                            onclick="setdatetoday()">
                            Tambah Pengoprasian Alat Utama
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Entry Pengoprasian Alat Utama
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="statusMsg"></p>
                                        <form method="post" action="tambah_operasialat" id='forminput'>
                                            <div class="card mb-4">
                                                <div class="card-header" id="headertgl">

                                                </div>
                                                <div class="card-header" id='headertgl'></div>
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Pengoprasian Alat Utama
                                                </div>
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pelaksanaan
                                                            Sesuai POB</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="pelaksanaan_pob" class="form-control"
                                                                id="inputEmail3" placeholder="NO POB" />
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id='ambil_tanggal' class="form-control"
                                                        name="tanggal" placeholder="" />

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Alat</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nama_alat" class="form-control"
                                                                id="inputEmail3" placeholder="Nama Alat" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Tipe/Merek</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="tipemerek" class="form-control"
                                                                id="inputEmail3" placeholder="Tipe/Merek" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Ruang</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="ruang" class="form-control"
                                                                id="inputEmail3" placeholder="Ruang" />
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-table me-1"></i>
                                                        Pembersihan Alat Utama
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Mulai</label>
                                                            <div class="col-sm">
                                                                <input type="datetime-local" name="mulai"
                                                                    class="form-control" id="inputEmail3"
                                                                    placeholder="Tipe/Merek" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">selesai</label>
                                                            <div class="col-sm">
                                                                <input type="datetime-local" name="selesai"
                                                                    class="form-control" id="inputEmail3"
                                                                    placeholder="Tipe/Merek" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Oleh</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="oleh" class="form-control"
                                                                    id="inputEmail3" placeholder="Oleh" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Keterangan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="ket" class="form-control"
                                                                    id="inputEmail3" placeholder="Keterangan" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <a class="btn btn-primary" onclick="salert()" href="#"
                                                    style="float:left; width: 100px;  margin-left:25px"
                                                    role="button">Simpan</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->

                    </div>

                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No POB</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Tipe/Merek</th>
                                <th scope="col">Ruang</th>
                                <th scope="col">Mulai</th>
                                <th scope="col">Selesai</th>
                                <th scope="col">Oleh</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <?php $i = 0;
                                $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row['pob'] }}</td>
                                    <td>{{ $row['tanggal'] }}</td>
                                    <td>{{ $row['nama_alat'] }}</td>
                                    <td>{{ $row['tipe_merek'] }}</td>
                                    <td>{{ $row['ruang'] }}</td>
                                    <td>{{ $row['mulai'] }}</td>
                                    <td>{{ $row['selesai'] }}</td>
                                    <td>{{ $row['oleh'] }}</td>
                                    <td>{{ $row['ket'] }}</td>
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
    </main>
@endsection
