<!-- footer start -->
<footer>
    <div class="footer1 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-main">
                        <div class="footer-box">
                            <div class="footer-title mobile-title">
                                <h5>{{ trans('frontend.footer.about') }}</h5>
                            </div>
                            <div class="footer-contant">
                                <div class="footer-logo">
                                    <a href="{{route('frontend.home')}}">
                                        <img src="{{ asset(get_setting('logo')) }}" class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <p>{{ get_setting('description_2') }}</p>
                                <ul class="sosiyal">
                                    <li><a href="{{ get_setting('facebook') }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ get_setting('googleplus') }}"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="{{ get_setting('twitter') }}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ get_setting('instagram') }}"><i class="fa fa-instagram"></i></a></li> 
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>{{ trans('frontend.footer.links') }}</h5>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    @if(get_setting('important_links'))
                                        @foreach(json_decode(get_setting('important_links'), true) as $key => $link)  
                                            <li>
                                                <a href="{{ $link['link'] }}" target="_blank">  
                                                    {{ $link['name'] }} 
                                                </a>
                                            </li>  
                                        @endforeach 
                                    @endif  
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>{{ trans('frontend.footer.contact_us') }}</h5>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>{{ get_setting('address') }}</span></li>
                                    <li><i class="fa fa-phone"></i> <a href="tel:{{ get_setting('phone') }}">{{ get_setting('phone') }}</a></li>
                                    <li><i class="fa fa-envelope-o"></i> <a href="mailto:{{ get_setting('email') }}">{{ get_setting('email') }}</a></li> 
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>{{ trans('frontend.footer.subscriptions') }}</h5>
                            </div>
                            <div class="footer-contant">
                                <form action="{{ route('frontend.subscriptions.store') }}" method="POST">
                                    @csrf
                                    <div class="newsletter-second">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="name" class="form-control" placeholder="{{ trans('frontend.footer.name') }}">
                                                <span class="input-group-text"><i class="ti-user"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="email" name="email" class="form-control" placeholder="{{ trans('frontend.footer.email') }}">
                                                <span class="input-group-text"><i class="ti-email"></i></span>
                                            </div>
                                        </div>
                                        @include('partials.recaptcha')
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-solid btn-sm">{{ trans('frontend.footer.subscribe') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter footer-border">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-left">
                        <p>{{ get_setting('copy_right') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
