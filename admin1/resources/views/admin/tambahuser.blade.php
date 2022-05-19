@extends('layout.app')
@section('title')
<title>Tambah Pabrik</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Pabrik </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="row">
            <!--  -->
            <div class="card mb-4">

                <div class="card-body">
                    <!-- pop up -->
                    <!-- Button to trigger modal -->
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                        Tambah Pabrik
                    </button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pabrik</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $row)
                            <tr>
                                <td>
                                    {{ $i }}
                                </td>
                                <td>
                                    {{ $row['nama'] }}
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" id="detil" data-toggle="modal" data-target="#lihat"
                                    data-nama="{{ $row['nama'] }}" data-alamat="{{ $row['alamat'] }}" data-nohp="{{ $row['no_hp'] }}">Lihat</button>
                                    <button id="klik" class="btn btn-success btn-sm" data-toggle="modal" data-target="#resetpass" data-id="{{$row['pabrik_id']}}">Reset</button>
                                </td>
                            </tr>

                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- <a class="btn btn-primary" href="#">Edit</a>
                                                                                                                                                        <a class="btn btn-primary" href="#">Cetak</a> -->
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalForm" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambah Pabrik
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <div class="container">
                        <form action="/register_pabrik" method="post" id='forminput'>
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="namadepan" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" name="namabelakang" id="inputLastName" type="text" placeholder="Enter your last name" />
                                        <label for="inputLastName">Last name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="username" id="inputUsername" type="text" placeholder="name@example.com" />
                                <label for="inputEmail">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="pabrik" id="inputEmail" type="text" placeholder="name@example.com" />
                                <label for="inputEmail">Pabrik</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <p id="message1" class="text-danger"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                    <p id="message" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid justify-content-center">
                                    <a href="#" onclick="pembuatanuser({msg: 'Apakah Anda Yakin Terima Pengguna Ini?',title: 'Apakah Data Sudah Benar?'})" style="width: 200px" class="btn btn-primary btn-block">Tambah
                                        Akun</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <!-- Modal Reset-->
    <div class="modal fade" id="resetpass" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Reset Password
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <div class="container">
                        <form action="/reset_password" method="post" id='input1'>
                            @csrf
                            <input type="hidden" name="id" id="isi_id">
                            <div class="form-floating mb-3">
                                <input class="form1" name="baru" id="user" type="text" placeholder="masukan password" autocomplete="off" />
                                <label for="inputEmail">Password Baru</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <!-- Modal -->
    <div class="modal fade" id="lihat" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Detil Pabrik
                    </h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <div class="container">
                        <div class="form-floating mb-3">
                            <input class="form2" name="username" id="isi_nama" type="text" placeholder="name@example.com" />
                            <label for="inputEmail">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                                <input class="form2" name="username" id="isi_alamat" type="text" placeholder="name@example.com" />
                                <label for="inputEmail">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form2" name="username" id="isi_nohp" type="text" placeholder="name@example.com" />
                                <label for="inputEmail">No HP</label>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</main>
<script>
    $(document).on('click', "#klik", function() {
        var id = $(this).data('id');
        console.log("hai " + id);
        $("#isi_id").val(id);
    })

    $(document).on('click', "#detil", function() {
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var nohp = $(this).data('nohp');

        console.log("hai " + nama);
        $("#isi_nama").val(nama);
        $("#isi_alamat").val(alamat);
        $("#isi_nohp").val(nohp);
    })

    $("#inputPasswordConfirm").keyup(function() {
        if ($("#inputPassword").val() === $(this).val()) {
            document.getElementById("message").innerText = "";
            document.getElementById("message1").innerText = "";
        } else {
            document.getElementById("message").innerText = "Tidak Cocok";
            document.getElementById("message1").innerText = "Tidak Cocok";
        }
    })
</script>
@endsection