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

    <!-- Quick-view modal popup start-->
    {{-- <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img">
                                <img src="assets/images/pngegg-12-1-PZu.png" alt="" class="img-fluid bg-img">
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <div class="pro-group">
                                    <h2>
                                        بي ديجري - فيتل طعام جاف للكلاب
                                    </h2>
                                    <ul class="pro-price">
                                        <li>رس140</li>
                                        <li><span>رس140 </span></li>
                                        <li>50% خصم</li>
                                    </ul>
                                    <div class="revieu-box">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <a href="review.html"><span>(6 تعليقات)</span></a>
                                    </div>

                                </div>
                                <div class="pro-group">
                                    <h6 class="product-title">بيانات المنتج</h6>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                        زيادة عدد الحروف التى يولدها التطبيق.</p>
                                </div>
                                <div class="pro-group pb-0">

                                    <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sheer Straight
                                                        Kurta</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"><img src="assets/images/size-chart.jpg"
                                                        alt="" class="img-fluid "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="size-box">
                                        <ul>
                                            <li><a href="javascript:void(0)"> 1/2 كيلو</a></li>
                                            <li><a href="javascript:void(0)">1 كيلو</a></li>
                                            <li><a href="javascript:void(0)">2 كيلو</a></li>

                                        </ul>
                                    </div>

                                    <h6 class="product-title">العدد</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1">
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="product-buttons">
                                        <a href="javascript:void(0)" onclick="openCart()"
                                            class="btn cart-btn btn-normal tooltip-top"
                                            data-tippy-content="أضف الى السلة">
                                            <i class="fa fa-shopping-cart"></i>
                                            أضف الى السلة
                                        </a>
                                        <a href="single_products.html" class="btn btn-normal tooltip-top"
                                            data-tippy-content="view detail">
                                            المزيد
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Quick-view modal popup end-->

    <!-- Add to cart bar -->
    {{-- <div id="cart_side" class="add_to_cart right ">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>سلة التسوق</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeCart()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="assets/images/pro01.png">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                </a>
                                <h6>
                                    19.99س.ر<span>56.99 س.ر</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="assets/images/pro01.png">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                </a>
                                <h6>
                                    19.99س.ر<span>56.99 س.ر</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">

                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="assets/images/pro01.png">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                </a>
                                <h6>
                                    19.99س.ر<span>56.99 س.ر</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">

                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total">
                    <li>
                        المجموع الفرعي : <span>ر.س1050.00</span>
                    </li>
                    <li>
                        الشحن <span>مجاني</span>
                    </li>

                    <li>
                        <div class="total">
                            الإجمالي <span>ر.س 1050.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="cart.html" class="btn btn-solid btn-sm">عرض سلة التسوق</a>
                            <a href="checkout.html" class="btn btn-solid btn-sm "> الدفع</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- Add to cart bar end-->

    <!-- My account bar start-->
    <div id="myAccount" class="add_to_cart right account-bar">
        <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>تسجيل الدخول</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeAccount()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <form class="theme-form">
                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="text" class="form-control" id="email" placeholder="البريد الإلكتروني"
                        required="">
                </div>
                <div class="form-group">
                    <label for="review">كلمة المرور</label>
                    <input type="password" class="form-control" id="review" placeholder="كلمة المرور"
                        required="">
                </div>
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-solid btn-md btn-block ">دخول</a>
                </div>
                <div class="accout-fwd">
                    <a href="forget-pwd.html" class="d-block">
                        <h5>نسيت كلمة المرور؟</h5>
                    </a>
                    <a href="register.html" class="d-block">
                        <h6>ليس لديك حساب؟<span> تسجيل مستخدم جديد</span></h6>
                    </a>
                </div>
            </form>
        </div>
    </div>
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
    @if (get_setting('recaptcha_active'))
        <script src="https://www.google.com/recaptcha/api.js"></script>
    @endif
    @yield('scripts')
</body>

</html>
