@extends('layout.main_layout')

@section('isi_konten')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Pasar</h2>
                        {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        {{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
					<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pasar</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalKelolaProduk">
                                <i class="fa fa-edit"></i>
                                Produk
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/editPasar" method="post" id="forminput1" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id" value="{{ $data->id_pasar }}" />
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama*</label>
                                        <input id="id_nama" name="nama" required type="text" class="form-control 1" value="{{ $data->nama_pasar }}"
                                            placeholder="nama pasar">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Alamat*</label>
                                        <input id="id_alamat" name="alamat" type="text" required class="form-control 1" value="{{ $data->alamat }}"
                                            placeholder="alamat">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" id="id_alamat" rows="5" name="deskripsi">
                                            {{ $data->deskripsi }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Tahun Didirikan</label>
                                        {{-- <input id="id_tahun_didirikan" type="date" name="tahun_didirikan"
                                            class="form-control" placeholder="tahun didirikan" value="{{ $data->tahun_didirikan }}"> --}}
                                            <select id="id_tahun_didirikan" name="tahun_didirikan" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Perbaikan Terakhir</label>
                                        {{-- <input id="id_perbaikan_terakhir" type="date" name="perbaikan_terakhir" value="{{ $data->perbaikan_terakhir }}"
                                            class="form-control" placeholder="perbaikan terakhir"> --}}
                                            <select id="id_perbaikan_terakhir" name="perbaikan_terakhir" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Status Kepemilikan</label>
                                        <input id="id_status_kepemilikan" type="text" class="form-control"
                                            name="status_kepemilikan" value="{{ $data->status_kepemilikan }}" placeholder="status kepemilikan">
                                    </div>
                                </div>

                                <div class="col-md-6 pr-0 ">
                                    <div class="form-group form-group-default">
                                        <label>Luas Tanah</label>
                                        <input id="id_luas_tanah" type="number" class="form-control" name="luas_tanah" value="{{ $data->luas_tanah }}"
                                            placeholder="luas_tanah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Luas Bangunan</label>
                                        <input id="id_luas_bangunan" type="number" name="luas_bangunan" value="{{ $data->luas_bangunan }}"
                                            class="form-control" placeholder="luas bangunan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Kondisi</label>
                                        <input id="id_kondisi" type="text" name="kondisi" class="form-control" value="{{ $data->kondisi }}"
                                            placeholder="kondisi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Komoditi</label>
                                        <input id="id_komoditi" type="text" name="komoditi" class="form-control" value="{{ $data->komoditi }}"
                                            placeholder="komoditi">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Jumlah Pedagang LOS</label>
                                        <input id="id_jumlah_pedagang_los" type="number" class="form-control" value="{{ $data->jumlah_pedagang_los }}"
                                            name="jumlah_pedagang_los" placeholder="jumlah pedagang los">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Jumlah Pedagang KIOS</label>
                                        <input id="id_jumlah_pedagang_kios" type="number" class="form-control" value="{{ $data->jumlah_pedagang_kios }}"
                                            name="jumlah_pedagang_kios" placeholder="jumlah pedagang kios">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Aktivitas</label>
                                        <input id="id_aktivitas" name="aktivitas" type="text" class="form-control" value="{{ $data->aktivitas }}"
                                            placeholder="aktivitas">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Type Pasar</label>
                                        <input id="id_type_pasar" type="text" class="form-control" name="type_pasar" value="{{ $data->type_pasar }}"
                                            placeholder="type_pasar">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" placeholder="foto pasar"
                                            name="foto" id="id_foto" accept="image/*" onchange="cekFoto()">
                                        
                                        @if ($data->foto == '')
                                            <img src="{{ asset('storage/foto-pasar/default.png') }}" class="img-priview rounded mt-2" width="150" id="priviewFoto">
                                        @else
                                            @if ( old('foto') )
                                            <img class="img-priview rounded mt-2" width="150" id="priviewFoto">
                                            @else
                                                <img src="{{ asset('storage/'.$data->foto) }}" class="img-priview rounded mt-2" width="150" id="priviewFoto">
                                            @endif
                                        @endif
                                        <p class="fs-6 text-danger">*Hanya menerima file jpg/png</p>
                                    </div>
                                </div>

                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Latitude</label>
                                        <input id="id_latitude" type="text" class="form-control"
                                            placeholder="latitude" name="latitude" readonly value="{{ $data->latitude }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Longitude</label>
                                        <input id="id_longitude" type="text" name="longitude" class="form-control" value="{{ $data->longitude }}"
                                            placeholder="longitude" readonly>
                                    </div>
                                </div>
								
								<div id="mapid" style="width: 100%; height: 400px;"></div>
                            </div>
                        </form>
                    </div>
					<div class="card-action">
						<button class="btn btn-primary mr-auto" onclick="buttonSimpan(1)">Simpan Perubahan</button>
						{{-- <button class="btn btn-danger">Cancel</button> --}}
					</div>
                </div>
            </div>

        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="modalKelolaProduk" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Kelola produk di</span> 
                        <span class="fw-light">
                             {{ $data->nama_pasar }}
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">
						<table id="tabel1" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th style="text-align: center; width:10%">No</th>
									<th style="width:80%">Nama Produk</th>
									<th style="text-align: center; width:10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($dataProduk as $row)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$row->nama_produk}}</td>
									<td>
											<form action="/hapus_produk_pasar" method="post" id="formHapus{{$row->id}}">
												@csrf
												<input type="hidden" name="id" value="{{$row->id}}">
												<input type="hidden" name="id_pasar" value="{{$data->id_pasar}}">
												<button type="button" onclick="buttonHapus('formHapus',{{$row->id}})" data-toggle="tooltip" class="btn btn-link btn-danger" data-original-title="Hapus">
													<i class="fa fa-trash"></i>
												</button>
											</form>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
                    
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" data-toggle="modal" data-target="#modalTambahProduk" class="btn btn-primary">Tambah Produk</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah produk --}}
    <div class="modal fade" id="modalTambahProduk" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            List Produk 
                        </span> 
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <hr style="border-top: 1px solid rgb(199, 193, 193);">
                    <form action="/tambah_produk_pasar" method="post">
                        @csrf
                        <input type="hidden" name="id_pasar" value="{{ $data->id_pasar }}" />
                        <div class="form-group">
                            @foreach ($dataProdukFormTambah as $row)
                                <input type="checkbox" id="produk{{ $row['id_produk'] }}" name="id_produk[]" value="{{ $row['id_produk'] }}"><label for="produk{{ $row['id_produk'] }}"> {{ $row['nama_produk'] }}</label><br>
                            @endforeach
                        </div>
                   
                    <hr style="border-top: 1px solid rgb(199, 193, 193);">
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" onclick="return confirm('Yakin ingin ditambah?')" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
