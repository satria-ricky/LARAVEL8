@extends('layout.app')
@section('title')
<title>Laporan</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Laporan</li>
        </ol>

        <div class="row">


            <div class="card mb-4">

                <div class="card-body">
                   
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Pencarian Laporan
                    </div>
                    <form action="tampillaporan" method="post">
                        <div class="form-group row">
                            <div class="col">
                                <select class="form-control" style="height: 35px;" id="inlineFormCustomSelect">
                                    <option selected>Tahun</option>
                                    <option value="1">2020</option>
                                    <option value="2">2021</option>
                                    <option value="3">2022</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control" style="height: 35px;" id="inlineFormCustomSelect">
                                    <option selected>Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control" style="height: 35px;" id="inlineFormCustomSelect">
                                    <option selected>Produk</option>
                                    <option value="1">Rosela</option>
                                    <option value="2">Kunyit</option>
                                </select>
                            </div>

                            <div class="col">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Batch Number">
                            </div>
                        </div>
                    </form>

                    <form>

                        <a class="btn btn-primary" href="#">Cari</a>
                    </form>
                </div>
            </div>

            <table class="table" id="laporan">
                <thead>
                    <tr>
                        <th scope="col">Nama Laporan</th>
                        <th scope="col">Diajukan</th>
                        <th scope="col">Tanggal Diajukan</th>  
                        <th scope="col">Diterima</th>
                        <th scope="col">Tanggal Diterima</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>



<script>
    $(document).ready(function() {
                $('#laporan').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/laporandata') }}",
                    columns: [{
                            data: 'laporan_nama',
                            name: 'laporan_nama'
                        },
                        {
                            data: 'laporan_diajukan',
                            name: 'laporan_diajukan'
                        },
                        {
                            data: 'tgl_diajukan',
                            name: 'tgl_diajukan'
                        },
                        {
                            data: 'laporan_diterima',
                            name: 'laporan_diterima'
                        },
                        {
                            data: 'tgl_diterima',
                            name: 'tgl_diterima'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });
            })
</script>


</main>
@endsection