@extends('frontend.app')
@section('main')
<!-- start page title section -->
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5"
    style="background-image:url('{{ asset('frontend') }}/images/parallax-bg33.jpg');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-center">
            <div
                class="col-12 d-flex flex-column justify-content-center text-center extra-small-screen page-title-large">
                <!-- start page title -->
                <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">Our Latest
                    Blog</h1>
                <span class="text-white-2 opacity6 alt-font">Lorem Ipsum is simply dummy text printing</span>
                <!-- end page title -->
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start post content section -->
<section class="wow fadeIn">
    <div class="container">
        <div class="row blog-post-style4">
            <div class="col-12 px-3 p-md-0">
                <ul class="blog-grid blog-3col gutter-large">
                    <li class="grid-sizer"></li>

                    @foreach ($posts as $post)
                    <!-- start post item -->
                    <li class="grid-item wow fadeInUp">
                        <figure>
                            <div class="blog-img bg-extra-dark-gray">
                                <a href="blog-post-layout-03.html"><img src="{{ $post->image }}" alt=""></a>
                            </div>
                            <figcaption>
                                <div class="portfolio-hover-main text-left">
                                    <div class="blog-hover-box align-bottom">
                                        <span
                                            class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-5px-bottom sm-margin-5px-bottom">{{ date('d M, Y', strtotime($post->created_at)) }} <a href="blog-classic.html"
                                                class="text-medium-gray"> {{ $post->user->name }}</a></span>
                                        <h6 class="alt-font d-block text-white-2 font-weight-600 mb-0"><a
                                                href="blog-post-layout-03.html"
                                                class="text-white-2 text-deep-pink-hover">{{ Str::limit($post->title, 20, '...')}}</a>
                                        </h6>
                                        <p class="text-medium-gray margin-10px-top blog-hover-text">
                                            {!! Str::limit($post->description, 50, '...') !!} 
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <!-- end post item -->
                    @endforeach
                </ul>
                <!-- start pagination -->
                <div class=" text-center margin-100px-top md-margin-50px-top wow fadeInUp">
                    <div class="pagination text-small text-uppercase text-extra-dark-gray">
                        {{ $posts->links('frontend.partials.pagination') }}
                    </div>
                </div>
                <!-- end pagination -->
            </div>
        </div>
    </div>
</section>
<!-- end post content section -->
@endsection
