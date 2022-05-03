
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
                <div class="row">
                    <div class="col col-4">
                        <div class="form-group">    
                            <select class="form-control" id="filterAset">
                                <option value="-"> -- Pilih Nama Aset --</option>
                                @foreach ($jenis_aset as $j)
                                    @if (old('aset_gssl_induk') == $j->jenis_id)
                                        <option selected value="{{ $j->jenis_id }}"> {{$j->jenis_nama}} </option>
                                    @endif
                                    <option value="{{ $j->jenis_id }}"> {{$j->jenis_nama}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                         
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
                                    <td>{{ $row->aset_no_rekening }}</td>
                                    <td>{{ $row->aset_deskripsi }}</td>
                                    <td>{{ $row->aset_saldo_perolehan }}</td>
                                    <td>{{ $row->aset_akm_susut }}</td>
                                    <td>{{ $row->aset_nilai_buku }}</td>
                                    <td>
                                        <a href="/detail-aset/{{Crypt::encrypt($row->aset_id)}}" class="btn btn-info btn-xs btn-round" target="_blank" >Detail</a>

                                        <a href="/qr-code/{{Crypt::encrypt($row->aset_id)}}" class="btn btn-primary btn-xs btn-round" target="_blank" >QR Code</a>

                                        <a href="/aset/{{ $row->aset_id }}/edit" class="btn btn-success btn-xs btn-round m-0"> Edit</a>
                                        
                                        
                                        <form action="/aset/{{$row->aset_id}}" method="post" id="form-hapus{{$row->aset_id}}">
                                            @method('delete')
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-xs btn-round" onclick="hapus({{$row->aset_id}})"> Hapus </button>
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
@endsection


@section('isi_js')
	@include('components.js_hapus')
    <script>

        $('#filterAset').change(function () {
            var id = $(this).val();
            // console.log(id);
            $('#basic-datatables').DataTable().destroy();

            $.ajax({
                url        :'/filterAset/'+id,
                type       :'GET',
                dataType   :'json',
                success: function(data){
                    // console.log(data);
                    $('#basic-datatables').DataTable( {
                        "data": data,
                        "columns": [
                            {
                                "data": "aset_no_rekening",
                            },
                            {
                                "data": "aset_deskripsi",
                            },
                            {
                                "data": "aset_saldo_perolehan",
                            },
                            {
                                "data": "aset_akm_susut",
                            },
                            {
                                "data": "aset_nilai_buku",
                            },
                            {
                                "data": "aset_id",
                                "render": function(data, type, row, meta) {
                                return `
                                <button class="btn btn-danger btn-xs btn-round" onclick="hapus(${row.aset_id})"> Hapus </button> 
                                `;
                                }
                            }
                        ]

                    } );
                }, 
                error: function(){
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>
@endsection
