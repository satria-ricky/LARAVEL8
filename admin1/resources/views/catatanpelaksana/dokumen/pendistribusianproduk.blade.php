@extends('layout.app')
@section('title')
    <title>Pendistribusian Produk</title>
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Catatan Pendistribusian Produk</h1>
            <ol class="breadcrumb mb-4">Pendistribusian Produk</li>
            </ol>
            <div class="row">

                <div class="card mb-4">
                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm"
                            onclick="setdatetoday()">
                            Tambah Pendistribusian Produk
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Entry Pendistribusian Produk
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="statusMsg"></p>
                                        <form method="post" action="tambah_distribusi" id='forminput'>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Distribusi
                                                </div>
                                                <div class="card-header" id='headertgl'></div>
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kode
                                                            Pendistribusian</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="kode_distribusi" class="form-control"
                                                                id="inputEmail3" placeholder="Kode Pendistribusian" />
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id='ambil_tanggal' class="form-control"
                                                        name="tanggal" placeholder="" />

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                            Batch</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="no_batch" class="form-control"
                                                                id="inputEmail3" placeholder="No Batch" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Jumlah</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="jumlah" class="form-control"
                                                                id="inputEmail3" placeholder="Jumlah" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Distributor</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nama_distributor"
                                                                class="form-control" id="inputEmail3"
                                                                placeholder="Nama Distributor" />
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
                                <th scope="col">Kode Distribusi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No Batch</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Nama Distributor</th>
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
                                    <td>{{ $row['kode_distribusi'] }}</td>
                                    <td>{{ $row['tanggal'] }}</td>
                                    <td>{{ $row['id_batch'] }}</td>
                                    <td>{{ $row['jumlah'] }}</td>
                                    <td>{{ $row['nama_distributor'] }}</td>
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
