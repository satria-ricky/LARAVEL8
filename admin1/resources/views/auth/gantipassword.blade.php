<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ganti Password</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js/recaptcha.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary1">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="text-center">
                    <img src="assets/img/bpom1.jpg" class="img-fluid" alt="Responsive image" background-repeat:>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Gantipassword</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/gantipassword" method="post" id='forminput'>
                                        @if (Session::has('message'))
                                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                                        @endif
                                        @if (session('status'))
                                            <div class="alert alert-warning">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="form-floating mb-3">
                                            <input name="lama" class="form-control" id="inputEmail" type="password"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Password Lama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="baru" class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" />
                                            <label for="inputPassword">Password Baru</label>
                                        </div>
                                        <div class="g-recaptcha" data-callback="recaptcha_callback"
                                            data-sitekey="6Lecb2YfAAAAAIR2uhydBgujcJ7VLBleTtAkDFQJ"></div>
                                        <p id="art" class="text-danger"></p>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <a href="#" onclick="recaptchaCallback()" type="submit"
                                                class="btn btn-primary" href="/index">Ganti</a>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; BPOM</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
