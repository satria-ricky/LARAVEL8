<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ url('/assets/img/profile.jpg') }} " alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ auth()->user()->user_nama; }}
									<span class="user-level">
									@if (auth()->user()->user_level == 1 )
										Administrator
									@else
										User
									@endif 
								</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Pengaturan Akun</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?= ($is_aktif === 'beranda') ? 'active' : '' ?>">
							<a href="/beranda">
								<i class="fas fa-home"></i>
								<p>Beranda</p>
							</a>
						</li>
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">aset</h4>
						</li>

						<li class="nav-item <?= ($is_aktif === 'aset') ? 'active' : '' ?>">
							<a data-toggle="collapse" href="#sidebar_aset">
								<i class="fas fa-layer-group"></i>
								<p>Kelola Aset</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebar_aset">
								<ul class="nav nav-collapse">
									<li>
										<a href="/daftar-aset">
											<span class="sub-item">Daftar Aset</span>
										</a>
									</li>
									<li>
										<a href="/tambah-aset">
											<span class="sub-item">Tambah Aset</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->