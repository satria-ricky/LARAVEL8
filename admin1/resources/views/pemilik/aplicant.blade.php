@extends('layout.app')
@section('title')
    <title>Aplikan</title>
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Karyawan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ session('pabrik') }}</li>
            </ol>
            <div class="row">


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Karyawan
                    </div>
                    <!-- pop up end -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $row)
                                <?php $i++; ?>
                                <tr>
                                    <td scope="col">{{ $i }}</td>
                                    <td scope="col">{{ $row['nama'] }}</td>
                                    <td scope="col">
                                        <form action="terima" method="post" id='forminput'
                                            style="float: left; margin-right:15px;" onSubmit="return confirm('Apakah anda ingin Menerima?') ">
                                            @csrf
                                            <input type="hidden" class='form-control' name="id" value="{{ $row['id'] }}">
                                            <button class="btn btn-success btn-md me-3" type="submit" ><i class="fa fa-checked"></i> Terima</button>

                                        </form>
                                        <form action="tolak" method="post" id="forminput1">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $row['id'] }}" onSubmit="return confirm('Apakah anda ingin Menolak?') ">
                                            <button class="btn btn-danger btn-md me-3" type="submit" ><i class="fa fa-checked"></i> Tolak</button>

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
