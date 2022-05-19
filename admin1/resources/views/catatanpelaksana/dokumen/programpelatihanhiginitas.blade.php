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
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">Pelatihan Higiene dan Sanitasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Pelatihan CPKB</a>
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
                                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(1)" data-toggle="modal"
                                        data-target="#modalForm1">
                                        Tambah Pelatihan Hiegiene dan Sanitasi
                                    </button>

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
                                                    <form role="form" id="forminput1" action="tambah_pelatihanhiginitas"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" id='ambil_tanggal1'>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="kode_pelatihan"
                                                                    class="form-control 1" id="inputEmail3"
                                                                    placeholder="Kode Pelatihan" required />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Materi
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="materi_pelatihan"
                                                                    class="form-control 1" id="inputEmail3"
                                                                    placeholder="Materi Pelatihan" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Peserta
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="peserta_pelatihan"
                                                                    class="form-control 1" id="inputEmail3"
                                                                    placeholder="Peserta 1, Peserta 2,..." />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Pelatih</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="pelatih" class="form-control 1"
                                                                    id="inputEmail3"
                                                                    placeholder="Pelatih 1, Pelatih 2,..." />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="metode_pelatihan"
                                                                    class="form-control 1" id="inputEmail3"
                                                                    placeholder="Metode Pelatihan" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-2 col-form-label">Jadwal</label>
                                                            <div class="col-sm">
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Mulai</label>
                                                                    <div class="col-sm">
                                                                        <input type="datetime-local" name="mulai"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="xx/xx/xxxx" />
                                                                    </div>
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Selesai</label>
                                                                    <div class="col-sm">
                                                                        <input type="datetime-local" name="berakhir"
                                                                            class="form-control 1" id="inputEmail3"
                                                                            placeholder="xx/xx/xxxx" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                                Penilaian</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="metode_penilaian"
                                                                    class="form-control 1" id="inputEmail3"
                                                                    placeholder="Metode Penilaian" />
                                                            </div>
                                                        </div>

                                                        <!-- Modal Footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary submitBtn"
                                                                onclick="salert1(1)">Tambah</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- pop up end -->

                                    </div>
                                    <table class="table mt-5">
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
                                                        {{ $row['jadwal_berakhir_pelatihan'] }}</td>
                                                    <td>{{ $row['metode_penilaian'] }}</td>
                                                    <td>
                                                        <form method="post" action="detil_batch">
                                                            <input type="hidden" name="_token" value="" />
                                                            <input type="hidden" name="nobatch" value="" />
                                                            <button type="submit" class="btn btn-primary">Buka</button>
                                                        </form>
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
                                    <button class="btn btn-success btn-lg" onclick="setdatetoday1(2)" data-toggle="modal"
                                        data-target="#modalForm2">
                                        Tambah Pelatihan Hiegiene dan Sanitasi
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm2" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Pelatihan Higiene dan
                                                        Sanitasi</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="card-header" id='headertgl2'>
                                                    </div>
                                                    <p class="statusMsg"></p>
                                                    <form role="form" id="forminput2" action="tambah_pelatihancpkb"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" id='ambil_tanggal2'>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kode
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="kode_pelatihan"
                                                                    class="form-control 2" id="inputEmail3"
                                                                    placeholder="Kode Pelatihan" required />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Materi
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="materi_pelatihan"
                                                                    class="form-control 2" id="inputEmail3"
                                                                    placeholder="Materi Pelatihan" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Peserta
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="peserta_pelatihan"
                                                                    class="form-control 2" id="inputEmail3"
                                                                    placeholder="Peserta 1, Peserta 2,..." />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-3 col-form-label">Pelatih</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="pelatih" class="form-control 2"
                                                                    id="inputEmail3"
                                                                    placeholder="Pelatih 1, Pelatih 2,..." />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                                Pelatihan</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="metode_pelatihan"
                                                                    class="form-control 2" id="inputEmail3"
                                                                    placeholder="Metode Pelatihan" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3"
                                                                class="col-sm-2 col-form-label">Jadwal</label>
                                                            <div class="col-sm">
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Mulai</label>
                                                                    <div class="col-sm">
                                                                        <input type="datetime-local" name="mulai"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="xx/xx/xxxx" />
                                                                    </div>
                                                                    <label for="inputEmail3"
                                                                        class="col-sm-3 col-form-label">Selesai</label>
                                                                    <div class="col-sm">
                                                                        <input type="datetime-local" name="berakhir"
                                                                            class="form-control 2" id="inputEmail3"
                                                                            placeholder="xx/xx/xxxx" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Metode
                                                                Penilaian</label>
                                                            <div class="col-sm">
                                                                <input type="text" name="metode_penilaian"
                                                                    class="form-control 2" id="inputEmail3"
                                                                    placeholder="Metode Penilaian" />
                                                            </div>
                                                        </div>

                                                        <!-- Modal Footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary submitBtn"
                                                                onclick="salert1(2)">Tambah</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- pop up end -->

                                    </div>
                                    <table class="table mt-5">
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
                                                        {{ $row['jadwal_berakhir_pelatihan'] }}</td>
                                                    <td>{{ $row['metode_penilaian'] }}</td>
                                                    <td>
                                                        <form method="post" action="detil_batch">
                                                            <input type="hidden" name="_token" value="" />
                                                            <input type="hidden" name="nobatch" value="" />
                                                            <button type="submit" class="btn btn-primary">Buka</button>
                                                        </form>
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
    </main>
@endsection
