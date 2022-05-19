@extends('layout.app')
@section('title')
<title>Periksa Bahan Baku</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Catatan Penerimaan Penyerahan Dan Penyimpanan Bahan Baku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pemeriksaan Bahan Baku</li>
        </ol>
        <div class="row">


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bagian Produksi
                </div>
                <div class="card-body">

                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Bahan Baku">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sesuai Dengan POB No</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nomor POB">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bahan Baku Masuk
                </div>
                <div class="card-body">

                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm3">
                        Barang Masuk
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm3" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title" id="myModalLabel">Bahan Baku Masuk</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form role="form">
                                        <div class="form-group row">
                                            <label for="inputEmail3">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tanggal" class="form-control datepicker" required />
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $(".datepicker").datepicker({
                                                            format: 'dd-mm-yyyy',
                                                            autoclose: true,
                                                            todayHighlight: true,
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Nomer Loth</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Nomor Loth" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Pemasok</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Pemasok" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Jumlah</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Jumlah" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Nomer Kontrol</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Nomer kontrol" />
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3">Tanggal Kadaluarsa</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tanggal" class="form-control datepicker" required />
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $(".datepicker").datepicker({
                                                            format: 'dd-mm-yyyy',
                                                            autoclose: true,
                                                            todayHighlight: true,
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->



                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No Loth</th>
                                <th scope="col">Pemasok</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">No. Control</th>
                                <th scope="col">Tgl. Kadaluarsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>01/09/2021</td>
                                <td>01</td>
                                <td>UD. Brawijaya</td>
                                <td>10 KG</td>
                                <td>02</td>
                                <td>01/09/2022</td>
                            </tr>
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
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm4">
                        Barang keluar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalForm4" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title" id="myModalLabel">Bahan Baku Keluar</h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form role="form">
                                        <div class="form-group row">
                                            <label for="inputEmail3">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tanggal" class="form-control datepicker" required />
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $(".datepicker").datepicker({
                                                            format: 'dd-mm-yyyy',
                                                            autoclose: true,
                                                            todayHighlight: true,
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Untuk Produk</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Nomor Loth" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Nomor Batch</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Nomor Batch" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Jumlah</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Jumlah" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Sisa</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Sisa" />
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pop up end -->



                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Untuk Produk</th>
                                <th scope="col">No. Batch</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>02/09/2021</td>
                                <td>Lotomotong</td>
                                <td>01/2021</td>
                                <td>2 KG</td>
                                <td>8 KG</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>




            <a class="btn btn-primary" href="index.html">SIMPAN</a>


        </div>
    </div>
</main>
@endsection