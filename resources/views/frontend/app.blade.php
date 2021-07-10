<!doctype html>
<html class="no-js" lang="en">

<head>
        <!-- title -->
        <title> @yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">
        <!-- description -->
        <meta name="description" content="POFO is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and portfolio HTML5 template with 25 ready home page demos.">
        <!-- keywords -->
        <meta name="keywords" content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend') }}/images/favicon.png">
        <link rel="apple-touch-icon" href="{{ asset('frontend') }}/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend') }}/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend') }}/images/apple-touch-icon-114x114.png">
        <!-- animation -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/et-line-icons.css" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css" />
        <!-- themify icon -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/themify-icons.css">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/swiper.min.css">
        <!-- justified gallery  -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/justified-gallery.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/revolution/css/navigation.css">
        <!-- bootsnav -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootsnav.css">
        <!-- style -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css" />
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- start header -->
        <header >
            @php
                $route = Route::current()->getname();
            @endphp
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-top header-dark background-transparent nav-box-width navbar-expand-lg on no-full
            {{ ($route=='frontend.post.single' || $route == 'frontend.index')? 'dark-link' : 'white-link' }} ">
                <div class="container nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto pl-lg-0">

                        @if ($route=='frontend.index' || $route == 'frontend.post.single')

                        <a href="{{ route('frontend.index') }}" title="Pofo" class="logo">
                            <img src="{{asset('frontend')}}/images/logo.png" data-rjs="images/logo@2x.png" class="logo-dark default" alt="Pofo">
                            <img src="{{asset('frontend')}}/images/logo-white.png" data-rjs="images/logo-white@2x.png" alt="Pofo" class="logo-light">
                         </a>
                        @else

                        <a href="{{ route('frontend.index') }}" title="Pofo" class="logo">
                            <img src="{{asset('frontend')}}/images/logo-white.png" data-rjs="images/logo-white.png" class="logo-dark default" alt="Pofo">
                            <img src="{{asset('frontend')}}/images/logo-white.png" data-rjs="images/logo-white.png" alt="Pofo" class="logo-light">
                        </a>

                        @endif
                        
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pr-0 pr-md-3">
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-end" id="navbar-collapse-toggle-1">
                            <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                <!-- start menu item -->
                                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="{{ route('frontend.post') }}">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                                <!-- end menu item -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto pr-lg-0">
                        <div class="header-searchbar">
                            <a href="#search-header" class="header-search-form"><i class="fas fa-search search-button"></i></a>
                            <!-- search input-->
                            <form id="search-header" method="post" action="http://www.themezaa.com/html/pofo/search-result.html" name="search-header" class="mfp-hide search-form-result">
                                <div class="search-form position-relative">
                                    <button type="submit" class="fas fa-search close-search search-button"></button>
                                    <input type="text" name="search" class="search-input" placeholder="Enter your keywords..." autocomplete="off">
                                </div>
                            </form>
                        </div>
                        <div class="header-social-icon d-none d-md-inline-block">
                            <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://dribbble.com/" title="Dribbble" target="_blank"><i class="fab fa-dribbble"></i></a>                          
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->

 <div id="frontend">
    @section('main')
    
    @show
 </div>

   
        <!-- start footer --> 
        <footer class="footer-classic-dark bg-extra-dark-gray padding-five-bottom sm-padding-30px-bottom">
            <div class="bg-dark-footer padding-50px-tb sm-padding-30px-tb">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- start slogan -->
                        <div class="col-lg-4 col-md-5 text-center alt-font sm-margin-15px-bottom">
                            London based highly creative studio
                        </div>
                        <!-- end slogan -->
                        <!-- start logo -->
                        <div class="col-lg-4 col-md-2 text-center sm-margin-10px-bottom">
                            <a href="index.html"><img class="footer-logo" src="images/logo-white.png" data-rjs="images/logo-white@2x.png" alt="Pofo"></a>
                        </div>
                        <!-- end logo -->
                        <!-- start social media -->
                        <div class="col-lg-4 col-md-5 text-center">
                            <span class="alt-font margin-20px-right">On social networks</span>
                            <div class="social-icon-style-8 d-inline-block vertical-align-middle">
                                <ul class="small-icon mb-0">
                                    <li><a class="facebook text-white-2" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a class="twitter text-white-2" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="google text-white-2" href="https://plus.google.com/" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a class="instagram text-white-2" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram no-margin-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end social media -->
                    </div>
                </div>
            </div>
            <div class="footer-widget-area padding-five-top padding-30px-bottom sm-padding-30px-top">
                <div class="container">
                    <div class="row">
                        <!-- start about -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom text-center text-md-left last-paragraph-no-margin">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">About Agency</div>
                            <p class="text-small width-95 sm-width-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum is simply dummy text of the and typesetting industry. </p>
                        </div>
                        <!-- end about -->
                        <!-- start blog post -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600 text-center text-md-left">Latest Blog Post</div>
                            <ul class="latest-post position-relative">
                                <li class="media border-bottom border-color-medium-dark-gray">
                                    <figure>
                                        <a href="blog-post-layout-01.html"><img src="{{asset('frontend')}}/images/latest-blog2.jpg" alt=""></a>
                                    </figure>
                                    <div class="media-body text-small"><a href="blog-post-layout-01.html" class="d-block mb-1">Design is not just what looks...</a> <span class="clearfix"></span>20 April 2017 | by <a href="blog-grid.html">Herman Miller</a></div>
                                </li>
                                <li class="media border-bottom border-color-medium-dark-gray">
                                    <figure>
                                        <a href="blog-post-layout-02.html"><img src="{{asset('frontend')}}/images/latest-blog3.jpg" alt=""></a>
                                    </figure>
                                    <div class="media-body text-small"><a href="blog-post-layout-02.html" class="d-block mb-1">A lot of care, effort & passion...</a> <span class="clearfix"></span>20 April 2017 | by <a href="blog-grid.html">Herman Miller</a></div>
                                </li>
                                <li class="media">
                                    <figure>
                                        <a href="blog-post-layout-03.html"><img src="{{asset('frontend')}}/images/latest-blog4.jpg" alt=""></a>
                                    </figure>
                                    <div class="media-body text-small"><a href="blog-post-layout-03.html" class="d-block mb-1">I love making the stuff, that's...</a> <span class="clearfix"></span>20 April 2017 | by <a href="blog-grid.html">Herman Miller</a></div>
                                </li>
                            </ul>
                        </div>
                        <!-- end blog post -->
                        <!-- start newsletter -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">Subscribe Newsletter</div>
                            <p class="text-small width-90 sm-width-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <form id="subscribenewsletterform" action="javascript:void(0)" method="post">
                                <div class="position-relative newsletter width-95">
                                    <div id="success-subscribe-newsletter" class="mx-0"></div>
                                    <input type="text" id="email" name="email" class="bg-transparent text-small m-0 border-color-medium-dark-gray" placeholder="Enter your email...">
                                    <button id="button-subscribe-newsletter" type="submit" class="btn btn-arrow-small position-absolute border-color-medium-dark-gray"><i class="fas fa-caret-right no-margin-left"></i></button>
                                </div>   
                            </form>
                        </div>
                        <!-- end newsletter -->
                        <!-- start instagram -->
                        <div class="col-lg-3 col-md-6 widget md-margin-5px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-20px-bottom font-weight-600">Follow us Instagram</div>
                            <div class="instagram-follow-api">
                                <ul id="instaFeed-footer"></ul>
                            </div>
                        </div>
                        <!-- end instagram -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-bottom border-top border-color-medium-dark-gray padding-30px-top">
                    <div class="row">
                        <!-- start copyright -->
                        <div class="col-lg-6 col-md-6 text-small text-md-left text-center">POFO - Portfolio Concept Theme</div>
                        <div class="col-lg-6 col-md-6 text-small text-md-right text-center">&COPY; 2019 POFO is Proudly Powered by <a href="http://www.themezaa.com/" target="_blank" title="ThemeZaa">ThemeZaa</a></div>
                        <!-- end copyright -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/modernizr.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/skrollr.min.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/smooth-scroll.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.appear.js"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/bootsnav.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.nav.js"></script>
        <!-- animation -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/wow.min.js"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/page-scroll.js"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/swiper.min.js"></script>
        <!-- counter -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.count-to.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.stellar.js"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/imagesloaded.pkgd.min.js"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/classie.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/hamburger-menu.js"></script>
        <!-- counter  -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/counter.js"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.fitvids.js"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/skill.bars.jquery.js"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/justified-gallery.min.js"></script>
        <!--pie chart-->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.easypiechart.min.js"></script>
        <!-- retina -->
        <script type="text/javascript" src="{{ asset('frontend') }}/js/retina.min.js"></script>
        <!-- revolution -->
        <script type="text/javascript" src="{{ asset('frontend') }}/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/main.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/main.js"></script>
        <!--Vue js code-->
        <script src="{{asset('admin')}}/js/axios.min.js"></script>
        <script src="{{asset('admin')}}/js/vue.js"></script>
        <script src="{{asset('admin')}}/js/vue-router.js"></script>
        <script type="text/javascript" src="{{ asset('frontend') }}/js/script.js"></script>
    </body>

</html>