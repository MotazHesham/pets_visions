<!doctype html>
<html lang="en">

<head>
    <title>{{ trans('panel.site_title') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('loginDesign/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url('{{ asset("frontend/assets/images/host01.jpg") }}');">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">{{ trans('global.login') }}</h3>
                                </div> 
                            </div>
                            @if(session('message'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf 
                                <div class="form-group mb-3">
                                    <label class="label" for="email">{{ trans('global.login_email') }}</label>

                                    <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            
                                <div class="form-group mb-3">
                                    <label class="label" for="password">{{ trans('global.login_password') }}</label> 
                                    <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                                
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">{{ trans('global.remember_me') }}
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        {{ trans('global.login') }}
                                    </button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('loginDesign/jquery.min.js') }}"></script>
    <script src="{{ asset('loginDesign/popper.js') }}"></script>
    <script src="{{ asset('loginDesign/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginDesign/main.js') }}"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"916a5fdee840e22d","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.1.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>

</html> 
