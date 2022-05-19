@extends('layout.app')
@section('title')
<title>Detil Timbang Bahan</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detil Timbang Bahan </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Nama Bahan</li>
        </ol>
        <div class="row">

            <div class="card mb-4">
                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                        Tambah Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        Entry Periksa Personil
                                    </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form method="post" action="tambah_detiltimbangbahan" id='forminput2'>
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                Timbang Bahan
                                            </div>
                                            <div class="card-header" id="headertgl2">
                                            </div>
                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm">
                                                        <input type="date" name="tanggal" class="form-control 2" id="tanggal" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                                        Baku</label>
                                                    <div class="col-sm">
                                                        <input class="form-control 2" list="listnamabahanbaku" type="text" name='nama_bahan' id="isi_bahan">
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

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                        Suplier</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="nama_suplier" class="form-control 2" id="inputEmail3" placeholder="Nama Suplier" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah
                                                        Bahan
                                                        Baku</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="jumlah_bahan" class="form-control 2" id="inputEmail3" placeholder="Jumlah Bahan Baku" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Hasil
                                                        Penimbangan</label>
                                                    <div class="col-sm">
                                                        <input type="text" name="hasil_penimbangan" class="form-control 2" id="inputEmail3" placeholder="Hasil Penimbangan" />
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Bahan</th>
                            <th scope="col">Nama Suplier</th>
                            <th scope="col">Jumlah Bahan</th>
                            <th scope="col">Hasil Penimbangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>

                        @foreach ($data as $row )
                        <td scope="col">{{$i}}</td>
                        <td scope="col">{{$row['tanggal']}}</td>
                        <td scope="col">{{$row['nama_bahan']}}</td>
                        <td scope="col">{{$row['nama_suplier']}}</td>
                        <td scope="col">{{$row['jumlah_bahan']}}</td>
                        <td scope="col">{{$row['hasil_penimbangan']}}</td>
                        <td scope="col"><button id="klik_bahan" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editBahan" data-tanggal="{{ $row['tanggal'] }}" data-nama="{{ $row['nama_bahan'] }}" data-noloth="{{ $row['no_loth'] }}" data-suplai="{{ $row['nama_suplier'] }}" data-jbahan="{{ $row['jumlah_bahan'] }}" data-hasil="{{ $row['hasil_penimbangan'] }}" data-id="{{ $row['timbang_bahan_id']}}">edit</button></td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalForm4" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Penimbangan Bahan Baku
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-header" id='headertgl1'></div>
                        <div class="card-header">Bahan Baku</div>
                        <div class="card-body">
                            <p class="statusMsg"></p>
                            <form role="form" method="post" action="tambah_penimbanganbahan" id='forminput1'>
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                        Baku</label>
                                    <div class="col-sm">
                                        <input class="form-control 1" list="listnamabahanbaku" type="text" name='nama_bahan' id="isi_bahan">
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

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No Loth</label>
                                    <div class="col-sm">
                                        <input type="text" name="no_loth" class="form-control 1" id="inputEmail3" placeholder="No Loth" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                        Suplier</label>
                                    <div class="col-sm">
                                        <input type="text" name="nama_suplier" class="form-control 1" id="inputEmail3" placeholder="Nama Suplier" />
                                    </div>
                                </div>

                                <input type="hidden" name="tanggal" id='ambil_tanggal1' class="form-control 1" placeholder="" />

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Bahan
                                        Baku</label>
                                    <div class="col-sm">
                                        <input type="text" name="jumlah_bahan" class="form-control 1" id="inputEmail3" placeholder="Jumlah Bahan Baku" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Hasil
                                        Penimbangan</label>
                                    <div class="col-sm">
                                        <input type="text" name="hasil_penimbangan" class="form-control 1" id="inputEmail3" placeholder="Hasil Penimbangan" />
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
    <!-- Modal Bahan -->
    <div class="modal fade" id="editBahan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Penimbangan Bahan Baku
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-header" id='headertgl1'></div>
                        <div class="card-header">Bahan Baku</div>
                        <div class="card-body">
                            <p class="statusMsg"></p>
                            <form role="form" method="post" action="edit_penimbanganbahan" id='forminput4'>
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="id" id="isi_bahanid">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bahan
                                        Baku</label>
                                    <div class="col-sm">
                                        <input class="form-control 4" list="listnamabahanbaku" type="text" name='nama_bahan' id="bahanbahan">
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

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No Loth</label>
                                    <div class="col-sm">
                                        <input type="text" name="no_loth" class="form-control 4" placeholder="No Loth" id="isi_nolothbahan" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                        Suplier</label>
                                    <div class="col-sm">
                                        <input type="text" name="nama_suplier" class="form-control 4" placeholder="Nama Suplier" id="isi_suplaibahan" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Bahan
                                        Baku</label>
                                    <div class="col-sm">
                                        <input type="text" name="jumlah_bahan" class="form-control 4" id="isi_jbahan" placeholder="Jumlah Bahan Baku" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Hasil
                                        Penimbangan</label>
                                    <div class="col-sm">
                                        <input type="text" name="hasil_penimbangan" class="form-control 4" id="isi_hasilbahan" placeholder="Hasil Penimbangan" />
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
    <!-- pop up end -->
    <script>
        $(document).on('click', "#klik_bahan", function() {
            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var noloth = $(this).data('noloth');
            var suplai = $(this).data('suplai');
            var jbahan = $(this).data('jbahan');
            var hasil = $(this).data('hasil');
            var id = $(this).data('id');

            console.log("ini " + nama + " ruangan " + tanggal);
            $("#bahanbahan").val(nama);
            // $("#isi_tanggal").val(tanggal);
            $("#isi_nolothbahan").val(noloth);
            $("#isi_suplaibahan").val(suplai);
            $("#isi_jbahan").val(jbahan);
            $("#isi_hasilbahan").val(hasil);
            $("#isi_bahanid").val(id);
            // document.getElementById('cpbahan').value = cpid;
        })
    </script>
</main>
@endsection