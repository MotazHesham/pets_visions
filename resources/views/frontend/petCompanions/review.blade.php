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
            margin-top: 10px;
        }

        .tab-product .tab-content.nav-material p,
        .product-full-tab .tab-content.nav-material p {
            padding: 0;
            margin-bottom: -8px;
            line-height: 2;
            letter-spacing: 0.05em;
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
                            <h2>{{ trans('frontend.review.add_comment') }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">{{ trans('frontend.pet_companion.home') }}</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="{{ route('frontend.pet-companions.show', $petCompanion->id) }}">{{ $petCompanion->user->name ?? '' }}</a>
                                </li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">{{ trans('frontend.review.add_comment') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section class="review section-big-py-space">
        <div class="container">


            <div class=" row blog-contact  section-big-pb-space">
                <div class="col-sm-12  ">
                    <div class="creative-card" style="background:none; padding:0">
                        <h2> {{ trans('frontend.review.leave_ur_comment') }} </h2>
                        <div class="media-body ms-3">
                            <!--------------------new_rating_code-------------------------->
                            <div class="ratingStars">
                                <div class="stars" id="starRating">
                                    ★ ★ ★ ★ ★
                                </div>
                                <p style="display: none">Selected Rating: <span id="ratingValue">5</span>/5</p>
                            </div>

                        </div> 
                        <form class="theme-form" action="{{ route('frontend.pet-companion-reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pet_companion_id" value="{{ $petCompanion->id }}" id="">
                            <input type="hidden" name="rate" value="5" id="ratingValue-input">
                            <div class="row g-3"> 
                                <div class="col-md-12">
                                    <label for="name">{{ trans('frontend.review.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ trans('frontend.review.enter_name') }}" required>
                                </div> 
                                <div class="col-md-12">
                                    <label> {{ trans('frontend.review.comment') }}</label>
                                    <input type="text" class="form-control" name="comment"
                                    placeholder=" {{ trans('frontend.review.comment') }}" required>
                                </div> 
                                <div class="col-md-12">
                                    <button class="btn btn-normal" type="submit">
                                        {{ trans('frontend.review.send_comment') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row review-block">
                @foreach($reviews as $review)
                    <div class="col-lg-4 col-md-6">
                        <div class="review-box">
                            {{-- <img class="img-fluid " src="assets/images/avtar/1.jpg" alt="review"> --}}
                            <h5>{{ $review->name }}</h5>
                            
                            @include('frontend.partials.rating',['rating' => $review->rate])

                            <div class="review-message">
                                <p>{{ $review->comment }}</p>
                            </div>
                            <h6>({{ \Carbon\Carbon::parse($review->created_at)
                                                ->locale('ar')
                                                ->translatedFormat('d F Y') }})</h6>
                        </div>
                    </div> 
                @endforeach
            </div>
            <div>
                {{ $reviews->links() }}
            </div>
        </div>
    </section>
    <!-- Section ends -->
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
