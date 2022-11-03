@extends('layout.main_layout')

@section('isi_konten')

<div class="content">
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Produk</h2>
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
						<h4 class="card-title">Daftar Produk</h4>
						<button class="btn btn-primary btn-round ml-auto" onclick="buttonModalTambah('tambah_produk')">
							<i class="fa fa-plus"></i>
							Tambah Produk
						</button>
					</div>
				</div>
				<div class="card-body">
					<!-- Modal -->
					<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-sm" role="document">
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
									<form action="tambah_produk" method="post" id="forminput1" enctype="multipart/form-data">
										<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Nama*</label>
													<input id="id_nama" name="nama" required type="text" class="form-control 1 @error('nama') is-invalid @enderror" placeholder="nama produk" >
													@error('nama') 
														<div class="invalid-feedback">
															{{ $message }}
														</div>
													@enderror
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer no-bd">
									<button type="button"  onclick="buttonSimpan(1)" class="btn btn-primary">Simpan</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal" >Tutup</button>
								</div>
							</div>
						</div>
					</div>
		
					<div class="table-responsive">
						<table id="tabel1" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th style="text-align: center; width:3%">No</th>
									<th>Nama Produk</th>
									<th style="text-align: center; width:10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $row)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$row['nama_produk']}}</td>
									<td>
										<div class="form-button-action">

											<button type="button" onclick="buttonModalEditProduk({{$row}})" data-toggle="tooltip" class="btn btn-link btn-primary " data-original-title="Edit" >
												<i class="fa fa-edit"></i>
											</button>
											<form action="hapus_produk" method="post" id="formHapus{{$row['id_produk']}}">
												@csrf
												<input type="hidden" name="id" value="{{$row['id_produk']}}">
												<button type="button" onclick="buttonHapus('formHapus',{{$row['id_produk']}})" data-toggle="tooltip" class="btn btn-link btn-danger" data-original-title="Hapus">
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
