@if(get_setting('recaptcha_active'))
    <div class="g-recaptcha" data-sitekey="{{ get_setting('recaptcha_site_key') }}"></div>
    @if ($errors->has('g-recaptcha-response'))
        <div class="invalid-feedback d-flex">
            {{ $errors->first('g-recaptcha-response') }}
        </div>
    @endif
@endif