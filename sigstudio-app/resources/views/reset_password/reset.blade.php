<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Reset Password</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('assets_user')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="{{ asset('js/alert.js') }}"></script>
    <link href="{{url('assets_user')}}/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="reset_password" method="post" id="forminput1">
        @csrf
      <h4 class="mb-3 font-weight-normal">Masukkan password baru</h4>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="text" id="inputPassword" class="form-control 1" placeholder="Password" required name="password">
      <button class="btn btn-lg btn-primary btn-block mt-2" type="button" onclick="buttonSimpan(1)">Simpan</button>
      {{-- <p class="mt-5 mb-3 text-muted">&copy; SI</p> --}}
    </form>
  </body>
</html>
