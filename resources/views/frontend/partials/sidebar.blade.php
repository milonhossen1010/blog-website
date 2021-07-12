
                    <aside class="col-12 col-lg-3 float-right">
                        <div class="d-inline-block width-100 margin-45px-bottom sm-margin-25px-bottom">
                            <form>
                                <div class="position-relative">
                                    <input type="text" class="bg-transparent text-small m-0 border-color-extra-light-gray medium-input float-left" placeholder="Enter your keywords...">
                                    <button type="submit" class="bg-transparent  btn position-absolute right-0 top-1"><i class="fas fa-search ml-0"></i></button>
                                </div>   
                            </form>
                        </div>
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>About Me</span></div>
                            <a href="about-me.html"><img src="{{asset('frontend')}}/images/aside-image-1.jpg" alt="" class="margin-25px-bottom"/></a>
                            <p class="margin-20px-bottom text-small">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.</p>
                            <a class="btn btn-very-small btn-dark-gray text-uppercase" href="about-me.html">About Author</a>
                        </div>
                        <div class="margin-50px-bottom">
                            <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Follow Us</span></div>
                            <div class="social-icon-style-1 text-center">
                                <ul class="extra-small-icon">
                                    <li><a class="facebook" href="http://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="twitter" href="http://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="google" href="http://google.com/" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a class="dribbble" href="http://dribbble.com/" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a class="linkedin" href="http://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Categories</span></div>
                            <ul class="list-style-6 margin-50px-bottom text-small">
                                @php
                                    $categories = App\Models\Category::latest()->get();
                                @endphp
                                @foreach($categories as $category)
                                    @if($category->posts->count())
                                        <li><a href="blog-masonry.html">{{$category->name}}</a><span>{{$category->posts->count()}}</span></li>
                                    @endif
                                @endforeach
                            </ul>   
                        </div>
                        <div class="bg-deep-pink padding-30px-all text-white-2 text-center margin-45px-bottom sm-margin-25px-bottom">
                            <i class="fas fa-quote-left icon-small margin-15px-bottom d-block"></i>
                            <span class="text-extra-large font-weight-300 margin-20px-bottom d-block">The future belongs to those who believe in the beauty of their dreams.</span>
                            <a class="btn btn-very-small btn-transparent-white border-width-1 text-uppercase" href="portfolio-boxed-grid-overlay.html">Explore Portfolio</a>
                        </div>
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Popular post</span></div>
                            <ul class="latest-post position-relative">
                             
                                @php
                                    $posts = App\Models\Post::latest()->paginate(4);
                                @endphp

                                @foreach ($posts as $post)
                                    <li class="media">
                                        <figure>
                                            <a href="{{ route('frontend.post.single', $post->slug) }}"><img src="{{ $post->image }}" alt=""></a>
                                        </figure>
                                        <div class="media-body text-small"><a href="{{ route('frontend.post.single', $post->slug) }}" class="text-extra-dark-gray"><span class="d-block margin-5px-bottom">{{ $post->title }}</span></a> <span class="clearfix text-medium-gray text-small">{{ date('d M, Y', strtotime($post->created_at)) }}</span></div>
                                    </li>
                                @endforeach
                             
                            </ul>
                        </div>
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>tags cloud</span></div>
                            <div class="tag-cloud">
                                

                                @php
                                    $tags = App\Models\Category::latest()->get();
                                @endphp
                                @foreach($tags as $tag)
                                    @if($tag->posts->count())
                                        <a href="blog-grid.html">{{$tag->name}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Archive</span></div>
                            <ul class="list-style-6 margin-20px-bottom text-small">
                                <li><a href="blog-grid.html">July 2017</a><span>12</span></li>
                                <li><a href="blog-grid.html">June 2017</a><span>05</span></li>
                                <li><a href="blog-grid.html">May 2017</a><span>08</span></li>
                                <li><a href="blog-grid.html">April 2017</a><span>10</span></li>
                                <li><a href="blog-grid.html">March 2017</a><span>21</span></li>
                                <li><a href="blog-grid.html">February 2017</a><span>09</span></li>
                                <li><a href="blog-grid.html">January 2017</a><span>07</span></li>
                            </ul>   
                        </div> --}}
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Newsletter</span></div>
                            <div class="d-inline-block width-100">
                                <form>
                                    <div class="position-relative">
                                        <input type="email" class="bg-transparent text-small m-0 border-color-extra-light-gray medium-input float-left" placeholder="Enter your email...">
                                        <button type="submit" class="bg-transparent text-large btn position-absolute right-0 top-3"><i class="far fa-envelope ml-0"></i></button>
                                    </div>   
                                </form>
                            </div>
                        </div>
                        <div>
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Instagram</span></div>
                            <div class="instagram-follow-api">
                                <ul id="instaFeed-aside"></ul>
                            </div>
                        </div>
                    </aside>