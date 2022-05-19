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
            size: A4
        }
    </style>
</head>

<body class="A4">
    <center>
        <section class="sheet padding-10mm" style="height: auto;">
            <!-- Kop Surat -->

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
                @foreach($kop as $row)
                <table class="table table-bordered">
                    <tr>
                        <td rowspan="4">
                            <img src={{ asset("asset/logo/$logo") }} style="height: 100px; width:auto;" ;alt="Your Picture">
                        </td>
                        <td rowspan="2" style="text-align: center;">
                            CATATAN<br>PENGMBILAN BAHAN KEMASAN
                        </td>
                        <td colspan="3">Halaman:</td>
                    </tr>
                    <tr>
                        <td rowspan="3" colspan="3">
                            Nomor: <br>
                            Tanggal Berlaku: <br>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            BAGIAN

                        </td>
                        <!-- <td rowspan="3">
                            Nomor: <br>
                            Tanggal Berlaku: <br>
                        </td> -->

                    </tr>
                    <tr></tr>
                    <tr>
                        <td rowspan="3">
                            Disusun Oleh <br>
                            {{$row['laporan_diajukan']}} <br>
                            Tanggal <br>
                            {{$row['tgl_diajukan']}}
                        </td>
                        <td rowspan="3">
                            Disetujui Oleh <br>
                            {{$row['laporan_diterima']}} <br>
                            Tanggal <br>
                            {{$row['tgl_diajukan']}}
                        </td>
                        <td rowspan="3" colspan="3">
                            Mengganti Nomor <br>
                            Tanggal <br>
                            09 Oktober 2019
                        </td>
                    </tr>
                </table>
                @endforeach

                <br>

                <h4 style="text-align: left; margin-bottom: -17px; margin-top:-10px;">Nama Bahan Pengemas: {{$data['nama_kemasan']}} </h4>
                <h4 style="text-align: left; margin-bottom: -17px;">No Batch: {{$data['no_batch']}} </h4>
                <h4 style="text-align: left; ">Tanggal Pengambilan Contoh: {{$data['tanggal_ambil']}} </h4>
                <table class="table isi table-bordered">
                    <tr>
                        <td>No</td>
                        <td>Daftar Periksa</td>
                        <td>Hasil Pemeriksaan</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nama bahan pengemas</td>
                        <td>{{$data['nama_kemasan']}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Nomor Batch</td>
                        <td>{{$data['no_batch']}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kedaluwarsa</td>
                        <td>{{$data['kedaluwarsa']}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Jumlah bahan pengemas dalam master Box</td>
                        <td>{{$data['jumlah_kemasanbox']}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Jumlah Produk Yang Diambil</td>
                        <td>{{$data['jumlah_produk']}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Jenis Dan warna kemasan</td>
                        <td>{{$data['jenis_warnakemasan']}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Kesimpulan</td>
                        <td>DILULUSKAN/DITOLAK</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Diperiksa Oleh,<br> Analis QC <br><br><br><br><br></td>
                        <td>Disetujui Oleh,<br> Kepala Bagian Pengawasan Mutu <br><br><br><br><br></td>
                    </tr>

                </table>

                <!-- <p style="text-align: left; margin-top: 15px; ">1. BATCH</p> -->



            </center>
        </section>


</body>

</html>