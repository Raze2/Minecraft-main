<!--::footer_part start::-->
<footer class="footer_part">
    <div class="footer_top">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-md-6">
                    <div class="single_footer_part text-center">
                        <h4 class="text-white">{{ __('frontend.FAQ') }}</h4>
                        <div class="row">
                            <div class="col">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('frontend.pages.contact') }}">{{ __('frontend.contactus') }}</a></li>
                                    <li><a href="{{ route('frontend.pages.privacy') }}">{{ __('frontend.privacy') }}</a></li>
                                    <li><a href="{{ route('frontend.pages.general-terms') }}">{{ __('frontend.generalterms') }}</a></li>
                                    <li><a href="{{ route('frontend.pages.store-terms') }}">{{ __('frontend.storeterms') }}</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('frontend.pages.about') }}">{{ __('frontend.aboutus') }}</a></li>
                                    <li><a href="{{ route('frontend.pages.rules') }}">{{ __('frontend.rules') }}</a></li>
                                    <li><a href="{{ route('frontend.pages.reports') }}">{{ __('frontend.reports') }}</a></li>
                                    <li><a href="{{ route('frontend.pages.youtuber-apply') }}">{{ __('frontend.youtuberapply') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copygight_text">
        <div class="container">
            <div class="copyright_text text-center w-100">
                <P>
                    {{ __('frontend.copyright') }} &copy;{{ now()->year }} {{ __('frontend.allrights') }}
                </P>
            </div>
        </div>
    </div>
</footer>
