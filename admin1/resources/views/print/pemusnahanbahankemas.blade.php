<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
        P {
            margin-bottom: 3px;
        }

        table {
            width: 100%;
            margin-top: -15;
            border-collapse: collapse;

        }

        td {
            border: 1px solid black;
            padding: 5px 3px;
        }

        tr {
            text-align: center;
        }

        h3 {
            float: left;
            font-size: 12;
            font-weight: lighter;
            /* margin-bottom: auto; */
        }

        @page {
            size: auto;
            margin: 5mm;
        }

        /* Kop Surat */
        .kop {
            border-bottom: 5px solid black;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
        }

        .tengah {
            text-align: center;
        }

        /* isi */
        .isi {
            text-align: center;
        }
    </style>

    <title>print</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4 landscape
        }
    </style>
</head>

<body class="A4 landscape">
    <section class="sheet padding-10mm" style="height: auto;">
    <table width="100%" class="kop">
            <tr>
                <td style="border:none;"  width="30%">
                    <img src={{ asset("asset/logo/$logo") }} style="height:120px; width:auto;" alt="Your Picture">
                </td>
                <td width="70%" class="tengah" style="border:none;">
                <center>
                    <h1 style="font-weight: bolder; margin-bottom: -15px">
                        {{ $nama }}
                    </h1>
                    <p style="margin-bottom: -5px; font-size: 28px; ">
                        {{ $alamat }}
                    </p>
                    <p style="margin-bottom: -5px; font-size: 16px;">
                        No Handphone : {{ $nohp }}
                    </p>
                    </center>
                </td>
            </tr>
        </table>
        <center>
            <br>
            <!-- Isi Surat -->
            <h4 style="text-align: center;">CATATAN PEMUSNAHAN BAHAN KEMAS</h4>
            <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <table class="table isi table-bordered">
                        <tr>
                            <td>NO</td>
                            <td>TANGGAL</td>
                            <td>NAMA<br> PRODUK JADI</td>
                            <td>NO<br> BATCH</td>
                            <td>ASAL<br> PRODUK JADI</td>
                            <td>JUMLAH<br> PRODUK JADI</td>
                            <td>ALASAN<br> PEMUSNAHAN</td>
                            <td>CARA<br> PEMUSNAHAN</td>
                            <td>PETUGAS<br> (NAMA, PARAF)</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>{{$data['tanggal_pemusnahan']}}</td>
                            <td>{{$data['nama_bahan_kemas']}}</td>
                            <td>{{$data['no_batch']}}</td>
                            <td>{{$data['asal_bahankemas']}}</td>
                            <td>{{$data['jumlah_bahankemas']}}</td>
                            <td>{{$data['alasan_pemusnahan']}}</td>
                            <td>{{$data['cara_pemunsnahan']}}</td>
                            <td>{{$data['nama_petugas']}}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </center>
    </section>
</body>

</html>