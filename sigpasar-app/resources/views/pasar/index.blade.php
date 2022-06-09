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
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
										New</span> 
										<span class="fw-light">
											Row
										</span>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p class="small">Create a new row using this form, make sure you fill them all</p>
									<form>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Name</label>
													<input id="addName" type="text" class="form-control" placeholder="fill name">
												</div>
											</div>
											<div class="col-md-6 pr-0">
												<div class="form-group form-group-default">
													<label>Position</label>
													<input id="addPosition" type="text" class="form-control" placeholder="fill position">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Office</label>
													<input id="addOffice" type="text" class="form-control" placeholder="fill office">
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer no-bd">
									<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
		
					<div class="table-responsive">
						<table id="add-row" class="display table table-striped table-hover" >
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
											<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Detail">
												<i class="fa fa-info"></i>
											</button>
											<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
												<i class="fa fa-edit"></i>
											</button>
											<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
												<i class="fa fa-times"></i>
											</button>
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
