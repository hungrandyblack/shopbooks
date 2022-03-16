<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <base href="{{asset('login')}}/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{Route('handleLogin')}}" class="login100-form validate-form" method="post">
                    <div class="col-12">
                        @if (Session::has('success'))
                        <p style="width:300px" class="alert-success">
                          {{ Session::get('success') }}
                        </p>
                        @endif
                      </div>
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Đăng Nhập
                    </span>

                    @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <div class="wrap-input100 validate-input">
                        <input class="input100" placeholder="Email" type="text" name="email" value="{{old('')}}">

                    </div>
                    @if (Session::has('error_email'))
                    <div class="alert alert-danger">{{session::get('error_email')}}</div>
                    @endif
                    <div class="error-message">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" placeholder="mật khẩu" type="password" name="password">

                    </div>
                    @if (Session::has('error_password'))
                    <div class="alert alert-danger">{{session::get('error_password')}}</div>
                    @endif
                    <div class="error-message">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('password') }}</p>
                        @endif
                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Đăng Nhập
                        </button>
                    </div>
                    
                    <div class="container-login100-form-btn mt-4">
                        <a class="login100-form-btn" href="{{route('fogotPassword')}}">Quên mật khẩu</a>
                            
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>