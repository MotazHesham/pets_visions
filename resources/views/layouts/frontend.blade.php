<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('store_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.storeManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('store_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.stores.index') }}">
                                            {{ trans('cruds.store.title') }}
                                        </a>
                                    @endcan
                                    @can('product_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.product-categories.index') }}">
                                            {{ trans('cruds.productCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('product_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.products.index') }}">
                                            {{ trans('cruds.product.title') }}
                                        </a>
                                    @endcan
                                    @can('product_review_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.product-reviews.index') }}">
                                            {{ trans('cruds.productReview.title') }}
                                        </a>
                                    @endcan
                                    @can('product_wishlist_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.product-wishlists.index') }}">
                                            {{ trans('cruds.productWishlist.title') }}
                                        </a>
                                    @endcan
                                    @can('clinic_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.clinicManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('clinic_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.clinics.index') }}">
                                            {{ trans('cruds.clinic.title') }}
                                        </a>
                                    @endcan
                                    @can('clinic_service_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.clinic-services.index') }}">
                                            {{ trans('cruds.clinicService.title') }}
                                        </a>
                                    @endcan
                                    @can('clinic_review_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.clinic-reviews.index') }}">
                                            {{ trans('cruds.clinicReview.title') }}
                                        </a>
                                    @endcan
                                    @can('paramedic_access')
                                        <a class="dropdown-item" href="{{ route('frontend.paramedics.index') }}">
                                            {{ trans('cruds.paramedic.title') }}
                                        </a>
                                    @endcan
                                    @can('hosting_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.hostingManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('hosting_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hostings.index') }}">
                                            {{ trans('cruds.hosting.title') }}
                                        </a>
                                    @endcan
                                    @can('hosting_review_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hosting-reviews.index') }}">
                                            {{ trans('cruds.hostingReview.title') }}
                                        </a>
                                    @endcan
                                    @can('adoption_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.adoptionManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('adoption_pet_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.adoption-pets.index') }}">
                                            {{ trans('cruds.adoptionPet.title') }}
                                        </a>
                                    @endcan
                                    @can('adoption_request_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.adoption-requests.index') }}">
                                            {{ trans('cruds.adoptionRequest.title') }}
                                        </a>
                                    @endcan
                                    @can('pet_companion_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.petCompanionManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('pet_companion_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.pet-companions.index') }}">
                                            {{ trans('cruds.petCompanion.title') }}
                                        </a>
                                    @endcan
                                    @can('pet_companion_review_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.pet-companion-reviews.index') }}">
                                            {{ trans('cruds.petCompanionReview.title') }}
                                        </a>
                                    @endcan
                                    @can('stray_pet_access')
                                        <a class="dropdown-item" href="{{ route('frontend.stray-pets.index') }}">
                                            {{ trans('cruds.strayPet.title') }}
                                        </a>
                                    @endcan
                                    @can('delivery_pet_access')
                                        <a class="dropdown-item" href="{{ route('frontend.delivery-pets.index') }}">
                                            {{ trans('cruds.deliveryPet.title') }}
                                        </a>
                                    @endcan
                                    @can('pets_lover_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.petsLoverManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('user_pet_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-pets.index') }}">
                                            {{ trans('cruds.userPet.title') }}
                                        </a>
                                    @endcan
                                    @can('affiliation_analytic_access')
                                        <a class="dropdown-item" href="{{ route('frontend.affiliation-analytics.index') }}">
                                            {{ trans('cruds.affiliationAnalytic.title') }}
                                        </a>
                                    @endcan
                                    @can('news_access')
                                        <a class="dropdown-item" href="{{ route('frontend.newss.index') }}">
                                            {{ trans('cruds.news.title') }}
                                        </a>
                                    @endcan
                                    @can('news_comment_access')
                                        <a class="dropdown-item" href="{{ route('frontend.news-comments.index') }}">
                                            {{ trans('cruds.newsComment.title') }}
                                        </a>
                                    @endcan
                                    @can('volunteer_access')
                                        <a class="dropdown-item" href="{{ route('frontend.volunteers.index') }}">
                                            {{ trans('cruds.volunteer.title') }}
                                        </a>
                                    @endcan
                                    @can('contact_us_access')
                                        <a class="dropdown-item" href="{{ route('frontend.contact-uss.index') }}">
                                            {{ trans('cruds.contactUs.title') }}
                                        </a>
                                    @endcan
                                    @can('subscription_access')
                                        <a class="dropdown-item" href="{{ route('frontend.subscriptions.index') }}">
                                            {{ trans('cruds.subscription.title') }}
                                        </a>
                                    @endcan
                                    @can('general_setting_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.generalSetting.title') }}
                                        </a>
                                    @endcan
                                    @can('user_alert_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-alerts.index') }}">
                                            {{ trans('cruds.userAlert.title') }}
                                        </a>
                                    @endcan
                                    @can('pet_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.pet-types.index') }}">
                                            {{ trans('cruds.petType.title') }}
                                        </a>
                                    @endcan
                                    @can('hosting_service_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hosting-services.index') }}">
                                            {{ trans('cruds.hostingService.title') }}
                                        </a>
                                    @endcan
                                    @can('slider_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sliders.index') }}">
                                            {{ trans('cruds.slider.title') }}
                                        </a>
                                    @endcan
                                    @can('setting_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.settings.index') }}">
                                            {{ trans('cruds.setting.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>