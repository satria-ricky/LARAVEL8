<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
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
    <script>
        $(document).ready(function() {
            $('#btnPrint').click(function() {
                $('#btnPrint').hide();
                var css = '@page { size: a4; }',
                    head = document.head || document.getElementsByTagName('head')[0],
                    style = document.createElement('style');
                style.type = 'text/css';
                style.media = 'print';
                if (style.styleSheet) {
                    style.styleSheet.cssText = css;
                } else {
                    style.appendChild(document.createTextNode(css));
                }
                head.appendChild(style);
                window.print();
            });
        })
    </script>

</head>

<body>
    <center>
        <div class="container">
            <!-- Kop Surat -->
            <div class="rangkasurat">
                <table width="100%" class="kop">
                    <tr>
                        <td>
                            <img src="logo.jpg" style="height: 150px;" alt="Your Picture">
                        </td>
                        <td class="tengah">
                            <h1 style="font-weight: bolder;">
                                UD. SEMELOTO
                            </h1>
                            <h3>
                                JL. KEMERDEKAAN RT.019/RW.010 DUSUN PEMANGONG
                            </h3>
                            <h3>
                                DESA LENANGGUAR KABUPATEN SUMBAWA
                            </h3>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Isi Surat -->
            <!-- <h4 style="text-align: center;">CATATAN PENGGUNAAN ALAT</h4> -->
            <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="2">
                                <img src="logo.jpg" style="height: 250px;" alt="Your Picture">
                            </td>
                            <td style="text-align: center;">
                                CATATAN PERORANGAN<br>TENTANG<br>PELATIHAN HEIGIENE<br>DAN SANITASI SERTA<br>DOKUMENTASI
                            </td>
                            <td>Halaman: </td>
                        </tr>
                        <tr>
                            <td>
                                RUANGAN
                            </td>
                            <td>
                                Nomor: <br>
                                Tanggal Berlaku: <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Disusun Oleh <br>
                                Tanggal <br>
                                09 Oktober 2019
                            </td>
                            <td>
                                Disetujui Oleh <br>
                                Tanggal <br>
                                09 Oktober 2019
                            </td>
                            <td>
                                Mengganti Nomor <br>
                                Tanggal <br>
                                09 Oktober 2019
                            </td>
                        </tr>
                    </table>

                    <br>

                    <table class="table isi table-bordered">
                        <tr>
                            <td rowspan="2">Kode Produk</td>
                            <td rowspan="2">Nama Produk</td>
                            <td rowspan="2">Nomor Batch</td>
                            <td rowspan="2">Besar Batch</td>
                            <td rowspan="2">Bentuk<br>Sediaan</td>
                            <td rowspan="2">Kemasan</td>
                            <td colspan="2">Tanggal Pengolahan</td>
                        </tr>
                        <tr>
                            <td>Mulai</td>
                            <td>Selesai</td>
                        </tr>
                        <tr>
                            <td>isi 1</td>
                            <td>isi 2</td>
                            <td>isi 3</td>
                            <td>isi 4</td>
                            <td>isi 5</td>
                            <td>isi 6</td>
                            <td>isi 7</td>
                            <td>isi 8</td>
                        </tr>
                    </table>
                    <p style="text-align: left;">1. PENERIMAAN DAN REKONSILIASI BAHAN PENGEMAS</p>
                    <table class="table isi table-bordered">
                        <tr>
                            <td rowspan="2">Kode Bahan</td>
                            <td rowspan="2">Nama Bahan<br>Pengemas</td>
                            <td colspan="2">Jumlah</td>
                            <td rowspan="2">No.QC</td>
                            <td colspan="2">Jumlah</td>
                            <td colspan="2">Paraf</td>
                        </tr>
                        <tr>
                            <td>Dibutuhkan</td>
                            <td>Ditolak</td>
                            <td>Dipakai</td>
                            <td>Dikembalikan</td>
                            <td>Gudang</td>
                            <td>Produksi</td>
                        </tr>
                        <tr>
                            <td>isi 1</td>
                            <td>isi 2</td>
                            <td>isi 3</td>
                            <td>isi 4</td>
                            <td>isi 5</td>
                            <td>isi 6</td>
                            <td>isi 7</td>
                            <td>isi 8</td>
                            <td>isi 9</td>
                        </tr>
                    </table>
                    <p style="text-align: left; margin-left: 30px;">Tgl. Pengembalian bahan pengemas:</p>
                    <p style="text-align: left; margin-left: 30px;">Paraf pemeriksaan pengemas:</p>
                    <table class="table">
                        <tr>
                            <td rowspan="3">CATATAN</td>
                            <td>Diperiksa Oleh: </td>
                            <td>Disetujui Oleh: </td>
                        </tr>
                        <tr>
                            <td>(TTD)</td>
                            <td>(TTD)</td>
                        </tr>
                        <tr>
                            <td>Kepala Bagian Produksi<br>Tanggal _ _ _</td>
                            <td>Kepala Bagian Pengawas Mutu<br>Tanggal _ _ _</td>
                        </tr>
                    </table>
                    <p style="text-align: left; margin-top: 30px;">2. PROSEDUR PENGISIAN</p>
                    <table class="table isi table-bordered">
                        <tr>
                            <td>Prosedur Pengisian</td>
                            <td>Paraf</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">Lulur di masukkan ke dalam kemasan<br>
                                Di timbang apakah isi sudah sesuai dengan spesifikasi yang di tentukan<br>
                                Tutup rapat kemasan kemudian segel<br></td>
                            <td>(paraf)</td>
                        </tr>
                    </table>
                    <p style="text-align: left; margin-top: 30px;">3. PROSEDUR PENANDAAN DAN PENGEMASAN</p>
                    <table class="table isi table-bordered">
                        <tr>
                            <td>Prosedur Pengemasan</td>
                            <td>Paraf</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">Produk yang sudah di segel di masukkan ke dalam
                                countainer<br>
                                Timbang kembali produk diruang timbang<br>
                                Kirim produk ke ruang pengemasan sekunder<br>
                                Produk dimasukkan ke dalam kardus<br>
                                Kirim produk ke ruang produk jadi dan beri label karantina
                            </td>
                            <td>(paraf)</td>
                        </tr>
                    </table>
                    <p style="text-align: left; margin-top: 30px;">4. PELULUSAN OLEH PENGAWASAN MUTU</p>
                    <table class="table isi table-bordered">
                        <tr>
                            <td style="text-align: left;">Pelulusan akhir dari produk jadi nomor:</td>
                            <td style="text-align: left;">Tanggal:</td>
                        </tr>
                        <tr>
                            <td>
                                Pemeriksa<br>Proses Pengolahan
                            </td>
                            <td>Peninjau<br>Catatan Pengolahan Batch</td>
                        </tr>
                        <tr>
                            <td>(TTD)</td>
                            <td>(TTD)</td>
                        </tr>
                        <tr>
                            <td>Pemeriksa Pengolahan<br>Tanggal: </td>
                            <td>Kepala Bagian Pengawas Mutu<br>Tanggal: </td>
                        </tr>
                        <tr>
                            <td colspan="2">Kepala Bag. Produksi</td>
                        </tr>
                        <tr>
                            <td colspan="2">(TTD)</td>
                        </tr>
                        <tr>
                            <td colspan="2">Kepala Bagian Produksi<br>Tanggal: </td>
                        </tr>
                    </table>
                    <p style="text-align: left; margin-top: 30px;">5. PELULUSAN OLEH PENGAWASAN MUTU</p>
                    <table class="table isi table-bordered">
                        <tr>
                            <td style="text-align: left;">Pelulusan akhir dari produk jadi nomor:</td>
                            <td style="text-align: left;">Tanggal:</td>
                        </tr>
                        <tr>
                            <td>
                                Pemeriksa<br>Proses Pengolahan
                            </td>
                            <td>Peninjau<br>Catatan Pengolahan Batch</td>
                        </tr>
                        <tr>
                            <td>(TTD)</td>
                            <td>(TTD)</td>
                        </tr>
                        <tr>
                            <td>Pemeriksa Pengolahan<br>Tanggal: </td>
                            <td>Kepala Bagian Pengawas Mutu<br>Tanggal: </td>
                        </tr>
                        <tr>
                            <td colspan="2">Kepala Bag. Produksi</td>
                        </tr>
                        <tr>
                            <td colspan="2">(TTD)</td>
                        </tr>
                        <tr>
                            <td colspan="2">Kepala Bagian Produksi<br>Tanggal: </td>
                        </tr>
                    </table>
                </div>
            </div>
    </center>

    </div>


    <section>
        <button type="button" id="btnPrint" class="btn btn-primary pull-right">Print</button>
    </section>

</body>

</html>