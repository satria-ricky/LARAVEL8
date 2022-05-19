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

<body class="A4">

    <div class="container">


        <h2 style="text-align: center;">Pengolahan Batch</h2>

        <div class="form-group">

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <table class="table table-bordered">
                    <tr>
                        <td rowspan="2">
                            <img src="{{asset('asset/logo/logo.jpg')}}" ;alt="Your Picture">
                        </td>
                        <td>
                            Bagian </br> Produksi
                        </td>
                        <td>
                            Sesuai dengan POB no :
                        </td>
                    </tr>
                    <tr>
                        <td>Disusun Oleh <br> nama <br><br>Tanggal <br> 14 Oktober 2019</td>
                        <td>Disetujui Oleh <br> nama <br><br>Tanggal <br> 14 Oktober 2019</td>

                    </tr>
                </table>

                <br>

                <table class="table table-bordered">
                    <tr>
                        <td>Kode</td>
                        <td>Nama</td>
                        <td>Nomor Batch</td>
                        <td>Besar Batch</td>
                        <td>Bentuk Sediaan</td>
                        <td>Kemasan</td>
                        <td>Tanggal Pengolahan</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>Nama</td>
                        <td>Nomor</td>
                        <td>Besar </td>
                        <td>Bentukn</td>
                        <td>Kemasan</td>
                        <td>14 Pengolahan</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>Nama</td>
                        <td>Nomor</td>
                        <td>Besar </td>
                        <td>Bentukn</td>
                        <td>Kemasan</td>
                        <td>14 Pengolahan</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>Nama</td>
                        <td>Nomor</td>
                        <td>Besar </td>
                        <td>Bentukn</td>
                        <td>Kemasan</td>
                        <td>14 Pengolahan</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>Nama</td>
                        <td>Nomor</td>
                        <td>Besar </td>
                        <td>Bentukn</td>
                        <td>Kemasan</td>
                        <td>14 Pengolahan</td>
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>Nama</td>
                        <td>Nomor</td>
                        <td>Besar </td>
                        <td>Bentukn</td>
                        <td>Kemasan</td>
                        <td>14 Pengolahan</td>
                    </tr>
                </table>
            </div>
        </div>


    </div>


    <section>
        <button type="button" id="btnPrint" class="btn btn-primary pull-right">Print</button>
    </section>

</body>

</html>