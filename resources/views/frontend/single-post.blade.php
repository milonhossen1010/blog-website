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
                    <li><a href="javaSccript:void()"
                            class="text-dark-gray">{{ date('d F Y', strtotime($post->created_at)) }}</a></li>
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
                                <a href="{{ route('frontend.post.single', $recent_post->slug) }}">
                                    <img src="{{ $recent_post->image }}" alt="" data-no-retina="">
                                </a>
                            </div>
                            <div class="post-details">
                                <span
                                    class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom">{{ date('d F Y', strtotime($recent_post->created_at)) }}
                                    | by <a href="#" class="text-medium-gray">{{ $recent_post->user->name }}</a></span>
                                <a href="{{ route('frontend.post.single', $recent_post->slug) }}"
                                    class="post-title text-medium text-extra-dark-gray width-90 d-block md-width-100">{{ $recent_post->title }}</a>
                                <div
                                    class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb md-margin-15px-tb">
                                </div>
                                <p class="width-90 sm-width-100">{!! Str::limit($recent_post->description, 90, '...')
                                    !!}</p>
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
                                class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray"><span
                                    v-html="all_comments.length"></span>
                                Comments</span>
                        </div>
                    </div>


                    <ul class="blog-comment">

                        <li v-for="comment in all_comments">
                            <div class="d-block d-md-flex  width-100">
                                <div class="width-110px sm-width-50px text-center sm-margin-10px-bottom">
                                    <img src="{{asset('frontend')}}/images/avtar-02.jpg"
                                        class="rounded-circle width-85 sm-width-100" alt="" data-no-retina="">
                                </div>
                                <div class="width-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                    <a href="#"
                                        class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small"
                                        v-html="comment.user.name"></a>

                                    @guest
                                    <!-- Logout view -->
                                    <a @click="loginPopupShow($event)" href="#"
                                        class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                    @else
                                    <!-- Login view -->
                                    <a href="#comments" @click.prevent="replyBox(comment.id)"
                                        class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                    @endguest


                                    <div class="text-small text-medium-gray text-uppercase margin-10px-bottom"
                                        v-html="comment.created_at">

                                    </div>
                                    <p v-html="comment.comment"> </p>
                                </div>
                            </div>


                            <ul class="child-comment">

                                <div style="display:none" class="col-12  mt-1 pr-0" :id="comment.id">
                                    <form method="POST" @submit.prevent="commentReplyCreate(comment.id)">
                                        @csrf
                                        <textarea v-model="form.reply" placeholder="Enter your comment here.."
                                            name="comment" rows="4" class="medium-textarea"></textarea>
                                        <span v-html="reply_mess" v-if="form.reply==0" class=" text-danger"></span>

                                        <div class="col-12 text-right">
                                            <button class="btn btn-dark-gray btn-small" type="submit">Reply</button>
                                        </div>

                                    </form>
                                </div>

                                <li  v-for="rep in all_reply" v-if="comment.id==rep.comment_id">
                                    <div class="d-block d-md-flex  width-100">
                                        <div class="width-110px sm-width-50px text-center sm-margin-10px-bottom">
                                            <img src="{{asset('frontend')}}/images/avtar-01.jpg"
                                                class="rounded-circle width-85 sm-width-100" alt="" data-no-retina="">
                                        </div>
                                        <div
                                            class="width-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                            <a href="#"
                                                class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small" v-html="rep.user.name"></a>

                                            <div class="text-small text-medium-gray text-uppercase margin-10px-bottom" v-html="rep.created_at"> </div>
                                            <p v-html="rep.comment"></p>
                                        </div>
                                    </div>
                                </li>





                            </ul>


                        </li>



                    </ul>
                </div>
                <div class="col-12 margin-eight-top" id="comments">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>




                <div v-if="auth_check" class="col-12 d-flex flex-wrap p-0">



                    <div class="col-12 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-tb">
                        <div class="position-relative overflow-hidden width-100">
                            <span
                                class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Write
                                A Comments</span>
                        </div>
                    </div>


                    <div class="col-12">
                        <form action="{{ route('comment.store') }}" method="POST"
                            @submit.prevent="createComment({{ $post->id }})">
                            @csrf
                            <textarea v-model="form.comment" placeholder="Enter your comment here.." name="comment"
                                rows="8" class="medium-textarea"></textarea>
                            <span v-html="mess" v-if="form.comment==0" class=" text-danger"></span>

                            <div class="col-12 text-right">
                                <button class="btn btn-dark-gray btn-small " type="submit">Comment</button>
                            </div>

                        </form>
                    </div>


                    <!--Post id set-->
                    <input value="{{ $post->id }}" type="hidden" id="post_id">



                </div>
                <p v-else class=" text-center">Place <a href="#" @click="loginPopupShow($event)"
                        class=" text-danger">login</a>
                    first before comment.</p>



            </main>

            @include('frontend.partials.sidebar')

        </div>
    </div>
</section>
<!-- end post content section -->


<!-- Modal structure -->
<div class="modal fade" id="loginPopup">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 18px;text-transform: uppercase;">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="login-box card-body">
                <div class="lb-header">
                    <a href="#" class="active" id="login-box-link">Login</a>
                    <a href="#" id="signup-box-link">Sign Up</a>
                </div>

                <form class="email-login" @submit.prevent="login" method="POST">
                    <p v-if="mess" v-html="mess" class=" alert alert-danger"></p>
                    @csrf
                    <div class="u-form-group">
                        <input v-model="form.email" type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="u-form-group">
                        <input v-model="form.password" type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="u-form-group">
                        <button type="submit"
                            class="btn btn-small btn-dark-gray lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">Log
                            in</button>
                    </div>
                    {{-- <div class="u-form-group">
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div> --}}
                </form>

                <form method="POST" @submit.prevent="register" class="email-signup">
                    @csrf
                    <div class="u-form-group">
                        <input v-model="form.name" name="name" type="text" placeholder="Name" />
                    </div>
                    <div class="u-form-group">
                        <input v-model="form.email" name="email" type="email" placeholder="Email" />
                    </div>
                    <div class="u-form-group">
                        <input v-model="form.password" name="password" type="password" placeholder="Password" />
                    </div>
                    <div class="u-form-group">
                        <input v-model="form.password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirm Password" />
                    </div>
                    <div class="u-form-group">
                        <button type="submit"
                            class="btn btn-small btn-dark-gray lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">Sign
                            Up</button>
                    </div>
                </form>
            </div>

            {{-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('style')
<style>
    .login-box {
        margin: 10px auto;
        width: 500px;
    }

    .login-box * {
        font-family: 'Montserrat', sans-serif !important;
    }

    .lb-header {
        position: relative;
        color: #00415d;
        margin: 5px 5px 10px 5px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
        text-align: center;
        height: 28px;
    }

    .lb-header a {
        margin: 0 25px;
        padding: 0 20px;
        text-decoration: none;
        color: #666;
        font-weight: bold;
        font-size: 15px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
        text-transform: uppercase;
    }

    .lb-header .active {
        color: #ff214f;
    }

    .social-login {
        position: relative;
        float: left;
        width: 100%;
        height: auto;
        padding: 10px 0 15px 0;
        border-bottom: 1px solid #eee;
    }

    .social-login a {
        position: relative;
        float: left;
        width: calc(40% - 8px);
        text-decoration: none;
        color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 12px;
        border-radius: 2px;
        font-size: 12px;
        text-transform: uppercase;
        margin: 0 3%;
        text-align: center;
    }

    .social-login a i {
        position: relative;
        float: left;
        width: 20px;
        top: 2px;
    }

    .social-login a:first-child {
        background-color: #49639F;
    }

    .social-login a:last-child {
        background-color: #DF4A32;
    }

    .email-login,
    .email-signup {
        position: relative;
        float: left;
        width: 100%;
        height: auto;
        margin-top: 20px;
        text-align: center;
    }

    .u-form-group {
        width: 100%;
        margin-bottom: 10px;
    }

    .u-form-group input {
        width: 90%;
        height: 45px;
        outline: none;
        border: 1px solid #ddd;
        padding: 0 10px;
        border-radius: 2px;
        color: #333;
        font-size: 0.8rem;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }

    .u-form-group input:focus {
        border-color: #358efb;
    }

    /* .u-form-group button {
        width: 50%;
        background-color: #1CB94E;
        border: none;
        outline: none;
        color: #fff;
        font-size: 14px;
        font-weight: normal;
        padding: 14px 0;
        border-radius: 2px;
        text-transform: uppercase;
    } */

    .forgot-password {
        width: 50%;
        text-align: left;
        text-decoration: underline;
        color: #888;
        font-size: 0.75rem;
    }

</style>
@endsection

@section('script')
<script>
    $(".email-signup").hide();
    $("#signup-box-link").click(function (e) {
        e.preventDefault();
        $(".email-login").fadeOut(100);
        $(".email-signup").delay(100).fadeIn(100);
        $("#login-box-link").removeClass("active");
        $("#signup-box-link").addClass("active");
    });
    $("#login-box-link").click(function (e) {
        e.preventDefault();
        $(".email-login").delay(100).fadeIn(100);;
        $(".email-signup").fadeOut(100);
        $("#login-box-link").addClass("active");
        $("#signup-box-link").removeClass("active");
    });

</script>
@endsection
