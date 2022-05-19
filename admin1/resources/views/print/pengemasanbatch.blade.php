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

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->

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
            @foreach ($kop as $row)
                <table class="table table-bordered">
                    <tr>
                        <td rowspan="4">
                            <img src={{ asset("asset/logo/$logo") }} style="height:120px; width:auto;"
                                alt="Your Picture">

                        </td>
                        <td rowspan="2" style="text-align: center;">
                            CATATAN<br>PENGOLAHAN BATCH
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
                            {{ $row['laporan_diajukan'] }} <br>
                            Tanggal <br>
                            {{ $row['tgl_diajukan'] }}
                        </td>
                        <td rowspan="3">
                            Disetujui Oleh <br>
                            {{ $row['laporan_diterima'] }} <br>
                            Tanggal <br>
                            {{ $row['tgl_diajukan'] }}
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
            <table class="mt-3">
                <thead>
                    <tr>
                        <td>Kode</td>
                        <td>Nama</td>
                        <td>Nomor Batch</td>
                        <td>Besar Batch</td>
                        <td>Bentuk Sediaan</td>
                        <td>Kemasan</td>
                        <td>Tanggal Pengolahan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data['kode_produk'] }}</td>
                        <td>{{ $data['nama_produk'] }}</td>
                        <td>{{ $data['no_batch'] }}</td>
                        <td>{{ $data['besar_batch'] }}</td>
                        <td>{{ $data['bentuksediaan'] }}</td>
                        <td>{{ $data['kemasan'] }}</td>
                        <td>{{ $data['mulai'] }} sampai
                            {{ $data['selesai'] }}
                        </td>
                    </tr>
                </tbody>

            </table>
            <p style="text-align: left; margin-top: 15px;">1. PENERIMAAN DAN REKONSILIASI BAHAN PENGEMAS</p>
            <table class="table table-bordered">

                <tr>
                    <td rowspan="2">Kode Bahan</td>
                    <td rowspan="2">Nama Bahan Pengemas</td>
                    <td colspan="2" style="text-align: center;">Jumlah</td>
                    <td rowspan="2">No QC</td>
                    <td colspan="2" style="text-align: center;">Jumlah</td>

                </tr>
                <tr>
                    <td>Dibutuhkan</td>
                    <td>Ditolak</td>
                    <td>Dipakai</td>
                    <td>Dikembalikan</td>
                </tr>

                @foreach ($prkemas as $row)
                    <tr>
                        <td>{{ $row['kode_kemas'] }}</td>
                        <td>{{ $row['nama_kemas'] }}</td>
                        <td>{{ $row['j_butuh'] }}</td>
                        <td>{{ $row['j_tolak'] }}</td>
                        <td>{{ $row['no_qc'] }}</td>
                        <td>{{ $row['j_pakai'] }}</td>
                        <td>{{ $row['j_kembali'] }}</td>
                    </tr>
                @endforeach

            </table>

            <p style="text-align: left; margin-top: 15px;">2. PROSEDUR PENGISIAN</p>
            <table class="table">

                <tr>
                    <td>prosedur pengisian</td>
                    <td colspan="2">Paraf</td>
                </tr>
                <?php $i = 1; ?>
                @foreach ($proisi as $row)
                    <tr>
                        <td>
                            {{ $row['isi'] }}
                        </td>
                        <td>
                            <br><br><br>
                        </td>
                        <td>
                            <br><br><br>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach



            </table>
            <p style="text-align: left; margin-top: 15px;">3. PROSEDUR PENANDAAN DAN PENGEMASAN</p>
            <table class="table">

                <tr>
                    <td> Prosedur Pengemasan
                    </td>
                    <td>Paraf</td>
                </tr>
                <?php $i = 1; ?>
                @foreach ($protanda as $row)
                    <tr>
                        <td>
                            {{ $row['isi'] }}
                        </td>
                        <td>
                            <br><br><br>
                        </td>
                        <td>
                            <br><br><br>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach


            </table>

            <p style="text-align: left; margin-top: 15px;">4. PELULUSAN OLEH PENGAWASAN MUTU</p>
            <table class=" table-borderless">
                <tr>
                    <td>
                        Pelulusan akhir dari produk jadi nomor ;
                    </td>
                    <td>
                        tanggal;
                    </td>
                </tr>
                <tr>
                    <td>
                        Pemeriksa <br>
                        Proses pengolahan
                        <br><br><br><br>
                    </td>
                    <td>
                        peninjau <br>
                        catatan pengolahan batch
                        <br><br><br><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Kepala bag. produksi
                        <br><br><br><br>
                    </td>
                </tr>
            </table>

            <p style="text-align: left; margin-top: 15px;">5. PELULUSAN OLEH PENGAWASAN MUTU </p>
            <table class=" table-borderless">
                <tr>
                    <td style="border-right: 0px solid">
                        Pemeriksa <br>
                        Proses pengolahan
                        <br><br><br><br>
                    </td>
                    <td style="border-left: 0px solid; border-right: 0px solid"></td>
                    <td style="border-left: 0px solid">
                        peninjau <br>
                        catatan pengolahan batch
                        <br><br><br><br>
                    </td>
                </tr>
                <tr>
                    <td >
                        Pemeriksaan pengelohan
                        <br>
                        Tanggal<br><br><br>
                    </td>
                    <td>
                        Kepala Bagian Produksi
                        <br>
                        Tanggal<br><br><br>
                    </td>
                    <td>
                        Kepala Bagian Pengawasan Mutu
                        <br>
                        Tanggal<br><br><br>
                    </td>
                </tr>
            </table>


        </center>
    </section>

</body>

</html>
