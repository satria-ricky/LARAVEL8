
@extends('layouts.main')

@section('isi_konten')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">


        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">{{ $judul_navigasi }}</h2>
                <!-- <h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5> -->
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
            </div>
        </div>

        
    </div>
</div>
<div class="page-inner mt--5">



    <div class="row">
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-body skew-shadow">
                    <h1>Rp. {{ number_format($data[0]->saldo_perolehan, 2, ",", ".")}}</h1>
                    <h5 class="op-8">Total Saldo Perolehan</h5>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">(Rp.)</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark bg-secondary-gradient">
                <div class="card-body bubble-shadow">
                    <h1>Rp. {{ number_format($data[0]->akm_susut, 2, ",", ".")}}</h1>
                    <h5 class="op-8">Total AKM Susut</h5>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">(Rp.)</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark bg-secondary2">
                <div class="card-body curves-shadow">
                    <h1>Rp. {{ number_format($data[0]->nilai_buku, 2, ",", ".")}}</h1>
                    <h5 class="op-8">Total Nilai Buku</h5>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">(Rp.)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection