@extends('layout.app')
@section('title')
<title>Daftar Batch</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Batch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Batch</li>
        </ol>
        <div class="row">

            <div class="card mb-4">

                <div class="card-body">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Batch</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $row)
                            <tr><?php $no = 0;
                                $no++; ?>
                                <th scope="col">{{$no}}</th>
                                <th scope="col">{{$row['laporan_batch']}}</th>
                                <th scope="col">

                                    <form action="/audit_dokumen" method="post">
                                        @csrf
                                        <input type="hidden" name="nobatch" value="{{$row['laporan_batch']}}">
                                        <input type="hidden" name="nama" value="{{$row['laporan_nama']}}">
                                        <input type="hidden" name="pabrik" value="{{$row['pabrik_id']}}">
                                        <button type="submit" href="/audit_request" type="submit" class="btn btn-success">
                                           Lihat
                                        </button>
                                    </form>
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