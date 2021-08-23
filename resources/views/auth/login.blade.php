<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plantilla/assets/images/favicon.png')}}"/>

    <!-- Plugins css -->
    <link href="{{asset('plantilla/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plantilla/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('plantilla/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('plantilla/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <link href="{{asset('plantilla/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet"/>
    <link href="{{asset('plantilla/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet"/>


    <!-- icons -->
    <link href="{{asset('plantilla/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                       <i class="fa fa-fire fa-2x" style="color:#F40009;"></i>
                        <span class="logo-lg-text-dark">FIRESTILL</span>
                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('plantilla/assets/images/logo-light.png')}}" alt="" height="22">
                                            </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3"></p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" name="email" type="email" required placeholder="Email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" name="password" type="password" required placeholder="Password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                            </div>

                        </form>


                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="{{asset('plantilla/assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('plantilla/assets/js/app.min.js')}}"></script>

</body>
</html>