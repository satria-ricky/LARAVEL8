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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="{{ asset('js/alert.js') }}"></script>

</head>

<body id="body" data-spy="scroll" data-target=".navbar">

    <header id="header-section">
        <nav class="navbar navbar-expand"
            style="background-color: #f7f8fa; padding-top:8px; padding-bottom:4px; padding-left:8px">
            <div class="container">
                <div class="navbar-brand-wrapper">
                    <h3> <a href="/"><i class="fa fa-arrow-left"></i></a> Detail Pasar | {{ $data->nama_pasar }}
                        </h1>
                </div>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">


        <div class="container">

            @if ($data->foto == '')
                <img src="{{ asset('storage/foto-pasar/default.png') }}">
            @else
                <center>
                    <img src="{{ asset('storage/' . $data->foto) }}" alt="foto pasar" alt="foto pasar" width="250"
                        height="250">
                </center>
            @endif




            <div class="container mt-2"
                style="border-style:solid;border-color: silver; border-radius: 15px; padding:10px; border-width: thin; ">

                <table class="table" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th scope="row" style="width:20%; border-top: none !important;">Nama Pasar</th>
                            <td style="width:1%;border-top: none !important;">:</td>
                            <td style="border-top: none !important;">{{ $data->nama_pasar }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>:</td>
                            <td>{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Deskripsi</th>
                            <td>:</td>
                            <td>{{ $data->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tahun Didirikan</th>
                            <td>:</td>
                            <td>{{ $data->tahun_didirikan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Perbaikan Terakhir</th>
                            <td>:</td>
                            <td>{{ $data->perbaikan_terakhir }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status Kepemilikan</th>
                            <td>:</td>
                            <td>{{ $data->status_kepemilikan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Luas Tanah</th>
                            <td>:</td>
                            <td>{{ $data->luas_tanah }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Luas Bangunan</th>
                            <td>:</td>
                            <td>{{ $data->luas_bangunan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kondisi</th>
                            <td>:</td>
                            <td>{{ $data->kondisi }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Komoditi</th>
                            <td>:</td>
                            <td>{{ $data->komoditi }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Pedagang Los</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_pedagang_los }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Pedagang Kios</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_pedagang_kios }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Aktivitas</th>
                            <td>:</td>
                            <td>{{ $data->aktivitas }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Type Pasar</th>
                            <td>:</td>
                            <td>{{ $data->type_pasar }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>
            <section class="customer-feedback">
                <div class="row">
                    <div class="col-12 text-center pb-5">
                        <h2>List Products</h2>

                        <center>
                            <input class="form-control input-lg" list="datalistOptions" id="exampleDataList"
                                placeholder="Type to find youre product..." style="width: 60%;">
                            <datalist id="datalistOptions">
                                @foreach ($produk as $item)
                                    <option data-value="{{ $item->id_produk }}"> {{ $item->nama_produk }}
                                    </option>
                                @endforeach
                            </datalist>
                            <form action="/lokasi_pasar" method="post" id="formProduk">
                                @csrf
                                <input type="hidden" name="id" id="idProdukFormProduk">
                            </form>
                        </center>

                    </div>

                </div>
            </section>
            <hr>
            <section class="contact-us mb-5">
                <center>
                    <div class="content-header">
                        <h2>Maps</h2>

                    </div>
                </center>
                <div id="mapid" style="width: 100%; height: 400px;"></div>
            </section>

            <footer class="border-top">
                <p class="text-center text-muted pt-4">
                    Sistem Informasi Pemetaan Lokasi Pasar Tradisional di Kota Mataram
                    {{-- Copyright © 2021<a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved. --}}
                </p>

                {{-- <p class="text-center text-muted pt-2">Distributed By: <a href="https://www.themewagon.com/" class="px-1" target="_blank">Themewagon</a></p> --}}
            </footer>
        </div>
    </div>

    <script src="{{ url('assets') }}/vendors/jquery/jquery.min.js"></script>
    <script src="{{ url('assets') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="{{ url('assets') }}/vendors/aos/js/aos.js"></script>
    <script src="{{ url('assets') }}/js/landingpage.js"></script>

    <script>
        navigator.geolocation.getCurrentPosition(function(location) {
            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);


            console.log(location.coords.latitude, location.coords.longitude);

            document.getElementById('mapid').innerHTML =
                "<div id='data_peta' style='width: 100%; height: 450px;'></div>";


            var mymap = new L.Map('data_peta', {
                zoom: 18,
                center: new L.latLng([{{ $data->latitude }}, {{ $data->longitude }}])
            });

            mymap.addLayer(new L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 12,
                    attribution: 'Sistem Informasi Pemetaan Lokasi Pasar Tradisional',
                    id: 'mapbox/streets-v11',
                }));


            var markersLayer = new L.LayerGroup();
            mymap.addLayer(markersLayer);


            var mylocation = L.marker(latlng).addTo(mymap).bindPopup('Youre location!');

            var icon_map = L.icon({
                iconUrl: '{{ url('assets') }}/images/marker.png',
                iconSize: [40, 40], // size of the icon
            });

            var nama_pasar = '{{ $data->nama_pasar }}';
            var titik_koordinat = [{{ $data->latitude }}, {{ $data->longitude }}];

            marker = new L.Marker(new L.latLng(titik_koordinat), {
                title: nama_pasar,
                icon: icon_map
            });

            marker.bindPopup(`
                                  <div class="card" style="width: 15rem; height:15rem;">
                                    <div class="card-body">
                                      <h3 class="card-title">{{ $data->nama_pasar }}</h3>
                                      <p class="card-text">{{ $data->alamat }}.</p>
                                      <a href="https://www.google.com/maps/dir/?api=1&origin=` + location.coords
                .latitude + `,` + location.coords.longitude + `&destination=` + {{ $data->latitude }} + `,` +
                {{ $data->longitude }} + `" target='_blank' type="button" class="btn btn-outline-success"> Rute</a>
                                      </div>
                                    </div>
                                  </div>`
            );

            markersLayer.addLayer(marker);



        });


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
