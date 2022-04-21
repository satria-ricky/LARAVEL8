@include('components.header')

@include('components.topbar')

@include('components.sidebar')		

		<div class="main-panel">
			<div class="content">
				
				@yield('isi_konten')

			</div>

@include('components.footer')
@yield('isi_js')

@include('components.load_css_js')

