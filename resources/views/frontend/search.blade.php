@extends('frontend.app')
@section('title', 'Search')
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
                <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">{{ $data->name }}</h1>
                {{-- <span class="text-white-2 opacity6 alt-font">Lorem Ipsum is simply dummy text printing</span> --}}
                <!-- end page title -->
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start post content section -->
<section>
    <div class="container">
        <div class="row">
            <main class="col-12 col-lg-9 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom md-padding-15px-lr">

                @foreach ($data->posts as $post)

 
                <!-- start post item -->
                <div
                    class="blog-post-content d-flex align-items-center flex-wrap margin-60px-bottom padding-60px-bottom border-bottom border-color-extra-light-gray md-margin-30px-bottom md-padding-30px-bottom text-center text-md-left md-no-border">
                    <div
                        class="col-12 col-lg-5 blog-image p-0 md-margin-30px-bottom sm-margin-20px-bottom margin-45px-right md-no-margin-right">
                        <a href="{{ route('frontend.post.single', $post->slug) }}"><img src="{{ $post->image }}" alt="" data-no-retina=""></a>
                    </div>
                    <div class="col-12 col-lg-6 blog-text p-0">
                        <div class="content margin-20px-bottom md-no-padding-left">
                            <a href="{{ route('frontend.post.single', $post->slug) }}"
                                class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-600 d-inline-block">{{ $post->title }}</a>
                            <div class="text-medium-gray text-extra-small margin-15px-bottom text-uppercase alt-font">
                                <span>By <a href="{{ route('frontend.post.user.search', $post->user->id ) }}"
                                        class="text-medium-gray">{{ $post->user->name }}</a></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span>
                                    {{ date('d M, Y', strtotime($post->created_at)) }}</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;

                                @foreach ($post->categories as $category)
                                <a href="blog-grid.html" class="text-medium-gray">
                                    {{ $category->name }}
                                </a>
                                @endforeach

                            </div>
                            <p class="m-0 width-95">{!! Str::limit($post->description, 100, '...') !!}</p>
                        </div>
                        <a class="btn btn-very-small btn-dark-gray text-uppercase"
                            href="{{ route('frontend.post.single', $post->slug) }}">Continue Reading</a>
                    </div>
                </div>
                <!-- end post item -->
                @endforeach


                <!-- start pagination -->
                {{-- <div class="col-12 text-center margin-100px-top md-margin-50px-top position-relative wow fadeInUp"
                    style="visibility: hidden; animation-name: none;">
                    <div class="pagination text-small text-uppercase text-extra-dark-gray">
                        <ul class="mx-auto">
                            <li><a href="#"><i
                                        class="fas fa-long-arrow-alt-left margin-5px-right d-none d-md-inline-block"></i>
                                    Prev</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next <i
                                        class="fas fa-long-arrow-alt-right margin-5px-left d-none d-md-inline-block"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <!-- end pagination -->
            </main>


            @include('frontend.partials.sidebar')


        </div>
    </div>
</section>
<!-- end post content section -->
@endsection
