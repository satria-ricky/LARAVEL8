@extends('layout.app')
@section('title')
<title>Pengemasan Batch</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengemasan Batch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengolahan Batch</li>
        </ol>
        <div class="row">
            @foreach ($data as $row)
            <?php $nobatch = $row['id_pengemasanbatchproduk'];
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
                            <p class="form-control"> {{ $row['protap'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ruangan</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['protap'] }} </p>
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
                            <p class="form-control"> {{ $row['no_batch'] }} </p>
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
                            <p class="form-control"> {{ $row['bentuksediaan'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kemasan</label>
                        <div class="col-sm-10">
                            <p class="form-control"> {{ $row['kemasan'] }} </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mulai</label>
                        <div class="col-sm-4">
                            <p class="form-control"> {{ $row['mulai'] }} </p>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Selesai</label>
                        <div class="col-sm-4">
                            <p class="form-control"> {{ $row['selesai'] }} </p>
                        </div>
                    </div>


                </div>

            </div>
            @endforeach

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    PENERIMAAN DAN REKONSILIASI BAHAN PENGEMAS
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" <?php if ($status > 0) {
                                                                                                            echo 'disabled';
                                                                                                        } ?>>
                        Tambah Data
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        PENERIMAAN DAN REKONSILIASI BAHAN PENGEMAS
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/tambah_prkemas" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                    Kemasan</label>
                                                <div class="col-sm">
                                                    <input placeholder="Nama Kemasan" class="form-control" list="listnamaproduk" type="text" name='nama' id="namaproduk">
                                                    </input>
                                                    <datalist id='listnamaproduk'>
                                                        @foreach ($kemasan as $row)
                                                        <option value="{{ $row['kemasan_nama'] }}">
                                                            {{ $row['kemasan_nama'] }}
                                                        </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                    kemasan</label>
                                                <div class="col-sm">
                                                    <input type="text" name="kode" readonly class="form-control" id="kodeproduk" placeholder="Kode Kemasan" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="butuh" class="col-sm-3 col-form-label">Jumlah Dibutuhkan</label>
                                                <div class="col-sm">
                                                    <input type="text" name="jbutuh" class="form-control" id="butuh" placeholder="Jumlah Dibutuhkan" />
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label for="tolak" class="col-sm-3 col-form-label">Jumlah Ditolak</label>
                                                <div class="col-sm">
                                                    <input type="text" name="jtolak" class="form-control" id="tolak" placeholder="Jumlah Ditolak" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tolak" class="col-sm-3 col-form-label">No QC</label>
                                                <div class="col-sm">
                                                    <input type="text" name="noqc" class="form-control" id="tolak" placeholder="No QC" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="butuh" class="col-sm-3 col-form-label">Jumlah Dipakai</label>
                                                <div class="col-sm">
                                                    <input type="text" name="jpakai" class="form-control" id="butuh" placeholder="Jumlah Dipakai" />
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label for="tolak" class="col-sm-3 col-form-label">Jumlah Dikembalikan</label>
                                                <div class="col-sm">
                                                    <input type="text" name="jkembali" class="form-control" id="tolak" placeholder="Jumlah Dikembalikan" />
                                                </div>
                                            </div>

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
                                <th scope="col" rowspan="2">Kode Bahan</th>
                                <th scope="col" rowspan="2">Nama Bahan Pengemas</th>
                                <th scope="col" colspan="2" style="text-align: center;">Jumlah</th>
                                <th scope="col" rowspan="2">No QC</th>
                                <th scope="col" colspan="2" style="text-align: center;">Jumlah</th>

                            </tr>
                            <tr>
                                <th scope="col">Dibutuhkan</th>
                                <th scope="col">Ditolak</th>
                                <th scope="col">Dipakai</th>
                                <th scope="col">Dikembalikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prkemas as $row)
                            <tr>
                                <td>{{$row['kode_kemas']}}</td>
                                <td>{{$row['nama_kemas']}}</td>
                                <td>{{$row['j_butuh']}}</td>
                                <td>{{$row['j_tolak']}}</td>
                                <td>{{$row['no_qc']}}</td>
                                <td>{{$row['j_pakai']}}</td>
                                <td>{{$row['j_kembali']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    PROSEDUR PENGISIAN
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm1" <?php if ($status > 0) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                        Tambah Data
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Prosedur Pengisian
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/tambah_proisi" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <div class="form-group">
                                            <label for="inputName">Isi</label>
                                            <input name="isi" type="text" class="form-control" id="inputName" placeholder="Keterangan" />
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
                                <th scope="col">Prosedur Pengisian</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($proisi as $row)
                            <tr>
                                <td>
                                    {{$i}}
                                </td>
                                <td>
                                    {{$row['isi']}}
                                </td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    PROSEDUR PENANDAAN DAN PENGEMASAN
                </div>
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm2" <?php if ($status > 0) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                        Tambah Data
                    </button>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="modalForm2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Prosedur Penandaan
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="/tambah_protanda" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="nobatch" value="{{ $nobatch }}" />
                                        <div class="form-group">
                                            <label for="inputName">Isi</label>
                                            <input type="text" name="isi" class="form-control" id="inputName" placeholder="Keterangan" />
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
                                <th scope="col">Prosedur Penanddaan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($protanda as $row)
                            <tr>
                                <td>
                                    {{$i}}
                                </td>
                                <td>
                                    {{$row['isi']}}
                                </td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>
<script>
    const kemasans = JSON.parse('<?= json_encode($kemasan) ?>')
    $("#namaproduk").change(function() {

        var cekname = kemasans.find(kemasan => kemasan.kemasan_nama ===
            document.getElementById('namaproduk').value)?.kemasan_nama;
        console.log('halo ' + cekname);
        if (typeof kemasans === 'object') {
            console.log("object kemasans")
            Object.keys(kemasans).forEach(function(key) {
                console.log(kemasans[key]);
                tmp.push(kemasans[key]);
            })
        }
        // console.log("tmp bahanbakus", tmp)
        kemasans = tmp;

        if (cekname) {
            document.getElementById('kodeproduk').value = kemasan.find(kemasan => kemasan.kemasan_nama ===
                document.getElementById('namaproduk').value).kemasan_kode
        } else {
            document.getElementById('kodeproduk').value = ""
        }
    });
</script>
@endsection