<!--header start-->
<header id="stickyheader">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-5 col-md-7 col-sm-6">
                    <div class="top-header-left">

                        <div class="app-link">
                            <h6>
                                {{ trans('frontend.header.download_app') }}
                            </h6>
                            <ul>
                                <li><a><i class="fa fa-apple"></i></a></li>
                                <li><a><i class="fa fa-android"></i></a></li>
                                <li><a><i class="fa fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-5 col-sm-6">
                    <div class="top-header-right">

                        <div class="language-block">
                            <div class="language-dropdown" style="cursor: pointer">
                                <span class="language-dropdown-click">
                                    {{ config('panel.available_languages')[app()->getLocale()] }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                                <ul class="language-dropdown-open">

                                    @foreach (config('panel.available_languages') as $langLocale => $langName)
                                        <a class="dropdown-item"
                                            href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                            ({{ $langName }})</a>
                                    @endforeach 

                                </ul>
                            </div>
                            <div class="curroncy-dropdown">
                                <span class="curroncy-dropdown-click b-g-white">
                                    <img src="{{ asset('frontend/assets/images/icons/saudi_flag.png') }}"
                                        width="20" /> {{ currency_symbol() }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                                <ul class="curroncy-dropdown-open">
                                    <li><a href="javascript:void(0)"> <img
                                                src="{{ asset('frontend/assets/images/icons/saudi_flag.png') }}"
                                                width="20" /> {{ currency_symbol() }} </a></li>
                                    {{-- <li><a href="javascript:void(0)"><i class="fa fa-usd"></i>usd</a></li> --}}

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="main-menu-block">
                    <div class="header-left"> 
                        <div class="brand-logo logo-sm-center">
                            <a href="{{ route('frontend.home') }} ">
                                <img src="{{ asset(get_setting('logo')) }}" class="img-fluid"
                                    alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="input-block">
                        <div class="input-box">
                            <form class="big-deal-form" action="{{ route('frontend.products.search') }}">
                                <div class="input-group ">
                                    <span class="search"><i class="fa fa-search"></i></span>
                                    <input type="text" name="search" value="{{ getFromRequest('search') }}" class="form-control" placeholder="بحث ..">
                                    <select name="category_id" style="cursor: pointer">
                                        <option value="">{{ trans('frontend.header.all_categories') }}</option>
                                        @foreach(\App\Models\ProductCategory::get() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="icon-block">
                            <ul>
                                <li class="mobile-search">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('frontend/svgs/search.svg') }}" width="20" height="20" alt="">
                                    </a>
                                </li>
                                <li class="mobile-user " @guest onclick="openAccount()" @endguest>
                                    <a @auth href="{{ route('frontend.dashboard.home') }}" @else href="javascript:void(0)" @endauth>
                                        <img src="{{ asset('frontend/svgs/user.svg') }}" width="20" height="20" alt="">
                                    </a>
                                </li>
                                <li class="mobile-setting" >
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('frontend/svgs/settings.svg') }}" width="20" height="20" alt="">
                                    </a>
                                </li>
                                <li class="mobile-wishlist item-count" onclick="openWishlist()" >
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('frontend/svgs/fav.svg') }}" alt="" width="20" height="20">
                                        {{-- <div class="item-count-contain">
                                            2
                                        </div> --}}
                                    </a>
                                </li> 
                            </ul>
                        </div>
                        <div class="menu-nav">
                            <span class="toggle-nav">
                                <i class="fa fa-bars "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="searchbar-input">
            <div class="input-group">
                <span class="input-group-text">
                    <img src="{{ asset('frontend/svgs/search2.svg') }}" alt="">
                </span>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.header.search') }}">
                <span class="input-group-text close-searchbar">
                    <img src="{{ asset('frontend/svgs/close.svg') }}" width="20" alt="">
                </span>
            </div>
        </div>
    </div>
    <div class="category-header-2">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-menu">
                        <div class="logo-block">
                            <div class="brand-logo logo-sm-center">
                                <a href="{{ route('frontend.home') }} ">
                                    <img src="{{ asset(get_setting('logo')) }}" class="img-fluid  "
                                        alt="logo">
                                </a>
                            </div>
                        </div> 
                        <div class="nav-block">

                            <div class="nav-left">

                                <nav class="navbar" data-bs-toggle="collapse"
                                    data-bs-target="#navbarToggleExternalContent">
                                    <button class="navbar-toggler" type="button">
                                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                    </button>
                                    <h5 class="mb-0  text-white title-font">{{ trans('frontend.header.stores') }}</h5>
                                </nav>
                                <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                    <ul class="nav-cat title-font">
                                        @foreach (\App\Models\Store::take(8)->get() as $store) 
                                            <li>
                                                <a href="{{ route('frontend.shops.show',$store->id) }}">
                                                    <img src="{{ $store->logo ? $store->logo->getUrl() : '' }}" > 
                                                    {{ $store->store_name }}
                                                </a>
                                            </li> 
                                        @endforeach
                                        <li>
                                            <a class="mor-slide-click" href="{{ route('frontend.shops') }}">{{ trans('frontend.header.more') }}</a>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="menu-block">
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">
                                            {{ trans('frontend.header.back') }}
                                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <!--HOME-->
                                    <li>
                                        <a class="dark-menu-item" href="{{ route('frontend.home') }} ">{{ trans('frontend.header.home') }} </a>

                                    </li>
                                    <!--HOME-END-->
                                    <!--sale-->
                                    <li>
                                        <a class="dark-menu-item" href="{{ route('frontend.about') }}">{{ trans('frontend.header.about') }} </a>

                                    </li>
                                    <!--sale-END-->
                                    <!--SHOP-->
                                    <li>
                                        <a class="dark-menu-item" href="javascript:void(0)">{{ trans('frontend.header.services') }}</a>
                                        <ul>
                                            <li><a href="{{ route('frontend.shops') }}">{{ trans('frontend.header.stores') }} </a></li>
                                            <li><a href="{{ route('frontend.clinics') }}">{{ trans('frontend.header.clinics') }}</a></li>
                                            <li><a href="{{ route('frontend.firstaids') }}">{{ trans('frontend.header.firstaids') }} </a></li>
                                            <li><a href="{{ route('frontend.hostings') }}">{{ trans('frontend.header.hosting') }} </a></li>
                                            <li><a href="{{ route('frontend.adoptions') }}">{{ trans('frontend.header.adoption') }}</a></li>
                                            <li><a href="{{ route('frontend.pet-companions') }}">{{ trans('frontend.header.pet_companion') }} </a></li>
                                            <li><a href="{{ route('frontend.stray-pets') }}">{{ trans('frontend.header.stray') }}</a></li>  
                                            <li><a href="{{ route('frontend.delivery-pets') }}">{{ trans('frontend.header.delivery') }}</a></li> 

                                        </ul>
                                    </li>
                                    <!--SHOP-END-->
                                    <!--SHOP-->
                                    <li>
                                        <a class="dark-menu-item" href="{{ route('frontend.clinics') }}">{{ trans('frontend.header.clinics') }}</a>

                                    </li>
                                    <!--SHOP-END-->
                                    <!--HOME-->
                                    <li>
                                        <a class="dark-menu-item" href="{{ route('frontend.products.search') }}">{{ trans('frontend.header.shops') }}</a>

                                    </li>
                                    <!--HOME-END-->
                                    <!--HOME-->
                                    <li>
                                        <a class="dark-menu-item" href="{{ route('frontend.news') }}">{{ trans('frontend.header.news') }} </a>

                                    </li>
                                    <!--HOME-END-->
                                    <!--HOME-->
                                    <li>
                                        <a class="dark-menu-item" href="{{ route('frontend.volunteers') }}">{{ trans('frontend.header.volunteer') }}  </a>

                                    </li>
                                    <!--HOME-END-->


                                </ul>
                            </nav>
                        </div>
                        <div class="icon-block">
                            <ul>
                                <li class="mobile-search">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('frontend/svgs/search.svg') }}" width="30" alt="">
                                    </a>
                                </li>
                                <li class="mobile-user onhover-dropdown" @guest onclick="openAccount()" @endguest>
                                    <a @auth href="{{ route('frontend.dashboard.home') }}" @else href="javascript:void(0)" @endauth>
                                        <img src="{{ asset('frontend/svgs/user-black.svg') }}" width="30" alt="">
                                    </a>
                                </li> 
                            </ul>
                        </div>
                        <div class="category-right">
                            <div class="contact-block">
                                <a href="tel:{{ get_setting('phone') }}">
                                    <i class="fa fa-volume-control-phone"></i>
                                    <span>{{ trans('frontend.header.call_us') }}<span>{{ get_setting('phone') }}</span></span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="searchbar-input">
            <div class="input-group">
                <span class="input-group-text"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px"
                        viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;"
                        xml:space="preserve">
                        <g>
                            <path
                                d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
                        </g>
                    </svg></span>
                <input type="text" class="form-control" placeholder="بحث ...  ">
                <span class="input-group-text close-searchbar"><svg viewBox="0 0 329.26933 329"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
                    </svg></span>
            </div>
        </div>


    </div>
</header>
<!--header end-->
