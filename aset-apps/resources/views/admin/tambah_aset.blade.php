
@extends('layouts.main')

@section('isi_konten')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">


        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">{{ $judul_navigasi }}</h2>
                <!-- <h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5> -->
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
            </div>
        </div>

        
    </div>
</div>
<div class="page-inner mt--5">

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Form Elements</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-lg-6">
						<form action="/tambah-aset" method="post" id="form-tambah" enctype="multipart/form-data">	
							@csrf
							<div class="form-group">
								<label for="exampleFormControlSelect1">Nama Aset :</label>
								<select class="form-control @error('aset_gssl_induk') is-invalid @enderror" id="exampleFormControlSelect1" name="aset_gssl_induk">
									<option value="">-- Pilih nama aset -- </option>
									@foreach ($jenis_aset as $j)
										@if (old('aset_gssl_induk') == $j->jenis_id)
											<option selected value="{{ $j->jenis_id }}"> {{$j->jenis_nama}} </option>
										@endif
										<option value="{{ $j->jenis_id }}"> {{$j->jenis_nama}} </option>
									@endforeach
								</select>
								@error('aset_gssl_induk') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>
							
							<div class="form-group">
								<label for="password">No. Rekening</label>
								<input type="number" class="form-control @error('aset_no_rekening') is-invalid @enderror" min="0" id="password"  name="aset_no_rekening" placeholder="Isi no rekening..." value="{{ old('aset_no_rekening') }}" >
								@error('aset_no_rekening') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<label for="comment">Deskripsi</label>
								<textarea class="form-control @error('aset_deskripsi') is-invalid @enderror" id="comment" rows="5" name="aset_deskripsi">
									{{ old('aset_deskripsi') }} 
								</textarea>
								@error('aset_deskripsi') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Qty</span>
									</div>
									<input type="number" class="form-control @error('aset_qty') is-invalid @enderror" name="aset_qty"   aria-label="Amount (to the nearest dollar)" value="{{ old('aset_qty') }}">
									@error('aset_qty') 
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>

							<div class="form-group">
								<label for="tgl1">Tanggal Perolehan</label>
								<input type="date" class="form-control @error('aset_tgl_perolehan') is-invalid @enderror" min="0" id="tgl1"  name="aset_tgl_perolehan"  value="{{ old('aset_tgl_perolehan') }}">
								@error('aset_tgl_perolehan') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<label for="tgl2">Tanggal Akhir</label>
								<input type="date" class="form-control @error('aset_tgl_akhir') is-invalid @enderror" min="0" id="tgl2"  name="aset_tgl_akhir"  value="{{ old('aset_tgl_akhir') }}" >
								@error('aset_tgl_akhir') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">PRS Susut</span>
									</div>
									<input type="number" class="form-control @error('aset_prs_susut') is-invalid @enderror" name="aset_prs_susut"   aria-label="Amount (to the nearest dollar)" value="{{ old('aset_prs_susut') }}">
									@error('aset_prs_susut') 
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>

							<div class="form-group">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Sumber Perolehan :</span>
									</div>
									<input type="number" class="form-control @error('aset_sumber_perolehan') is-invalid @enderror" name="aset_sumber_perolehan"   aria-label="Amount (to the nearest dollar)" value="{{ old('aset_sumber_perolehan') }}">
									@error('aset_sumber_perolehan') 
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>

						</div>
						<div class="col-md-6 col-lg-6">				
							<div class="form-group">
								<label for="password">Saldo Perolehan :</label>
								<input type="number" class="form-control @error('aset_saldo_perolehan') is-invalid @enderror" min="0" id="password"  name="aset_saldo_perolehan" placeholder="Rp. ..." value="{{ old('aset_saldo_perolehan') }}">
								@error('aset_saldo_perolehan') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<label for="password">AKM Susut :</label>
								<input type="number" class="form-control @error('aset_akm_susut') is-invalid @enderror" min="0" id="password"  name="aset_akm_susut" placeholder="Rp. ..." value="{{ old('aset_akm_susut') }}">
								@error('aset_akm_susut') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<label for="password">Nilai Buku</label>
								<input type="number" class="form-control @error('aset_nilai_buku') is-invalid @enderror" min="0" id="password"  name="aset_nilai_buku" placeholder="Rp. ..." value="{{ old('aset_nilai_buku') }}">
								@error('aset_nilai_buku') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>

							<div class="form-group">
								<label for="comment">Uraian</label>
								<textarea class="form-control @error('aset_uraian') is-invalid @enderror" id="comment" rows="5" name="aset_uraian">
									{{ old('aset_uraian') }}
								</textarea>
								@error('aset_uraian') 
									<div class="invalid-feedback">
										{{ $message }}
								  	</div>
								@enderror
							</div>
							
							
							<div class="form-group">
								<div class="custom-file">
									<input type="file" name="aset_foto" class="custom-file-input @error('aset_foto') is-invalid @enderror" accept="image/*" id="getFoto" onchange="cekFoto()">
									<label class="custom-file-label" for="getFoto">Pilih Foto Aset</label>
									@error('aset_foto') 
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
									
								  </div>	
								  <img class="img-priview rounded mt-2" width="150" id="priviewFoto">
							</div>

							<div class="form-group">
								<button class="btn btn-primary" type="button" id="button-tambah"><i class="fa fa-plus"></i>   Tambah Aset</button>
							</div>
						</div>
					</form>
					</div>
				</div>
				{{-- <div class="card-action">
					
				</div> --}}
			</div>
		</div>
	</div>
					
    
</div>
@endsection

@section('isi_js')
	@include('components.js_priviewImage')
	@include('components.js_tambah')
@endsection