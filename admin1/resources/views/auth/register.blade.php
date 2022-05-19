<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/alert.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary1">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/register" method="post" id='forminput'>
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="namadepan" id="inputFirstName"
                                                        type="text" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="namabelakang" id="inputLastName"
                                                        type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Last name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" id="username" type="text"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <!-- <div class="form-floating mb-3">
                                            <div classs="form-group">
                                                <input type="text" id="search" name="search" class="form-control" />
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label mb-3">Pabrik</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="search"
                                                    id="inlineFormCustomSelect">
                                                    <option value="" selected>Choose...</option>
                                                    @foreach ($data as $row)
                                                        <option value="{{ $row['pabrik_id'] }}">{{ $row['nama'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword"
                                                            type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                    <p id="message1" class="text-danger"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm"
                                                            type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                    <p id="message" class="text-danger"></p>
                                                </div>
                                            </div>
                                            <div class="g-recaptcha" data-callback="recaptcha_callback"
                                                data-sitekey="6Lecb2YfAAAAAIR2uhydBgujcJ7VLBleTtAkDFQJ"></div>
                                            <p id="art" class="text-danger"></p>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a href="#" onclick="register()"
                                                        class="btn btn-primary btn-block" href="/">Create
                                                        Account</a></div>
                                            </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/">Have an account? Go to login</a></div>
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
    <!-- <script src="js/scripts.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        var route = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
            source: function(query, process) {
                return $.get(route, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });
        $("#inputPasswordConfirm").keyup(function() {
            if ($("#inputPassword").val() === $(this).val()) {
                document.getElementById("message").innerText = "";
                document.getElementById("message1").innerText = "";
            } else {
                document.getElementById("message").innerText = "Tidak Cocok";
                document.getElementById("message1").innerText = "Tidak Cocok";
            }
        })
        const username = <?php echo $data1; ?>;
    </script>
</body>

</html>
