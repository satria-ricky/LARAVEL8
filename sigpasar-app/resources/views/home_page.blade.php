<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Pemetaan Lokasi Pasar Tradisional di Kota Mataram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('assets') }}/vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('assets') }}/vendors/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{ url('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('assets') }}/vendors/aos/css/aos.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/style.min.css">

    {{-- swall --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- MAP --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <link rel="stylesheet" href="{{ url('leaflet-locatecontrol') }}/dist/L.Control.Locate.min.css" />
    <script src="{{ url('leaflet-locatecontrol') }}/src/L.Control.Locate.js"></script>
    <link rel="stylesheet" href="{{ url('leaflet-search') }}/src/leaflet-search.css" />
    <script src="{{ url('leaflet-search') }}/src/leaflet-search.js"></script>

    {{-- <a href="https://www.flaticon.com/free-icons/pin" title="pin icons"></a> --}}

    {{-- <link rel="stylesheet" href="{{url('js')}}/alert.js"> --}}
    {{-- FONT AWESOM --}}
    <link rel="stylesheet" href="http://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="{{ asset('js/alert.js') }}"></script>

</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <img src="{{ url('assets') }}/images/Group2.svg" alt="">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <img src="{{ url('assets') }}/images/Group2.svg" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feedback-section">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features-section">Map</a>
                        </li>
                        {{-- <li class="nav-item">
                          <a class="nav-link" href="#digital-marketing-section">Blog</a>  
                        </li> --}}

                        <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                            @if (Auth::user())
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown no-arrow">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hi, {{ Auth::user()->nama }}
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/dashboard">Back to Dashboard</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="/logout" method="post" id="formLogout">
                                                @csrf
                                                <button type="button" onclick="buttonLogout()"
                                                    class="dropdown-item">Logout </button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Login
                                </button>
                            @endif


                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="banner">
        <div class="container">
            <h1 class="font-weight-semibold">Sistem Informasi Pemetaan Lokasi <br>Pasar Tradisional di Kota Mataram</h1>
            {{-- <h6 class="font-weight-normal text-muted pb-3">Simple is a simple template with a creative design that solves all your marketing and SEO queries.</h6> --}}
            {{-- <div>
        <button class="btn btn-opacity-light mr-1">Get started</button>
        <button class="btn btn-opacity-success ml-1">Learn more</button>
      </div> --}}
            <img src="{{ url('assets') }}/images/Group171.svg" alt="" class="img-fluid">
        </div>
    </div>

    <div class="content-wrapper" style="margin-top: 130px;">
        <div class="container">
            <section class="customer-feedback" id="feedback-section">
                <div class="row">
                    <div class="col-12 text-center pb-5">
                        <h2>Products</h2>
                        {{-- <input type="text" placeholder="find youre product" class="form-control"> --}}
                        <center>
                            <input class="form-control input-lg" list="datalistOptions" id="exampleDataList"
                                placeholder="Type to find youre product..." name="Typelist" style="width: 60%;">
                            <datalist id="datalistOptions">
                                @foreach ($produk as $item)
                                    <option data-value="{{ $item['id_produk'] }}"> {{ $item['nama_produk'] }}
                                    </option>
                                @endforeach
                            </datalist>
                            <form action="/lokasi_pasar" method="post" id="formProduk">
                                @csrf
                                <input type="hidden" name="id" id="idProdukFormProduk">
                            </form>
                        </center>
                        {{-- <h6 class="section-subtitle text-muted m-0">List product.</h6> --}}
                    </div>
                    <div class="owl-carousel owl-theme grid-margin">

                        @foreach ($dataProduk as $item)
                            <div class="card customer-cards">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="card-header">
                                            Produk {{ $item->nama_produk }}
                                        </div>
                                        {{-- <img src="{{ url('assets') }}/images/face2.jpg" width="89" height="89" alt=""
                                        class="img-customer"> --}}

                                        <div class="content-divider m-auto"></div>
                                        <h6 class="customer-designation text-muted mt-5">Tersedia di</h6>
                                        <h6 class="card-title">{{ $item->total_pasar }} Pasar</h6>
                                        <form action="/lokasi_pasar" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id_produk }}">
                                            <button type="submit" class="btn btn-info btn-sm mt-3"> Lihat Lokasi
                                                Pasar <i class="fa fa-arrow-right"></i></button>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            <section class="contact-us mb-5" id="features-section">
                <center>
                    <div class="content-header">
                        <h2>Maps</h2>

                    </div>
                </center>
                {{-- <div class="contact-us-bgimage grid-margin">
                  
                </div> --}}
                <div id="mapid" style="width: 100%; height: 400px;"></div>
            </section>

            <footer class="border-top">
                <p class="text-center text-muted pt-4">
                    Sistem Informasi Pemetaan Lokasi Pasar Tradisional di Kota Mataram
                    {{-- Copyright © 2021<a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved. --}}
                </p>

                {{-- <p class="text-center text-muted pt-2">Distributed By: <a href="https://www.themewagon.com/" class="px-1" target="_blank">Themewagon</a></p> --}}
            </footer>

            <!-- Modal for Contact - us Button -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Login as Administrator</h4>
                        </div>
                        <div class="modal-body">
                            <form action="login" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="Name">Username</label>
                                    <input type="text" class="form-control" id="Name" name="username"
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Password</label>
                                    <input type="password" class="form-control" id="Email-1" name="password"
                                        placeholder="Password" required>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "{{ session('success') }}",
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal!",
                text: "{{ session('error') }}",
            });
        </script>
    @endif

    <script src="{{ url('assets') }}/vendors/jquery/jquery.min.js"></script>
    <script src="{{ url('assets') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="{{ url('assets') }}/vendors/aos/js/aos.js"></script>
    <script src="{{ url('assets') }}/js/landingpage.js"></script>

    <script>
        getData_peta();

        function getData_peta() {
            $.ajax({
                url: "peta_by_pasar",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    // console.log(data);

                    //load data

                    var datasearch = [];
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].latitude != null || data[i].longitude != null) {
                            datasearch.push({
                                "titik_koordinat": [data[i].latitude, data[i].longitude],
                                "nama": data[i].nama_pasar
                            });
                        }
                    }

                    // console.log(datasearch);


                    navigator.geolocation.getCurrentPosition(function(location) {
                        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);


                        console.log(location.coords.latitude, location.coords.longitude);

                        document.getElementById('mapid').innerHTML =
                            "<div id='data_peta' style='width: 100%; height: 450px;'></div>";


                        var mymap = new L.Map('data_peta', {
                            zoom: 12,
                            center: new L.latLng([-8.58280355011038, 116.13464826731037])
                        });

                        mymap.addLayer(new L.tileLayer(
                            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 18,
                                attribution: 'Sistem Informasi Pemetaan Lokasi Pasar Tradisional',
                                id: 'mapbox/streets-v11',
                            }));


                        var markersLayer = new L.LayerGroup();
                        mymap.addLayer(markersLayer);

                        mymap.addControl(new L.Control.Search({
                            position: 'topleft',
                            layer: markersLayer,
                            initial: false,
                            collapsed: true,
                            zoom: 17
                        }));


                        var mylocation = L.marker(latlng).addTo(mymap).bindPopup('Youre location!');


                        for (var i = 0; i < data.length; i++) {
                            if (data[i].latitude != null || data[i].longitude != null) {

                                var icon_map = L.icon({
                                    iconUrl: '{{ url('assets') }}/images/marker.png',
                                    iconSize: [40, 40], // size of the icon
                                });

                                var nama_pasar = data[i].nama_pasar;
                                var titik_koordinat = [data[i].latitude, data[i].longitude];

                                marker = new L.Marker(new L.latLng(titik_koordinat), {
                                    title: nama_pasar,
                                    icon: icon_map
                                });

                                marker.bindPopup(`
                                  <div class="card" style="width: 15rem; height:15rem;">
                                    <div class="card-body">
                                      <h3 class="card-title">` + data[i].nama_pasar + `</h3>
                                      <p class="card-text">` + data[i].alamat + `.</p>
                                      <div class="btn-group">
                                        <form action="detil_pasar" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="` + data[i].id_pasar + `">
                                            <button type="submit" class="btn btn-outline-info mr-2"> Detail</button>
                                        </form>
                                      <a href="https://www.google.com/maps/dir/?api=1&origin=` + location.coords
                                    .latitude + `,` + location.coords.longitude + `&destination=` +
                                    data[i].latitude + `,` + data[i].longitude + `" target='_blank' type="button" class="btn btn-outline-success"> Rute</a>
                                      </div>
                                    </div>
                                  </div>`
                                );

                                markersLayer.addLayer(marker);

                            }
                        }

                    });
                }

            });

        }

        $(document).on('change', '#exampleDataList', function() {

            var val = document.getElementById("exampleDataList").value;
            var value = $('#datalistOptions option').filter(function() {
                return this.value == val;
            }).data('value');
            if (!value) {
                // var msg = 'No Match';
                Swal.fire({
                    icon: "error",
                    title: "Opps!",
                    text: "Produk yg Anda cari tidak tersedia :(",
                });
            } else {
                var msg = value
                document.getElementById("idProdukFormProduk").value = msg;
                document.getElementById('formProduk').submit();
            }
        });
    </script>


</body>

</html>
