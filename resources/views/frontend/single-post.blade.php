@extends('frontend.app')
@section('title') 
{{ $post->title }}
@endsection
@section('main')

<!-- start page title section -->
<section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space"
    style="margin-top: 72px; visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-md-6 d-flex flex-column justify-content-center text-center text-md-left">
                <!-- start page title -->
                <h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom text-uppercase">
                    {{ $post->title }}</h1>
                <!-- end page title -->
            </div>
            <div
                class="col-xl-4 col-md-6 alt-font breadcrumb justify-content-center justify-content-md-end text-small sm-margin-10px-top">
                <!-- breadcrumb -->
                <ul class="text-center text-md-left text-uppercase">
                    <li><a href="javaSccript:void()" class="text-dark-gray">{{ date('d F Y', strtotime($post->created_at)) }}</a></li>
                    <li><span class="text-dark-gray">by <a
                                href="{{ $post->user->name }}">{{ $post->user->name }}</a></span></li>
                    <li class="text-dark-gray">
                        @foreach ($post->categories as $category)

                        <a href="{{ $category->slug }}">{{ $category->id }}</a>
                        @endforeach
                    </li>
                </ul>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start post content section -->
<section>
    <div class="container">
        <div class="row">
            <main
                class="col-12 col-lg-9 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom pl-0 md-no-padding-right">
                <div class="col-12 blog-details-text last-paragraph-no-margin">
                    <img src="{{ $post->image }}" alt="" class="width-100 margin-45px-bottom" data-no-retina="">
                    <p>{!! $post->description !!}</p>
                </div>
                <div class="col-12 margin-seven-bottom margin-eight-top">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="row mx-0">
                    <div class="col-12 col-lg-6 text-center text-lg-left">
                        <div class="tag-cloud margin-20px-bottom">
                            @foreach ($post->tags as $tag)
                            <a href="{{ $tag->slug }}">{{ $tag->name }}</a>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-12 col-lg-6 text-center text-lg-right">
                        <div class="social-icon-style-6">
                            <ul class="extra-small-icon">
                                <li><a class="likes-count" href="#" target="_blank"><i
                                            class="fas fa-heart text-deep-pink"></i><span
                                            class="text-small">300</span></a></li>
                                <li><a class="facebook" href="http://facebook.com/" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a class="twitter" href="http://twitter.com/" target="_blank"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a class="google" href="http://google.com/" target="_blank"><i
                                            class="fab fa-google-plus-g"></i></a></li>
                                <li><a class="pinterest" href="http://dribbble.com/" target="_blank"><i
                                            class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 margin-30px-top">
                    <div
                        class="d-flex flex-column flex-md-row align-items-center align-items-md-start width-100 border border-color-extra-light-gray padding-50px-all md-padding-30px-all sm-padding-20px-all">
                        <div class="width-150px text-center sm-margin-15px-bottom sm-width-100">
                            <img src="{{asset('frontend')}}/images/avtar-01.jpg" class="rounded-circle width-100px"
                                alt="" data-no-retina="">
                        </div>
                        <div
                            class="width-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left text-center text-md-left">
                            <a href="#"
                                class="text-extra-dark-gray text-uppercase alt-font font-weight-600 margin-10px-bottom d-inline-block text-small">{{ $post->user->name }}</a>
                            <p class="md-width-95 sm-width-100">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries.</p>
                            <a href="#" class="btn btn-very-small btn-black margin-20px-top">All author posts</a>
                        </div>
                    </div>
                </div>

                @if ($recent_posts==true)
                <div class="col-12 d-flex flex-wrap p-0">
                    <div class="col-12 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-tb">
                        <div class="position-relative overflow-hidden width-100">
                            <span
                                class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Related
                                Posts</span>
                        </div>
                    </div>

                    @foreach ($recent_posts->posts as $recent_post)
                    <!-- start post item -->
                    <div class="col-12 col-lg-4 col-md-6 last-paragraph-no-margin md-margin-50px-bottom sm-margin-30px-bottom wow fadeIn"
                        style="visibility: visible; animation-name: fadeIn;">
                        <div class="blog-post blog-post-style1 text-center text-md-left">
                            <div class="blog-post-images overflow-hidden margin-25px-bottom md-margin-20px-bottom">
                                <a href="blog-post-layout-01.html">
                                    <img src="{{ $recent_post->image }}" alt="" data-no-retina="">
                                </a>
                            </div>
                            <div class="post-details">
                                <span
                                    class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom">{{ date('d F Y', strtotime($recent_post->created_at)) }} | by <a href="#" class="text-medium-gray">{{ $recent_post->user->name }}</a></span>
                                <a href="blog-post-layout-01.html"
                                    class="post-title text-medium text-extra-dark-gray width-90 d-block md-width-100">{{ $recent_post->title }}</a>
                                <div
                                    class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb md-margin-15px-tb">
                                </div>
                                <p class="width-90 sm-width-100">{!! Str::limit($recent_post->description, 90, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end post item -->
                    @endforeach

                </div>
                @endif


                <div class="col-12 margin-eight-top">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="col-12 blog-details-comments">
                    <div class="width-100 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-tb">
                        <div class="position-relative overflow-hidden width-100">
                            <span
                                class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">10
                                Comments</span>
                        </div>
                    </div>
                    <ul class="blog-comment">
                        <li>
                            <div class="d-block d-md-flex  width-100">
                                <div class="width-110px sm-width-50px text-center sm-margin-10px-bottom">
                                    <img src="{{asset('frontend')}}/images/avtar-02.jpg"
                                        class="rounded-circle width-85 sm-width-100" alt="" data-no-retina="">
                                </div>
                                <div class="width-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                    <a href="#"
                                        class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">Herman
                                        Miller</a>
                                    <a href="#comments"
                                        class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                    <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">17 july
                                        2017, 6:05 pm</div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries.</p>
                                </div>
                            </div>
                            <ul class="child-comment">
                                <li>
                                    <div class="d-block d-md-flex  width-100">
                                        <div class="width-110px sm-width-50px text-center sm-margin-10px-bottom">
                                            <img src="{{asset('frontend')}}/images/avtar-01.jpg"
                                                class="rounded-circle width-85 sm-width-100" alt="" data-no-retina="">
                                        </div>
                                        <div
                                            class="width-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                            <a href="#"
                                                class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">Alexander
                                                Harvard</a>
                                            <a href="#comments"
                                                class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                            <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">
                                                17 july 2017, 6:05 pm</div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="d-block d-md-flex  width-100">
                                <div class="width-110px sm-width-50px text-center sm-margin-10px-bottom">
                                    <img src="{{asset('frontend')}}/images/avtar-04.jpg"
                                        class="rounded-circle width-85 sm-width-100" alt="" data-no-retina="">
                                </div>
                                <div class="width-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                    <a href="#"
                                        class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">Jennifer
                                        Freeman</a>
                                    <a href="#comments"
                                        class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                    <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">17 july
                                        2017, 6:05 pm</div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 margin-eight-top" id="comments">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>

                @guest
                <p >Place <a href="{{ route('login') }}" class=" text-danger">login</a> first before comment.</p>
                @else
                <div class="col-12 d-flex flex-wrap p-0">
                    <div class="col-12 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-tb">
                        <div class="position-relative overflow-hidden width-100">
                            <span
                                class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Write
                                A Comments</span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <input type="text" placeholder="Name *" class="medium-input">
                    </div>
                    <div class="col-12 col-lg-4">
                        <input type="text" placeholder="E-mail *" class="medium-input">
                    </div>
                    <div class="col-12 col-lg-4">
                        <input type="url" placeholder="Website" class="medium-input">
                    </div>
                    <div class="col-12">
                        <textarea placeholder="Enter your comment here.." rows="8" class="medium-textarea"></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-dark-gray btn-small margin-15px-top" type="submit">Send message</button>
                    </div>
                </div>
                @endguest


            </main>
         
            @include('frontend.partials.sidebar')

        </div>
    </div>
</section>
<!-- end post content section -->

@endsection
