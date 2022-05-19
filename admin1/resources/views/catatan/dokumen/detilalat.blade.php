@extends('layout.app')
@section('title')
<title>Detail Pengoprasian Alat Utama</title>
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1>Catatan Pengoprasian Alat Utama</h1>
        <ol class="breadcrumb mb-4">Detail Pengoprasian Alat Utama</li>
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
                                        Detail Pengoprasian Alat Utama
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form method="post" action="tambah_detilalat" id='forminput1'>
                                        <div class="card mb-4">
                                            <div class="card-header" id='headertgl'></div>
                                            @csrf
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Pembersihan Alat Utama
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                                        <div class="col-sm">
                                                            <input type="datetime-local" name="mulai" class="form-control 1" id="inputEmail3" placeholder="mulai/Merek" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">selesai</label>
                                                        <div class="col-sm">
                                                            <input type="datetime-local" name="selesai" class="form-control 1" id="inputEmail3" placeholder="Tipe/Merek" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Oleh</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="oleh" class="form-control 1" id="inputEmail3" placeholder="Oleh" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="ket" class="form-control 1" id="inputEmail3" placeholder="Keterangan" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <a class="btn btn-primary" onclick="salert1(1)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
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
                            <th scope="col">Mulai</th>
                            <th scope="col">Selesai</th>
                            <th scope="col">Oleh</th>
                            <th scope="col">Keterangan</th>
                            @if(Auth::user()->level == 3)
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <?php $i = 0;
                        $i++; ?>
                        <tr>
                            <td>{{ $row['mulai'] }}</td>
                            <td>{{ $row['selesai'] }}</td>
                            <td>{{ $row['oleh'] }}</td>
                            <td>{{ $row['ket'] }}</td>
                            @if(Auth::user()->level == 3)
                            <td>
                                <button id="editdata" class="btn btn-primary" data-toggle="modal" data-target="#editalat" data-mulai="{{$newDate = date('Y-m-d\TH:i', strtotime($row['mulai']))}}" data-selesai="{{$newDate = date('Y-m-d\TH:i', strtotime($row['selesai']))}}" data-oleh="{{ $row['oleh'] }}" data-ket="{{ $row['ket'] }}" data-id="{{ $row['id_detilalat'] }}">Edit</button>
                            </td>
                            @endif
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
                        Edit Pengoprasian Alat Utama
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form method="post" action="edit_detilalat" id='forminput2'>
                        <div class="card mb-4">
                            <div class="card-header" id="headertgl">

                            </div>
                            <div class="card-header" id='headertgl'></div>
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Pembersihan Alat Utama
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                        <div class="col-sm">
                                            <input type="datetime-local" name="mulai" class="form-control 2" id="isi_mulai" placeholder="Tipe/Merek" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">selesai</label>
                                        <div class="col-sm">
                                            <input type="datetime-local" name="selesai" class="form-control 2" id="isi_selesai" placeholder="Tipe/Merek" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Oleh</label>
                                        <div class="col-sm">
                                            <input type="text" name="oleh" class="form-control 2" id="isi_oleh" placeholder="Oleh" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm">
                                            <input type="text" name="ket" class="form-control 2" id="isi_ket" placeholder="Keterangan" />
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" id="isi_id">

                                </div>
                            </div>
                            <a class="btn btn-primary" onclick="salert1(2)" href="#" style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</main>


<script>
    $(document).on('click', "#editdata", function() {
        var mulai = $(this).data('mulai');
        var selesai = $(this).data('selesai');
        var oleh = $(this).data('oleh');
        var ket = $(this).data('ket');
        var id = $(this).data('id');

        console.log("ini " + mulai + " ruangan " + selesai);
        $("#isi_mulai").val(mulai);
        $("#isi_selesai").val(selesai);
        $("#isi_oleh").val(oleh);
        $("#isi_ket").val(ket);
        $("#isi_id").val(id);
        // document.getElementById('cpbahan').value = cpid;
    })
</script>
@endsection