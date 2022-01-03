<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('theme/dist')}}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{url('theme/dist')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('theme/dist')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{url('theme/dist')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Selamat Datang !</h5>
                                <p class="text-white-50">Masuk untuk melanjutkan.</p>
                                {{-- <a href="index.html" class="logo logo-admin">
                                    <img src="{{url('theme/dist')}}/assets/images/logo-sm.png" height="24" alt="logo">
                                </a> --}}
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="form-horizontal mt-4" action="/login" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="email" name="email" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Rama Widana. </p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{url('theme/dist')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{url('theme/dist')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('theme/dist')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{url('theme/dist')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{url('theme/dist')}}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{url('theme/dist')}}/assets/js/app.js"></script>

</body>

</html>