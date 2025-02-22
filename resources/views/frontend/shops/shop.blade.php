@extends('layouts.frontend')
@section('styles')
    <style>
        .pagination span {
            padding: 18px !important
        }
    </style>
@endsection
@section('content')
    <form action="" id="form-shop">
        <section class="section-big-pt-space ratio_asos b-g-light">
            <div class="collection-wrapper">
                <div class="custom-container">
                    <div class="row">
                        <div class="collection-content col">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="{{ $shop->cover ? $shop->cover->getUrl() : '' }}"
                                                    class="img-fluid " alt=""></a>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="shop-logo">
                                                        <img src="{{ $shop->logo ? $shop->logo->getUrl() : '' }}"
                                                            class="img-fluid" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="top-banner-content small-section">

                                                        <h4>{{ $shop->store_name }}</h4>

                                                        @include('frontend.partials.rating', [
                                                            'rating' => $shop->storeProducts()->avg('rating'),
                                                        ])

                                                        <ul>
                                                            <li>
                                                                {{ $shop->address }}
                                                            </li>
                                                        </ul>
                                                        {{ $shop->store_phone }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span
                                                                class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                    aria-hidden="true"></i> فلتر البحث</span></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                            <div class="search-count">
                                                                <h5>عرض المنتجات
                                                                    {{ $products->firstItem() }}-{{ $products->lastItem() }}
                                                                    من {{ $products->total() }} نتيجة</h5>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li><img src="{{ asset('frontend/assets/images/category/icon/2.png') }}"
                                                                            alt="" class="product-2-layout-view">
                                                                    </li>
                                                                    <li><img src="{{ asset('frontend/assets/images/category/icon/3.png') }}"
                                                                            alt="" class="product-3-layout-view">
                                                                    </li>
                                                                    <li><img src="{{ asset('frontend/assets/images/category/icon/4.png') }}"
                                                                            alt="" class="product-4-layout-view">
                                                                    </li>
                                                                    <li><img src="{{ asset('frontend/assets/images/category/icon/6.png') }}"
                                                                            alt="" class="product-6-layout-view">
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-page-per-view">
                                                                <select name="per_page" onchange="sort_form()">
                                                                    <option value="12" @if(getFromRequest('per_page') == '12') selected @endif>عرض 12 منتج</option>
                                                                    <option value="24" @if(getFromRequest('per_page') == '24') selected @endif>عرض 24 منتج</option>
                                                                    <option value="50" @if(getFromRequest('per_page') == '50') selected @endif>عرض 50 منتج</option>
                                                                    <option value="100" @if(getFromRequest('per_page') == '100') selected @endif>عرض 100 منتج</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product">
                                                <div class="row">
                                                    @foreach ($products as $product)
                                                        <div class="col-md-4">
                                                            @include('frontend.partials.product-box', [
                                                                'product' => $product,
                                                            ])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="product-pagination">
                                                <div class="theme-paggination-block">
                                                    {{ $products->appends(request()->input())->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 collection-filter category-side category-page-side">
                            <!-- side-bar colleps block stat -->
                            <div class="collection-filter-block creative-card creative-inner category-side">
                                <!-- brand filter start -->
                                <div class="collection-mobile-back">
                                    <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i>
                                        back</span>
                                </div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title mt-0">التصنيفات</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter"> 
                                            @foreach($categories as $category)
                                                <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                    <input type="checkbox" class="custom-control-input form-check-input"
                                                        id="vera-moda" name="categories[{{$category->id}}]" 
                                                        @if(getFromRequest('categories') && in_array($category->id,array_keys(getFromRequest('categories')))) checked @endif onchange="sort_form()">
                                                    <label class="custom-control-label form-check-label" for="vera-moda"> 
                                                        {{ $category->name }}
                                                    </label>
                                                </div> 
                                            @endforeach
                                        </div>
                                    </div>
                                </div> 

                                <!-- price filter start here -->
                                <div class="collection-collapse-block border-0 open">
                                    <h3 class="collapse-block-title">السعر</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="filter-slide">
                                            <input class="js-range-slider" type="text" name="price_range" value=""
                                                data-type="double" />
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!-- silde-bar colleps block end here -->
                            <!-- side-bar banner start here -->
                            <div class="collection-sidebar-banner">
                                <a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/side-banner.jpg') }}" class="img-fluid "
                                        alt="side-banner"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section End -->


        <section class="discount-banner b-g-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="discount-banner-contain p-0">
                            <img src="{{ asset('frontend/assets/images/van.png') }}" width="200" />
                            <h2>نوفرلك آمن وأسرع خدمة رعاية متنقلة لحد باب بيتك</h2>
                            <h1>
                                مشغول أو يومك مزدحم
                                وما عندك وقت</span>
                            </h1>
                            <div class="rounded-contain">
                                <div class="rounded-subcontain">
                                    مستني أية!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection

@section('scripts')
    <script>
        function sort_form(){
            $('#form-shop').submit();
        }
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            grid: true,
            min: '{{ $min_price }}',
            max: '{{ $max_price }}',
            from: '{{ $from_price ?? $min_price }}',
            to: '{{ $to_price ?? $max_price }}',
            prefix: '{{currency_symbol()}}'
        });
    </script>
@endsection
