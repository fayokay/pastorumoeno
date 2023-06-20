@extends('front.politics.layout')

@section('pagename')
 -
 @if (empty($category))
 {{__('About')}}
 @else
 {{$category->name}}
 @endif
 {{__('Us')}}
@endsection

@section('meta-keywords', "About Umo Eno")
@section('meta-description', "About Umo Eno Akwa Ibom State Governoship Aspiration")

@section('breadcrumb-title', convertUtf8("About Us"))
@section('breadcrumb-link', __('About Us'))

@section('content')


 <!-- breadcrumb-area-start -->
       <!--  <div class="breadcrumb-area pt-250 pb-250" style="background-image:url(img/bg/8.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-text text-center">
                            <h1>About Us</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">home</a></li>
                                <li><span>About Us</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- breadcrumb-area-end -->

        <!-- about-me-area-start -->
        <div class="about-me-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="about2-me-wrapper mb-30">
                            <div class="about-me-content">
                                <h1>{{$bs->about_section_title}}</h1>
                                <p>{{$bs->about_section_text}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="about2-me-img">
                            <img src="{{asset('assets/front/img/'.$bs->about_bg)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about-me-area-end -->

        <!-- we-do-area-start -->
        @if ($bs->service_section == 1)
        <div class="we-do-area we-do-circle pt-110 pb-200 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title section2-title text-center mb-60">
                            <span>{{convertUtf8($bs->service_section_title)}}</span>
                            <h1>{{convertUtf8($bs->service_section_subtitle)}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="we-do-active owl-carousel">
                        @foreach ($services as $key => $service)
                        <div class="col-xl-12">
                            <div class="we-do-wrapper">
                                <div class="we-do-img">
                                    <img src="{{asset('assets/front/img/services/' . $service->main_image)}}" alt="" />
                                </div>
                                <div class="we-do-text">
                                    <h3>{{convertUtf8($service->title)}}</h3>
                                    <p>@if (strlen($service->summary) > 100)
                                                   {{mb_substr($service->summary,0,100,'utf-8')}}<span style="display: none;">{{mb_substr($service->summary,100,null,'utf-8')}}</span>
                                                   <a href="#" class="see-more">{{__('see more')}}...</a>
                                                @else
                                                   {{convertUtf8($service->summary)}}
                                                @endif.</p>
                                    <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- we-do-area-end -->

        <!-- team-area-start -->
        @if ($bs->team_section == 1)
        <div class="team-area pt-110 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title section2-title text-center mb-60">
                            <span>{{convertUtf8($bs->team_section_title)}}</span>
                            <h1>{{convertUtf8($bs->team_section_subtitle)}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($members as $key => $member)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                                <div class="team-text">
                                    <h3>{{convertUtf8($member->name)}}</h3>
                                    <span>{{convertUtf8($member->rank)}}</span>
                                    <div class="team-icon">
                                        @if (!empty($member->facebook))
                                       <a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if (!empty($member->twitter))
                                       <a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if (!empty($member->linkedin))
                                       <a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                                        @endif
                                        @if (!empty($member->instagram))
                                       <a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a>
                                       @endif
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        @endif
        <!-- team-area-end -->

         @if ($bs->statistics_section == 1)
         <!-- counter-area-start -->
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
        <!-- counter-area-end -->
        @endif

        <!-- testimonial-area-start -->
        @if ($bs->testimonial_section == 1)
        <div class="testimonial-area pt-110 pb-120">
            <div class="container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section-title section2-title text-center mb-65">
                                <span>{{convertUtf8($bs->testimonial_title)}}</span>
                                <h1>{{convertUtf8($bs->testimonial_subtitle)}}</h1>
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
        </div>
        <!-- testimonial-area-end -->
        @endif
@endsection
