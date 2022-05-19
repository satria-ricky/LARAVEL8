@extends('layout.app')
@section('title')
<title>Kartu Stok</title>
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1>Catatan Kartu Stok</h1>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bahan Baku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bahan Kemas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Produk Antara</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="false">Produk Jadi</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Bahan Baku
                            </div>
                            <div class="card-body">
                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm4" onclick="setdatetoday1(1)">
                                    Tambah Kartu Stok Bahan Baku
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="modalForm4" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Stok Bahan Baku</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl1'></div>
                                                    <div class="card-header">Bahan Baku</div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_kartustokbahan" id='forminput1'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                                                        Baku</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 1" list="listnamabahanbaku" type="text" name='nama' id="namabahanbaku" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamabahanbaku'>
                                                                            @foreach ($bahanbaku as $row)
                                                                            <option value="{{ $row['bahanbaku_nama'] }}">
                                                                                {{ $row['bahanbaku_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal1' class="form-control 1" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="no_batch" class="form-control 1" id="no_batch" placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah" class="form-control 1" id="jumlah" placeholder="Jumlah" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                                        Distributor</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_distributor" class="form-control 1" id="nama_distributor" placeholder="Nama Distributor" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(1)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pop up end -->

                                <table class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Bahan Baku</th>
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
                                            <td>{{ $row['nama_bahan'] }}</td>
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['id_batch'] }}</td>
                                            <td>{{ $row['jumlah'] }}</td>
                                            <td>{{ $row['nama_distributor'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm4" class="btn btn-primary" onclick="editdata1({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimakartustokbahan">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_kartustokbahan'] }}" />
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
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Bahan Kemas
                            </div>
                            <div class="card-body">
                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm5" onclick="setdatetoday1(2)">
                                    Tambah Kartu Stok Bahan Kemas
                                </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm5" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Stok Bahan Kemas</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl2'></div>
                                                    <div class="card-header">Bahan Kemas</div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_kartustokbahankemas" id='forminput2'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                                                        Kemas</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 2" list="listnamakemas" type="text" name='nama' id="namabahanbaku1" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamakemas'>
                                                                            @foreach ($kemasan as $row)
                                                                            <option value="{{ $row['kemasan_nama'] }}">
                                                                                {{ $row['kemasan_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal2' class="form-control 2" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="no_batch" class="form-control 2" id="no_batch1" placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah" class="form-control 2" id="jumlah1" placeholder="Jumlah" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                                        Distributor</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_distributor" class="form-control 2" id="nama_distributor1" placeholder="Nama Distributor" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(2)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pop up end -->

                                <table class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Bahan Kemas</th>
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
                                        @foreach ($data1 as $row)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row['nama_bahankemas'] }}</td>
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['id_batch'] }}</td>
                                            <td>{{ $row['jumlah'] }}</td>
                                            <td>{{ $row['nama_distributor'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm5" class="btn btn-primary" onclick="editdata2({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimakartustokbahankemas">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_kartustokbahankemas'] }}" />
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
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Produk Antara
                            </div>
                            <div class="card-body">
                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm3" onclick="setdatetoday1(3)">
                                    Tambah Kartu Stok Produk Antara
                                </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm3" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Stok Produk Antara</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl3'></div>
                                                    <div class="card-header">Produk Antara </div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_kartustokprodukantara" id='forminput3'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk
                                                                        Antara</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 3" list="listnamaprodukantara" type="text" name='nama' id="namabahanbaku2" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamaprodukantara'>
                                                                            @foreach ($produkantara as $row)
                                                                            <option value="{{ $row['produkantara_nama'] }}">
                                                                                {{ $row['produkantara_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal3' class="form-control 3" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="no_batch" class="form-control 3" id="no_batch2" placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah" class="form-control 3" id="jumlah2" placeholder="Jumlah" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Asal Ruangan</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_distributor" class="form-control 3" id="nama_distributor2" placeholder="Asal Ruangan" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(3)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pop up end -->

                                <table class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk Antara</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">No Batch</th>
                                            <th scope="col">Jumlah Produk</th>
                                            <th scope="col">Asal Ruangan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($data2 as $row)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row['nama_produkantara'] }}</td>
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['id_batch'] }}</td>
                                            <td>{{ $row['jumlah'] }}</td>
                                            <td>{{ $row['nama_distributor'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm3" class="btn btn-primary" onclick="editdata3({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimakartustokprodukantara">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_kartustokprodukantara'] }}" />
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
                </div>
            </div>
            <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Produk Jadi
                            </div>
                            <div class="card-body">
                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm7" onclick="setdatetoday1(4)">
                                    Tambah Kartu Stok Produk Jadi
                                </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm7" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Stok Produk Jadi</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card mb-4">
                                                    <div class="card-header" id='headertgl4'></div>
                                                    <div class="card-header">Produk Jadi </div>
                                                    <div class="card-body">
                                                        <p class="statusMsg"></p>
                                                        <form role="form" method="post" action="tambah_kartustokprodukjadi" id='forminput4'>
                                                            @csrf
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="card-body">

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                                        Produk</label>
                                                                    <div class="col-sm">
                                                                        <input class="form-control 4" list="listnamaproduk" type="text" name='nama' id="namaproduk3" autocomplete="off">
                                                                        </input>
                                                                        <datalist id='listnamaproduk'>
                                                                            @foreach ($produkjadi as $row)
                                                                            <option value="{{ $row['produk_nama'] }}">
                                                                                {{ $row['produk_nama'] }}
                                                                            </option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id='ambil_tanggal4' class="form-control 4" name="tanggal" placeholder="" />

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                                        Batch</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="no_batch" class="form-control 4" id="no_batch3" placeholder="No Batch" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="jumlah" class="form-control 4" id="jumlah3" placeholder="Jumlah" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                                        Distributor</label>
                                                                    <div class="col-sm">
                                                                        <input type="text" name="nama_distributor" class="form-control 4" id="nama_distributor3" placeholder="Nama Distributor" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <a class="btn btn-primary" onclick="salert1(4)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pop up end -->

                                <table class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">No Batch</th>
                                            <th scope="col">Jumlah Produk</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($data3 as $row)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row['nama_produkjadi'] }}</td>
                                            <td>{{ $row['tanggal'] }}</td>
                                            <td>{{ $row['id_batch'] }}</td>
                                            <td>{{ $row['jumlah'] }}</td>
                                            <td><?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?></td>
                                            @if (Auth::user()->level != 2)
                                            <td>
                                                <a href="#" type="submit" data-toggle="modal" data-target="#modalForm7" class="btn btn-primary" onclick="editdata4({{ $row }})">Edit</a>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="terimakartustokprodukjadi">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row['id_kartustokprodukjadi'] }}" />
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
                </div>
            </div>
        </div>
    </div>
    <script>
        function editdata1(params) {
            setdatetoday1(1)
            $("#forminput1").attr("action", "edit_kartustockbahan");
            var inputid = '<input type="hidden" name="id" class ="form-control 1" value="' + params
                .id_kartustokbahan + '"/>'
            $(inputid).insertAfter("#ambil_tanggal1")
            $("#namabahanbaku").val(params.nama_bahan)
            $("#no_batch").val(params.id_batch)
            $("#jumlah").val(params.jumlah)
            $("#nama_distributor").val(params.nama_distributor)
        }

        function editdata2(params) {
            setdatetoday1(2)
            $("#forminput2").attr("action", "edit_kartustockbahankemas");
            var inputid = '<input type="hidden" name="id" class ="form-control 2" value="' + params
                .id_kartustokbahankemas + '"/>'
            $(inputid).insertAfter("#ambil_tanggal2")
            $("#namabahanbaku1").val(params.nama_bahankemas)
            $("#no_batch1").val(params.id_batch)
            $("#jumlah1").val(params.jumlah)
            $("#nama_distributor1").val(params.nama_distributor)
        }

        function editdata3(params) {
            setdatetoday1(3)
            $("#forminput3").attr("action", "edit_kartustockprodukantara");
            var inputid = '<input type="hidden" name="id" class ="form-control 3" value="' + params
                .id_kartustokprodukantara + '"/>'
            $(inputid).insertAfter("#ambil_tanggal3")
            $("#namabahanbaku2").val(params.nama_produkantara)
            $("#no_batch2").val(params.id_batch)
            $("#jumlah2").val(params.jumlah)
            $("#nama_distributor2").val(params.nama_distributor)
        }

        function editdata4(params) {
            setdatetoday1(4)
            $("#forminput4").attr("action", "edit_kartustockprodukjadi");
            var inputid = '<input type="hidden" name="id" class ="form-control 4" value="' + params
                .id_kartustokprodukjadi + '"/>'
            $(inputid).insertAfter("#ambil_tanggal4")
            $("#namaproduk3").val(params.nama_produkjadi)
            $("#no_batch3").val(params.id_batch)
            $("#jumlah3").val(params.jumlah)
            $("#nama_distributor3").val(params.nama_distributor)
            console.log(params);
        }
    </script>
</main>
@endsection