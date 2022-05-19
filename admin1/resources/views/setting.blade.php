@extends('layout.app')
@section('title')
<title>Pengaturan</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Setting</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Setting Company</li>
        </ol>
        <div class="row">


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Company
                </div>
                <div class="card-body">

                    <form action="/input_company" method="post" enctype="multipart/form-data" role="form">

                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group row" margin-bottom=10px;>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="{{ $nama }}" class="form-control" id="inputEmail3" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row" margin-bottom=10px;>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" value="{{ $alamat }}" class="form-control" id="inputEmail3" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row" margin-bottom=10px;>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">No. telp</label>
                            <div class="col-sm-10">
                                <input type="text" name="telp" value="{{ $no_hp }}" class="form-control" id="inputEmail3" placeholder="No. Telp">
                            </div>
                        </div>

                        <div class="form-group row" margin-bottom=10px;>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-7">
                                <input type="file" name="upload" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="col-sm-3" margin-bottom=10px;>
                                <img src="asset/logo/{{ $logo }}" style="height: 150px; width:auto" class="img-fluid mt-5" alt="Responsive image" background-repeat:>

                            </div>

                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" href="/input_company" onclick="salert()">SIMPAN</button>

                        </center>

                </div>
            </div>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Produk
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm5">
                        Tambah Produk
                    </button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Kode Produk</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($list_produk as $row)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['produk_nama'] }}</td>
                                <td>{{ $row['produk_kode'] }}</td>
                                <td>
                                    <a href="#" onclick="hapussetting({msg: 'Apakah Anda Yakin Hapus Produk Ini?',id:{{ $row['produk_id'] }},url:'hapus_produk'})" class="btn btn-danger">Hapus</a>
                                    {{-- <a href="/hapus_produk/{{ $row['produk_id'] }}" type="button"
                                    class="btn btn-danger" onclick="return confirm('Hapus? ')">Hapus</a> --}}
                                </td>
                            </tr>
                            <?php $i++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Kemasan
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm6">
                        Tambah Kemasan
                    </button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Kemasan</th>
                                <th scope="col">Kode Kemasan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($list_kemasan as $row)
                            <?php $i++;
                            $nama = $row['kemasan_nama'];
                            ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['kemasan_nama'] }}</td>
                                <td>{{ $row['kemasan_kode'] }}</td>
                                <td>
                                    <a href="#" onclick="hapussetting({msg: 'Apakah Anda Yakin Hapus Kemasan Ini?',id:{{ $row['kemasan_id'] }},url:'hapus_kemasan'})" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bahan Baku
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm7">
                        Tambah Bahan Baku
                    </button>





                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Kode Produk</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($list_bahanbaku as $row)
                            <?php $i++;

                            ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['bahanbaku_nama'] }}</td>
                                <td>{{ $row['bahanbaku_kode'] }}</td>
                                <td>
                                    <a href="#" onclick="hapussetting({msg: 'Apakah Anda Yakin Hapus Bahan Baku Ini?',id:{{ $row['bahanbaku_id'] }},url:'hapus_bahanbaku'})" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Produk
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm1">
                        Tambah Produk Antara
                    </button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk Antara</th>
                                <th scope="col">Kode Produk Antara</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($list_produkantara as $row)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['produkantara_nama'] }}</td>
                                <td>{{ $row['produkantara_kode'] }}</td>
                                <td>
                                    <a href="#" onclick="hapussetting({msg: 'Apakah Anda Yakin Hapus Produk Antara Ini?',id:{{ $row['produkantara_id'] }},url:'hapus_produkantara'})" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>



        </div>
        </form>
</main>

<!-- Modal -->
<div class="modal fade" id="modalForm5" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="/input_produk" method="post" enctype="multipart/form-data" role="form" id="forminput1">

                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="inputName">Nama Produk</label>
                        <input type="text" name="nama" class="form-control 1" id="inputName" placeholder="Nama Produk" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Kode Produk</label>
                        <input type="text" name="kode" class="form-control 1" id="inputName" placeholder="Kode Produk" />
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="#" type="submit" class="btn btn-primary submitBtn" onclick="salert1(1)">Tambah</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- pop up end -->

<!-- Modal -->
<div class="modal fade" id="modalForm6" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah Kemasan</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="/input_kemasan" method="post" enctype="multipart/form-data" role="form" id="forminput2">

                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="inputName">Kemasan</label>
                        <input type="text" name="nama" class="form-control 2" id="inputName" placeholder="Nama kemasan" />
                    </div>
                    <div class="form-group">
                        <label for="inputName">Kemasan</label>
                        <input type="text" name="kode" class="form-control 2" id="inputName" placeholder="Kode Kemasan" />
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="#" type="submit" class="btn btn-primary submitBtn" onclick="salert1(2)">Tambah</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- pop up end -->

<!-- Modal -->
<div class="modal fade" id="modalForm7" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah Bahan Baku</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="/input_bahanbaku" method="post" enctype="multipart/form-data" role="form" id='forminput3'>

                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="inputName">Nama Bahan Baku</label>
                        <input type="text" name="nama" class="form-control 3" id="inputName" placeholder="Nama Bahan Baku" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Kode Bahan Baku</label>
                        <input type="text" name="kode" class="form-control 3" id="inputName" placeholder="Kode Bahan Baku" />
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="#" type="submit" class="btn btn-primary submitBtn" onclick="salert1(3)">Tambah</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- pop up end -->
<!-- Modal -->
<div class="modal fade" id="modalForm1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah Produk Antara</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="/input_produkantara" method="post" enctype="multipart/form-data" role="form" id="forminput4">

                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="inputName">Nama Produk Antara</label>
                        <input type="text" name="nama" class="form-control 4" id="inputName" placeholder="Nama Produk" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Kode Produk Antara</label>
                        <input type="text" name="kode" class="form-control 4" id="inputName" placeholder="Kode Produk" />
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="#" type="submit" class="btn btn-primary submitBtn" onclick="salert1(4)">Tambah</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- pop up end -->
@endsection