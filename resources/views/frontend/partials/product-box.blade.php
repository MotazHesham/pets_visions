<div>
    <div class="digipro-box mt-1">
        <div class="img-wrraper">
            <a href="{{ route('frontend.products.show',$product->slug) }}"> 
                <img src="{{ $product->main_photo ? $product->main_photo->getUrl() : '' }}" 
                    onerror="this.onerror=null;this.src='{{ asset('no-image.png') }}';" alt="product" class="img-fluid">
            </a>
        </div>
        <div class="product-detail">
            <a href="{{ route('frontend.products.show',$product->slug) }}">
                <h4>{{ $product->name }}</h4>
            </a>
            <a href="{{ route('frontend.products.show',$product->slug) }}">
                <h5> {{ $product->description }}</h5>
            </a>
            <div class="sale-box">
                <div class="rating-box">
                    @include('frontend.partials.rating',['rating' => $product->rating])
                    <h4 class="price">
                        {{ $product->price }} {{ currency_symbol() }}
                    </h4>
                </div>
                <div class="pro-sale">
                    <h4> {{ $product->store->store_name ?? '' }}</h4>
                </div>
            </div>
            <div class="pro-btn">
                <a href="{{ route('frontend.products.show',$product->slug) }}" class="btn btn-normal btn-sm">
                    المزيد 
                </a>
                {{-- <a href="javascript:void(0)"
                    class="btn btn-normal btn-sm tooltip-top"
                    data-tippy-content="أضف الى السلة"> أضف الى السلة</a> --}}
            </div>
        </div>
    </div>
</div>

