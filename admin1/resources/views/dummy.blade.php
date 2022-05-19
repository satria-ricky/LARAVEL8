@extends('layout.app')
@section('title')
<title>Tambah Pabrik</title>
@endsection

@section('content')
<main>
    <div class="row">

        <!--  -->
        <div class="card mb-4">

            <div class="card-body">
                <!-- pop up -->
                <!-- Button to trigger modal -->
                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                    Tambah Pabrik
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalForm" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">
                                    Tammbah Pabrik
                                </h4>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <div class="container">
                                    <form action="/register_pabrik" method="post" id='forminput'>
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

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
                                            <input class="form-control" name="username" id="inputEmail" type="text" placeholder="name@example.com" />
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
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid justify-content-center">
                                                <a href="#" onclick="pembuatanuser({
                                msg: 'Apakah Anda Yakin Terima Pengguna Ini?',
                                title: 'Apakah Data Sudah Benar?'
                            })" style="width: 200px" class="btn btn-primary btn-block">Tambah
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

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama COA</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- <a class="btn btn-primary" href="#">Edit</a>
        <a class="btn btn-primary" href="#">Cetak</a> -->
    </div>

</main>
@endsection