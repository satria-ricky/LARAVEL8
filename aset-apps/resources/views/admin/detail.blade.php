<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
	<title>SISTEM INVENTARIS BANK NTB SYARIAH</title>

    <link rel="icon" href="{{ url('/assets/img/logo/logo_bank.PNG') }}" type="image/x-icon"/>

    

    <!-- Bootstrap core CSS -->
<link href="{{ url('/assets5/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ url('/assets5/pricing.css') }}" rel="stylesheet">
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
        <img src="../assets/img/logo/logo.PNG" alt="" width="160" height="60">
      </a>
    </div>

    <div class="pricing-header mx-auto text-center">
      {{-- <h1 class="display-4 fw-normal">Detail Aset</h1> --}}
      {{-- <h2 class="display-6 text-center mb-4">Detail Aset</h2> --}}
      <img src="{{ asset('storage/'.$data->aset_foto) }}"alt="" width="250" height="250">
      {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->mergeString(Storage::get('foto/logo_bank.png'))->generate($url)) !!} "> --}}
    </div>
  </header>

  <main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      
    </div>

    <h2 class="display-6 text-center mb-4">Detail Aset</h2>

    <div class="table-responsive">
      <table class="table ">
        <thead>
          <tr>
            <th style="width: 34%;"></th>
            <th style="width: 66%;">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="text-start" >No. Rekening</th>
            <td> {{ $data->aset_no_rekening }} </td>
          </tr>
          
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Deskripsi</th>
                <td> {{ $data->aset_deskripsi }} </td>
            </tr>
            
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">QTY</th>
                <td> {{ $data->aset_qty }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Tanggal Perolehan</th>
                <td> {{ $data->aset_tgl_perolehan }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Tanggal Akhir</th>
                <td> {{ $data->aset_tgl_akhir }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Saldo Perolehan</th>
                <td> {{ $data->aset_saldo_perolehan }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">AKM Susut</th>
                <td> {{ $data->aset_akm_susut }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Nilai Buku</th>
                <td> {{ $data->aset_nilai_buku }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">PRS Susut</th>
                <td> {{ $data->aset_prs_susut }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">GSSL Induk</th>
                <td> {{ $data->aset_gssl_induk }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Uraian</th>
                <td> {{ $data->aset_uraian }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Sumber Perolehan</th>
                <td> {{ $data->aset_sumber_perolehan	 }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
               
            </tr>
        </tbody>
      </table>
    </div>
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    
    </div>
  </footer>
</div>


    
  </body>
</html>
