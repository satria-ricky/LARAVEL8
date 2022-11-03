<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sistem Informasi Pemetaan Lokasi Pasar di Kota Mataram</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url('assets_user')}}/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{url('assets_user')}}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{url('assets_user')}}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});	
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{url('assets_user')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('assets_user')}}/css/atlantis.min.css">
	
	{{-- swall --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="{{ asset('js/alert.js') }}"></script>
	<script src="{{ asset('css/aset.css') }}"></script>

	{{-- LEAFLET --}}
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

	<link rel="stylesheet" href="{{ url('leaflet-locatecontrol') }}/dist/L.Control.Locate.min.css" />
    <script src="{{ url('leaflet-locatecontrol') }}/src/L.Control.Locate.js"></script>
    <link rel="stylesheet" href="{{ url('leaflet-search') }}/src/leaflet-search.css" />
    <script src="{{ url('leaflet-search') }}/src/leaflet-search.js"></script>
	
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="#" class="logo">
					{{-- <img src="{{url('assets_user')}}/img/logo.svg" alt="navbar brand" class="navbar-brand"> --}}
					<h2 class="text-white pt-3 fw-bold ml-5">SIMPLE</h2>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{asset('storage/'.Auth::user()->foto)}}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{asset('storage/'.Auth::user()->foto)}}" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ Auth::user()->nama}}</h4>
												<p class="text-muted">{{Auth::user()->username}}</p>
												{{-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> --}}
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/profile">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/resetPassword">Reset Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="javascript:" onclick="buttonLogout()">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('storage/'.Auth::user()->foto)}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->nama}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="/profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="/">
											<span class="link-collapse">Home Page</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item @if(Request::is('dashboard')) active @endif">
							<a href="/dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data</h4>
						</li>

						<li class="nav-item @if(Request::is('pasar')) active @elseif(Request::is('tambah_pasar')) active @elseif(Request::is('EditPasar/*')) active @endif">
							<a data-toggle="collapse" href="#tambah_pasar">
								<i class="fas fa-store"></i>
								<p>Pasar</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tambah_pasar">
								<ul class="nav nav-collapse">
									<li>
										<a href="/pasar">
											<span class="sub-item">Daftar Pasar</span>
										</a>
									</li>
									<li>
										<a href="/tambah_pasar">
											<span class="sub-item">Tambah Pasar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item @if(Request::is('produk')) active @endif">
							<a href="/produk">
								<i class="fas fa-th-list"></i>
								<p> Produk </p>
							</a>
						</li>
						<li class="mx-4 mt-2">
							<form action="/logout" method="post" id="formLogout">
								@csrf
								<button type="button" onclick="buttonLogout()" class="btn btn-danger btn-block"> <span class="btn-label mr-2"> <i class="fa fa-arrow-left"></i> </span>Logout </button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			
			@yield('isi_konten')

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							{{-- <li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li> --}}
						</ul>
					</nav>
					<div class="copyright ml-auto">
						<a href="javascript:">Sistem Informasi Pemetaan Lokasi Pasar di Kota Mataram</a>
					</div>				
				</div>
			</footer>
		</div>

	</div>

	<!--   Core JS Files   -->
	<script src="{{url('assets_user')}}/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{url('assets_user')}}/js/core/popper.min.js"></script>
	<script src="{{url('assets_user')}}/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{url('assets_user')}}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{url('assets_user')}}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{url('assets_user')}}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="{{url('assets_user')}}/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="{{url('assets_user')}}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="{{url('assets_user')}}/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="{{url('assets_user')}}/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="{{url('assets_user')}}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{url('assets_user')}}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="{{url('assets_user')}}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="{{url('assets_user')}}/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{url('assets_user')}}/js/atlantis.min.js"></script>

	
	@if(Request::is('tambah_pasar')) 
		<script src="{{ asset('js/peta_tambah_pasar.js') }}"></script>
		{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
		<script>
			let startYear = 1800;
			let endYear = new Date().getFullYear();
			for (i = endYear; i > startYear; i--)
			{
				$('#id_tahun_didirikan').append($('<option />').val(i).html(i));
				$('#id_perbaikan_terakhir').append($('<option />').val(i).html(i));
			}
		</script>
	@endif

	@if(Request::is('EditPasar/*')) 
		<script src="{{ asset('js/peta_edit_pasar.js') }}"></script> 
		{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
		<script>
			let startYear = 1800;
			let endYear = new Date().getFullYear();
			for (i = endYear; i > startYear; i--)
			{
				$('#id_tahun_didirikan').append($('<option />').val(i).html(i));
				$('#id_perbaikan_terakhir').append($('<option />').val(i).html(i));
				document.getElementById('id_tahun_didirikan').value={{ $data->tahun_didirikan }};
				document.getElementById('id_perbaikan_terakhir').value={{ $data->perbaikan_terakhir }};
			}
		</script>
	@endif

	
		
	 <script>
		$('#tabel1').DataTable({
			});
	 </script>

	@if(session()->has('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "{{ session('success') }}",
            });
        </script>
    @endif
    @if(session()->has('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Gagal!",
            text: "{{ session('error') }}",
        });
    </script>
    @endif

</body>
</html>