@extends('layout.app')
@section('title')
<title>Pengolahan Batches</title>
@endsection

@section('content')
<?php $isi = $jenis; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Catatan Penerimaan Penyerahan dan Penyimpanan </h1>
        <h3 style="text-align: center;"> {{$nama}} </h3>
        @if ($isi == 1)
        <div class="row">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bahan Baku Masuk
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(1)" data-toggle="modal" data-target="#modalForm1">
                        Tambah Barang Masuk
                    </button>
                    @endif

                    <!-- Modal barang masuk-->
                    <div class="modal fade" id="modalForm1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title" id="myModalLabel">Bahan Baku Masuk</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="card-header" id='headertgl1'>
                                    </div>
                                    <p class="statusMsg"></p>
                                    <form role="form" id="forminput1" action="{{ url('tambah_penerimaanbbmasuk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="induk" value="{{ $induk }}">
                                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                Bahan Baku</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 1" placeholder="Nama Bahan Baku" name="nama_bahanbaku" value="{{$nama}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                                Dengan PROTAP
                                                No</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 1" placeholder="Nomor PROTAP" name='pob_no'>
                                            </div>
                                        </div>
                                        <input type="hidden" name="tanggal" id='ambil_tanggal1' class="form-control 1" placeholder="" />
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Loth</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 1" name="no_loth" placeholder="Nomor Loth" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Asal Produk Jadi</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 1" name="pemasok" placeholder="Pemasok" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm"><input type="text" class="form-control 1" name="jumlah" placeholder="Jumlah" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Kontrol</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 1" name="no_kontrol" placeholder="Nomor Kontrol" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="inputEmail3">Tanggal
                                                Kadaluarsa</label>
                                            <div class="col-sm">
                                                <input type="date" name="kedaluwarsa" class="form-control 1" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(1)">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pop up end -->
                    <table id="dataTable" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">PROTAP</th>
                                <th scope="col">Nama Bahan</th>
                                <th scope="col">No Loth</th>
                                <th scope="col">Asal Produk Jadi</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">No. Control</th>
                                <th scope="col">Tgl. Kadaluarsa</th>
                                @if (Auth::user()->level != 2)
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data1 as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['no_pob'] }}</td>
                                <td>{{ $row['nama_bahan'] }}</td>
                                <td>{{ $row['no_loth'] }}</td>
                                <td>{{ $row['pemasok'] }}</td>
                                <td>{{ $row['jumlah'] }}</td>
                                <td>{{ $row['no_kontrol'] }}</td>
                                <td>{{ $row['kedaluwarsa'] }}</td>
                                @if (Auth::user()->level != 2)
                                <td>
                                    <button id="klikbahanmasuk" data-toggle="modal" data-target="#editbahanmasuk" data-tanggal="{{ $row['tanggal'] }}" data-nama="{{ $row['nama_bahan'] }}" data-noloth="{{ $row['no_loth'] }}" data-pemasok="{{ $row['pemasok'] }}" data-nokontrol="{{ $row['no_loth'] }}" data-jumlah="{{ $row['jumlah'] }}" data-protap="{{ $row['no_pob'] }}" data-id={{ $row['id_ppbahanbaku'] }} class="btn btn-primary">Edit</button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bahan Baku Keluar
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(2)" data-toggle="modal" data-target="#modalForm2">
                        Tambah Barang Keluar
                    </button>
                    @endif

                    <!-- Modal bahan keluar -->
                    <div class="modal fade" id="modalForm2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Bahan Baku Keluar</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="card-header" id='headertgl2'>
                                    </div>
                                    <p class="statusMsg"></p>
                                    <form role="form" id="forminput2" action="{{ url('tambah_penerimaanbbkeluar') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="induk" value="{{ $induk }}">
                                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                Bahan Baku</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 2" placeholder="Nama Bahan Baku" name="nama_bahanbaku" value="{{$nama}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                                Distributor</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 2" placeholder="Untuk Distributor" name="untuk_produk">
                                            </div>
                                        </div>
                                        <input type="hidden" name="tanggal" id='ambil_tanggal2' class="form-control 2" placeholder="" />
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Batch</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 2" name="no_batch" placeholder="Nomor Batch" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm"><input type="text" class="form-control 2" name="jumlah" placeholder="Jumlah" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Sisa</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 2" name="sisa" placeholder="Sisa" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(2)">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->
                    <table id="dataTable1" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Bahan</th>
                                <th scope="col">Untuk Distributor</th>
                                <th scope="col">No Batch</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sisa</th>
                                @if (Auth::user()->level != 2)
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data2 as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['nama_bahan'] }}</td>
                                <td>{{ $row['untuk_produk'] }}</td>
                                <td>{{ $row['no_batch'] }}</td>
                                <td>{{ $row['jumlah'] }}</td>
                                <td>{{ $row['sisa'] }}</td>
                                @if (Auth::user()->level != 2)
                                <td>
                                    <button type="button" id="klikbahankeluar" data-toggle="modal" data-target="#editbahankeluar" data-tanggal={{ $row['tanggal'] }} data-nama={{ $row['nama_bahan'] }} data-produk={{ $row['untuk_produk'] }} data-nobatch={{ $row['no_batch'] }} data-jumlah={{ $row['jumlah'] }} data-sisa={{ $row['sisa'] }} data-id={{ $row['id_ppbahanbakukeluar'] }} class="btn btn-primary">Edit</button>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @elseif ($isi == 2)
        <div class="row">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Produk Jadi Masuk
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(3)" data-toggle="modal" data-target="#modalForm3">
                        Produk Jadi Masuk
                    </button>
                    @endif

                    <!-- Modal Produk masuk -->
                    <div class="modal fade" id="modalForm3" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title" id="myModalLabel">Produk Jadi Masuk</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="card-header" id='headertgl3'>
                                    </div>
                                    <p class="statusMsg"></p>
                                    <form role="form" id="forminput3" action="{{ url('tambah_penerimaanprdukmasuk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="induk" value="{{ $induk }}">
                                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                Produk Jadi</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 3" placeholder="Nama Produk Jadi" name="nama_produkjadi">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label" value="{{$nama}}" readonly>Sesuai
                                                Dengan PROTAP
                                                No</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 3" placeholder="Nomor PROTAP" name='pob_no'>
                                            </div>
                                        </div>
                                        <input type="hidden" name="tanggal" id='ambil_tanggal3' class="form-control 3" placeholder="" />
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Loth</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 3" name="no_loth" placeholder="Nomor Loth" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Asal Produk Jadi</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 3" name="pemasok" placeholder="Pemasok" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm"><input type="text" class="form-control 3" name="jumlah" placeholder="Jumlah" />
                                                <p style="font-size: 10px">contoh : 10 Kg</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Kontrol</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 3" name="no_kontrol" placeholder="Nomor Kontrol" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="inputEmail3">Tanggal
                                                Kadaluarsa</label>
                                            <div class="col-sm">
                                                <input type="date" name="kedaluwarsa" class="form-control 3" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(3)">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->
                    <table id="dataTable2" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">PROTAP</th>
                                <th scope="col">Nama Produk Jadi</th>
                                <th scope="col">No Loth</th>
                                <th scope="col">Asal Produk Jadi</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">No. Control</th>
                                <th scope="col">Tgl. Kadaluarsa</th>
                                @if (Auth::user()->level != 2)
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data1 as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['no_pob'] }}</td>
                                <td>{{ $row['nama_produkjadi'] }}</td>
                                <td>{{ $row['no_loth'] }}</td>
                                <td>{{ $row['pemasok'] }}</td>
                                <td>{{ $row['jumlah'] }}</td>
                                <td>{{ $row['no_kontrol'] }}</td>
                                <td>{{ $row['kedaluwarsa'] }}</td>
                                @if (Auth::user()->level != 2)
                                <td>
                                    <button type="button" id="klikprodukmasuk" data-toggle="modal" data-target="#editprodukmasuk" data-tanggal="{{ $row['tanggal'] }}" data-nama="{{ $row['nama_produkjadi'] }}" data-noloth="{{ $row['no_loth'] }}" data-pemasok="{{ $row['pemasok'] }}" data-nokontrol="{{ $row['no_loth'] }}" data-jumlah="{{ $row['jumlah'] }}" data-protap="{{ $row['no_pob'] }}" data-id={{ $row['id_produkjadimasuk'] }} class="btn btn-primary">Edit</button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Produk Jadi Keluar
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(4)" data-toggle="modal" data-target="#modalForm4">
                        Tambah Produk Keluar
                    </button>
                    @endif

                    <!-- Modal produk keluar-->
                    <div class="modal fade" id="modalForm4" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Produk Jadi Keluar</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="card-header" id='headertgl4'>
                                    </div>
                                    <p class="statusMsg"></p>
                                    <form role="form" id="forminput4" action="{{ url('tambah_penerimaanprodukkeluar') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="induk" value="{{ $induk }}">
                                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                Produk Jadi</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 4" placeholder="Nama Produk Jadi" name="nama_produk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                                Distributor</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 4" placeholder="Untuk Distributor" name="untuk_produk">
                                            </div>
                                        </div>
                                        <input type="hidden" name="tanggal" id='ambil_tanggal4' class="form-control 4" placeholder="" />
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Batch</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 4" name="no_batch" placeholder="Nomor Batch" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm"><input type="text" class="form-control 4" name="jumlah" placeholder="Jumlah" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Sisa</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 4" name="sisa" placeholder="Sisa" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(4)">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->
                    <table id="dataTable3" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Untuk Distributor</th>
                                <th scope="col">No Batch</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sisa</th>
                                @if (Auth::user()->level != 2)
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data2 as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['nama_produk'] }}</td>
                                <td>{{ $row['untuk_produk'] }}</td>
                                <td>{{ $row['no_batch'] }}</td>
                                <td>{{ $row['jumlah'] }}</td>
                                <td>{{ $row['sisa'] }}</td>
                                @if (Auth::user()->level != 2)
                                <td>

                                    <button type="submit" id="klikprodukkeluar" data-toggle="modal" data-target="#editprodukkeluar" data-tanggal={{ $row['tanggal'] }} data-nama="{{ $row['nama_produk'] }}" data-produk="{{ $row['untuk_produk'] }}" data-nobatch={{ $row['no_batch'] }} data-jumlah="{{ $row['jumlah'] }}" data-sisa="{{ $row['sisa'] }}" data-id={{ $row['id_ppprodukjadikeluar'] }} class="btn btn-primary">Edit</button>

                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Kemasan Masuk
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(5)" data-toggle="modal" data-target="#modalForm5">
                        Tambah Kemasan Masuk
                    </button>
                    @endif

                    <!-- Modal kemasan masuk -->
                    <div class="modal fade" id="modalForm5" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title" id="myModalLabel">Kemasan Masuk</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="card-header" id='headertgl5'>
                                    </div>
                                    <p class="statusMsg"></p>
                                    <form role="form" id="forminput5" action="{{ url('tambah_penerimaakemasanmasuk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="induk" value="{{ $induk }}">
                                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                Kemasan</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 5" placeholder="Nama Produk Jadi" name="nama_kemasan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                                Dengan PROTAP
                                                No</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 5" placeholder="Nomor PROTAP" name='pob_no'>
                                            </div>
                                        </div>
                                        <input type="hidden" name="tanggal" id='ambil_tanggal5' class="form-control 5" placeholder="" />
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Loth</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 5" name="no_loth" placeholder="Nomor Loth" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Asal Produk Jadi</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 5" name="pemasok" placeholder="Pemasok" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm"><input type="text" class="form-control 5" name="jumlah" placeholder="Jumlah" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Kontrol</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 5" name="no_kontrol" placeholder="Nomor Kontrol" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="inputEmail3">Tanggal
                                                Kadaluarsa</label>
                                            <div class="col-sm">
                                                <input type="date" name="kedaluwarsa" class="form-control 5" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(5)">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->
                    <table id="dataTable4" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">PROTAP</th>
                                <th scope="col">Nama Produk Jadi</th>
                                <th scope="col">No Loth</th>
                                <th scope="col">Asal Produk Jadi</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">No. Control</th>
                                <th scope="col">Tgl. Kadaluarsa</th>
                                @if (Auth::user()->level != 2)
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data1 as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['no_pob'] }}</td>
                                <td>{{ $row['nama_kemasan'] }}</td>
                                <td>{{ $row['no_loth'] }}</td>
                                <td>{{ $row['pemasok'] }}</td>
                                <td>{{ $row['jumlah'] }}</td>
                                <td>{{ $row['no_kontrol'] }}</td>
                                <td>{{ $row['kedaluwarsa'] }}</td>
                                @if (Auth::user()->level != 2)
                                <td>
                                    <button type="button" id="klikkemasanmasuk" data-toggle="modal" data-target="#editkemasanmasuk" data-tanggal="{{ $row['tanggal'] }}" data-nama="{{ $row['nama_kemasan'] }}" data-noloth="{{ $row['no_loth'] }}" data-pemasok="{{ $row['pemasok'] }}" data-nokontrol="{{ $row['no_loth'] }}" data-jumlah="{{ $row['jumlah'] }}" data-protap="{{ $row['no_pob'] }}" data-id={{ $row['id_kemasanmasuk'] }} class="btn btn-primary">Edit</button>

                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Kemasan Keluar
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(6)" data-toggle="modal" data-target="#modalForm6">
                        Kemasan Keluar
                    </button>
                    @endif

                    <!-- Modal Kemasan Keluar-->
                    <div class="modal fade" id="modalForm6" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Kemasan Keluar</h4>
                                </div>

                                <!-- Modal Body-->
                                <div class="modal-body">
                                    <div class="card-header" id='headertgl6'>
                                    </div>
                                    <p class="statusMsg"></p>
                                    <form role="form" id="forminput6" action="{{ url('tambah_penerimaankemasankeluar') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="induk" value="{{ $induk }}">
                                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                Kemasan</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 6" placeholder="Nama Kemasan" name="nama_kemasan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                                Distributor</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 6" placeholder="Untuk Distributor" name="untuk_produk">
                                            </div>
                                        </div>
                                        <input type="hidden" name="tanggal" id='ambil_tanggal6' class="form-control 6" placeholder="" />
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                                Batch</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 6" name="no_batch" placeholder="Nomor Batch" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm"><input type="text" class="form-control 6" name="jumlah" placeholder="Jumlah" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Sisa</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control 6" name="sisa" placeholder="Sisa" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(6)">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->
                    <table id="dataTable5" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Untuk Distributor</th>
                                <th scope="col">No Batch</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sisa</th>
                                @if (Auth::user()->level != 2)
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data2 as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['nama_kemasan'] }}</td>
                                <td>{{ $row['untuk_produk'] }}</td>
                                <td>{{ $row['no_batch'] }}</td>
                                <td>{{ $row['jumlah'] }}</td>
                                <td>{{ $row['sisa'] }}</td>
                                @if (Auth::user()->level != 2)
                                <td>
                                    <button type="button" id="klikkemasankeluar" data-toggle="modal" data-target="#editkemasankeluar" data-tanggal={{ $row['tanggal'] }} data-nama={{ $row['nama_bahan'] }} data-produk={{ $row['untuk_produk'] }} data-nobatch={{ $row['no_batch'] }} data-jumlah={{ $row['jumlah'] }} data-sisa={{ $row['sisa'] }} data-id={{ $row['id_ppkemasankeluar'] }} class="btn btn-primary">Edit</button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @endif
    </div>
    {{-- Modal --}}
    <!-- Modal barang masuk-->
    <div class="modal fade" id="editbahanmasuk" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Edit Bahan Baku Masuk</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl1'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput7" action="{{ url('edit_penerimaanbbmasuk') }}" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="induk" value="{{ $induk }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <input type="hidden" name="id" id="id_bahanmasuk">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                Bahan Baku</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 7" placeholder="Nama Bahan Baku" name="nama_bahanbaku" id="bahanmasuk_nama" value="{{$nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                Dengan PROTAP
                                No</label>
                            <div class="col-sm">
                                <input type="text" id="bahanmasuk_protap" class="form-control 7" placeholder="Nomor PROTAP" name='pob_no'>
                            </div>
                        </div>
                        <input type="hidden" name="tanggal" id='ambil_tanggal1' class="tanggal" placeholder="" />
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Loth</label>
                            <div class="col-sm">
                                <input type="text" id="bahanmasuk_noloth" class="tanggal" name="no_loth" placeholder="Nomor Loth" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Asal Produk Jadi</label>
                            <div class="col-sm">
                                <input type="text" id="bahanmasuk_pemasok" class="form-control 7" name="pemasok" placeholder="Pemasok" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm"><input type="text" id="bahanmasuk_jumlah" class="form-control 7" name="jumlah" placeholder="Jumlah" /></div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Kontrol</label>
                            <div class="col-sm">
                                <input type="text" id="bahanmasuk_nokontrol" class="form-control 7" name="no_kontrol" placeholder="Nomor Kontrol" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="inputEmail3">Tanggal
                                Kadaluarsa</label>
                            <div class="col-sm">
                                <input type="date" id="bahanmasuk_kadaluarsa" name="kedaluwarsa" class="form-control 7" />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(7)">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal bahan keluar -->
    <div class="modal fade" id="editbahankeluar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Bahan Baku Keluar</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl2'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput8" action="{{ url('edit_penerimaanbbkeluar') }}" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="induk" value="{{ $induk }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <input type="hidden" name="id" id="id_bahankeluar">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                Bahan Baku</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 8" placeholder="Nama Bahan Baku" name="nama_bahanbaku" id="bahankeluar_nama" value="{{$nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                Distributor</label>
                            <div class="col-sm">
                                <input type="text" id="bahankeluar_produk" class="form-control 8" placeholder="Untuk Distributor" name="untuk_produk">
                            </div>
                        </div>
                        <input type="hidden" name="tanggal" id='ambil_tanggal2' class="tanggal" placeholder="" />
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Batch</label>
                            <div class="col-sm">
                                <input type="text" id="bahankeluar_nobatch" class="form-control 8" name="no_batch" placeholder="Nomor Batch" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm"><input type="text" id="bahankeluar_jumlah" class="form-control 8" name="jumlah" placeholder="Jumlah" /></div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Sisa</label>
                            <div class="col-sm">
                                <input type="text" id="bahankeluar_sisa" class="form-control 8" name="sisa" placeholder="Sisa" />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(8)">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Produk masuk -->
    <div class="modal fade" id="editprodukmasuk" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Edit Produk Jadi Masuk</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl3'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput9" action="{{ url('edit_penerimaanprdukmasuk') }}" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="induk" value="{{ $induk }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <input type="hidden" name="id" id="id_produkmasuk">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                Produk Jadi</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 9" placeholder="Nama Produk Jadi" name="nama_produkjadi" id="produkmasuk_nama" value="{{$nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                                Dengan PROTAP
                                No</label>
                            <div class="col-sm">
                                <input type="text" id="produkmasuk_protap" class="form-control 9" placeholder="Nomor PROTAP" name='pob_no'>
                            </div>
                        </div>
                        <input type="hidden" name="tanggal" id='ambil_tanggal3' class="tanggal" placeholder="" />
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Loth</label>
                            <div class="col-sm">
                                <input type="text" id="produkmasuk_noloth" class="form-control 9" name="no_loth" placeholder="Nomor Loth" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Asal Produk Jadi</label>
                            <div class="col-sm">
                                <input type="text" id="produkmasuk_pemasok" class="form-control 9" name="pemasok" placeholder="Pemasok" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm"><input type="text" id="produkmasuk_jumlah" class="form-control 9" name="jumlah" placeholder="Jumlah" /></div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Kontrol</label>
                            <div class="col-sm">
                                <input type="text" id="produkmasuk_nokontrol" class="form-control 9" name="no_kontrol" placeholder="Nomor Kontrol" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="inputEmail3" id="produkmasuk_kadaluarsa">Tanggal
                                Kadaluarsa</label>
                            <div class="col-sm">
                                <input type="date" id="produkmasuk_kadaluarsa" name="kedaluwarsa" class="form-control 9" />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(9)">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal produk keluar-->
    <div class="modal fade" id="editprodukkeluar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Produk Jadi Keluar</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl4'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput10" action="{{ url('edit_penerimaanprodukkeluar') }}" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="induk" value="{{ $induk }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <input type="hidden" name="id" id="id_produkkeluar">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                Produk Jadi</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 10" placeholder="Nama Produk Jadi" name="nama_produk" id="produkkeluar_nama" value="{{$nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                Distributor</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 10" placeholder="Untuk Distributor" name="untuk_produk" id="produkkeluar_produk">
                            </div>
                        </div>
                        <input type="hidden" name="tanggal" id='ambil_tanggal4' class="tanggal" placeholder="" />
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Batch</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 10" name="no_batch" placeholder="Nomor Batch" id="produkkeluar_nobatch" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm"><input type="text" class="form-control 10" name="jumlah" placeholder="Jumlah" id="produkkeluar_jumlah" /></div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Sisa</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 10" name="sisa" placeholder="Sisa" id="produkkeluar_sisa" />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(10)">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal kemasan masuk -->
    <div class="modal fade" id="editkemasanmasuk" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Edit Kemasan Masuk</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl5'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput11" action="{{ url('edit_penerimaakemasanmasuk') }}" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="induk" value="{{ $induk }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <input type="hidden" name="id" id="id_kemasanmasuk>
                            <div class=" form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                            Kemasan</label>
                        <div class="col-sm">
                            <input type="text" class="form-control 11" placeholder="Nama Produk Jadi" name="nama_kemasan" id="kemasanmasuk_nama" value="{{$nama}}" readonly>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sesuai
                        Dengan PROTAP
                        No</label>
                    <div class="col-sm">
                        <input type="text" class="form-control 11" placeholder="Nomor PROTAP" name='pob_no' id="kemasanmasuk_protap">
                    </div>
                </div>
                <input type="hidden" name="tanggal" id='ambil_tanggal5' class="tanggal" placeholder="" />
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                        Loth</label>
                    <div class="col-sm">
                        <input type="text" class="form-control 11" name="no_loth" placeholder="Nomor Loth" id="kemasanmasuk_noloth" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Asal Produk Jadi</label>
                    <div class="col-sm">
                        <input type="text" class="form-control 11" name="pemasok" placeholder="Pemasok" id="kemasanmasuk_pemasok" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm"><input type="text" class="form-control 11" name="jumlah" placeholder="Jumlah" id="kemasanmasuk_jumlah" /></div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                        Kontrol</label>
                    <div class="col-sm">
                        <input type="text" class="form-control 11" name="no_kontrol" placeholder="Nomor Kontrol" id="kemasanmasuk_nokontrol" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3" id="kemasanmasuk_kadaluarsa">Tanggal
                        Kadaluarsa</label>
                    <div class="col-sm">
                        <input type="date" id="kemasanmasuk_kadaluarsa" name="kedaluwarsa" class="form-control 11" />
                    </div>
                </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="salert1(11)">Tambah</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Kemasan Keluar-->
    <div class="modal fade" id="editkemasankeluar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Kemasan Keluar</h4>
                </div>

                <!-- Modal Body-->
                <div class="modal-body">
                    <div class="card-header" id='headertgl6'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput12" action="{{ url('edit_penerimaankemasankeluar') }}" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="induk" value="{{ $induk }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <input type="hidden" name="id" id="id_kemasankeluar">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                Kemasan</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 12" placeholder="Nama Kemasan" name="nama_kemasan" id="kemasankeluar_nama" value="{{$nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                Distributor</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 12" placeholder="Untuk Distributor" name="untuk_produk" id="kemasankeluar_produk">
                            </div>
                        </div>
                        <input type="hidden" name="tanggal" id='ambil_tanggal6' class="tanggal" placeholder="" />
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Nomer
                                Batch</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 12" name="no_batch" placeholder="Nomor Batch" id="kemasankeluar_nobatch" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm"><input type="text" class="form-control 12" name="jumlah" placeholder="Jumlah" id="kemasankeluar_jumlah" /></div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Sisa</label>
                            <div class="col-sm">
                                <input type="text" class="form-control 12" name="sisa" placeholder="Sisa" id="kemasankeluar_sisa" />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitBtn" onclick="salert1(12)">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    <script>
        $(document).on('click', "#klikbahanmasuk", function() {

            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var jumlah = $(this).data('jumlah');
            var protap = $(this).data('protap');
            var noloth = $(this).data('noloth');
            var nokontrol = $(this).data('nokontrol');
            var pemasok = $(this).data('pemasok');
            var kadaluarsa = $(this).data('kadaluarsa');
            var id = $(this).data('id');

            console.log("ini " + protap + " jumlah " + jumlah + " kadaluarsa " + tanggal + " noloth " + noloth);
            $("#bahanmasuk_nama").val(nama);
            $("#bahanmasuk_jumlah").val(jumlah);
            $("#bahanmasuk_tanggal").val(tanggal);
            $("#bahanmasuk_protap").val(protap);
            $("#bahanmasuk_noloth").val(noloth);
            $("#bahanmasuk_nokontrol").val(nokontrol);
            $("#bahanmasuk_pemasok").val(pemasok);
            $("#id_bahanmasuk").val(id);
            document.getElementById('bahanmasuk_kadaluarsa').value = kadaluarsa;

        })
        $(document).on('click', "#klikprodukmasuk", function() {

            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var jumlah = $(this).data('jumlah');
            var protap = $(this).data('protap');
            var noloth = $(this).data('noloth');
            var nokontrol = $(this).data('nokontrol');
            var pemasok = $(this).data('pemasok');
            var kadaluarsa = $(this).data('kadaluarsa');
            var id = $(this).data('id');

            console.log("ini " + protap + " jumlah " + jumlah + " tanggal " + tanggal + " noloth " + noloth);
            $("#produkmasuk_nama").val(nama);
            $("#produkmasuk_jumlah").val(jumlah);
            $("#produkmasuk_tanggal").val(tanggal);
            $("#produkmasuk_protap").val(protap);
            $("#produkmasuk_noloth").val(noloth);
            $("#produkmasuk_nokontrol").val(nokontrol);
            $("#produkmasuk_pemasok").val(pemasok);
            $("#id_produkmasuk").val(id);
            document.getElementById('produkmasuk_kadaluarsa').value = kadaluarsa;
        })
        $(document).on('click', "#klikkemasanmasuk", function() {

            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var jumlah = $(this).data('jumlah');
            var protap = $(this).data('protap');
            var noloth = $(this).data('noloth');
            var nokontrol = $(this).data('nokontrol');
            var pemasok = $(this).data('pemasok');
            var kadaluarsa = $(this).data('kadaluarsa');
            var id = $(this).data('id');

            console.log("ini " + protap + " jumlah " + jumlah + " tanggal " + tanggal + " noloth " + noloth);
            $("#kemasanmasuk_nama").val(nama);
            $("#kemasanmasuk_jumlah").val(jumlah);
            $("#kemasanmasuk_tanggal").val(tanggal);
            $("#kemasanmasuk_protap").val(protap);
            $("#kemasanmasuk_noloth").val(noloth);
            $("#kemasanmasuk_nokontrol").val(nokontrol);
            $("#kemasanmasuk_pemasok").val(pemasok);
            $("#id_kemasanmasuk").val(id);
            document.getElementById('kemasanmasuk_kadaluarsa').value = kadaluarsa;
        })

        $(document).on('click', "#klikbahankeluar", function() {
            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var jumlah = $(this).data('jumlah');
            var nobatch = $(this).data('nobatch');
            var sisa = $(this).data('sisa');
            var produk = $(this).data('produk');
            var id = $(this).data('id');

            console.log("ini " + nama + " jumlah " + jumlah + " tanggal " + tanggal + " nobatch " + nobatch);
            $("#bahankeluar_nama").val(nama);
            $("#bahankeluar_jumlah").val(jumlah);
            $("#bahankeluar_tanggal").val(tanggal);
            $("#bahankeluar_nobatch").val(nobatch);
            $("#bahankeluar_sisa").val(sisa);
            $("#bahankeluar_produk").val(produk);
            $("#id_bahankeluar").val(id);
        })
        $(document).on('click', "#klikprodukkeluar", function() {

            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var jumlah = $(this).data('jumlah');
            var nobatch = $(this).data('nobatch');
            var sisa = $(this).data('sisa');
            var produk = $(this).data('produk');
            var id = $(this).data('id');

            console.log("ini " + nama + " jumlah " + jumlah + " tanggal " + tanggal + " nobatch " + nobatch);
            $("#produkkeluar_nama").val(nama);
            $("#produkkeluar_jumlah").val(jumlah);
            $("#produkkeluar_tanggal").val(tanggal);
            $("#produkkeluar_nobatch").val(nobatch);
            $("#produkkeluar_sisa").val(sisa);
            $("#produkkeluar_produk").val(produk);
            $("#id_produkmasuk").val(id);
        })
        $(document).on('click', "#klikkemasankeluar", function() {
            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var jumlah = $(this).data('jumlah');
            var nobatch = $(this).data('nobatch');
            var sisa = $(this).data('sisa');
            var produk = $(this).data('produk');
            var id = $(this).data('id');

            console.log("ini " + nama + " jumlah " + jumlah + " tanggal " + tanggal + " nobatch " + nobatch);
            $("#kemasankeluar_nama").val(nama);
            $("#kemasankeluar_jumlah").val(jumlah);
            $("#kemasankeluar_tanggal").val(tanggal);
            $("#kemasankeluar_nobatch").val(nobatch);
            $("#kemasankeluar_sisa").val(sisa);
            $("#kemasankeluar_produk").val(produk);
            $("#id_kemasankeluar").val(id);
        })



        $(document).ready(function() {
            $('#dataTable').DataTable()
            $('#dataTable1').DataTable()
            $('#dataTable2').DataTable()
            $('#dataTable3').DataTable()
            $('#dataTable4').DataTable()
            $('#dataTable5').DataTable()
        })
    </script>
</main>



@endsection