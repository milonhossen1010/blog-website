@extends('frontend.app')
@section('title', 'Home')

@section('main')
         <!-- start blog slider section -->
         <section class="wow fadeIn half-section p-0 top-space" >
            <div class="container-fluid padding-30px-lr sm-padding-15px-lr">
                <div class="swiper-full-screen swiper-container width-100">
                    <div class="swiper-wrapper">

                    @foreach ($posts as $post)
                        
                    
                        <!-- start slider item -->
                        <div class="swiper-slide cover-background" style="background-image:url('{{ $post->image }}')">
                            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
                            <div class="container position-relative one-fourth-screen sm-height-400px">
                                <div class="slider-typography text-center">
                                    <div class="slider-text-middle-main">
                                        <div class="slider-text-middle">
                                            <div class="col-12 col-lg-6 col-md-8 mx-auto slide-content">
                                                <div class="padding-50px-all sm-padding-30px-all bg-black-opacity">
                                                   
                                                    @foreach($post->categories as $category)
                                                    <a href="{{ route('frontend.post.search', $category->id ) }}" class="text-medium-gray text-extra-small text-uppercase alt-font font-weight-600 margin-10px-bottom d-inline-block">
                                                        {{$category->name}}
                                                    </a>
                                                    @endforeach
                                                    <h4><a href="{{ route('frontend.post.single', $post->slug) }}" class="font-weight-600 text-white-2 alt-font">{{$post->title}}</a></h4>
                                                    <a class="btn btn-very-small btn-transparent-white" href="{{ route('frontend.post.single', $post->slug) }}">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->

                        @endforeach
                    
                        
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-white swiper-full-screen-pagination"></div>
                    <div class="swiper-button-next swiper-next-style5"></div>
                    <div class="swiper-button-prev swiper-prev-style5"></div>
                </div>
            </div>
        </section>
        <!-- end blog slider section -->
        <!-- start interactive banners section -->
        <section class="wow fadeIn padding-30px-top pb-0">
            <div class="container-fluid">
                <div class="row padding-15px-lr sm-no-padding-lr">
                    <!-- start interactive banners item -->
                    <div class="col-12 col-lg-4 banner-style2 md-margin-30px-bottom wow fadeIn">
                        <figure> 
                            <div class="banner-image bg-black height-400px cover-background height-350px" style="background-image:url('{{asset('frontend')}}/images/about-author2.jpg');"></div>
                            <figcaption class="padding-seven-all bg-black-opacity last-paragraph-no-margin">
                                <div class="d-flex align-items-center width-100 height-100">
                                    <div class="text-left">
                                        <span class="text-medium-gray alt-font text-uppercase">About Me</span>
                                        <span class="text-large font-weight-600 text-white-2 alt-font text-uppercase padding-15px-bottom d-block">About Author</span>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesett industry.</p>
                                        <a href="about-me.html" class="btn btn-transparent-white btn-very-small margin-25px-top">About Me</a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end interactive banners item -->
                    <!-- start interactive banners item -->
                    <div class="col-12 col-lg-4 banner-style2 md-margin-30px-bottom wow fadeIn" data-wow-delay="0.2s">
                        <figure> 
                            <div class="banner-image bg-black height-400px cover-background height-350px" style="background-image:url('{{asset('frontend')}}/images/contact-me2.jpg');"></div>
                            <figcaption class="padding-seven-all bg-black-opacity last-paragraph-no-margin">
                                <div class="d-flex align-items-center width-100 height-100">
                                    <div class="text-left">
                                        <span class="text-medium-gray alt-font text-uppercase">Contact</span>
                                        <span class="text-large font-weight-600 text-white-2 alt-font text-uppercase padding-15px-bottom d-block">Contact Me</span>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesett industry.</p>
                                        <a href="contact-us-modern.html" class="btn btn-transparent-white btn-very-small margin-25px-top">Contact Me</a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end interactive banners item -->
                    <!-- start interactive banners item -->
                    <div class="col-12 col-lg-4 banner-style2 wow fadeIn" data-wow-delay="0.4s">
                        <figure>
                            <div class="banner-image bg-black height-400px cover-background height-350px" style="background-image:url('{{asset('frontend')}}/images/follow-instagram2.jpg');"></div>
                            <figcaption class="padding-seven-all bg-black-opacity last-paragraph-no-margin">
                                <div class="d-flex align-items-center width-100 height-100">
                                    <div class="text-left">
                                        <span class="text-medium-gray alt-font text-uppercase">Follow Me</span>
                                        <span class="text-large font-weight-600 text-white-2 alt-font text-uppercase padding-15px-bottom d-block">Follow Instagram</span>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesett industry</p>
                                        <a href="instagram.html" class="btn btn-transparent-white btn-very-small margin-25px-top">Follow Me</a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end interactive banners item -->
                </div>
            </div>
        </section>
        <!-- end interactive banners section -->
        <!-- start blog section -->
        <section class="wow fadeIn half-section">
            <div class="container">
                <div class="row">
                    <main class="col-12 col-lg-9 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom pl-0 md-no-padding-right">
                        <div class="d-flex flex-wrap hover-option4 blog-post-style3">
                          
                          @foreach ($posts as $post)
                              
                         
                            <!-- start post item -->
                            <div class="grid-item col-12 col-md-6 margin-30px-bottom text-center text-md-left wow fadeInUp">
                                <div class="blog-post bg-light-gray inner-match-height">
                                    <div class="blog-post-images overflow-hidden position-relative">
                                        <a href="{{ route('frontend.post.single', $post->slug) }}">
                                            <img src="{{ $post->image }}" alt="">
                                            <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                                        </a>
                                    </div>
                                    <div class="post-details padding-40px-all md-padding-20px-all">
                                        <a href="{{ route('frontend.post.single', $post->slug) }}" class="alt-font post-title text-medium text-extra-dark-gray width-100 d-block md-width-100 margin-15px-bottom">{{ $post->title }}</a>
                                        <p>{!! Str::limit($post->description, 80, '...') !!}</p>
                                        <div class="separator-line-horrizontal-full bg-medium-gray margin-20px-tb"></div>
                                        <div class="author">
                                            <span class="text-medium-gray text-uppercase text-extra-small d-block d-lg-inline-block md-margin-10px-top">by <a href="{{ route('frontend.post.user.search', $post->user->id ) }}" class="text-medium-gray">{{$post->user->name}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;{{ date('d M, Y', strtotime($post->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end post item -->
                            @endforeach
                           
                        </div>
                        <!-- start slider pagination -->
                        <div class="col-12 text-center margin-100px-top md-margin-50px-top wow fadeInUp">
                            <div class="pagination text-small text-uppercase text-extra-dark-gray">
                                {{-- {{ $posts->links('frontend.pagination.pagination') }} --}}
                                
                            </div>
                        </div>
                        <!-- end slider pagination -->
                    </main>


@include('frontend.partials.sidebar')




                </div>
            </div>
        </section>
        <!-- end blog section -->
    
@endsection