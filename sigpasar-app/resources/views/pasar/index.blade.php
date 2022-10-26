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
					</div>
				</div>
				<div class="card-body">
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
									<td>{{$row['nama_pasar']}}</td>
									<td>{{$row['alamat']}}</td>
									<td>
										<div class="form-button-action">
											<form action="/detil_pasar" method="post">
												@csrf
												<input type="hidden" name="id" value="{{$row['id_pasar']}}">
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" formtarget="_blank" data-original-title="Detail">
													<i class="fa fa-info"></i>
												</button>
											</form>

											<a href="/EditPasar/{{Crypt::encrypt($row['id_pasar'])}}" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Edit">
												<i class="fa fa-edit"></i>
											</a>

											<form action="/hapus_pasar" method="post" id="formHapus{{$row['id_pasar']}}">
												@csrf
												<input type="hidden" name="id" value="{{$row['id_pasar']}}">
												<button type="button" onclick="buttonHapus('formHapus',{{$row['id_pasar']}})" data-toggle="tooltip" class="btn btn-link btn-danger" data-original-title="Hapus">
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
