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
                            <h2>{{ $product->name }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.product.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="{{ route('frontend.shops.show',$product->store_id) }}">{{ $product->store->store_name ?? '' }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ $product->category->name ?? '' }}</a></li>
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

                        <!-- side-bar single product slider start -->
                        <div class="theme-card creative-card creative-inner">
                            <h5 class="title-border">{{ trans('frontend.product.new_products') }}</h5>
                            <div class="slide-1">
                                @foreach($newProducts as $chunk)
                                    <div>
                                        <div class="media-banner plrb-0 b-g-white1 border-0">
                                            @foreach($chunk as $productDetail)
                                                @include('frontend.partials.product-box-2',['productDetail' => $productDetail])
                                            @endforeach
                                        </div>
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                    </div>
                    <div class="col-lg-9 col-sm-12 col-xs-12">
                        <div class="container-fluid"> 
                            <div class="row ">
                                <div class="col-lg-5">
                                    <div class="product-slick ">
                                        @foreach($product->photos as $key => $media)
                                            <div><img src="{{ $media->getUrl() }}" alt=""
                                                    class="img-fluid  image_zoom_cls-{{$key}}"></div>
                                        @endforeach 
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <div class="slider-nav">
                                                @foreach($product->photos as $key => $media)
                                                    <div><img src="{{ $media->getUrl('preview') }}" alt=""
                                                            class="img-fluid"></div>
                                                @endforeach  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 rtl-text">
                                    <div class="product-right ">
                                        <div class="pro-group">
                                            <h2>{{ $product->name }}</h2>
                                            <ul class="pro-price">
                                                <li>{{ $product->price }} {{ currency_symbol() }}</li> 
                                            </ul>
                                            <div class="revieu-box">
                                                @include('frontend.partials.rating',['rating' => $product->rating]) 
                                                <a href="#"><span>({{ $product->productProductReviews()->count() }} {{ trans('frontend.product.comments') }})</span></a>
                                            </div> 
                                        </div>

                                        <div class="pro-group">
                                            <h6 class="product-title">{{ trans('frontend.product.product_info') }}</h6>
                                            <p>
                                                {!! $product->description !!}
                                            </p>
                                        </div>
                                        
                                        <div id="selectSize"
                                            class="pro-group addeffect-section product-description border-product">
                                            
                                            <div class="product-buttons">
                                                <a href="{{ $product->affiliation_link }}" id="cartEffect"
                                                    class="btn cart-btn btn-normal tooltip-top"
                                                    target="_blanc"
                                                    data-tippy-content="{{ trans('frontend.product.buy_now') }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    {{ trans('frontend.product.buy_now') }}
                                                </a>
                                                <a 
                                                    @auth
                                                        href="{{ route('frontend.dashboard.wishlists.update_or_create',$product->id) }}"
                                                    @else
                                                        href="javascript:void(0)"
                                                        onclick="openAccount()"
                                                    @endauth
                                                    class="btn btn-normal add-to-wish tooltip-top"
                                                    data-tippy-content="Add to wishlist">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>



                                        <div class="pro-group pb-0">
                                            <h6 class="product-title">{{ trans('frontend.product.share') }}</h6>
                                            <ul class="product-social">
                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a href="https://api.whatsapp.com/send?text={{ urlencode($product->name . ' ' . request()->fullUrl()) }}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                </li>
                                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($product->name) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                                </li> 
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
                                                    class="icofont icofont-ui-home"></i>{{ trans('frontend.product.details') }}</a>
                                            <div class="material-border"></div>
                                        </li> 
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                                href="#top-contact" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-contacts"></i>{{ trans('frontend.product.video') }}</a>
                                            <div class="material-border"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                                href="#top-review" role="tab" aria-selected="false"><i
                                                    class="icofont icofont-contacts"></i>{{ trans('frontend.product.reviews') }}</a>
                                            <div class="material-border"></div>
                                        </li>
                                    </ul>
                                    <div class="tab-content nav-material" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                            aria-labelledby="top-home-tab">
                                            <p class="mt-4">  
                                                {!! $product->description !!}
                                            </p>
                                        </div> 
                                        <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                            aria-labelledby="contact-top-tab">
                                            <div class="mt-3 text-center">
                                                {!! $product->video_link !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="top-review" role="tabpanel"
                                            aria-labelledby="review-top-tab"> 
                                            @if ($errors->count() > 0)
                                                <div class="alert alert-danger">
                                                    <ul class="list-unstyled">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="previous-ratings" style="max-height: 300px;overflow:scroll">
                                                        @foreach($reviews as $review)
                                                            <div class="comment-container">
                                                                <div class="comment-author">{{ $review->name }}</div>
                                                                <div class="comment-text">
                                                                    {{ $review->comment }}
                                                                </div>
                                                                <div class="comment-rating">{{ trans('frontend.product.rating') }}: 
                                                                    <span class="star">
                                                                        @for($i = 0 ; $i < $review->rate ; $i++)
                                                                        ⭐
                                                                        @endfor
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach 
                                                    </div>
                                                    <div class="media mt-4">
                                                        <label>:تقييم</label>
                                                        <div class="media-body ms-3"> 
                                                            <div class="ratingStars">
                                                                <div class="stars" id="starRating">
                                                                    ★ ★ ★ ★ ★
                                                                </div>
                                                                <p style="display: none">Selected Rating: <span id="ratingValue">5</span>/5
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('frontend.product-reviews.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                                                    <input type="hidden" name="rate" value="5" id="ratingValue-input">
                                                    <div class="col-md-12">
                                                        <label for="name">{{ trans('frontend.product.name') }}</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="{{ trans('frontend.product.enter_name') }}" required>
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <label> {{ trans('frontend.product.comment') }}</label>
                                                        <input type="text" class="form-control" name="comment"
                                                        placeholder=" {{ trans('frontend.product.comment') }}" required>
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <button class="btn btn-normal" type="submit">
                                                            {{ trans('frontend.product.send_comment') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div> 
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
                    <h2>{{ trans('frontend.product.related_products') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 product">
                    <div class="product-slide-4 no-arrow mb--5">
                        @foreach($similarProducts as $similarProduct)
                            @include('frontend.partials.product-box',['product' => $similarProduct])
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section> 
@endsection

@section('scripts')
    
<script>
    const stars = document.getElementById("starRating");
    const ratingValue = document.getElementById("ratingValue");

    let selectedRating = 5;

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
            $('#ratingValue-input').val(selectedRating);
            highlightStars(selectedRating - 1);
        }
    });

    function highlightStars(index) {
        [...stars.children].forEach((star, i) => {
            star.classList.toggle("filled", i <= index);
        });
    }

    stars.innerHTML = "★".repeat(5).split("").map(() => `<span class="star filled">★</span>`).join("");
</script> 
@endsection