<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trakool</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Trakool">
    <meta name="author" content="Trakool Software">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    {{-- <link rel="icon" href="{{ asset('images/logo150.png') }}" type="image"> --}}
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    {{-- <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> --}}
    <!-- Required Fremwork -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/bower_components/bootstrap/css/bootstrap.min.css"> --}}
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/css/style.css">
    <style>
        .login-block {
            background: url('') no-repeat;
            background-size: cover;
            background-color: #191919;
        }
    </style>
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block ">
        <!-- Container-fluid starts -->
        <div class="container ">
            <div class="row">
                <div class="col-md-12 ">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center">
                            {{-- <img src="{{ asset('images/logo150.png') }}" class="img-fluid"> --}}
                        </div>
                        <div class="auth-box card shadow">
                            <img src="{{asset('images/c94ad497486fc9ed08b5c9a481f2dc78.png')}}" class="img-fluid">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12 text-center">
                                        <h3>ระบบจัดการนักศึกษาฝึกงาน</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">

                                    <label for="exampleFormControlTextarea1" class="form-label">บัญชีผู้ใช้</label>

                                    {{-- <input type="text" name="email" class="form-control" required="" placeholder="Your Email Address"> --}}
                                    <input id="username" type="username" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    {{-- <input type="password" name="password" class="form-control" required="" placeholder="Password"> --}}
                                    <label for="exampleFormControlTextarea1" class="form-label">รหัสผ่าน</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span class="form-bar"></span>

                                </div>
                                {{-- <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right f-right">
                                                <a href="auth-reset-password.htm" class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-md btn-block waves-effect waves-light text-center m-b-20 rounded">{{ __('เข้าสู่ระบบ') }}</button>
                                        {{-- <a href="/dashboard" class="btn btn-sm btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">{{ __('Sign In') }}</a> --}}
                                    </div>

                                    {{-- <div class="col-md-12">
                                            <button type="button" onclick="openWindow()" class="btn btn-sm btn-default btn-md btn-block waves-effect waves-light text-center m-b-20">{{ __('เปิดโปรแกรม') }}</button>
                                    <button type="button" onclick="closeWindow()" class="btn btn-sm btn-default btn-md btn-block waves-effect waves-light text-center m-b-20">{{ __('ปิดโปรแกรม') }}</button> --}}

                                    {{-- <a href="/dashboard" class="btn btn-sm btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">{{ __('Sign In') }}</a> --}}
                                    {{-- </div>  --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/popper.js/js/popper.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/bootstrap/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/assets/js/common-pages.js"></script>
    <script>
        // function openWindow(){
        //     window.open('http://127.0.0.1:8000/',"_blank", "toolbar=yes,scrollbars=yes,resizable=yes");
        // }
        // function closeWindow()
        // {

        //     window.close();
        // }
    </script>
</body>

</html>