@extends("front.$version.layout")

@section('pagename')
 - {{convertUtf8($blog->title)}}
@endsection

@section('meta-keywords', "$blog->meta_keywords")
@section('meta-description', "$blog->meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_details_title))
@section('breadcrumb-subtitle', strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30, 'utf-8') . '...' : $blog->title)
@section('breadcrumb-link', __('News Details'))

@section('content')

  <!-- latest-news-area-start -->
            <div class="latest-news-area pt-120 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 mb-30">
                            <div class="latest-news-wrapper latest2-news-wrapper">
                                <div class="latest-blog-img mb-50">
                                    <img src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="" />
                                </div>
                                <div class="latest-news-text">
                                    <span>By <a href="blog-details.html">Michel jhon</a></span>
                                    <span> {{date('F d, Y', strtotime($blog->created_at))}}</span>
                                    <span><a href="blog-details.html">{{__('Admin')}}</a></span>
                                    <!-- <span>comments<a href="blog-details.html">(03)</a></span> -->
                                    <h4>{{convertUtf8($blog->title)}}</h4>
                                    <p class="pr-20">{!! replaceBaseUrl(convertUtf8($blog->content)) !!}</p>
                                    <!-- <div class="blog-details-info text-center">
                                        <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqlaudantium totam rem aperiam eaque ipsa quae.</h3>
                                        <span>Michael A. Simmons</span>
                                    </div> -->
                                    <!-- <p class="pr-30">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. </p> -->
                                </div>
                                <div class="row mt-65">
                                    <div class="col-xl-8 col-lg-7 col-md-6">
                                        <div class="blog-post-tag">
                                            <span>Tags : </span>
                                            <a href="#">Politics,</a>
                                            <a href="#">Election,</a>
                                            <a href="#">Akwa Ibom</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-6">
                                        <div class="blog-share-icon text-left text-md-right">
                                            <span>Share: </span>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">
                                                <i class="ti-facebook"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">
                                                <i class="ti-twitter"></i>
                                            </a>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title={{convertUtf8($blog->title)}}">
                                                <i class="ti-linkedin"></i>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- <div class="post-comments mt-65 mb-50">
                                    <div class="coment-title mb-25">
                                        <h2>Comments (3)</h2>
                                    </div>
                                    <div class="latest-comments">
                                        <ul>
                                            <li>
                                                <div class="comments-box mb-45">
                                                    <div class="comments-avatar">
                                                        <img src="img/blog/1.png" alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>Michel</h5>
                                                        </div>
                                                        <p>Norem ipsum dolor sit amet consectetur adipisicing elit sed deiusmod tempor incididunt ut labore et dolore worth.</p>
                                                        <a href="#">Reply </a>
                                                    </div>
                                                </div>
                                                <ul class="comments-reply">
                                                    <li>
                                                        <div class="comments-box mb-45">
                                                            <div class="comments-avatar">
                                                                <img src="img/blog/2.png" alt="">
                                                            </div>
                                                            <div class="comments-text">
                                                                <div class="avatar-name">
                                                                    <h5>Jennifer S. Bowen</h5>
                                                                </div>
                                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit sed deiusmod tempor incididunt ut labore et dolore worth.</p>
                                                                <a href="#">Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="img/blog/2.png" alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>Omar Elnagar</h5>
                                                        </div>
                                                        <p>Norem ipsum dolor sit amet consectetur adipisicing elit sed deiusmod tempor incididunt ut labore et dolore worth.</p>
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-comments-form">
                                <div class="post-title mb-30">
                                    <h2>Leave a Reply</h2>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <input placeholder="Name: " type="text">
                                        </div>
                                        <div class="col-xl-4">
                                            <input placeholder="Email: " type="email">
                                        </div>
                                        <div class="col-xl-4">
                                            <input placeholder="Subject: " type="text">
                                        </div>
                                        <div class="col-xl-12">
                                            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Comments"></textarea>
                                            <button class="btn" type="submit">send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>-->
                            </div> 
                        </div>
                        <div class="col-xl-4 col-lg-4 mb-30">
                            <div class="widget widget2 mb-55">
                                <div class="sidebar-form">
                                    <form action="{{route('front.blogs', ['category' => request()->input('category'), 'month' => request()->input('month'), 'year' => request()->input('year')])}}" method="GET">
                                        <input name="category" type="hidden" value="{{request()->input('category')}}">
                                <input name="month" type="hidden" value="{{request()->input('month')}}">
                                <input name="year" type="hidden" value="{{request()->input('year')}}">
                                <input name="term" type="text" placeholder="{{__('Search News')}}" value="{{request()->input('term')}}">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget mb-55">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="blog-menu">
                                     @foreach ($bcats as $key => $bcat)
                                        <li><a href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>$bcat->slug, 'month' => request()->input('month'), 'year' => request()->input('year')])}}">{{convertUtf8($bcat->name)}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            
                            <div class="widget">
                                <div class="blog-banner">
                                    <a href="blog-details.html"><img src="img/blog/sidebar/banner.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- latest-news-area-end -->

@endsection

@section('scripts')
@if($bs->is_disqus == 1)
{!! $bs->disqus_script !!}
@endif
@endsection
