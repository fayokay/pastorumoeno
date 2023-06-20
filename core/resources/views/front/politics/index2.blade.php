@extends('front.politics.layout')

@section('meta-keywords', "$be->home_meta_keywords")
@section('meta-description', "$be->home_meta_description")


@section('styles')
@if (!empty($home->css))
<style>
    {!! replaceBaseUrl($home->css) !!}
</style>
@endif
@endsection


@section('content')
        <!--   hero area start   -->
        @if ($bs->home_version == 'static')
            @includeif('front.politics.partials.static')
        @endif
        <!--   hero area end    -->

        @if ($bs->feature_section == 1)
        <!-- feature-area-start  -->
        <div class="feature-area pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <h1>{{$bs->feature_title}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php $i=0; @endphp
                    @foreach ($features as $key => $feature)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="feature-wrapper text-center mb-30 @if($i==1) active  @endif">
                            <div class="feature-item">
                                <div class="feature-img">
                                    <img src="{{$feature->icon}}" alt="" />
                                </div>
                                <div class="feature-text">
                                    <h2>{{convertUtf8($feature->title)}}</h2>
                                    <a class="btn" href="#">read more</a>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h2>{{convertUtf8($feature->title)}}</h2>
                                <p>{{convertUtf8($feature->description)}}</p>
                                <a class="btn" href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                    
                    <!-- <div class="col-xl-12 mt-25">
                        <div class="feature-info text-center">
                            <p>But I must explain to you how all <a href="#">Our timeline</a> dea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        @endif
        <!-- feature-area-end -->



         @if ($bs->intro_section == 1)
         <!-- donation-area-start -->
        <div class="donation-area pt-240 pb-140" style="background-image:url('{{asset('assets/front/img/'.$bs->intro_bg)}}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6">
                        <div class="donation-wrapper">
                            <div class="donation-text">
                                <h1>{{convertUtf8($bs->intro_section_title)}}</h1>
                                <p style="font-size: 20px">{{convertUtf8($bs->intro_section_text)}}.</p>

                                <!-- <div class="donation-button donation-button2">
                                    <button>$15</button>
                                    <button>$50</button>
                                    <button>$100</button>
                                </div> -->
                                <!-- <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                </div> -->
                                @if (!empty($bs->intro_section_button_url) && !empty($bs->intro_section_button_text))
                                <a class="btn" href="{{$bs->intro_section_button_url}}">{{convertUtf8($bs->intro_section_button_text)}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- donation-area-end -->
        @endif

        <!-- services-area-start -->
        @if ($bs->service_section == 1)
        <div class="services-area pt-110 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <h1>{{convertUtf8($bs->service_section_subtitle)}}. <span>{{convertUtf8($bs->service_section_title)}}</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @if (serviceCategory())
                        @foreach ($scategories as $key => $scategory)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-wrapper text-center mb-70">
                            @if (!empty($scategory->image))
                            <div class="services-img">
                                <img src="{{asset('assets/front/img/service_category_icons/'.$scategory->image)}}" alt="" />
                            </div>
                            @endif
                            <div class="services-text">
                                <h2>{{convertUtf8($scategory->name)}}</h2>
                                <p> @if (strlen($scategory->short_text) > 112)
                                                   {{mb_substr($scategory->short_text,0,112,'utf-8')}}<span style="display: none;">{{mb_substr($scategory->short_text,112,null,'utf-8')}}</span>
                                                   <a href="#" class="see-more">{{__('see more')}}...</a>
                                                @else
                                                   {{convertUtf8($scategory->short_text)}}
                                                @endif</p>
                                <a href="#{{route('front.services', ['category'=>$scategory->id])}}">read more<i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        @foreach ($services as $key => $service)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-wrapper text-center mb-70">
                            @if (!empty($service->main_image))
                            <div class="services-img">
                                <img src="{{asset('assets/front/img/services/' . $service->main_image)}}" alt="" />
                            </div>
                            @endif
                            <div class="services-text">
                                <h2>{{convertUtf8($service->title)}}</h2>
                                <p>@if (strlen($service->summary) > 100)
                                                   {{mb_substr($service->summary,0,100,'utf-8')}}<span style="display: none;">{{mb_substr($service->summary,100,null,'utf-8')}}</span>
                                                   <a href="#" class="see-more">{{__('see more')}}...</a>
                                                @else
                                                   {{convertUtf8($service->summary)}}
                                                @endif</p>
                                                @if($service->details_page_status == 1)
                                <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}">read more<i class="fas fa-long-arrow-alt-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                     @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
        <!-- services-area-end -->
        @endif

        <!-- counter-area-start -->
        @if ($bs->statistics_section == 1)
        <div class="counter-area pt-140 pb-110" style="background-image:url('{{asset('assets/front/img/'.$be->statistics_bg)}}')">
            <div class="container">
                <div class="row">
                    @foreach ($statistics as $key => $statistic)
                    <div class="col-xl-3 cl-lg-3 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter">{{$statistic->quantity}}</h1>
                                <span>{{convertUtf8($statistic->title)}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        @endif
        <!-- counter-area-end -->

        <!-- event-area-start -->
        @if (count($events) > 0)
        <div class="event-area gray-bg pt-110 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <h1>We arrange many other <span>events</span> and program <br> which needs in our human lifeh1</h1>
                        </div>
                    </div>
                </div>
                <div class="event-bg">
                    <div class="event-box-active">
                        @foreach($events as $event)
                        @php
                            $images = json_decode($event->image, true);
                        @endphp
                        <div class="event-wrapper">
                            <div class="event-img">
                                <img src="{{(!empty($images)) ? asset('/assets/front/img/events/sliders/'.$images[0]) : ''}}" alt="" />
                                <div class="event-text">
                                    <h2><a href="#">{{strlen($event->title) > 30 ? mb_substr($event->title,0,30,'utf-8') . '...' : $event->title}}</a></h2>
                                    <span>{{date_format(date_create($event->date),"d/m/Y")}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                        
                    </div>
                </div>
            </div>
        </div>
         @endif
        <!-- event-area-end -->

        <!-- volunteer-area-start -->
        @if ($bs->approach_section == 1)
        <div class="volunteer-area volunteer11" style="background-image:url('{{asset('assets/front/img/'.$bs->approach_bg)}}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                        <div class="volunteer-text pt-80 pb-80">
                            <h1>{!! convertUtf8($bs->approach_title) !!}</h1>
                            <p>{{convertUtf8($bs->approach_subtitle)}}</p>
                             @if (!empty($bs->approach_button_url) && !empty($bs->approach_button_text))
                            <a class="btn" href="#">{{convertUtf8($bs->approach_button_text)}}</a>
                             @endif
                        </div>
                    </div>
                   
                    <div class="col-xl-6 col-lg-6 d-lg-none d-xl-block">
                        <div class="volunteer-img">
                            <img src="{{asset('assets/front/img/'.$bs->approach_profile)}}" alt="">
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        @endif
        <!-- volunteer-area-end -->

        @if ($bs->testimonial_section == 1)
        <!-- testimonial-area-start -->
        <div class="testimonial-area pt-110 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <h1>{{convertUtf8($bs->testimonial_title)}} <br> {{convertUtf8($bs->testimonial_subtitle)}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="testimonial-active owl-carousel">
                        @foreach ($testimonials as $key => $testimonial)
                        <div class="testimonial-wrapper">
                            <div class="testimonial-text">
                                <p>{{convertUtf8($testimonial->comment)}}.</p>
                                <div class="testimonial-name">
                                    <div class="testimonial-img">
                                        <img src="{{asset('assets/front/img/testimonials/'.$testimonial->image)}}" alt="" />
                                    </div>
                                    <div class="testimonial-content">
                                        <h3>{{convertUtf8($testimonial->name)}}</h3>
                                        <span>{{convertUtf8($testimonial->rank)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- testimonial-area-end -->

        @if ($bs->news_section == 1)
        <!-- blog-area-start -->
        <div class="blog-area pb-90 pt-110 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <h1>{{convertUtf8($bs->blog_section_title)}}<br> latest <span>{{convertUtf8($bs->blog_section_subtitle)}}</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($blogs as $key => $blog)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                         @php
                            $blogDate = \Carbon\Carbon::parse($blog->created_at)->locale("$currentLang->code");
                            $blogDate = $blogDate->translatedFormat('jS F, Y');
                        @endphp
                        <div class="blog-wrapper mb-30">
                            <div class="blog-img">
                                <a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}"><img src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="" /></a>
                                <div class="blog-text">
                                    <span>{{$blogDate}}</span>
                                    <h2><a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">{{strlen($blog->title) > 40 ? mb_substr($blog->title,0,40,'utf-8') . '...' : $blog->title}}</a></h2>
                                    <a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        @endif
        <!-- blog-area-end -->

        <!-- subscribe-area-start -->
        <!-- <div class="subscribe-area pt-110 pb-115" style="background-image:url('{{asset('assets/front/img/'.$bs->cta_bg)}}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                        <div class="subscribe-wrapper text-center">
                            <div class="subscribe-title mb-60">
                                <h1>Subscribe our newsletter to <br> join our activity</h1>
                            </div>
                            <div class="subscribe-form">
                                <form id="footerSubscribeForm" action="{{route('front.subscribe')}}" method="post">
                                    <input type="email" class="form_control" placeholder="{{__('Enter Email Address')}}" name="email" required>
                                    <p id="erremail" class="text-danger mb-0 err-email"></p>
                                    <button type="submit">subscribe</button>
                                </form>
                            </div>
                            <div class="subscribe-text">
                                <p>{{convertUtf8($bs->newsletter_text)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- subscribe-area-end -->



@endsection
