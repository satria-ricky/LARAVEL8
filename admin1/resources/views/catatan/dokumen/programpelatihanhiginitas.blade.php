@extends('layout.app')
@section('title')
<title>Pelatihan Hiegiene dan Sanitasi</title>
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pelatihan</h1>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pelatihan Higiene dan Sanitasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pelatihan CPKB</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Higiene dan Sanitasi</li>
                </ol>
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pelatihan Hiegiene dan Sanitasi
                            </div>
                            <div class="card-body">

                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" onclick="setdatetoday1(1)" data-toggle="modal" data-target="#modalForm1">
                                    Tambah Pelatihan Hiegiene dan Sanitasi
                                </button>
                                @endif


                                <!-- Modal -->
                                <div class="modal fade" id="modalForm1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pelatihan Higiene dan
                                                    Sanitasi</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card-header" id='headertgl1'>
                                                </div>
                                                <p class="statusMsg"></p>
                                                <form role="form" id="forminput1" action="tambah_pelatihanhiginitas" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <input type="hidden" id='ambil_tanggal1'>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="kode_pelatihan" class="form-control 1" placeholder="Kode Pelatihan" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Materi
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="materi_pelatihan" class="form-control 1" placeholder="Materi Pelatihan" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Peserta
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="peserta_pelatihan" class="form-control 1" placeholder="Peserta 1, Peserta 2,..." />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pelatih</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="pelatih" class="form-control 1" placeholder="Pelatih 1, Pelatih 2,..." />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="metode_pelatihan" class="form-control 1" placeholder="Metode Pelatihan" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jadwal</label>
                                                        <div class="col-sm">
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                                                <div class="col-sm">
                                                                    <input type="datetime-local" name="mulai" class="form-control 1" placeholder="xx/xx/xxxx" />
                                                                </div>
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Selesai</label>
                                                                <div class="col-sm">
                                                                    <input type="datetime-local" name="berakhir" class="form-control 1" placeholder="xx/xx/xxxx" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                            Penilaian</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="metode_penilaian" class="form-control 1" placeholder="Metode Penilaian" />
                                                        </div>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="salert1(1)">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pop up end -->

                                </div>
                                <table id="dataTable2" class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Pelatihan</th>
                                            <th scope="col">Materi</th>
                                            <th scope="col">Peserta</th>
                                            <th scope="col">Pelatih</th>
                                            <th scope="col">Metode Pelatihan</th>
                                            <th scope="col">Jadwal</th>
                                            <th scope="col">Metode Penilaian</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($data as $row)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row['kode_pelatihan'] }}</td>
                                            <td>{{ $row['materi_pelatihan'] }}</td>
                                            <td>{{ $row['peserta_pelatihan'] }}</td>
                                            <td>{{ $row['pelatih'] }}</td>
                                            <td>{{ $row['metode_pelatihan'] }}</td>
                                            <td>{{ $row['jadwal_mulai_pelatihan'] }} sampai
                                                {{ $row['jadwal_berakhir_pelatihan'] }}
                                            </td>
                                            <td>{{ $row['metode_penilaian'] }}</td>
                                            <td>
                                                @if (Auth::user()->level == 2)
                                                <form method="post" action="terimapelatihanhigisani">
                                                    @csrf
                                                    <input type="hidden" name="nobatch" value="{{ $row['kode_pelatihan'] }}" />
                                                    <button type="submit" class="btn btn-primary">terima</button>
                                                </form>
                                                @else
                                                <button type="button" id="klikhigi" class="btn btn-primary" data-toggle="modal" data-target="#edithigi" data-kode="{{ $row['kode_pelatihan'] }}" data-materi="{{ $row['materi_pelatihan'] }}" data-peserta="{{ $row['peserta_pelatihan'] }}" data-pelatih="{{ $row['pelatih'] }}" data-metode="{{ $row['metode_pelatihan'] }}" data-mulai="{{
                                                                $newDate = date('Y-m-d\TH:i', strtotime($row['jadwal_mulai_pelatihan']));
                                                                 }}" data-selesai="{{
                                                                $newDate = date('Y-m-d\TH:i', strtotime($row['jadwal_berakhir_pelatihan']));  }}" data-nilai="{{ $row['metode_penilaian'] }}" data-id="{{ $row['id_programpelatihan'] }}">edit</button>
                                                @endif
                                            </td>
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
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Pelatihan CPKB</li>
                </ol>
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pelatihan CPKB
                            </div>
                            <div class="card-body">

                                <!-- pop up -->
                                <!-- Button to trigger modal -->
                                @if (Auth::user()->level != 2)
                                <button class="btn btn-success btn-lg" onclick="setdatetoday1(2)" data-toggle="modal" data-target="#modalForm2">
                                    Tambah Pelatihan CPKB
                                </button>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pelatihan CPKB</h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="card-header" id='headertgl2'>
                                                </div>
                                                <p class="statusMsg"></p>
                                                <form role="form" id="forminput2" action="tambah_pelatihancpkb" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <input type="hidden" id='ambil_tanggal2'>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="kode_pelatihan" class="form-control 2" placeholder="Kode Pelatihan" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Materi
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="materi_pelatihan" class="form-control 2" placeholder="Materi Pelatihan" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Peserta
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="peserta_pelatihan" class="form-control 2" placeholder="Peserta 1, Peserta 2,..." />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pelatih</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="pelatih" class="form-control 2" placeholder="Pelatih 1, Pelatih 2,..." />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                            Pelatihan</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="metode_pelatihan" class="form-control 2" placeholder="Metode Pelatihan" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jadwal</label>
                                                        <div class="col-sm">
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                                                <div class="col-sm">
                                                                    <input type="datetime-local" name="mulai" class="form-control 2" placeholder="xx/xx/xxxx" />
                                                                </div>
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Selesai</label>
                                                                <div class="col-sm">
                                                                    <input type="datetime-local" name="berakhir" class="form-control 2" placeholder="xx/xx/xxxx" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                            Penilaian</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="metode_penilaian" class="form-control 2" placeholder="Metode Penilaian" />
                                                        </div>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="salert1(2)">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pop up end -->

                                </div>
                                <table id="dataTable1" class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Pelatihan</th>
                                            <th scope="col">Materi</th>
                                            <th scope="col">Peserta</th>
                                            <th scope="col">Pelatih</th>
                                            <th scope="col">Metode Pelatihan</th>
                                            <th scope="col">Jadwal</th>
                                            <th scope="col">Metode Penilaian</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($data1 as $row)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row['kode_pelatihan'] }}</td>
                                            <td>{{ $row['materi_pelatihan'] }}</td>
                                            <td>{{ $row['peserta_pelatihan'] }}</td>
                                            <td>{{ $row['pelatih'] }}</td>
                                            <td>{{ $row['metode_pelatihan'] }}</td>
                                            <td>{{ $row['jadwal_mulai_pelatihan'] }} sampai
                                                {{ $row['jadwal_berakhir_pelatihan'] }}
                                            </td>
                                            <td>{{ $row['metode_penilaian'] }}</td>
                                            <td>
                                                <?php if ($row['status'] == 0) {
                                                    echo 'Diajukan';
                                                } elseif ($row['status'] == 1) {
                                                    echo 'Diterima';
                                                } ?>
                                            </td>
                                            <td>
                                                @if (Auth::user()->level == 2)
                                                <form method="post" action="terimapelatihancpkb">
                                                    @csrf
                                                    <input type="hidden" name="nobatch" value="{{ $row['kode_pelatihan'] }}" />
                                                    <button type="submit" class="btn btn-primary">terima
                                                        kasih</button>
                                                </form>
                                                @else
                                                <button type="button" id="klikcpkb" class="btn btn-primary" data-toggle="modal" data-target="#editcpkb" data-kode="{{ $row['kode_pelatihan'] }}" data-materi="{{ $row['materi_pelatihan'] }}" data-peserta="{{ $row['peserta_pelatihan'] }}" data-pelatih="{{ $row['pelatih'] }}" data-metode="{{ $row['metode_pelatihan'] }}" data-mulai="{{ $newDate = date('Y-m-d\TH:i', strtotime($row['jadwal_mulai_pelatihan'])); }}" data-selesai="{{ $newDate = date('Y-m-d\TH:i', strtotime($row['jadwal_berakhir_pelatihan'])); }}" data-nilai="{{ $row['metode_penilaian'] }}" data-id="{{ $row['id_pelatihancpkb'] }}">edit</button>
                                                @endif
                                            </td>
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

    <!-- Modal edit higi sanitasi -->
    <div class="modal fade" id="edithigi" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Pelatihan Higiene dan
                        Sanitasi</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl1'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput3" action="edit_pelatihanhiginitas" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" id='ambil_tanggal1'>
                        <input type="hidden" id='higi_id' name="id">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="higi_kode" type="text" name="kode_pelatihan" class="form-control 3" placeholder="Kode Pelatihan" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Materi
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="higi_materi" type="text" name="materi_pelatihan" class="form-control 3" placeholder="Materi Pelatihan" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Peserta
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="higi_peserta" type="text" name="peserta_pelatihan" class="form-control 3" placeholder="Peserta 1, Peserta 2,..." />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Pelatih</label>
                            <div class="col-sm">
                                <input id="higi_pelatih" type="text" name="pelatih" class="form-control 3" placeholder="Pelatih 1, Pelatih 2,..." />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="higi_metode" type="text" name="metode_pelatihan" class="form-control 3" placeholder="Metode Pelatihan" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jadwal</label>
                            <div class="col-sm">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                    <div class="col-sm">
                                        <input id="higi_mulai" type="datetime-local" name="mulai" class="form-control 3" placeholder="xx/xx/xxxx" />
                                    </div>
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Selesai</label>
                                    <div class="col-sm">
                                        <input id="higi_selesai" type="datetime-local" name="berakhir" class="form-control 3" placeholder="xx/xx/xxxx" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                Penilaian</label>
                            <div class="col-sm">
                                <input id="higi_nilai" type="text" name="metode_penilaian" class="form-control 3" placeholder="Metode Penilaian" />
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary submitBtn" onclick="salert1(3)">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- pop up end -->

    </div>
    <!-- Modal -->
    <div class="modal fade" id="editcpkb" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Pelatihan CPKB</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card-header" id='headertgl2'>
                    </div>
                    <p class="statusMsg"></p>
                    <form role="form" id="forminput4" action="edit_pelatihancpkb" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" id='ambil_tanggal2'>
                        <input type="hidden" id='cpkb_id' name="id">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="cpkb_kode" type="text" name="kode_pelatihan" class="form-control 4" placeholder="Kode Pelatihan" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Materi
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="cpkb_materi" type="text" name="materi_pelatihan" class="form-control 4" placeholder="Materi Pelatihan" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Peserta
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="cpkb_peserta" type="text" name="peserta_pelatihan" class="form-control 4" placeholder="Peserta 1, Peserta 2,..." />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Pelatih</label>
                            <div class="col-sm">
                                <input id="cpkb_pelatih" type="text" name="pelatih" class="form-control 4" placeholder="Pelatih 1, Pelatih 2,..." />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                Pelatihan</label>
                            <div class="col-sm">
                                <input id="cpkb_metode" type="text" name="metode_pelatihan" class="form-control 4" placeholder="Metode Pelatihan" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jadwal</label>
                            <div class="col-sm">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai</label>
                                    <div class="col-sm">
                                        <input id="cpkb_mulai" type="datetime-local" name="mulai" class="form-control 4" placeholder="xx/xx/xxxx" />
                                    </div>
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Selesai</label>
                                    <div class="col-sm">
                                        <input id="cpkb_selesai" type="datetime-local" name="berakhir" class="form-control 4" placeholder="xx/xx/xxxx" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                Penilaian</label>
                            <div class="col-sm">
                                <input id="cpkb_nilai" type="text" name="metode_penilaian" class="form-control 4" placeholder="Metode Penilaian" />
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary submitBtn" onclick="salert1(4)">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- pop up end -->
    </div>
</main>
<script>
    function timestampToDatetimeInputString(timestamp) {
        const date = new Date((timestamp + _getTimeZoneOffsetInMs()));
        // slice(0, 19) includes seconds
        return date.toISOString().slice(0, 19);
    }

    function _getTimeZoneOffsetInMs() {
        return new Date().getTimezoneOffset() * -60 * 1000;
    }
    $(document).on('click', "#klikhigi", function() {

        var kode = $(this).data('kode');
        var materi = $(this).data('materi');
        var peserta = $(this).data('peserta');
        var pelatih = $(this).data('pelatih');
        var metode = $(this).data('metode');
        var mulai = $(this).data('mulai');
        var selesai = $(this).data('selesai');
        var nilai = $(this).data('nilai');
        var id = $(this).data('id');

        console.log("ini " + mulai + " metode " + selesai);
        $("#higi_kode").val(kode);
        $("#higi_materi").val(materi);
        $("#higi_peserta").val(peserta);
        $("#higi_pelatih").val(pelatih);
        $("#higi_metode").val(metode);
        $("#higi_mulai").val(mulai);
        $("#higi_selesai").val(selesai);
        $("#higi_nilai").val(nilai);
        $("#higi_id").val(id);

        document.getElementById('higi_mulai').value = mulai;
        document.getElementById('higi_selesai').value = selesai;
    })
    $(document).on('click', "#klikcpkb", function() {

        var kode = $(this).data('kode');
        var materi = $(this).data('materi');
        var peserta = $(this).data('peserta');
        var pelatih = $(this).data('pelatih');
        var metode = $(this).data('metode');
        var mulai = $(this).data('mulai');
        var selesai = $(this).data('selesai');
        var nilai = $(this).data('nilai');
        var id = $(this).data('id');

        console.log("ini " + materi + " metode " + metode);
        $("#cpkb_kode").val(kode);
        $("#cpkb_materi").val(materi);
        $("#cpkb_peserta").val(peserta);
        $("#cpkb_pelatih").val(pelatih);
        $("#cpkb_metode").val(metode);
        $("#cpkb_mulai").val(mulai);
        $("#cpkb_selesai").val(selesai);
        $("#cpkb_nilai").val(nilai);
        $("#cpkb_id").val(id);

        // document.getElementById('bahankode').value = kode;
        // document.getElementById('cpbahan').value = cpid;
    })
    $(document).ready(function() {
        $('#dataTable1').DataTable()
        $('#dataTable2').DataTable()
    })
</script>
@endsection