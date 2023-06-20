@extends("front.$version.layout")

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{convertUtf8($category->name)}}
 @endif
 {{__('Blogs')}}
@endsection

@section('meta-keywords', "$be->blogs_meta_keywords")
@section('meta-description', "$be->blogs_meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_title))
@section('breadcrumb-subtitle', convertUtf8($bs->blog_subtitle))
@section('breadcrumb-link', __('Latest News'))

@section('content')

<!-- latest-news-area-start -->
         <div class="latest-news-area pt-120 pb-120">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-8 blog-list">
                     @foreach ($blogs as $key => $blog)
                     @php
                                if (!empty($currentLang)) {
                                    $blogDate = \Carbon\Carbon::parse($blog->created_at)->locale("$currentLang->code");
                                } else {
                                    $blogDate = \Carbon\Carbon::parse($blog->created_at)->locale("en");
                                }

                                $blogDate = $blogDate->translatedFormat('jS F, Y');
                            @endphp
                     <div class="latest-news-wrapper latest2-news-wrapper mb-60">
                        <div class="latest-blog-img">
                           <a href="{{route('front.blogdetails', [$blog->slug])}}"><img src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="" /></a>
                        </div>
                        <div class="latest-news-text">
                           <span>{{$blogDate}}</span>
                           <span><a href="{{route('front.blogdetails', [$blog->slug])}}">{{__('Admin')}}</a></span>
                           <h4><a href="{{route('front.blogdetails', [$blog->slug])}}">{{strlen($blog->title) > 40 ? mb_substr($blog->title, 0, 40, 'utf-8') . '...' : $blog->title}}</a></h4>
                           <a href="{{route('front.blogdetails', [$blog->slug])}}">read more</a>
                        </div>
                     </div>
                     @endforeach
                     
                     @if ($blogs->total() > 6)
                     <div class="paginations">
                        {{$blogs->appends(['term'=>request()->input('term'), 'month'=>request()->input('month'), 'year'=>request()->input('year'), 'category' => request()->input('category')])->links()}}
                     </div>
                     @endif
                  </div>
                  <div class="col-xl-4 col-lg-4 mb-30">
                     <div class="widget widget2 mb-55">
                        <div class="sidebar-form">
                           <form action="{{route('front.blogs', ['category' => request()->input('category'), 'month' => request()->input('month'), 'year' => request()->input('year')])}}"  method="GET">
                              <input name="category" type="hidden" value="{{request()->input('category')}}">
                             <input name="month" type="hidden" value="{{request()->input('month')}}">
                             <input name="year" type="hidden" value="{{request()->input('year')}}">
                              <input placeholder="Search here" type="text" name="term" value="{{request()->input('term')}}">
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
                           <a href="{{route('front.quote')}}"><img src="{{asset('assets/front/politics/img/blog/sidebar/banner.jpg')}}" alt="" /></a>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      <!-- latest-news-area-end -->
@endsection
