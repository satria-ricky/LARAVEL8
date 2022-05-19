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
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Nomor Batch</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <?php $i = 0;
                        $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row['kode_produk'] }}</td>
                            <td>{{ $row['nama_produk'] }}</td>
                            <td>{{ $row['nomor_batch'] }}</td>
                            <td>
                                @if ($row['status'] == 0)
                                    {{'Belum Diajukan'}}
                                @elseif ($row['status'] == 1)
                                    {{'Diajukan'}}
                                @else
                                    {{'Diterima'}}
                                @endif
                                

                            </td>
                            <td>
                                <form action="/pjt_pengolahanbatch" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$row['nomor_batch']}}">
                                <button type="submit" class="btn btn-success">Terima</button>
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