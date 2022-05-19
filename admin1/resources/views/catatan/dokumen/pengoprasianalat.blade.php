@extends('layout.app')
@section('title')
<title>Pengoprasian Alat Utama</title>
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1>Catatan Pengoprasian Alat Utama</h1>
        <ol class="breadcrumb mb-4">Pengoprasian Alat Utama</li>
        </ol>
        <div class="row">

            <div class="card mb-4">

                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    @if (Auth::user()->level != 2)
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" onclick="setdatetoday()">
                        Tambah Pengoprasian Alat Utama
                    </button>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Pengoprasian Alat Utama
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form method="post" action="tambah_operasialat" id='forminput2'>
                                        <div class="card mb-4">
                                            <div class="card-header" id="headertgl">

                                            </div>
                                            <div class="card-header" id='headertgl'></div>
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                Pengoprasian Alat Utama
                                            </div>
                                            @csrf
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pelaksanaan
                                                        Sesuai PROTAP</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="pelaksanaan_pob" class="form-control 2" id="inputEmail3" placeholder="NO PROTAP" />
                                                    </div>
                                                </div>

                                                <input type="hidden" id='ambil_tanggal' class="form-control 2" name="tanggal" placeholder="" />

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                        Alat</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="nama_alat" class="form-control 2" id="inputEmail3" placeholder="Nama Alat" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tipe/Merek</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="tipemerek" class="form-control 2" id="inputEmail3" placeholder="Tipe/Merek" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ruang</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="ruang" class="form-control 2" id="inputEmail3" placeholder="Ruang" />
                                                    </div>
                                                </div>

                                            </div>

                                            <a class="btn btn-primary" onclick="salert1(2)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
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
                            <th scope="col">No POB</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Alat</th>
                            <th scope="col">Tipe/Merek</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <?php $i = 0;
                        $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row['pob'] }}</td>
                            <td>{{ $row['tanggal'] }}</td>
                            <td>{{ $row['nama_alat'] }}</td>
                            <td>{{ $row['tipe_merek'] }}</td>
                            <td>{{ $row['ruang'] }}</td>
                            <td>
                                <?php if ($row['status'] == 0) {
                                    echo 'Diajukan';
                                } elseif ($row['status'] == 1) {
                                    echo 'Diterima';
                                } ?>
                            </td>
                            <td>

                                @if (Auth::user()->level == 2)
                                <form method="post" action="terimaoperasialat">
                                    @csrf
                                    <input type="hidden" name="nobatch" value="{{ $row['id_operasi'] }}" />
                                    <button @if ($row['status']=='1' ) {{'disabled'}} @endif type="submit" class="btn btn-primary">terima</button>
                                </form>
                                @else
                                <form method="post" action="detil-alat" class="float-left mr-2">
                                    @csrf
                                    <input type="hidden" name="induk" value="{{ $row['id_operasi'] }}" />
                                    <button type="submit" class="btn btn-primary">lihat</button>
                                </form>
                                <button id="editdata" type="button" class="btn btn-success" data-toggle="modal" data-target="#editalat" data-nama="{{ $row['nama_alat'] }}" data-protap="{{ $row['pob'] }}" data-ruangan="{{ $row['ruang'] }}" data-merek="{{ $row['tipe_merek'] }}" data-tanggal="{{ $row['tanggal'] }}" data-id="{{ $row['id_operasi'] }}">edit</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editalat" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Entry Pengoprasian Alat Utama
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form method="post" action="edit_operasialat" id='forminput1'>
                        <input type="hidden" name="id" id="isi_id">
                        <div class="card mb-4">
                            <div class="card-header" id='headertgl'></div>
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pengoprasian Alat Utama
                            </div>
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pelaksanaan
                                        Sesuai PROTAP</label>
                                    <div class="col-sm">
                                        <input type="text" name="pelaksanaan_pob" class="form-control 1" id="isi_protap" placeholder="NO PROTAP" />
                                    </div>
                                </div>

                                {{-- <input type="hidden" id='ambil_tanggal' class="form-control 1" name="tanggal" placeholder="" /> --}}

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                        Alat</label>
                                    <div class="col-sm">
                                        <input type="text" name="nama_alat" class="form-control 1" id="isi_nama" placeholder="Nama Alat" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tipe/Merek</label>
                                    <div class="col-sm">
                                        <input type="text" name="tipemerek" class="form-control 1" id="isi_tipe" placeholder="Tipe/Merek" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ruang</label>
                                    <div class="col-sm">
                                        <input type="text" name="ruang" class="form-control 1" id="isi_ruang" placeholder="Ruang" />
                                    </div>
                                </div>

                            </div>

                            <a class="btn btn-primary" onclick="salert1(1)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</main>
<script>
    $(document).on('click', "#editdata", function() {
        var nama = $(this).data('nama');
        var merek = $(this).data('merek');
        var ruangan = $(this).data('ruangan');
        var protap = $(this).data('protap');
        var tanggal = $(this).data('tanggal');
        var id = $(this).data('id');

        console.log("ini " + nama + " ruangan " + ruangan);
        $("#isi_nama").val(nama);
        $("#isi_tipe").val(merek);
        $("#isi_ruang").val(ruangan);
        $("#isi_protap").val(protap);
        $("#isi_id").val(id);
        // document.getElementById('cpbahan').value = cpid;
    })
</script>

@endsection