@include('components.header')

@include('components.topbar')

@include('components.sidebar')		

		<div class="main-panel">
			<div class="content">
				
				@yield('isi_konten')

			</div>

@include('components.footer')
@include('components.load_css_js')