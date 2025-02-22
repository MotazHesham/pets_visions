<div class="media-banner-box">
    <div class="media">
        <a href="{{ route('frontend.products.show',['slug' => $productDetail->slug, 'name' => $productDetail->nonSpaceName()]) }}" tabindex="0">
            <img src="{{ $productDetail->main_photo ? $productDetail->main_photo->getUrl('thumb') : '' }}"
                    onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" class="img-fluid " alt="banner">
        </a>
        <div class="media-body">
            <div class="media-contant">
                <div>
                    <div class="product-detail">

                        @include('frontend.partials.rating',['rating' => $productDetail->rating]) 

                        <a href="{{ route('frontend.products.show',['slug' => $productDetail->slug, 'name' => $productDetail->nonSpaceName()]) }}"  tabindex="0">
                            <p>{{ $productDetail->name }}</p>
                        </a>
                        <h6>{{ $productDetail->price }} {{ currency_symbol() }}</h6>
                    </div>
                    <div class="cart-info"> 
                        <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                            data-tippy-content="اضف الى امنياتي"><i
                                data-feather="heart" class="add-to-wish"></i></a>
                        <a href="{{ route('frontend.products.show',['slug' => $productDetail->slug, 'name' => $productDetail->nonSpaceName()]) }}" class="tooltip-top"
                            data-tippy-content="عرض المنتج"><i
                                data-feather="eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>