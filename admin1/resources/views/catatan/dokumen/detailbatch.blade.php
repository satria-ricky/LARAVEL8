@extends('layout.app')
@section('title')
<title>Pngolahan Batch</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengolahan Batch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengolahan Batch</li>
        </ol>
        <div class="row">
            @foreach ($data as $row)
            <?php $nobatch = $row['nomor_batch'];
            $status = $row['status'];
            $awal = 0;
            $akhir = 0; ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bagian Produksi
                </div>

                <div class="card-body">


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Sesuai Dengan POB No</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['pob'] }} </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Produk
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Produk</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['kode_produk'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['nama_produk'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Batch</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['nomor_batch'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Besar Batch</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['besar_batch'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Bentuk Sediaan</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['bentuk_sedia'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kemasan</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['kemasan'] }} </p>
                        </div>
                    </div>



                </div>

            </div>
            @endforeach

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Komposisi
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" <?php if ($status > 0) {
                                                                                                            echo 'disabled';
                                                                                                        } ?>>
                        Tambah Komposisi
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Kopmosisi
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/input_komposisi" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <div class="form-group">
                                            <label for="inputName">Nama BB</label>
                                            <input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama BB" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Kode BB</label>
                                            <input type="text" name="id" class="form-control" id="inputName" placeholder="Kode BB" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMessage">Persentase</label>
                                            <input type="text" name="persen" class="form-control" id="inputName" placeholder="Persentase" />
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">
                                                Tambah
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama BB</th>
                                <th scope="col">Kode BB</th>
                                <th scope="col">Persentase (%)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($list_kom as $row)
                            <?php $i++;
                            ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['komposisi_id'] }}</td>
                                <td>{{ $row['kompisisi_nama'] }}</td>
                                <td>{{ $row['komposisi_persen'] }}</td>
                                <td>
                                    <a href="/hapus_komposisi/{{ $row['komposisi_id'] }}" type="button" class="btn btn-danger" onclick="return confirm('Hapus? ')" <?php if ($status > 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>Hapus</a>
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
                    Peralatan
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm1" <?php if ($status > 0) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                        Tambah Peralatan
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Peralatan
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/input_peralatan" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <div class="form-group">
                                            <label for="inputName">Nama Alat</label>
                                            <input name="nama" type="text" class="form-control" id="inputName" placeholder="Nama Alat" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Kode Alat</label>
                                            <input name="kode" type="text" class="form-control" id="inputName" placeholder="Kode Alat" />
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">
                                                Tambah
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Kode Alat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($list_alat as $row)
                            <?php $i++;
                            ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['peralatan_nama'] }}</td>
                                <td>{{ $row['peralatan_id'] }}</td>
                                <td>
                                    <a href="/hapus_peralatan/{{ $row['peralatan_id'] }}" type="button" class="btn btn-danger" onclick="return confirm('Hapus? ')" <?php if ($status > 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>Hapus</a>
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
                    Penimbangan
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm2" <?php if ($status > 0) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                        Data Penimbangan
                    </button>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="modalForm2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Penimbangan
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/input_penimbangan" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <div class="form-group">
                                            <label for="inputName">Kode Bahan</label>
                                            <input type="text" name="kode_bahan" class="form-control" id="inputName" placeholder="Kode Bahan" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Nama Bahan</label>
                                            <input type="text" name="nama_bahan" class="form-control" id="inputName" placeholder="Nama Bahan" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Nomor Loth</label>
                                            <input type="text" name="no_loth" class="form-control" id="inputName" placeholder="Nomor Loth" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Jumlah yang Dibutuhkan</label>
                                            <input type="text" name="jumlah_butuh" class="form-control" id="inputName" placeholder="Jumlah yang Dibutuhkan" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Jumlah yang Ditimbang</label>
                                            <input type="text" name="jumlah_timbang" class="form-control" id="inputName" placeholder="Jumlah yang Ditimbang" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Ditimbang Oleh</label>
                                            <input type="text" name="ditimbang" class="form-control" id="inputName" placeholder="Ditimbang Oleh" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Diperiksa Oleh</label>
                                            <input type="text" name="diperiksa" class="form-control" id="inputName" placeholder="Diperiksa Oleh" />
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">
                                                Tambah
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Bahan</th>
                                <th scope="col">Nama Bahan</th>
                                <th scope="col">Nomor Loth</th>
                                <th scope="col">Jml Dibutuhkan</th>
                                <th scope="col">Jml Ditimbang</th>
                                <th scope="col">Ditimbang Oleh</th>
                                <th scope="col">Diperiksa Oleh</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($list_nimbang as $row)
                            <?php $i++;
                            ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['penimbangan_kodebahan'] }}</td>
                                <td>{{ $row['penimbangan_namabahan'] }}</td>
                                <td>{{ $row['penimbangan_loth'] }}</td>
                                <td>{{ $row['penimbangan_jumlahbutuh'] }}</td>
                                <td>{{ $row['penimbangan_jumlahtimbang'] }}</td>
                                <td>{{ $row['penimbangan_timbangoleh'] }}</td>
                                <td>{{ $row['penimbangan_periksaoleh'] }}</td>
                                <td>
                                    <a href="hapus_penimbangan/{{ $row['penimbangan_id'] }}" type="button" class="btn btn-danger" onclick="return confirm('Hapus? ')">Hapus</a>
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
                    Pegolahan
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm3" <?php if ($status > 0) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                        Perlakuan
                    </button>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="modalForm3" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Masukan keterangan
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/input_olah" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <div class="form-group">
                                            <label for="inputName">Isi</label>
                                            <input type="text" name="isi" class="form-control" id="inputName" placeholder="keterangan" />
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">
                                                Tambah
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pengolahan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($list_olah as $row)
                            <?php $i++;
                            ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row['isi'] }}</td>
                                <td>
                                    <a href="/hapus_olah/{{ $row['produksi_id'] }}" type="button" class="btn btn-danger" onclick="return confirm('Hapus? ')" <?php if ($status > 0) {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <?php foreach ($rekon as $row) {
                $awal = $row['awal'];
                $akhir = $row['akhir'];
            } ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Rekonsiliasi hasil

                </div>
                <div class="card-body">

                    <form action="/input_rekonsiliasi" method="post" role="form">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                        <div class="form-group">
                            <label for="inputName">Perkiraan</label>
                            <input type="text" name="awal" value="{{ $awal }}" class="form-control" id="inputName" placeholder="keterangan" />
                        </div>
                        <div class="form-group">
                            <label for="inputName">Hasil</label>
                            <input type="text" name="akhir" value="{{ $akhir }}" class="form-control" id="inputName" placeholder="keterangan" />
                        </div>
                        @if (Auth::user()->level != 2)
                        <center>
                            <button type="submit" class="btn btn-success btn-lg" <?php if ($status > 0) {
                                                                                        echo 'disabled';
                                                                                    } ?>> Simpan
                            </button>
                        </center>
                        @endif

                    </form>
                    @if (Auth::user()->level == 2)
                    <center>
                        <form action="/pjt_pengolahanbatch" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $nobatch }}">
                            <button type="submit" class="btn btn-success btn-lg mt-5" <?php if ($status > 0) {
                                                                                            echo 'disabled';
                                                                                        } ?>>
                                Terima
                            </button>
                        </form>
                    </center>
                    @endif

                </div>
            </div>


        </div>
    </div>
</main>
@endsection