@extends('layouts.frontend')
@section('styles')
    <style>
        .stars {
            display: flex;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .star {
            color: lightgray;
            transition: color 0.3s;
        }

        .star.filled {
            color: #ffa800;
        }

        .ratingStars {
            display: flex;
            justify-content: space-between;
            margin-top: -2px;
        }

        .tab-product .tab-content.nav-material p,
        .product-full-tab .tab-content.nav-material p {
            padding: 0;
            margin-bottom: -8px;
            line-height: 2;
            letter-spacing: 0.05em;
        } 
        /*rating*/
        .comment-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 12px;
            background-color: #f9f9f9;
            width: 100%;
        }

        .comment-author {
            font-weight: bold;
            color: #333;
        }

        .comment-text {
            font-size: 14px;
            color: #555;
            margin: 6px 0;
        }

        .comment-rating {
            display: flex;
            align-items: center;
            font-weight: bold;
            color: #ff9800;
        }

        .previous-ratings .star {
            color: #ffcc00;
            margin-left: 5px;
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>اسم المنتج</h2>
                            <ul>
                                <li><a href="index.html">الرئيسية</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">بيتز شوب</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">بي ديجري </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section class="section-big-pt-space b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <div class="collection-filter-block creative-card creative-inner">
                            <div class="collection-mobile-back">
                                <span class="filter-back">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    خلف
                                </span>
                            </div>
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">منتجات اخرى</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <ul class="category-list">
                                            <li><a href="javascript:void(0)">فيتل طعام جاف للكلاب</a></li>
                                            <li><a href="javascript:void(0)">هيلز طعام للقطط المعقمة</a></li>
                                            <li><a href="javascript:void(0)">بريت كير بطعام الدجاج والتركي</a></li>
                                            <li><a href="javascript:void(0)">ريفليكس طعام قطط جاف</a></li>
                                            <li><a href="javascript:void(0)">هريرة طعام جاف للقطط الكبيرة</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- side-bar single product slider start -->
                        <div class="theme-card creative-card creative-inner">
                            <h5 class="title-border">جديد المنتجات</h5>
                            <div class="slide-1">
                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="single_product.html" tabindex="0">
                                                    <img src="assets/images/pro03-s.png" class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="single_product.html" tabindex="0">
                                                                    <p>اسم المنتج ...</p>
                                                                </a>
                                                                <h6>45 ر.س <span>21 ر.س</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                                                                    data-tippy-content="اضف الى امنياتي"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="single_product.html" tabindex="0">
                                                    <img src="assets/images/pro03-s.png" class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="single_product.html" tabindex="0">
                                                                    <p>اسم المنتج ...</p>
                                                                </a>
                                                                <h6>45 ر.س <span>21 ر.س</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="اضف الى امنياتي"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="single_product.html" tabindex="0">
                                                    <img src="assets/images/pro03-s.png" class="img-fluid "
                                                        alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="single_product.html" tabindex="0">
                                                                    <p>اسم المنتج ...</p>
                                                                </a>
                                                                <h6>45 ر.س <span>21 ر.س</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="اضف الى امنياتي"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="assets/images/layout-2/media-banner/2.jpg"
                                                        class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>usha table fan</p>
                                                                </a>
                                                                <h6>$52.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="assets/images/layout-2/media-banner/3.jpg"
                                                        class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>sumsung galaxy</p>
                                                                </a>
                                                                <h6>$47.05 <span>$55.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="assets/images/layout-2/media-banner/1.jpg"
                                                        class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>bajaj rex mixer</p>
                                                                </a>
                                                                <h6>$40.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="assets/images/layout-2/media-banner/1.jpg"
                                                        class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>bajaj rex mixer</p>
                                                                </a>
                                                                <h6>$40.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="assets/images/layout-2/media-banner/2.jpg"
                                                        class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>usha table fan</p>
                                                                </a>
                                                                <h6>$52.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="assets/images/layout-2/media-banner/3.jpg"
                                                        class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                                    <p>sumsung galaxy</p>
                                                                </a>
                                                                <h6>$47.05 <span>$55.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-cart">
                                                                        <circle cx="9" cy="21" r="1">
                                                                        </circle>
                                                                        <circle cx="20" cy="21" r="1">
                                                                        </circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"><i
                                                                        data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"><i
                                                                        data-feather="eye"></i></a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"><i
                                                                        data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                    </div>
                    <div class="col-lg-9 col-sm-12 col-xs-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="filter-main-btn mb-2"><span class="filter-btn"><i class="fa fa-filter"
                                                aria-hidden="true"></i> filter</span></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-5">
                                    <div class="product-slick ">
                                        <div><img src="assets/images/product_main_01.jpg" alt=""
                                                class="img-fluid  image_zoom_cls-0"></div>
                                        <div><img src="assets/images/product_main_02.jpg" alt=""
                                                class="img-fluid  image_zoom_cls-1"></div>
                                        <div><img src="assets/images/product_main_03.jpg" alt=""
                                                class="img-fluid  image_zoom_cls-2"></div>
                                        <div><img src="assets/images/product_main_01.jpg" alt=""
                                                class="img-fluid  image_zoom_cls-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <div class="slider-nav">
                                                <div><img src="assets/images/product_main_01.jpg" alt=""
                                                        class="img-fluid"></div>
                                                <div><img src="assets/images/product_main_02.jpg" alt=""
                                                        class="img-fluid"></div>
                                                <div><img src="assets/images/product_main_03.jpg" alt=""
                                                        class="img-fluid"></div>
                                                <div><img src="assets/images/product_main_01.jpg" alt=""
                                                        class="img-fluid"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 rtl-text">
                                    <div class="product-right ">
                                        <div class="pro-group">
                                            <h2>بي ديجري - فيتل طعام جاف للكلاب (اعمار صغيرة)</h2>
                                            <ul class="pro-price">
                                                <li>ر.س70</li>
                                                <li><span> 140ر.س</span></li>
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
                                                <a href="review.html"><span>(6 تعليق)</span></a>
                                            </div>
                                            <ul class="best-seller">

                                                <li>
                                                    <svg enable-background="new 0 0 497 497" viewBox="0 0 497 497"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path
                                                                d="m329.63 405.42-.38.43c-10.048 19.522-48.375 35.567-80.775 35.607-24.881 0-53.654-9.372-71.486-20.681-5.583-3.54-2.393-10.869-6.766-15.297l19.149-5.13c3.76-1.22 6.46-4.54 6.87-8.47l8.574-59.02 82.641-2.72 12.241 28.06.837 8.668-1.844 9.951 3.456 6.744.673 6.967c.41 3.93 3.11 7.25 6.87 8.47z"
                                                                fill="#f2d1a5" />
                                                            <path
                                                                d="m420.39 497h-343.78c-6.21 0-7.159-6.156-6.089-12.266l2.53-14.57c3.82-21.96 16.463-37.323 37.683-44.153l27.702-8.561 28.754-8.035c18.34 18.57 48.615 27.957 81.285 27.957 32.4-.04 61.709-8.478 80.259-26.809l.38-.43 31.486 5.256 26.39 8.5c21.22 6.83 36.9 24.87 40.72 46.83l2.53 14.57c1.07 6.111-3.64 11.711-9.85 11.711z"
                                                                fill="#7e8b96" />
                                                            <g>
                                                                <path
                                                                    d="m384.055 215c-2.94 43.71-18.85 104.74-24.92 130.96-.68 2.94-2.33 5.45-4.56 7.22-2.23 1.78-5.05 2.82-8.06 2.82-6.88 0-12.55-5.37-12.94-12.23 0 0-5.58-84.28-7.63-128.77z"
                                                                    fill="#dc4955" />
                                                            </g>
                                                            <path
                                                                d="m141 271c-27.062 0-49-21.938-49-49 0-11.046 8.954-20 20-20h8.989l240.468-6.287 8.293 6.287h15.25c11.046 0 20 8.954 20 20 0 27.062-21.938 49-49 49z"
                                                                fill="#f2bb88" />
                                                            <path
                                                                d="m360.6 415.39-.06.09c-49.3 66.23-174.56 66.38-223.76.56l-.43-.63 18.171-1.91 12.669-8.02c18.34 18.57 48.41 29.8 81.08 29.8h.15c32.4-.04 62.28-11.1 80.83-29.43l.38-.43z"
                                                                fill="#a9a4d3" />
                                                            <path
                                                                d="m147.8 418.394v10.136l-32.89 10.59c-15.6 5.02-27.05 18.18-29.86 34.34l-3.59 23.54h-4.85c-6.21 0-10.92-5.6-9.85-11.71l2.53-14.57c3.82-21.96 19.5-40 40.72-46.83l26.34-8.48z"
                                                                fill="#64727a" />
                                                            <path
                                                                d="m182.19 417.45-34.39 11.08c-3.99-3.86-7.68-8.02-11.02-12.49l-.43-.63 30.84-9.93c1.828 1.848 10.344.351 12.353 2.02 2.928 2.433-.561 7.928 2.647 9.95z"
                                                                fill="#938dc8" />
                                                            <path
                                                                d="m299.7 358.2-2.71-28.06-79.861 2.255.001-.005-16.48.47-2.98 26.56-.763 6.8 2.039 12.83-3.989 4.55-.778 6.93c-.41 3.93-3.11 7.25-6.87 8.47l-20.12 6.48c4.37 4.43 9.41 8.44 15 11.97l10.02-3.22c9.79-3.17 16.79-11.79 17.88-21.97l2.058-17.506c.392-3.33 3.888-5.367 6.958-4.02 11.414 5.008 21.565 7.765 28.393 7.765 11.322.001 31.852-7.509 52.202-20.299z"
                                                                fill="#f2bb88" />
                                                            <path
                                                                d="m134.539 164.427s-.849 18.411-.849 33.002c0 38.745 9.42 76.067 25.701 105.572 20.332 36.847 72.609 61.499 88.109 61.499s68.394-24.653 89.275-61.499c14.137-24.946 23.338-55.482 25.843-87.741.458-5.894-9.799-20.073-9.799-26.058l10.491-24.775c0-38.422-36.205-111.427-114.81-111.427s-113.961 73.005-113.961 111.427z"
                                                                fill="#f2d1a5" />
                                                            <g>
                                                                <path
                                                                    d="m294 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                                    fill="#64727a" />
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="m203 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                                    fill="#64727a" />
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="m249 260.847c-5.976 0-11.951-1.388-17.398-4.163-3.691-1.88-5.158-6.397-3.278-10.087 1.88-3.691 6.398-5.158 10.087-3.278 6.631 3.379 14.547 3.379 21.178 0 3.689-1.881 8.207-.413 10.087 3.278 1.88 3.69.413 8.207-3.278 10.087-5.447 2.775-11.422 4.163-17.398 4.163z"
                                                                    fill="#f2bb88" />
                                                            </g>
                                                            <path
                                                                d="m288.989 40.759c0 22.511-9.303 40.759-40.489 40.759s-48.702-42.103-48.702-42.103 17.516-39.415 48.702-39.415c25.911 0 47.746 12.597 54.392 29.769 1.353 3.497-13.903 7.182-13.903 10.99z"
                                                                fill="#df646e" />
                                                            <path
                                                                d="m254.305 81.307c1.031-.099 2.069-.167 3.093-.295 26.96-3.081 47.572-19.928 47.572-40.252 0-3.81-.72-7.49-2.08-10.99-15.42-6.31-33.46-10.34-54.39-10.34-4.139 0-8.163.159-12.073.462-5.127.397-7.393-6.322-3.107-9.163 7.36-4.878 16.519-8.364 26.68-9.879-3.71-.56-7.56-.85-11.5-.85-25.933 0-47.766 12.621-54.393 29.813-.006.002-.011.004-.017.007-1.337 3.487-2.055 7.201-2.06 10.94 0 22.51 25.28 40.76 56.47 40.76 1.946.008 3.872-.09 5.805-.213z"
                                                                fill="#dc4955" />
                                                            <path
                                                                d="m363.31 164.43v33c0 5.99-.23 11.94-.7 17.83-4.32-.91-8.4-2.66-12.05-5.19-22.785-15.834-31.375-40.163-37.64-60.936-.382-1.268-1.547-2.134-2.871-2.134h-30.949c-4.96 0-9.65-2.15-12.89-5.91l-10.947-12.711c-1.197-1.39-3.349-1.39-4.546 0l-10.947 12.711c-3.24 3.76-7.93 5.91-12.89 5.91h-90.33c8.47-39.6 44.09-94 111.95-94 78.61 0 114.81 73 114.81 111.43z"
                                                                fill="#f2bb88" />
                                                            <path
                                                                d="m381 164.19v37.81h-11.25c-4 0-7.93-1.16-11.22-3.44-19.74-13.72-26.93-35.65-33.69-58.43-1.26-4.24-5.16-7.13-9.58-7.13h-36.165c-.873 0-1.703-.38-2.273-1.042l-21.559-25.029c-1.197-1.389-3.349-1.389-4.546 0l-21.559 25.029c-.57.662-1.4 1.042-2.273 1.042h-38.015c-5.3 0-9.68 4.14-9.98 9.44 0 0-2.331 25.591-4.032 66.31-1.765 42.256-7.908 135.02-7.908 135.02-.16 2.822-1.215 5.393-2.879 7.441-2.381 2.929-5.67.375-9.72.375-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-.792-5.474-1.472-8.414-6.7-28.94-23.83-94.686-23.83-138.351 0-13.73-.14-34.689 0-37.649.14-26.43 12.74-54.048 32-78.128 12.937-16.178 28.667-38.955 58.628-47.692 10.986-3.204 23.248-5.101 36.883-5.101 50.8 0 82.75 26.31 100.6 48.39 19.68 24.319 31.9 55.879 31.9 82.369z"
                                                                fill="#df646e" />
                                                            <path
                                                                d="m211.62 38.54c-19.38 9.9-33.55 23.84-43.37 36.44-19.26 24.69-31.27 56.78-31.41 83.88-.14 3.03-.84 25.18-.84 39.25 0 44.77 18.69 117.93 25.39 147.6.47 2.08 1.4 3.94 2.68 5.5-2.38 2.93-6.01 4.79-10.06 4.79-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-3.88-4.28-4.56-7.22-6.7-28.94-25.39-100.29-25.39-143.96 0-13.73.7-35.33.84-38.29.14-26.43 12.15-57.73 31.41-81.81 12.94-16.18 33.4-34.63 63.37-43.36z"
                                                                fill="#dc4955" />
                                                            <g>
                                                                <path
                                                                    d="m316.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.172.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                                    fill="#df646e" />
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="m225.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.171.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                                    fill="#df646e" />
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="m302.143 383.517c-16.23 10.87-34.973 16.353-53.643 16.353s-37.3-5.41-53.54-16.27l3.476-6.313-1.526-11.067 4.15 3.37c28.46 20.41 66.63 20.37 95.05-.12.2-.14.39-.27.6-.39l3.826-2.211z"
                                                                    fill="#a9a4d3" />
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="m211.98 376.2-1.85 15.68c-5.23-2.27-10.31-5.03-15.17-8.28l1.95-17.38 4.15 3.37c3.5 2.51 7.15 4.72 10.92 6.61z"
                                                                    fill="#938dc8" />
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="m269.5 306.5h-42c-4.142 0-7.5-3.358-7.5-7.5s3.358-7.5 7.5-7.5h42c4.142 0 7.5 3.358 7.5 7.5s-3.358 7.5-7.5 7.5z"
                                                                    fill="#df646e" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    44 تم الشراء بواسطة
                                                </li>
                                            </ul>
                                        </div>

                                        <div id="selectSize"
                                            class="pro-group addeffect-section product-description border-product">
                                            <h6 class="product-title size-text">
                                                اختر المقاس
                                            </h6>

                                            <h6 class="error-message">please select size</h6>
                                            <div class="size-box">
                                                <ul>
                                                    <li><a href="javascript:void(0)">1/2 كج</a></li>
                                                    <li><a href="javascript:void(0)">1 كج</a></li>
                                                    <li><a href="javascript:void(0)">5 كج</a></li>

                                                </ul>
                                            </div>

                                            <h6 class="product-title">العدد</h6>
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <button class="qty-minus"></button>
                                                    <input class="qty-adj form-control" type="number" value="1" />
                                                    <button class="qty-plus"></button>
                                                </div>
                                            </div>
                                            <div class="product-buttons">
                                                <a href="javascript:void(0)" id="cartEffect"
                                                    class="btn cart-btn btn-normal tooltip-top"
                                                    data-tippy-content="Add to cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    أضف الى السلة
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-normal add-to-wish tooltip-top"
                                                    data-tippy-content="Add to wishlist">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="pro-group">
                                            <h6 class="product-title">بيانات المنتج</h6>
                                            <p>المكونات : الذرة الكاملة، وجبة فول الصويا، وجبة دجاج ثانوية، وجبة غلوتين
                                                الذرة، لحم الضأن (المحفوظ مع خليط توكوفيرولس) ، حصيلة هضم الحيوان، وجبنة
                                                الديك الرومي، وجبة سمك السلمون، وجبة أسماك المحيط، حامض الفوسفوريك،
                                                كربونات الكالسيوم، ليسين مونوهيدروكلوريد، كلوريد الكولين والملح وثاني
                                                أكسيد التيتانيوم (اللون)، فيتامينات (مكملات فيتامين هـ، النياسين،
                                                فيتامين أ ملحق، أحاديات الثيامين، ملحق ريبوفلافين، د-الكالسيوم
                                                البانتوثين، بيريدوكسين هيدروكلوريد، فيتامين ب 12 التكميلي، مينديوني
                                                ثنائي كبريتات الصوديوم (المصدر من نشاط فيتامين ك)، مكملات فيتامين د 3،
                                                حمض الفوليك، البيوتين) ، المعادن (كبريتات الحديدوز، أكسيد الزنك، أكسيد
                                                المنغنيز، كبريتات النحاس، يودات الكالسيوم، سيلينيوم الصوديوم)، التورين،
                                                دي إل ميثيونين، أصفر 6، أصفر 5، اللاكتيك، أحمر 40، كلوريد البوتاسيوم،
                                                أزرق 2، مستخلص روزماري.</p>
                                        </div>

                                        <div class="pro-group pb-0">
                                            <h6 class="product-title">مشاركة</h6>
                                            <ul class="product-social">
                                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <section class="tab-product tab-exes creative-card creative-inner">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                                href="#top-home" role="tab" aria-selected="true"><i
                                                    class="icofont icofont-ui-home"></i>الوصف</a>
                                            <div class="material-border"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                                href="#top-profile" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-man-in-glasses"></i>التفاصيل</a>
                                            <div class="material-border"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                                href="#top-contact" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-contacts"></i>فيديو</a>
                                            <div class="material-border"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                                href="#top-review" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-contacts"></i>التعليقات</a>
                                            <div class="material-border"></div>
                                        </li>
                                    </ul>
                                    <div class="tab-content nav-material" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                            aria-labelledby="top-home-tab">
                                            <p>بالنكهات الشهية لحم البقر والغنم، الخضروات، الديك الرومي، سمك السالمون
                                                وسمك المحيط. المزيج المثالي الذي يربطك بكلبك من خلال وجبة صحية!</p>
                                        </div>
                                        <div class="tab-pane fade" id="top-profile" role="tabpanel"
                                            aria-labelledby="profile-top-tab">
                                            <div class="single-product-tables">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>تفاصيل</td>
                                                            <td>100% متكامل ومتوازن القيمة الغذائية</td>
                                                        </tr>
                                                        <tr>
                                                            <td>تفاصيل</td>
                                                            <td>يمنح جميع الفيتامينات والمعادن الضرورية</td>
                                                        </tr>
                                                        <tr>
                                                            <td>تفاصيل</td>
                                                            <td>بروتين عالي الجودة لعضلات قوية وصحية</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>تفاصيل</td>
                                                            <td>يمنح جميع الفيتامينات والمعادن الضرورية</td>
                                                        </tr>
                                                        <tr>
                                                            <td>تفاصيل</td>
                                                            <td>بروتين عالي الجودة لعضلات قوية وصحية</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                            aria-labelledby="contact-top-tab">
                                            <div class="mt-3 text-center">
                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/ppkBktPF6FI?si=7Ag8ODftj2MAS_ug"
                                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="top-review" role="tabpanel"
                                            aria-labelledby="review-top-tab">
                                            <form class="theme-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="previous-ratings">
                                                            <div class="comment-container">
                                                                <div class="comment-author">John Doe</div>
                                                                <div class="comment-text">This is a great product!
                                                                    Highly recommended.</div>
                                                                <div class="comment-rating">Rating: <span
                                                                        class="star">⭐⭐⭐⭐⭐</span></div>
                                                            </div>

                                                            <div class="comment-container">
                                                                <div class="comment-author">Jane Smith</div>
                                                                <div class="comment-text">Good quality but took a
                                                                    while to deliver.</div>
                                                                <div class="comment-rating">Rating: <span
                                                                        class="star">⭐⭐⭐⭐</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="media">
                                                            <label>:تقييم</label>
                                                            <div class="media-body ms-3">
                                                                <!--------------------new_rating_code-------------------------->
                                                                <div class="ratingStars">
                                                                    <div class="stars" id="starRating">
                                                                        ★ ★ ★ ★ ★
                                                                    </div>
                                                                    <p>Selected Rating: <span id="ratingValue">0</span>/5
                                                                    </p>
                                                                </div>
                                                                <script>
                                                                    const stars = document.getElementById("starRating");
                                                                    const ratingValue = document.getElementById("ratingValue");

                                                                    let selectedRating = 0;

                                                                    stars.addEventListener("mouseover", function(e) {
                                                                        if (e.target.tagName === "SPAN") {
                                                                            let index = [...stars.children].indexOf(e.target);
                                                                            highlightStars(index);
                                                                        }
                                                                    });

                                                                    stars.addEventListener("mouseout", function() {
                                                                        highlightStars(selectedRating - 1);
                                                                    });

                                                                    stars.addEventListener("click", function(e) {
                                                                        if (e.target.tagName === "SPAN") {
                                                                            selectedRating = [...stars.children].indexOf(e.target) + 1;
                                                                            ratingValue.textContent = selectedRating;
                                                                            highlightStars(selectedRating - 1);
                                                                        }
                                                                    });

                                                                    function highlightStars(index) {
                                                                        [...stars.children].forEach((star, i) => {
                                                                            star.classList.toggle("filled", i <= index);
                                                                        });
                                                                    }

                                                                    stars.innerHTML = "★".repeat(5).split("").map(() => `<span class="star">★</span>`).join("");
                                                                </script>
                                                                <!--------------------new_rating_code-------------------------->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="name">الاسم</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="ادخل الاسم" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>البريد الالكتروني</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="البريد الالكتروني" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>عنوان التعليق</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="عنوان التعليق" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>التعليق</label>
                                                        <textarea class="form-control" placeholder="ادخل تعليقك" id="exampleFormControlTextarea1" rows="6"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-normal" type="submit">إرسال
                                                            تعليقك</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
    <!-- related products -->
    <section class="section-big-py-space  ratio_asos b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>منتجات ذات صلة</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 product">
                    <div class="product-slide-4 no-arrow mb--5">
                        <div>
                            <div class="digipro-box">
                                <div class="img-wrraper">
                                    <a href="#">
                                        <img src="assets/images/product01.png" alt="product" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                    </a>
                                    <a href="#">
                                        <h5> (اعمار صغيرة) 1.5KG</h5>
                                    </a>
                                    <div class="sale-box">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h4 class="price">
                                                19.99 س.ر
                                            </h4>
                                        </div>
                                        <div class="pro-sale">
                                            <h4>بيتز شوب</h4>
                                        </div>
                                    </div>
                                    <div class="pro-btn">
                                        <a href="single_products.html" class="btn btn-normal btn-sm"> المزيد </a>
                                        <a href="javascript:void(0)" class="btn btn-normal btn-sm tooltip-top"
                                            data-tippy-content="أضف الى السلة"> أضف الى السلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="digipro-box">
                                <div class="img-wrraper">
                                    <a href="#">
                                        <img src="assets/images/product01.png" alt="product" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                    </a>
                                    <a href="#">
                                        <h5> (اعمار صغيرة) 1.5KG</h5>
                                    </a>
                                    <div class="sale-box">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h4 class="price">
                                                19.99 س.ر
                                            </h4>
                                        </div>
                                        <div class="pro-sale">
                                            <h4>بيتز شوب</h4>
                                        </div>
                                    </div>
                                    <div class="pro-btn">
                                        <a href="single_products.html" class="btn btn-normal btn-sm"> المزيد </a>
                                        <a href="javascript:void(0)" class="btn btn-normal btn-sm tooltip-top"
                                            data-tippy-content="أضف الى السلة"> أضف الى السلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div class="digipro-box">
                                <div class="img-wrraper">
                                    <a href="#">
                                        <img src="assets/images/product01.png" alt="product" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                    </a>
                                    <a href="#">
                                        <h5> (اعمار صغيرة) 1.5KG</h5>
                                    </a>
                                    <div class="sale-box">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h4 class="price">
                                                19.99 س.ر
                                            </h4>
                                        </div>
                                        <div class="pro-sale">
                                            <h4>بيتز شوب</h4>
                                        </div>
                                    </div>
                                    <div class="pro-btn">
                                        <a href="single_products.html" class="btn btn-normal btn-sm"> المزيد </a>
                                        <a href="javascript:void(0)" class="btn btn-normal btn-sm tooltip-top"
                                            data-tippy-content="أضف الى السلة"> أضف الى السلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div class="digipro-box">
                                <div class="img-wrraper">
                                    <a href="#">
                                        <img src="assets/images/product01.png" alt="product" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                    </a>
                                    <a href="#">
                                        <h5> (اعمار صغيرة) 1.5KG</h5>
                                    </a>
                                    <div class="sale-box">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h4 class="price">
                                                19.99 س.ر
                                            </h4>
                                        </div>
                                        <div class="pro-sale">
                                            <h4>بيتز شوب</h4>
                                        </div>
                                    </div>
                                    <div class="pro-btn">
                                        <a href="single_products.html" class="btn btn-normal btn-sm"> المزيد </a>
                                        <a href="javascript:void(0)" class="btn btn-normal btn-sm tooltip-top"
                                            data-tippy-content="أضف الى السلة"> أضف الى السلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="digipro-box">
                                <div class="img-wrraper">
                                    <a href="#">
                                        <img src="assets/images/product01.png" alt="product" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                    </a>
                                    <a href="#">
                                        <h5> (اعمار صغيرة) 1.5KG</h5>
                                    </a>
                                    <div class="sale-box">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h4 class="price">
                                                19.99 س.ر
                                            </h4>
                                        </div>
                                        <div class="pro-sale">
                                            <h4>بيتز شوب</h4>
                                        </div>
                                    </div>
                                    <div class="pro-btn">
                                        <a href="single_products.html" class="btn btn-normal btn-sm"> المزيد </a>
                                        <a href="javascript:void(0)" class="btn btn-normal btn-sm tooltip-top"
                                            data-tippy-content="أضف الى السلة"> أضف الى السلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="digipro-box">
                                <div class="img-wrraper">
                                    <a href="#">
                                        <img src="assets/images/product01.png" alt="product" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h4>بي ديجري - فيتل طعام جاف للكلاب</h4>
                                    </a>
                                    <a href="#">
                                        <h5> (اعمار صغيرة) 1.5KG</h5>
                                    </a>
                                    <div class="sale-box">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h4 class="price">
                                                19.99 س.ر
                                            </h4>
                                        </div>
                                        <div class="pro-sale">
                                            <h4>بيتز شوب</h4>
                                        </div>
                                    </div>
                                    <div class="pro-btn">
                                        <a href="single_products.html" class="btn btn-normal btn-sm"> المزيد </a>
                                        <a href="javascript:void(0)" class="btn btn-normal btn-sm tooltip-top"
                                            data-tippy-content="أضف الى السلة"> أضف الى السلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- related products -->
    <!--title-start-->
    <div class="title8 section-mb-space ">
        <h4>شركاؤنا</h4>
    </div>
    <!--title-end-->
    <!-- brand start -->
    <section class="brand-second section-big-mb-space">
        <div class="container-fluid">
            <div class="row brand-block">
                <div class="col-12">
                    <div class="brand-slide12 no-arrow mb--5">
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/1.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/2.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/3.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/4.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/5.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/6.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/7.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/4.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/5.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/6.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/4.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="assets/images/brand/5.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="brand-box">
                                <img src="../assets/images/brand/6.png" alt="brand" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brand start -->
@endsection
