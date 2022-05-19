@extends('layout.app')
@section('title')
<title>Spesifikasi Produk Antara</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> Spesifikasi Produk Antara </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{session('pabrik')}}</li>
        </ol>
        <div class="row">

            <!--  -->
            <div class="card mb-4">

                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                        Tambah Spesifikasi Produk Antara
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Masukan Data
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/tambah_produk_antara" method="post" enctype="multipart/form-data" role="form">

                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="form-group">
                                            <label for="inputName">Keterangan</label>
                                            <input type="text" class="form-control" id="inputName" name="nama" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Pilih File</label>
                                            <input onchange="return filecheck()" type="file" name="upload" class="form-control-file" id="exampleFormControlFile1" onchange="return filecheck()">
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submitBtn"  onclick="salert()">
                                                Tambah
                                            </button>
                                        </div>


                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach($list as $row)
                            <?php $i++;
                            ?>
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$row['keterangan']}}</td>
                                <td>
                                    <a href="/hapus_produk_antara/{{$row['spesifikasi_id']}}" type="button" class="btn btn-danger" onclick="return confirm('Hapus ? ')">Hapus</a>
                                    <a href="/asset/coa/{{$row['file']}}" button type="button" class="btn btn-primary">Buka</button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- <a class="btn btn-primary" href="#">Edit</a>
                    <a class="btn btn-primary" href="#">Cetak</a> -->

</main>
@endsection