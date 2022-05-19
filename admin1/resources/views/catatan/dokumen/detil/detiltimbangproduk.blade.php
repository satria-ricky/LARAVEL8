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
                                            Timbang Produk Antara
                                        </h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p class="statusMsg"></p>
                                        <form method="post" action="tambah_detiltimbangproduk" enctype="multipart/form-data"
                                            id='forminput1'>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Hasil Timbang
                                                </div>
                                                <div class="card-header" id="headertgl">
                                                </div>
                                                @csrf
                                                <div class="card-body">


                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-3 col-form-label">Tanggal</label>
                                                        <div class="col-sm">
                                                            <input type="date" name="tanggal" class="form-control 1"
                                                                id="tanggal" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk Antara</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="nama_produk_antara" class="form-control 1"
                                                                id="nama_produk_antara" placeholder="Nama Produk Antara" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Asal
                                                            Produk</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="asal_produk" class="form-control 1"
                                                                id="asal_produk" placeholder="Asal Produk" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah
                                                            Produk</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="jumlah_produk" class="form-control 1"
                                                                id="jumlah_produk" placeholder="Jumlah Produk" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Hasil
                                                            Timbang</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="hasil_timbang" class="form-control 1"
                                                                id="hasil_timbang" placeholder="Hasil Timbang" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                                            Produk</label>
                                                        <div class="col-sm">
                                                            <input type="text" name="untuk_produk" class="form-control 1"
                                                                id="untuk_produk" placeholder="Untuk Produk" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <a class="btn btn-primary" onclick="salert1(1)" href="#"
                                                    style="float:left; width: 100px;  margin-left:25px"
                                                    role="button">Simpan</a>
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
                                <th scope="col">Nama Produk Antara</th>
                                <th scope="col">Asal Produk</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Hasil Penimbangan</th>
                                <th scope="col">Untuk Produk</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $row)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row['tanggal'] }}</td>
                                <td>{{ $row['nama_produk_antara'] }}</td>
                                <td>{{ $row['asal_produk'] }}</td>
                                <td>{{ $row['jumlah_produk'] }}</td>
                                <td>{{ $row['hasil_penimbangan'] }}</td>
                                <td>{{ $row['untuk_produk'] }}</td>
                                <td>
                                    <button id="klikproduk" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editProduk" data-tanggal="{{ $row['tanggal'] }}" data-nama="{{ $row['nama_produk_antara'] }}" data-nobatch="{{ $row['no_batch'] }}" data-asal="{{ $row['asal_produk'] }}" data-jumlah="{{ $row['jumlah_produk'] }}" data-hasil="{{ $row['hasil_penimbangan'] }}" data-produk="{{ $row['untuk_produk'] }}" data-id="{{ $row['timbang_produk_id']}}">edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal Produk-->
        <div class="modal fade" id="editProduk" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Penimbangan Produk Antara
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="card mb-4">
                            <div class="card-header" id='headertgl2'></div>
                            <div class="card-header">Produk Antara</div>
                            <div class="card-body">
                                <p class="statusMsg"></p>
                                <form role="form" method="post" action="edit_penimbanganprodukantara" id='forminput5'>
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="id" id="isi_produkid">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk
                                            Antara</label>
                                        <div class="col-sm">
                                            <input class="form-control 5" list="listnamaproduk" type="text" name='nama'
                                                id="isi_produknama">
                                            </input>
                                            <datalist id='listnamaproduk'>
                                                @foreach ($produkantara as $row)
                                                    <option value="{{ $row['produkantara_nama'] }}">
                                                        {{ $row['produkantara_nama'] }}
                                                    </option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Asal Produk</label>
                                        <div class="col-sm">
                                            <input type="text" name="asal_produk" class="form-control 5" id="isi_asalproduk"
                                                placeholder="Asal Produk" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah
                                            Produk Antara</label>
                                        <div class="col-sm">
                                            <input type="text" name="jumlah_produk" class="form-control 5"
                                                id="isi_jumlahproduk"
                                                placeholder="Jumlah
                                                                                                                                                                                                                                                                                                                                                                                                                        Produk Antara" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Hasil
                                            Penimbangan</label>
                                        <div class="col-sm">
                                            <input type="text" name="hasil_penimbangan" class="form-control 5"
                                                id="isi_hasilproduk" placeholder="Hasil Penimbangan" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Untuk
                                            Produk</label>
                                        <div class="col-sm">
                                            <input type="text" name="untuk_produk" class="form-control 5"
                                                id="isi_produkproduk" placeholder="Untuk Produk" />
                                        </div>
                                    </div>

                                    <a class="btn btn-primary" onclick="salert1(5)" href="#"
                                        style="float:left; width: 100px;  margin-left:25px" role="button">Simpan</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pop up end -->
        <script>
            $(document).on('click', "#klikproduk", function() {
                var nama = $(this).data('nama');
                // var tanggal = $(this).data('tanggal');
                var nobatch = $(this).data('nobatch');
                var asal = $(this).data('asal');
                var jumlah = $(this).data('jumlah');
                var hasil = $(this).data('hasil');
                var produk = $(this).data('produk');
                var id = $(this).data('id');

                console.log("ini " + nama + " ruangan " + nobatch);
                $("#isi_produknama").val(nama);
                // $("#isi_tanggal").val(tanggal);
                $("#isi_nobatch").val(nobatch);
                $("#isi_asalproduk").val(asal);
                $("#isi_jumlahproduk").val(jumlah);
                $("#isi_hasilproduk").val(hasil);
                $("#isi_produkproduk").val(produk);
                $("#isi_produkid").val(id);
                // document.getElementById('cpbahan').value = cpid;
            })
        </script>
    </main>
@endsection
