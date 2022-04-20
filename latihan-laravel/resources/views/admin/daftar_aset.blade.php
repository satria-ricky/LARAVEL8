
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#NO</th>
                                <th>No. Rekening</th>
                                <th>Deskripsi</th>
                                <th>Saldo Perolehan</th>
                                <th>AKM Susut</th>
                                <th>Nilai Buku</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $row->aset_no_rekening }}</td>
                                    <td>{{ $row->aset_deskripsi }}</td>
                                    <td>{{ $row->aset_saldo_perolehan }}</td>
                                    <td>{{ $row->aset_akm_susut }}</td>
                                    <td>{{ $row->aset_nilai_buku }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs btn-round" onclick="detail({{$row->aset_id}})">Detail</button>
                                        <button class="btn btn-success btn-xs btn-round m-0" onclick="edit({{$row->aset_id}})">Edit</button>
                                        <button class="btn btn-danger btn-xs btn-round" onclick="hapus({{$row->aset_id}})"> Hapus </button> 
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
@endsection


