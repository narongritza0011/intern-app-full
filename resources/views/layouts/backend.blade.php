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
    {{-- <link rel="icon" href="{{ asset('theme') }}/files/assets/images/favicon.ico" type="image/x-icon"> --}}
    {{-- <link rel="icon" href="{{ asset('images/logo150.png') }}" type="image"> --}}

    <!-- Google font-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/solid.css') }}">

    <!-- Required Fremwork -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/bower_components/bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme') }}/files/assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme') }}/files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/icon/icofont/css/icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/icon/feather/css/feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/css/style.css">

    <!-- Calender css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme') }}/files/bower_components/fullcalendar/css/fullcalendar.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme') }}/files/bower_components/fullcalendar/css/fullcalendar.print.css" media='print'>

    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/css/linearicons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/files/assets/css/jquery.mCustomScrollbar.css">

    <!-- light-box css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme') }}/files/bower_components/ekko-lightbox/css/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme') }}/files/bower_components/lightbox2/css/lightbox.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/dataTables/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.bootstrap4.min.css') }}"> --}}


    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendor/jquery-datetimepicker/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightgallery/css/lightgallery.min.css') }}">


    <style>
        .swal2-container {
            z-index: 100000 !important;
        }

        .badge {
            font-size: 100% !important;
        }

        .md-tabs .nav-item {
            width: calc(100% / 5) !important;
        }

        .nav-tabs .slide {
            width: calc(100% / 5) !important;
        }

        @media only screen and (max-width: 573px) {
            .md-tabs .nav-item {
                width: calc(100% / 1) !important;
            }

            .nav-tabs .slide {
                width: calc(100% / 1) !important;
            }
        }

        .form-control:disabled {
            opacity: 1 !important;
        }

        .imageGif {
            display: none;
            position: fixed;
            z-index: 200000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('{{ asset('images/spinner.gif') }}') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
    the scrollbar off with overflow:hidden */
        body.loading .imageGif {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
    modal element will be visible */
        body.loading .imageGif {
            display: block;
        }

        .label {
            font-size: 100%;
        }

        div.dt-button-collection {
            z-index: 10000 !important;
        }

    </style>
    @yield('style')
</head>

<body>
    <div class="imageGif"></div>
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

    {{-- <div class="loader animation-start" id="loading">
        <span class="circle delay-1 size-2"></span>
        <span class="circle delay-2 size-4"></span>
        <span class="circle delay-3 size-6"></span>
        <span class="circle delay-4 size-7"></span>
        <span class="circle delay-5 size-7"></span>
        <span class="circle delay-6 size-6"></span>
        <span class="circle delay-7 size-4"></span>
        <span class="circle delay-8 size-2"></span>
    </div> --}}
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{ url('/home/dashboard') }}" style="margin: auto;">
                            {{-- <img class="img-fluid" src="{{ asset('theme') }}/files/assets/images/logo.png"
                            alt="Theme-Logo"> --}}
                            <h5> {{ __('TRAKOOL') }}</h5>
                            <small>IT Solution Chiangmai</small>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        {{-- <img src="{{ asset('images/logo.png') }}" class="img-radius" alt="User-Profile-Image"> --}}
                                        <span>{{ Auth::user()->username }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        {{-- <li>
                                            <a href="{{ url('') }}">
                                        <i class="feather icon-user"></i> Profile
                                        </a>
                            </li> --}}
                                        <li>
                                            <a href="javascript:void(0)"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> ออกจากระบบ
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">เมนู</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <!-- start menu -->


                                <li
                                    class="pcoded-hasmenu {{ request()->is('manage*') ? 'pcoded-trigger active' : '' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fab fa-angellist"></i></span>
                                        <span class="pcoded-mtext">นักศึกษาฝึกงาน</span>
                                    </a>
                                    <ul class="pcoded-submenu">


                                        <li class="{{ request()->is('manage/internship*') ? 'active' : '' }}">
                                            <a href="{{ url('manage/internship') }}">
                                                <span class="pcoded-mtext">กำลังรออนุมัติ <span
                                                        class="badge badge-success">{{ alert_count_pending() }}</span></span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manage/approved*') ? 'active' : '' }}">
                                            <a href="{{ url('manage/approved') }}">
                                                <span class="pcoded-mtext">อนุมัติเเล้ว <span
                                                        class="badge badge-success">{{ alert_count_approved() }}</span></span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manage/intern_success*') ? 'active' : '' }}">
                                            <a href="{{ route('internSuccessfull') }}">
                                                <span class="pcoded-mtext">ฝึกงานเสร็จเเล้ว <span
                                                        class="badge badge-success">{{ alert_count_internSuccess() }}</span></span>
                                            </a>
                                        </li>

                                        <!-- <li class="{{ request()->is('manage/customer*') ? 'active' : '' }}">
                                        <a href="{{ url('manage/customer') }}">
                                            <span class="pcoded-mtext">จัดการข้อมูล</span>
                                        </a>
                                    </li> -->



                                        <li class="{{ request()->is('manage/method*') ? 'active' : '' }}">
                                            <a href="{{ url('register') }}">
                                                <span class="pcoded-mtext">สมัครฝึกงาน</span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>



                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <!-- start menu -->


                                <li
                                    class="pcoded-hasmenu {{ request()->is('manager*') ? 'pcoded-trigger active' : '' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-address-card"></i></span>
                                        <span class="pcoded-mtext">ผู้ดูเเลระบบ</span>
                                    </a>

                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('manager/user*') ? 'active' : '' }}">
                                            <a href="{{ route('userAll') }}">
                                                <span class="pcoded-mtext">จัดการผู้ใช้งาน</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manager/product*') ? 'active' : '' }}">
                                            <a href="{{ url('manager/product') }}">
                                                <span class="pcoded-mtext">จัดการสินค้า</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manager/report*') ? 'active' : '' }}">
                                            <a href="{{ url('manager/report') }}">
                                                <span class="pcoded-mtext">รายงานการทำงาน</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manager/location*') ? 'active' : '' }}">
                                            <a href="{{ url('manager/location') }}">
                                                <span class="pcoded-mtext">ลูกค้า <span
                                                        class="badge badge-danger">{{ alert_count_customer() }}</span></span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manager/unlock*') ? 'active' : '' }}">
                                            <a href="{{ url('manager/unlock') }}">
                                                <span class="pcoded-mtext">ปลดล็อคระบบ</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('manager/service_ma*') ? 'active' : '' }}">
                                            <a href="{{ url('manager/service_ma') }}">
                                                <span class="pcoded-micon"><i class="fa fa-lock"
                                                        aria-hidden="true"></i></span>
                                                <span class="pcoded-mtext">บริการด้าน Ma</span>
                                            </a>
                                        </li>



                                    </ul>




                                    <hr>
                                <li class="">
                                    <a href="javascript:void(0)"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon"><i class="fa fa-lock"
                                                aria-hidden="true"></i></span>
                                        <span class="pcoded-mtext">ออกจากระบบ</span>
                                    </a>
                                </li>
                        </div>

                    </nav>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @yield('content')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('vue')


    <!-- Warning Section Ends -->
    <!-- ckeditor -->
    <script type="text/javascript" src="{{ asset('ckeditor5/ckeditor.js') }}"></script>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/jquery-ui/js/jquery-ui.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/popper.js/js/popper.min.js">
    </script>
    {{-- <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/bootstrap/js/bootstrap.min.js">
    </script> --}}
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- jquery slimscroll js -->
    <script type="text/javascript"
        src="{{ asset('theme') }}/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/modernizr/js/css-scrollbars.js">
    </script>
    <!-- calender js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/moment/js/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/fullcalendar/js/fullcalendar.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/assets/pages/full-calender/calendar.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/chart.js/js/Chart.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/assets/js/classie.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('theme') }}/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('theme') }}/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js">
    </script>
    <script type="text/javascript"
        src="{{ asset('theme') }}/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>

    <!-- gauge js -->
    <script src="{{ asset('theme') }}/files/assets/pages/widget/gauge/gauge.min.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/widget/amchart/gauge.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/widget/amchart/pie.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/widget/amchart/light.js"></script>
    <!-- Custom js -->
    <script src="{{ asset('theme') }}/files/assets/js/pcoded.min.js"></script>
    <script src="{{ asset('theme') }}/files/assets/js/vartical-layout.min.js"></script>
    <script src="{{ asset('theme') }}/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('theme') }}/files/assets/pages/dashboard/crm-dashboard.min.js"></script> --}}
    <script src="{{ asset('theme') }}/files/assets/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/assets/js/script.js"></script>

    <!-- light-box js -->
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/ekko-lightbox/js/ekko-lightbox.js">
    </script>
    <script type="text/javascript" src="{{ asset('theme') }}/files/bower_components/lightbox2/js/lightbox.js"></script>

    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script>

    {{-- <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/jszip.min.js') }}"></script>

    {{-- data-table js --}}
    <script src="{{ asset('theme') }}/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('theme') }}/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js">
    </script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
    <script src="{{ asset('theme') }}/files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js">
    </script>
    <script src="{{ asset('theme') }}/files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('theme') }}/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('theme') }}/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="{{ asset('theme') }}/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="{{ asset('theme') }}/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>


    <script>
        window.dataLayer = window.dataLayer || [];
        var l_url = "{{ url('/') }}";
        var l_asset = "{{ asset('/') }}";

        $(function() {

            const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'THB',
                minimumFractionDigits: 2
            })
            jQuery.validator.setDefaults({
                highlight: function(element) {
                    jQuery(element).closest('.form-control').addClass('form-control-danger');
                },
                unhighlight: function(element) {
                    jQuery(element).closest('.form-control').removeClass('form-control-danger');
                },
                errorElement: 'div',
                errorClass: 'text-danger feedback',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.extend(true, $.fn.dataTable.defaults, {
                "language": {
                    "processing": "{{ __('Loading') }}",
                    // "processing": '<i class="fas fa-spinner fas-spin fas-3x fas-fw"></i><span class="sr-only">{{ __('กำลังโหลดข้อมูล') }}</span> ',
                },
                "iDisplayLength": 50,
                createdRow: function(row, data, dataIndex) {
                    $(row).find('td').addClass('text-center');
                },
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
                    {
                        "extend": 'excel',
                        "text": '<span class="fas fa-file-excel"></span> Excel',
                        'title': $('.card-header h3').html(),
                        customizeData: function(data) {
                            for (var i = 0; i < data.body.length; i++) {
                                for (var j = 0; j < data.body[i].length; j++) {
                                    data.body[i][j] = '\u200C' + data.body[i][j];
                                }
                            }
                        }
                    },
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                // responsive: true,
            });

            $('.datepicker').datetimepicker({
                timepicker: false,
                format: 'd-m-Y',
                scrollInput: false,
                scrollTime: false,
                scrollMonth: false,
            });

            $('.datetimepicker').datetimepicker({
                format: 'd-m-Y H:i',
                scrollInput: false,
                scrollTime: false,
                scrollMonth: false,
            });

            $('.timepicker').datetimepicker({
                datepicker: false,
                format: 'H:i',
                step: 30,
                scrollInput: false,
                scrollTime: false,
                scrollMonth: false,
            });

            $('#start_date').datetimepicker({
                format: 'd-m-Y',
                scrollInput: false,
                scrollTime: false,
                scrollMonth: false,
                timepicker: false,
                // onSelectDate:function(ct,$i){
                //     $('#end_date').val(moment(ct).format('DD-MM-YYYY'));
                // },
                // onSelectTime:function(ct,$i){
                //     $('#end_date').val(moment(ct).format('DD-MM-YYYY'));
                //     $('#end_date').focus();
                // }
            });

            $('#end_date').datetimepicker({
                format: 'd-m-Y',
                scrollInput: false,
                scrollTime: false,
                scrollMonth: false,
                timepicker: false,
            });

            $('form').on('focus', 'input[type=number]', function(e) {
                $(this).on('wheel.disableScroll', function(e) {
                    e.preventDefault()
                })
            })
            $('form').on('blur', 'input[type=number]', function(e) {
                $(this).off('wheel.disableScroll')
            })

            $(".lightgallery").lightGallery();

            $('.dtAll').DataTable();
            $('#dtAll').DataTable();

            $(document).ajaxStart(function() {
                $('body').addClass('loading');
            });

            $(document).ajaxStop(function() {
                $('body').removeClass('loading');
            });
        });

        function show_success(mode = "", url = '') {
            mode != '' ? "{{ __('Save') }}" : '';
            text = "{{ __('Complete !') }}";
            Swal.fire({
                title: '',
                text: mode + text,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
            }).then(function() {
                if (url != '') {
                    window.location.href = url;
                }
            });
        }

        function show_warning(text = 'Warning', url = '') {
            Swal.fire({
                title: '',
                text: text,
                icon: 'warning',
                confirmButtonText: 'OK',
                timer: 1500,
            }).then(function() {
                if (url != '') {
                    window.location.href = url;
                }
            });
        }

        function show_error(text = 'Error', url = '') {
            Swal.fire({
                title: '',
                text: text,
                icon: 'error',
                confirmButtonText: 'OK',
                timer: 1500,
            }).then(function() {
                if (url != '') {
                    window.location.href = url;
                }
            });
        }

        function deleteAll(id, url, table_id, reload = '') {

            Swal.fire({
                title: '',
                text: "{{ __('Want to delete ?') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#fe5d70',
                cancelButtonColor: '#868e96',
                confirmButtonText: "{{ __('delete') }}",
                cancelButtonText: "{{ __('cancel') }}",
                reverseButtons: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        success: function(data) {
                            if (table_id == "reload") {
                                show_success("{{ __('delete') }}", reload);
                            } else {
                                table_id.ajax.reload();
                                show_success("{{ __('delete') }}");
                            }

                        },
                        error: function(err) {
                            console.log(err.responseText);
                        }
                    });
                }
            });
        }

        function clearForm() {
            $("#shared-form").validate().resetForm();
            $("#shared-form").find('.is-invalid').removeClass("is-invalid");
            $("#shared-form").find('.is-valid').removeClass("is-valid");
            $("#shared-form").find('.invalid-feedback').remove();
            $("#shared-form").find('.valid-feedback').remove();
        }

        function closeB() {
            window.close();
        }
    </script>

    @yield('script')

</body>

</html>
