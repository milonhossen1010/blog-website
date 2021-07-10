@extends('frontend.app')

@section('main')
<section id="home" class="p-0 parallax mobile-height wow fadeIn" data-stellar-background-ratio="0.5" style="background-image: url(&quot;{{ asset('frontend') }}/images/parallax-bg31.jpg&quot;); background-position: 0px -51px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-full bg-extra-dark-gray"></div>
    <div class="container position-relative full-screen" style="min-height: 319px;">
        <div class="slider-typography text-center">
            <div class="slider-text-middle-main">
                <div class="slider-text-middle">
                    <div class="bg-black-opacity-light w-50 mx-auto md-width-80">
                        <div class="padding-fifteen-all sm-padding-20px-all">
                            <span class="title-extra-large text-white-2 font-weight-600 d-block margin-30px-bottom sm-margin-10px-bottom">404!</span>
                            <h6 class="text-uppercase text-deep-pink font-weight-600 alt-font d-block margin-5px-bottom">Page Not Found</h6>
                            <span class="text-medium-gray width-60 d-block mx-auto text-large md-width-100">The page you were looking for could not be found.</span>
                            <form action="#" method="post" class="position-relative">
                                <div class="input-group-404 input-group margin-50px-tb sm-margin-20px-tb">
                                    <input name="text" id="text" data-email="required" type="text" placeholder="Enter your keywords..." class="extra-big-input border-none form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-large bg-white text-medium-gray"><i class="ti-search icon-small m-0 position-raltive top-2"></i></button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-transparent-white btn-medium text-extra-small border-radius-4"><i class="ti-arrow-left margin-5px-right ml-0" aria-hidden="true"></i> Back To Homepage</a>
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</section>
@endsection