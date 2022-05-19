@extends('layout.app')
@section('title')
    <title>Penarikan Produk</title>
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Catatan Penarikan Produk</h1>
            <ol class="breadcrumb mb-4">Penarikan Produk</li>
            </ol>
            <div class="row">

                <div class="card mb-4">
                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm"
                            onclick="setdatetoday()">
                            Tambah Penarikan Produk
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Entry Penarikan Produk
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="statusMsg"></p>
                                        <form method="post" action="tambah_penarikan" id='forminput'>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Penarikan
                                                </div>
                                                <div class="card-header" id="headertgl">
                                                </div>
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                            Penarikan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="kode_penarikan" class="form-control"
                                                                id="inputEmail3" placeholder="Kode Penarikan" />
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id='ambil_tanggal' class="form-control"
                                                        name="tanggal" placeholder="" />

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Distributor</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nama_distributor"
                                                                class="form-control" id="inputEmail3"
                                                                placeholder="Nama Distributor" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Produk
                                                            Ditarik</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="produk_ditarik" class="form-control"
                                                                id="inputEmail3" placeholder="Produk Ditarik" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah
                                                            Produk Ditarik</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="jumlah_produk_ditarik"
                                                                class="form-control" id="inputEmail3"
                                                                placeholder="Jumlah Produk Ditarik" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                            Batch</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="no_batch" class="form-control"
                                                                id="inputEmail3" placeholder="No Batch" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alasan
                                                            Penarikan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="alasan_penarikan"
                                                                class="form-control" id="inputEmail3"
                                                                placeholder="Alasan Penarikan" />
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
                                <th scope="col">Kode Penarikan Produk</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Distributor</th>
                                <th scope="col">Produk Ditarik</th>
                                <th scope="col">Jumlah Produk Ditarik</th>
                                <th scope="col">No Batch</th>
                                <th scope="col">Alasan Penarikan</th>
                                <th scope="col">Status</th>
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
                                    <td>{{ $row['kode_penarikan'] }}</td>
                                    <td>{{ $row['tanggal_penarikan'] }}</td>
                                    <td>{{ $row['nama_distributor'] }}</td>
                                    <td>{{ $row['produk_ditarik'] }}</td>
                                    <td>{{ $row['jumlah_produk_ditarik'] }}</td>
                                    <td>{{ $row['no_batch'] }}</td>
                                    <td>{{ $row['alasan_penarikan'] }}</td>
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
