@extends('layout.app')
@section('title')
<title>Pengolahan   Batch</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengolahan Batch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengolahan Batch</li>
        </ol>
        <div class="row">

            <div class="card mb-4">

                <div class="card-body">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Batch</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $row)
                       <?php $i=0; $i++; ?>
                        <tr>
                        <th scope="col">{{$i}}</th>
                            <th scope="col">{{$row['nobatch']}}</th>
                            <th scope="col">{{$row['audit_laporan']}}</th>
                            <th scope="col">
                                @if($row['audit_status']==0)
                                {{'Diajukan'}}
                                @else
                                {{'Diterima'}}
                                @endif
                            </th>
                            <th scope="col">
                            @if($row['audit_status']==0)
                            
                            <button class="btn btn-success" disabled> Lihat </button>
                                <!-- {{'Diajukan'}} -->
                                @else
                                <?php
                                if ($row['audit_laporan'] == 'pengolahan batch')
                                $form = '<form target="_blank" method="post" action="/printpengolahanbatch">';
                            elseif ($row['audit_laporan'] == 'penambahan contoh bahan baku')
                                $form = '<form target="_blank" method="post" action="/printambilbahanbaku">';
                            elseif ($row['audit_laporan'] == 'penambahan contoh produk')
                                $form = '<form target="_blank" method="post" action="/printambilprodukjadi">';
                            elseif ($row['audit_laporan'] == 'penambahan contoh kemasan')
                                $form = '<form target="_blank" method="post" action="/printambilbahankemas">';
                            elseif ($row['audit_laporan'] == 'penerimaan bahan')
                                $form = '<form target="_blank" method="post" action="/printterimabahan">';
                            elseif ($row['audit_laporan'] == 'penerimaan produk')
                                $form = '<form target="_blank" method="post" action="/printterimaproduk">';
                            elseif ($row['audit_laporan'] == 'penerimaan kemasan')
                                $form = '<form target="_blank" method="post" action="/printterimakemasan">';
                            elseif ($row['audit_laporan'] == 'pelatihan higiene dan sanitasi')
                                $form = '<form target="_blank" method="post" action="/printlatihhigisani">';
                            elseif ($row['audit_laporan'] == 'pelatihan cpkb')
                                $form = '<form target="_blank" method="post" action="/printlatihcpkb">';
                            elseif ($row['audit_laporan'] == 'pengoperasian alat')
                                $form = '<form target="_blank" method="post" action="/printalatutama">';
                            elseif ($row['audit_laporan'] == 'distribusi produk')
                                $form = '<form target="_blank" method="post" action="/printdistribusiproduk">';
                            elseif ($row['audit_laporan'] == 'penanganan keluhan')
                                $form = '<form target="_blank" method="post" action="/printpenanganankeluhan">';
                
                            elseif ($row['audit_laporan'] == 'pelulusan produk jadi')
                                $form = '<form target="_blank" method="post" action="/printpelulusanproduk">';
                
                            elseif ($row['audit_laporan'] == 'penarikan produk')
                                $form = '<form target="_blank" method="post" action="/printpenarikanproduk">';
                
                            elseif ($row['audit_laporan'] == 'pemusnahan bahan')
                                $form = '<form target="_blank" method="post" action="/printpemusnahanbahan">';
                            elseif ($row['audit_laporan'] == 'pemusnahan bahan kemas')
                                $form = '<form target="_blank" method="post" action="/printpemusnahanbahankemas">';
                            elseif ($row['audit_laporan'] == 'pemusnahan produk antara')
                                $form = '<form target="_blank" method="post" action="/printpemusnahanprodukantara">';
                            elseif ($row['audit_laporan'] == 'pemusnahan produk jadi')
                                $form = '<form target="_blank" method="post" action="/printpemusnahanprodukjadi">';
                
                            elseif ($row['audit_laporan'] == 'periksa sanitasi ruangan')
                                $form = '<form target="_blank" method="post" action="/printperiksaruang">';
                            elseif ($row['audit_laporan'] == 'periksa sanitasi alat')
                                $form = '<form target="_blank" method="post" action="/printperiksaalat">';
                
                            elseif ($row['audit_laporan'] == 'Pemeriksaan Bahan Baku')
                                $form = '<form target="_blank" method="post" action="/printpemeriksaanbahan">';
                            elseif ($row['audit_laporan'] == 'Pemeriksaan Produk Jadi')
                                $form = '<form target="_blank" method="post" action="/printpemeriksaanproduk">';
                            elseif ($row['audit_laporan'] == 'Pemeriksaan Bahan Kemas')
                                $form = '<form target="_blank" method="post" action="/printpemeriksaankemasan">';
                
                            elseif ($row['audit_laporan'] == 'pelatihan cpkb')
                                $form = '<form target="_blank" method="post" action="/printlatihcpkb">';
                            else
                                $form = '<form target="_blank" method="post" action="/printterimakemasan">';
                            $isi =
                                '<input type="hidden" name="_token" value="' . csrf_token() . '   " />' .
                                '
                                <input type="hidden" name="nama" value=' . $row['audit_laporan'] . ' />' .
                                '<input type="hidden" name="id" value=' . $row['nobatch'] . ' />' .
                                '<input type="hidden" name="pabrik" value=' . $row['audit_pabrik'] . ' />' .
                                '<button type="submit" class="btn btn-primary">Buka</button>
                            </form>';
                            echo $form . $isi;
                                ?>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>
@endsection