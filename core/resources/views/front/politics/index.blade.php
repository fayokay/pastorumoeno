@extends('front.politics.layout')

@section('meta-keywords', "$be->home_meta_keywords")
@section('meta-description', "$be->home_meta_description")


@section('styles')
@if (!empty($home->css))
<style>
    {!! replaceBaseUrl($home->css) !!}

  
</style>
<style type="text/css">
    .default-user {
    height: 280px;
    width: 280px;
    overflow: hidden;
    position: absolute;
    background: linear-gradient(#000    0%, #fff 100%);
}
</style>
@endif
<style type="text/css">
            .header {
    background: black;
    overflow: hidden;
}

.img {
   object-fit: cover;
   opacity: 0.4;
}
        </style>
@endsection


@section('content')
        <!--   hero area start   -->
         @if ($bs->home_version == 'static')
            @includeif('front.politics.partials.static')
        @elseif ($bs->home_version == 'slider')
            @includeif('front.politics.partials.slider')
        @elseif ($bs->home_version == 'video')
            @includeif('front.politics.partials.video')
        @elseif ($bs->home_version == 'particles')
            @includeif('front.politics.partials.particles')
        @elseif ($bs->home_version == 'water')
            @includeif('front.politics.partials.water')
        @elseif ($bs->home_version == 'parallax')
            @includeif('front.politics.partials.parallax')
        @endif
        <!--   hero area end    -->

        @if ($bs->feature_section == 1)
        <!-- feature-area-start  -->


 



        <div class="feature-area pt-5">
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
                                    <a class="btn" href="{{url('/aboutus')}}">read more</a>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h2>{{convertUtf8($feature->title)}}</h2>
                                <p>{{convertUtf8($feature->description)}}</p>
                                <a class="btn" href="{{url('/aboutus')}}">read more</a>
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
        <div class="donation-area pt-240 pb-140" style="background-image:url({{asset('assets/front/img/'.$bs->intro_bg)}}); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: scroll">
             <!-- style="background-image:url('{{asset('assets/front/img/'.$bs->intro_bg)}}')" -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="donation-wrapper">
                            <div class="donation-text">
                                <h1>{{convertUtf8($bs->intro_section_title)}}</h1>
                                <p style="font-size: 25px">{{convertUtf8($bs->intro_section_text)}}.</p>

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
        <link rel="stylesheet" href="{{asset('assets/front/carousel/css/flipster.min.css')}}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{asset('assets/front/carousel/script/jquery.flipster.min.js')}}"></script>

<div class="testimonial-area pt-50 pb-50">
    <div id="coverflow">
        <ul class="flip-items">
            @foreach($carousel as $caro)
            <li>
                <img src="{{asset('assets/front/img/sliders/'.$caro->image)}}" width="450">
            </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    // $("#coverflow").flipster({
    //     autoplay: 5000,
    //     loop: true,
    // });

    $("#coverflow").flipster({
    style: 'carousel',
    spacing: -0.5,
    buttons: true,
    autoplay: 5000,
    loop: true,
});
</script>

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
                    <div class="col-xl-3 cl-lg-3 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter">{{$cnt+10900}}</h1>
                                <span>Our Volunteers</span>
                            </div>
                        </div>
                    </div>
                    
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
                            <h1>{{$bs->event_title}}  <br> {{$bs->event_subtitle}}</h1>
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
                                <div class="header">
                                <img src="{{(!empty($images)) ? asset('/assets/front/img/events/sliders/'.$images[0]) : ''}}" alt="" class="img" />
                            </div>
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
<!-- <style>


.card-carousel {
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-carousel .my-card {
  height: 20rem;
  width: 12rem;
  position: relative;
  z-index: 1;
  -webkit-transform: scale(0.6) translateY(-2rem);
  transform: scale(0.6) translateY(-2rem);
  opacity: 0;
  cursor: pointer;
  pointer-events: none;
  background: #2e5266;
  background: linear-gradient(to top, #2e5266, #6e8898);
  transition: 1s;
}

.card-carousel .my-card:after {
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  border-radius: 100%;
  background-color: rgba(0,0,0,0.3);
  bottom: -5rem;
  -webkit-filter: blur(4px);
  filter: blur(4px);
}

.card-carousel .my-card:nth-child(0):before {
  /*content: '0';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(1):before {
  /*content: '1';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(2):before {
 /* content: '2';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(3):before {
  /*content: '3';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(4):before {
  /*content: '4';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(5):before {
  /*content: '5';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(6):before {
  /*content: '6';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(7):before {
 /* content: '7';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(8):before {
  /*content: '8';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card:nth-child(9):before {
 /* content: '9';*/
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  font-size: 3rem;
  font-weight: 300;
  color: #fff;
}

.card-carousel .my-card.active {
  z-index: 3;
  -webkit-transform: scale(1) translateY(0) translateX(0);
  transform: scale(1) translateY(0) translateX(0);
  opacity: 1;
  pointer-events: auto;
  transition: 1s;
}

.card-carousel .my-card.prev, .card-carousel .my-card.next {
  z-index: 2;
  -webkit-transform: scale(0.8) translateY(-1rem) translateX(0);
  transform: scale(0.8) translateY(-1rem) translateX(0);
  opacity: 0.6;
  pointer-events: auto;
  transition: 1s;
}
</style>

        
        <div class="testimonial-area pt-110 pb-120">
            <div class="card-carousel">
                  @foreach($carousel as $caro)
                            
                    <div class="my-card"><img src="{{asset('assets/front/img/sliders/'.$caro->image)}}" width="300" height="300"></div>
               @endforeach
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> 
<script type="text/javascript">

$num = $('.my-card').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

if ($num % 2 == 0) {
  $('.my-card:nth-child(' + $even + ')').addClass('active');
  $('.my-card:nth-child(' + $even + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $even + ')').next().addClass('next');
} else {
  $('.my-card:nth-child(' + $odd + ')').addClass('active');
  $('.my-card:nth-child(' + $odd + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $odd + ')').next().addClass('next');
}

$('.my-card').click(function() {
  $slide = $('.active').width();
  console.log($('.active').position().left);
  
  if ($(this).hasClass('next')) {
    $('.card-carousel').stop(false, true).animate({left: '-=' + $slide});
  } else if ($(this).hasClass('prev')) {
    $('.card-carousel').stop(false, true).animate({left: '+=' + $slide});
  }
  
  $(this).removeClass('prev next');
  $(this).siblings().removeClass('prev active next');
  
  $(this).addClass('active');
  $(this).prev().addClass('prev');
  $(this).next().addClass('next');
});


// Keyboard nav
$('html body').keydown(function(e) {
  if (e.keyCode == 37) { // left
    $('.active').prev().trigger('click');
  }
  else if (e.keyCode == 39) { // right
    $('.active').next().trigger('click');
  }
});
</script> -->


<!--   @if (count($carousel) > 0)
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="{{asset('assets/front/carousel/css/jellySlider.css')}}" />
        <script src="{{asset('assets/front/carousel/script/jeuqry.jellySlider-1.0.js')}}"></script>




        
        <div class="testimonial-area pt-110 pb-120">
            <div id="jelly-slider01" class="jelly-slider">
                        <div class="jelly-list">
                            @foreach($carousel as $caro)
                            <div class="jelly-slide">
                                <img src="{{asset('assets/front/img/sliders/'.$caro->image)}}" width="300">
                                
                            </div>
                            @endforeach
                        </div>
                    </div>
        </div>


 <script>
    $('#jelly-slider01').jellySlider({
         loop: true,
         view: 6,
        move: 3,
        margin: 5,

    });
</script>
@endif -->

        

        @if ($bs->news_section == 1)
        <!-- blog-area-start -->
        <div class="blog-area pb-90 pt-110 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <h1>{{convertUtf8($bs->blog_section_title)}}<br> <span>{{convertUtf8($bs->blog_section_subtitle)}}</span></h1>
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
                                <a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">
                                    <div class="header">

                                        <img class="img" src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="" />
                                    </div>
                                 
                            </a>
                                <div class="blog-text">
                                    <span>{{$blogDate}}</span>
                                    <h2><a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">{{strlen($blog->title) > 80 ? mb_substr($blog->title,0,80,'utf-8') . '...' : $blog->title}}</a></h2>
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


 {{-- Popups start --}}
            @includeIf('front.partials.popups')
            {{-- Popups end --}}
@endsection
