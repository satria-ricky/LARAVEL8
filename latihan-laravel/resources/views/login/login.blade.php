<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="icon" href="../assets/img/logo/logo_bank.PNG" type="image/x-icon"/>
    <title>SISTEM INVENTARIS BANK NTB SYARIAH</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets5/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../assets5/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="/login" method="post">
    @csrf
    <img class="mb-4" src="../assets/img/logo/logo.PNG" alt="" width="200" height="100">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="floatingInput" name="user_email" placeholder="name@example.com" value="{{ old('user_email') }}" required>
      <label for="floatingInput">Email address</label>
      @error('user_email') 
        <div class="invalid-feedback">
          {{ $message }}
          </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control @error('user_password')  is-invalid @enderror" id="floatingPassword" name="user_password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
      @error('user_password') 
        <div class="invalid-feedback">
          {{ $message }}
          </div>
      @enderror
    </div>

    
    <button class="w-100 btn btn-lg btn-success" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>

<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

@if(session()->has('pesan'))
<script>
  swal("{{ session('pesan') }}", {
    icon : "success",
    buttons: {                  
      confirm: {
        className : 'btn btn-success'
      }
    },
  });
</script>
@endif

@if(session()->has('error'))
<script>
  swal("{{ session('error') }}", {
    icon : "error",
    buttons: {                  
      confirm: {
        className : 'btn btn-error'
      }
    },
  });
</script>
@endif
  </body>
</html>
