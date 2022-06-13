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
						<h4 class="card-title">Daftar Pasar</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
							<i class="fa fa-plus"></i>
							Tambah Pasar
						</button>
					</div>
				</div>
				<div class="card-body">
					<!-- Modal -->
					<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
										Entry Data
										</span>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="tambah_pasar" method="post" id="forminput1" enctype="multipart/form-data">
										<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Nama*</label>
													<input id="id_nama" name="nama" required type="text" class="form-control 1" placeholder="nama pasar">
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Alamat*</label>
													<input id="id_alamat" name="alamat" type="text" required class="form-control 1" placeholder="alamat">
												</div>
											</div>
											<div class="col-md-6 pr-0">
												<div class="form-group form-group-default">
													<label>Tahun Didirikan</label>
													<input id="id_tahun_didirikan" type="date" name="tahun_didirikan" class="form-control" placeholder="tahun didirikan">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Perbaikan Terakhir</label>
													<input id="id_perbaikan_terakhir" type="date" name="perbaikan_terakhir" class="form-control" placeholder="perbaikan terakhir">
												</div>
											</div>
											
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Status Kepemilikan</label>
													<input id="id_status_kepemilikan" type="text" class="form-control" name="status_kepemilikan" placeholder="status kepemilikan">
												</div>
											</div>

											<div class="col-md-6 pr-0 ">
												<div class="form-group form-group-default">
													<label>Luas Tanah</label>
													<input id="id_luas_tanah" type="number" class="form-control" name="luas_tanah" placeholder="luas_tanah">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Luas Bangunan</label>
													<input id="id_luas_bangunan" type="number" name="luas_bangunan" class="form-control" placeholder="luas bangunan">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Kondisi</label>
													<input id="id_kondisi" type="text" name="kondisi" class="form-control" placeholder="kondisi">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Komoditi</label>
													<input id="id_komoditi" type="text" name="komoditi" class="form-control" placeholder="komoditi">
												</div>
											</div>
											<div class="col-md-6 pr-0">
												<div class="form-group form-group-default">
													<label>Jumlah Pedagang LOS</label>
													<input id="id_jumlah_pedagang_los" type="number" class="form-control" name="jumlah_pedagang_los" placeholder="jumlah pedagang los">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Jumlah Pedagang KIOS</label>
													<input id="id_jumlah_pedagang_kios" type="number" class="form-control" name="jumlah_pedagang_kios" placeholder="jumlah pedagang kios">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Aktivitas</label>
													<input id="id_aktivitas" name="aktivitas" type="text" class="form-control" placeholder="aktivitas">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Type Pasar</label>
													<input id="id_type_pasar" type="text" class="form-control" name="type_pasar" placeholder="type_pasar">
												</div>
											</div>

											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Foto</label>
													<input type="file" class="form-control" placeholder="foto pasar" name="foto" id="id_foto" accept="image/*" onchange="cekFoto()">
													<img class="img-priview rounded mt-2" width="150" id="priviewFoto">
												</div>
											</div>

											<div class="col-md-6 pr-0">
												<div class="form-group form-group-default">
													<label>Latitude</label>
													<input id="id_latitude" type="text" class="form-control" placeholder="latitude" name="latitude">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Longitude</label>
													<input id="id_longitude" type="text" name="longitude" class="form-control" placeholder="longitude">
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer no-bd">
									<button type="button"  onclick="buttonSimpan(1)" class="btn btn-primary">Simpan</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
		
					<div class="table-responsive">
						<table id="tabel1" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th style="text-align: center; width:3%">No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th style="text-align: center; width:10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $row)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$row['nama']}}</td>
									<td>{{$row['alamat']}}</td>
									<td>
										<div class="form-button-action">
											<form action="detail_pasar" method="post">
												@csrf
												<input type="hidden" name="id" value="{{$row['id_pasar']}}">
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Detail">
													<i class="fa fa-info"></i>
												</button>
											</form>
											<button type="button" onclick="buttonModalEdit({{$row}})" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" >
												<i class="fa fa-edit"></i>
											</button>
											<form action="hapus_pasar" method="post" id="formHapus{{$row['id_pasar']}}">
												@csrf
												<input type="hidden" name="id" value="{{$row['id_pasar']}}">
												<button type="button" onclick="buttonHapus({{$row}})" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
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
			</div>
		</div>

	</div>
</div>
      
@endsection
