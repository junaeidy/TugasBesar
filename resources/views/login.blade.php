<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login | Perpustakaan</title>
    <link rel="icon" type="image/x-icon" href="{{ asset ('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/lnr-icon.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css') }}">

</head>

<body>

    <div class="inner-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ session('message') }}</strong>
                   </div>
                    
                @endif
                <div class="loginbox shadow-sm">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/logo.png" alt="Logo">
                    </div>
                    <div class="login-right" >
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle"> To get started</p>

                            <form method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" type="text" placeholder="Username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" type="text" placeholder="Password" i    d="password" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                                        type="submit">Login</button>
                                </div>
                            </form>

                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a>
                            </div>

                            <div class="text-center dont-have">Don’t have an account? <a
                                    href="register">Register</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset ('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset ('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset ('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset ('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
