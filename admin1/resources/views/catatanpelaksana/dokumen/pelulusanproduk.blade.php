@extends('layout.app')
@section('title')
    <title>Pelulusan Produk Jadi</title>
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1>Catatan Pelulusan Produk Jadi</h1>
            <ol class="breadcrumb mb-4">Pelulusan Produk Jadi</li>
            </ol>
            <div class="row">

                <div class="card mb-4">
                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm"
                            onclick="setdatetoday()">
                            Tambah Pelulusan Produk Jadi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Entry Pelulusan Produk Jadi
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="statusMsg"></p>
                                        <form method="post" action="tambah_pelulusan" id='forminput'>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Produk
                                                </div>
                                                <div class="card-header" id='headertgl'>
                                                </div>
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="card-body">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Bahan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nama_bahan" class="form-control"
                                                                id="inputEmail3" placeholder="Nama Bahan" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                            Batch</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nobatch" class="form-control"
                                                                id="inputEmail3" placeholder="No Batch" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Kedaluwarsa</label>
                                                        <div class="col-sm">
                                                            <input type="datetime-local" name="kedaluwarsa"
                                                                class="form-control" id="inputEmail3" placeholder="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                            Pemasok</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nama_pemasok" class="form-control"
                                                                id="inputEmail3" placeholder="Nama Pemasok" />
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id='ambil_tanggal' class="form-control"
                                                        name="tanggal" placeholder="" />

                                                </div>

                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-table me-1"></i>
                                                        Pemeriksaan
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Warna</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="warna" class="form-control"
                                                                    id="inputEmail3" placeholder="Warna" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Bau</label>
                                                            <div class="col-sm">
                                                                <input type="bau" name="bau" class="form-control"
                                                                    id="inputEmail3" placeholder="Bau" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">pH</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="ph" class="form-control"
                                                                    id="inputEmail3" placeholder="pH" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Berat
                                                                Jenis</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="berat_jenis" class="form-control"
                                                                    id="inputEmail3" placeholder="Berat Jenis" />
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
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Bahan</th>
                                <th scope="col">No Batch</th>
                                <th scope="col">Kedaluwarsa</th>
                                <th scope="col">Nama Pemasok</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Bau</th>
                                <th scope="col">pH</th>
                                <th scope="col">Berat Jenis</th>
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
                                    <td>{{ $row['nama_bahan'] }}</td>
                                    <td>{{ $row['no_batch'] }}</td>
                                    <td>{{ $row['kedaluwarsa'] }}</td>
                                    <td>{{ $row['nama_pemasok'] }}</td>
                                    <td>{{ $row['warna'] }}</td>
                                    <td>{{ $row['bau'] }}</td>
                                    <td>{{ $row['ph'] }}</td>
                                    <td>{{ $row['berat_jenis'] }}</td>
                                    <td><?php if ($row['status'] == 0) {
                                        echo 'Diajukan';
                                    } else {
                                        echo 'Disetujui';
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
