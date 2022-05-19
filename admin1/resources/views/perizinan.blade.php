@extends('layout.app')
@section('title')
<title>Perizinan</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">PERIZINAN </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">PERIZINAN</li>
        </ol>
        <div class="row">

            <!--  -->
            <div class="card mb-4">

                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                        Tambah Perizinan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Perizinan
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/input_perizinan" method="post" enctype="multipart/form-data" role="form">

                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="form-group">
                                            <label for="inputName">Nama Perizinan</label>
                                            <input type="text" class="form-control" id="inputName" name="nama" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Pilih File Perizinan</label>
                                            <input type="file" name="upload" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submitBtn" onclick="salert()">
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
                                <th scope="col">Nama Perizinan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach($list_perizinan as $row)
                            <?php $i++; 
                            $nama = $row['perizinan_nama'];
                            ?>
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$row['perizinan_nama']}}</td>
                                <td><a href="/hapus_perizinan/{{$row['perizinan_id']}}" type="button" class="btn btn-danger" onclick="return confirm('Hapus {{$nama}}? ')">Hapus</a>
                                    <a href="/asset/perizinan/{{$row['perizinan_file']}}" button type="button" class="btn btn-primary">Buka</button>
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