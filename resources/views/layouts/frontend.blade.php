<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pets</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon/favicon.png') }}" type="image/x-icon">

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- icons fonts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/themify.css') }}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick-theme.css') }}">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/animate.css') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/color7.css') }}" media="screen"
        id="color">

    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/bootstrap-datetimepicker.min.css') }}">

    <script src="https://code.jquery.com/jquery.js"></script>

    <script src="{{ asset('frontend/src/skdslider.min.js') }}"></script>
    <link href="{{ asset('frontend/src/skdslider.css') }}" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#demo1').skdslider({
                'delay': 5000,
                'animationSpeed': 2000,
                'showNextPrev': true,
                'showPlayButton': false,
                'autoSlide': true,
                'animationType': 'sliding'
            });


            jQuery('#responsive').change(function() {
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });
    </script>

    @yield('styles')
</head>

<body class=" rtl rtl-text">

    <!-- loader start -->
    <div class="loader-wrapper">
        <div>
            <img src="{{ asset('frontend/assets/images/loader.gif') }}" alt="loader">
        </div>
    </div>
    <!-- loader end -->

    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')


    <!-- My account bar start-->
    <div id="myAccount" class="add_to_cart right account-bar">
        <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>{{ trans('frontend.login_modal.title') }}</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeAccount()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <form class="theme-form" action="{{ route('frontend.login') }}">
                @csrf
                @if (session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">{{ trans('frontend.login_modal.email') }}</label>
                    <input type="email" name="login_email" class="form-control" id="email" placeholder="{{ trans('frontend.login_modal.email') }}"
                        required="">
                    @if ($errors->has('login_email'))
                        <div class="invalid-feedback d-flex">
                            {{ $errors->first('login_email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="login_password">{{ trans('frontend.login_modal.password') }}</label>
                    <input type="password" class="form-control" name="login_password" id="login_password" placeholder="{{ trans('frontend.login_modal.password') }}" required="">
                    @if ($errors->has('login_password'))
                        <div class="invalid-feedback d-flex">
                            {{ $errors->first('login_password') }}
                        </div>
                    @endif
                </div>
                @include('partials.recaptcha')
                <div class="form-group">
                    <button type="submit" class="btn btn-solid btn-md btn-block ">{{ trans('frontend.login_modal.login') }}</button>
                </div>
                <div class="accout-fwd">
                    {{-- <a href="forget-pwd.html" class="d-block">
                        <h5>نسيت كلمة المرور؟</h5>
                    </a> --}}
                    <a href="{{ route('frontend.register','select') }}" class="d-block">
                        <h6>{{ trans('frontend.login_modal.register_q') }}<span>{{ trans('frontend.login_modal.register') }}</span></h6>
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <!-- Add to account bar end-->

    <!-- latest jquery -->
    {{-- <script src="assets/js/jquery-3.3.1.min.js"></script> --}}

    @include('sweetalert::alert')

    <!-- slick js -->
    <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>

    <!-- tool tip js -->
    <script src="{{ asset('frontend/assets/js/tippy-popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tippy-bundle.iife.min.js') }}"></script>

    <!-- popper js-->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>

    <!-- menu js-->
    <script src="{{ asset('frontend/assets/js/menu.js') }}"></script>

    <!-- father icon -->
    <script src="{{ asset('frontend/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/feather-icon.js') }}"></script>

    <!-- range sldier -->
    <script src="{{ asset('frontend/assets/js/ion.rangeSlider.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('frontend/assets/js/bootstrap-notify.min.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/modal.js') }}"></script>

    <script src="{{ asset('dashboard_offline/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            window._token = $('meta[name="csrf-token"]').attr('content')

            moment.updateLocale('en', {
                week: {
                    dow: 1
                } // Monday is the first day of the week
            })

            $('.date-package-picker').datetimepicker({
                format: 'DD/MM/YYYY',
                locale: 'en',
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                }
            })

            $('.datetime-package-picker').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss',
                locale: 'en',
                sideBySide: true,
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                }
            })

            $('.timepicker-package-picker').datetimepicker({
                format: 'HH:mm:ss',
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                }
            }) 

        })
        
        $(document).ready(function() {
            @if (
                $errors->count() > 0 &&
                    ($errors->has('invalid_login') || $errors->has('login_email') || $errors->has('login_password')))
                openAccount();
            @endif 
        })
    </script>
    @if (get_setting('recaptcha_active'))
        <script src="https://www.google.com/recaptcha/api.js"></script>
    @endif
    @yield('scripts')
</body>

</html>
