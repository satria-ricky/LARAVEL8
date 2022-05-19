<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/login.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex align-self-center">
            <div class="col-lg-8 col-md-8 d-none d-md-block image-container"></div>
            <div class="col-lg-4 col-md-4 container">
                <div class="text-center">
                    <img src="assets/img/bpom1.jpg" style="width: 25%; margin-top:5%;" class="img-fluid"
                        alt="Responsive image" background-repeat:>
                </div>

                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center my-1">Login</h3>
                    </div>
                    <div class="card-body">
                        <form id='forminput' action="/login" method="post" has-recaptcha-v2>
                            @if (Session::has('message'))
                                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                            @endif
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-floating mb-3">
                                <label for="inputEmail">Username</label>
                                <input name="username" class="form-control" id="inputEmail" type="text"
                                    placeholder="Masukan Username" />

                            </div>
                            <div class="form-floating mb-3">
                                <label for="inputPassword">Password</label>
                                <input name="password" class="form-control" id="inputPassword" type="password"
                                    placeholder="Masukan Password" />

                            </div>
                            <div class="g-recaptcha" data-callback="recaptcha_callback"
                                data-sitekey="6Lecb2YfAAAAAIR2uhydBgujcJ7VLBleTtAkDFQJ"></div>
                            <p id="art" class="text-danger"></p>
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                <label class="form-check-label" for="inputRememberPassword">Remember
                                    Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="/resetpass"></a>
                                <a onclick="recaptchaCallback()" href="#" class="btn btn-primary">Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-left py-3">
                        <div class="small" class="d-flex-center">
                            <a class="small" href="/showregister">Buat Akun</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="js/recaptcha.js"></script>
</body>

</html>
