@extends('layout.app')
@section('title')
    <title>COA</title>
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ruangan </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Catatan Pembersihan Ruangan</li>
            </ol>
            <div class="row">
                <!-- Entry Data -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Pembersihan Alat pada Ruangan
                    </div>
                    <div class="card-body">
                        <!-- pop up -->
                        <!-- Button to trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Entry Data
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pop up end -->
                        <div class="table-responsive-lg">
                            <form action="tambah_periksaruang" method="post" id="forminput">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="card-header mb-4" id='headertglx'></div>
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="tanggal" id='ambil_tanggalx' class="form-control"
                                            placeholder="" />
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Pembersihan</label>
                                        <div class="col-sm-3">
                                            <select style="height: 35px;" class="form-control" name="waktu"
                                                id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="Pagi">Pagi</option>
                                                <option value="Sore">Sore</option>
                                            </select>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>

                                            <tr>
                                                <th scope="col" style="width:5%" class="text-center">No</th>
                                                <th scope="col" style="width:47%">Nama Ruangan</th>
                                                <th scope="col" style="width:47%;padding-left:5%;">Item yang
                                                    Dibersihkan
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td scope="col" class="text-center">1</td>
                                            <td scope="col" class="text-center">
                                                <div class="form-group row">
                                                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu</label> -->
                                                    <div class="col-sm">
                                                        <input class="form-control" type='text' placeholder="Ruangan"
                                                            style="height: 35px;" name="nama_ruangan"
                                                            id="inlineFormCustomSelect">
                                                        </input>
                                                    </div>
                                                </div>
                                            </td>
                                            <td scope="col">

                                                <div style="padding-left:10%;" class="form-group row">
                                                    <div class="col-sm-6">Lantai</div>
                                                    <div class="col-sm-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name='lantai' value="Belum">
                                                            <input type="checkbox" name="lantai"
                                                                class="custom-control-input" value="Sudah"
                                                                id="customSwitch1">
                                                            <label class="custom-control-label"
                                                                for="customSwitch1">Sudah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-left:10%;" class="form-group row">
                                                    <div class="col-sm-6">Dinding</div>
                                                    <div class="col-sm-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name='dinding' value="Belum">
                                                            <input type="checkbox" name="dinding"
                                                                class="custom-control-input" value="Sudah"
                                                                id="customSwitch2">
                                                            <label class="custom-control-label"
                                                                for="customSwitch2">Sudah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-left:10%;" class="form-group row">
                                                    <div class="col-sm-6">Meja</div>
                                                    <div class="col-sm-5">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name='meja' value="Belum">
                                                            <input type="checkbox" name="meja" class="custom-control-input"
                                                                value="Sudah" id="customSwitch3">
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Sudah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-left:10%;" class="form-group row">
                                                    <div class="col-sm-6">Jendela</div>
                                                    <div class="col-sm-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name='jendela' value="Belum">
                                                            <input type="checkbox" name="jendela"
                                                                class="custom-control-input" value="Sudah"
                                                                id="customSwitch4">
                                                            <label class="custom-control-label"
                                                                for="customSwitch4">Sudah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-left:10%;" class="form-group row">
                                                    <div class="col-sm-6">Langit-langit/ Plafon</div>
                                                    <div class="col-sm-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name='langit' value="Belum">
                                                            <input type="checkbox" name="langit"
                                                                class="custom-control-input" value="Sudah"
                                                                id="customSwitch5">
                                                            <label class="custom-control-label"
                                                                for="customSwitch5">Sudah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-left:10%;" class="form-group row">
                                                    <div class="col-sm-6">Kontainer</div>
                                                    <div class="col-sm-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="hidden" name='kontainer' value="Belum">
                                                            <input type="checkbox" name="kontainer"
                                                                class="custom-control-input" value="Sudah"
                                                                id="customSwitch6">
                                                            <label class="custom-control-label"
                                                                for="customSwitch6">Sudah</label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                            <td scope="col" class="justify-content-center"></td>
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <a class="btn btn-primary" onclick="salert()" href="#"
                                            style="float:left;  margin-left:25px" role="button">Tambah Catatan
                                            Kebersihan Ruangan</a>
                            </form>
                        </div>
                    </div>
                    <table class="table" style="margin-top: 50px">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Item Yang Dibersihkan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $row)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row['tanggal'] }}</td>
                                    <td>{{ $row['waktu'] }}</td>
                                    <td>{{ $row['nama_ruangan'] }}</td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Lantai: {{ $row['lantai'] }}</li>
                                            <li class="list-group-item">Dinding: {{ $row['dinding'] }}</li>
                                            <li class="list-group-item">Meja: {{ $row['meja'] }}</li>
                                            <li class="list-group-item">Jendela: {{ $row['jendela'] }}</li>
                                            <li class="list-group-item">Plafon: {{ $row['langit'] }}</li>
                                            <li class="list-group-item">Kontainer: {{ $row['kontainer'] }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        @if ($row['status'] == 0)
                                            Diajukan
                                        @endif
                                    </td>
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

    </main>
@endsection
