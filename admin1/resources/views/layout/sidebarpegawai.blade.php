<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion" style="background-color: #00FFFF;" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a style="color: black;" class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Dashboard
                </a>
                <a style="color: black;" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    CATATAN
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div style="color: black;" class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a  style="color: black;" class="nav-link" data-bs-toggle="collapse" data-bs-target="#cttpabrik1"
                                    aria-expanded="false" aria-controls="cttpabrik1" href="#">Dokumentasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="cttpabrik1" aria-labelledby="headingOne"
                                    data-bs-parent="#cttpabrik0">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <a style="color: black;" class="nav-link" href="{{ route('penerimaanBB') }}">Penerimaan
                                            Penyerahan dan
                                            Penyimapanan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('ambilcontoh') }}">Pengambilan
                                            Sample</a>
                                        <a style="color: black;" class="nav-link"
                                            href="{{ route('program-dan-pelatihan-higiene-dan-sanitasi') }}">Program
                                            dan
                                            Pelatihan
                                            Higiene dan Sanitasi</a>
                                        <a style="color: black;" class="nav-link"
                                            href="{{ route('pengoprasian-alat') }}">Pengoperasian
                                            Peralatan
                                            Utama</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('penimbangan') }}">Penimbangan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('pengolahanbatch') }}">Pengolahan
                                            Batch</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('pengemasan-batch') }}">Pengemasan
                                            Batch</a>
                                        <!-- <a class="nav-link" href="#">Cara Pemberian Nomor Batch</a> -->
                                        <a style="color: black;" class="nav-link" href="{{ route('pelulusan-produk') }}">Pelulusan
                                            Produk Jadi</a>
                                        <a style="color: black;" class="nav-link"
                                            href="{{ route('pendistribusian-produk') }}">Pendistribusian
                                            Produk</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('penanganan-keluhan') }}">Penanganan
                                            Keluhan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('penarikan-produk') }}">Penarikan
                                            Produk</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('pemusnahan-produk') }}">Pemusnahan
                                            Produk</a>
                                        <!-- <a class="nav-link" href="#">Penanganan Contoh Tertinggal</a> -->
                                        <!-- <a class="nav-link" href="#">Pembuatan PROTAP dan Penomoran</a> -->
                                        <a style="color: black;" class="nav-link" href="{{ route('kartu-stok') }}">Kartu Stok</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('kalibrasi-alat') }}">Kalibrasi
                                            Alat</a>
                                        <a style="color: black;" class="nav-link"
                                            href="{{ route('pemeriksaan-bahan') }}">Pemeriksaan/Pengujian
                                            Bahan</a>
                                    </nav>
                                </div>
                                <a style="color: black;" class="nav-link" data-bs-toggle="collapse" data-bs-target="#cttpabrik2"
                                    aria-expanded="false" aria-controls="cttpabrik2" href="#">Higiene dan Sanitasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="cttpabrik2" aria-labelledby="headingOne"
                                    data-bs-parent="#cttpabrik0">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a style="color: black;" class="nav-link" href="{{ route('periksapersonil') }}">Pemeriksaan
                                            Personil</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('periksasaniruang') }}">Pembersihan
                                            Saniiitasi
                                            Ruangan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('periksasanialat') }}">Pembersihan
                                            Sanitasi Alat</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>

                    </nav>
                </div>



                <a style="color: black;" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1"
                    aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    PROTAP
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div style="color: black;" class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a style="color: black;" class="nav-link" data-bs-toggle="collapse" data-bs-target="#protappabrik1"
                                    aria-expanded="false" aria-controls="protappabrik1" href="#">Dokumentasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="protappabrik1" aria-labelledby="headingOne"
                                    data-bs-parent="#protappabrik0">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 1) }}">Penerimaan
                                            Penyerahan
                                            dan
                                            Penyimapanan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 2) }}">Pengambilan
                                            Contoh</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 3) }}">Spesifikasi
                                            Bahan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 4) }}">Pelatihan Higiene
                                            dan
                                            Sanitasi Bagi
                                            Karyawan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 5) }}">Pengoperasian
                                            Peralatan Utama</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 6) }}">Struktur Organisasi
                                            Personil yang
                                            Menjabat</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 7) }}">Penimbangan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 8) }}">Pengolahan
                                            Batch</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 9) }}">Pengemasan
                                            Batch</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 10) }}">Peberian Nomor
                                            Batch</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 11) }}">Pelulusan Produk
                                            Jadi</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 12) }}">Uji Ulang Bahan
                                            Baku</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 13) }}">Penanganan
                                            Keluhan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 14) }}">Penarikan
                                            Produk</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 15) }}">Pemusnahan
                                            Produk</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 16) }}">Penanganan Contoh
                                            Tertinggal</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 24) }}">Penanganan Contoh
                                            Tertinggal</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 17) }}">Pembuatan PROTAP
                                            dan
                                            Penomoran</a>
                                        <!-- <a class="nav-link" href="{{ route('tampil', 18) }}">Ceklis & TTD Yang
                                            Sudah Dibersihkan</a> -->
                                        <a style="color: black;" class="nav-link"
                                            href="{{ route('tampil', 24) }}">Pemeriksaan/Pengujian
                                            Bahan</a>
                                    </nav>
                                </div>
                                <a style="color: black;" class="nav-link" data-bs-toggle="collapse" data-bs-target="#protappabrik2"
                                    aria-expanded="false" aria-controls="protappabrik2" href="#">Higiene dan Sanitasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="protappabrik2" aria-labelledby="headingOne"
                                    data-bs-parent="#protappabrik0">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 19) }}">Label Status
                                            Kebersihan
                                            Peralatan Sebelum Pengguanaan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 20) }}">Program
                                            Pemeriksaan
                                            Kesehatan
                                            Untuk Personil Prodi</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 21) }}">Pembersihan dan
                                            Sanitasi
                                            Peralatan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 22) }}">Pembersihan dan
                                            Sanitasi Ruangan</a>
                                        <a style="color: black;" class="nav-link" href="{{ route('tampil', 23) }}">Penerapan Higieni
                                            Perorangan</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>

                    </nav>
                </div>
                <a style="color: black;" class="nav-link" href="{{ route('tampil', 24) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Pemeriksaan/Pengujian
                    Bahan
                </a>

                <a style="color: black;" class="nav-link" href="assets/pdf/cttbpom.pdf" target="_blank">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Format Baku BPOM
                </a>
            </div>
        </div>

    </nav>
</div>
