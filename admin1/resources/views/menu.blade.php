<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest minified bootstrap js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" href="css/datepicker.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav1 navbar1 navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">BPOM Mataram</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <a class="navbar-brand ps-3" >UD. Semeloto</a>
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> -->
                    <!-- <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.html">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                ENTRY CATATAN
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="assets/pdf/cttbpom.pdf" target="_blank">Catatan Baku BPOM</a>
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#cttpabrik1" aria-expanded="false" aria-controls="cttpabrik1">
                                        Catatan Pabrik
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="cttpabrik1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            
                                        <a class="nav-link" href="pembersihanruangan.html">Pembersihan Ruangan</a>
                                        <a class="nav-link" href="pengolahanbatch.html">Pengolahan Batch</a>
                                        <a class="nav-link" href="penerimaanBB.html">Penerimaan dan Pengeluaran Bahan Awal</a>
                                        <a class="nav-link" href="#">Pembersihan dan Pemakaian Peralatan</a>
                                        <a class="nav-link" href="#">Pelatihan Hygine dan Sanitasi</a>
                                        <a class="nav-link" href="#">Program Pelatihan</a>
                                        <a class="nav-link" href="#">Pengemasan Batch Murni</a>
                                        <a class="nav-link" href="#">Pendistribusian</a>
                                        <a class="nav-link" href="#">Tera Alat</a>
                                        <a class="nav-link" href="#">Pembersihan Alat</a>
                                        <a class="nav-link" href="#">Penggunaan Utama</a>
                                        <a class="nav-link" href="#">Pengambilan Contoh Produk Jadi</a>
                                        <a class="nav-link" href="#">Pengambilan Contoh Bahan baku</a>
                                        <a class="nav-link" href="#">Pengambilan Contoh Bahan Pengemas</a>
                                        <a class="nav-link" href="#">Pemeriksaan Bahan Baku</a>
                                        <a class="nav-link" href="#">Pemeriksaan Bahan Pengemas</a>
                                        <a class="nav-link" href="#">Pemeriksaan Produk Jadi</a>
                                        <a class="nav-link" href="#">Ceklis & TTD Yang Sudah Dibersihkan</a>
                                    </nav>
                                    </div>                               
                                </nav>
                            </div>

                            
                                                     
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                POB
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="assets/pdf/cttbpom.pdf" target="_blank">POB BPOM</a>
                                    <a class="nav-link" href="pobpabrik.html">POB PABRIK</a>
                           </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Summary</div>

                            <a class="nav-link" href="laporan.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan
                            </a>

                         
                            <a class="nav-link" href="perizinan.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Perizinan
                            </a>

                            <a class="nav-link" href="coa.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                COA
                            </a>

                            <a class="nav-link" href="dip.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                DIP
                            </a>


                            
                            
                            
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables -->
                            </a>
                        </div>
                    </div>
                        <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        UD. Semeloto
                    </div>
                </nav>
            </div>
            </div>