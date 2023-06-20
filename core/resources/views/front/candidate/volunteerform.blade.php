@extends('front.politics.layout')

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{$category->name}}
 @endif
 {{__('Services')}}
@endsection

@section('meta-keywords', "Become a Volunteer")
@section('meta-description', "Become a Volunteer")

@section('breadcrumb-title', convertUtf8("Volunteer"))
@section('breadcrumb-link', __('Volunteer'))

@section('content')

<!-- become-volunteer-area-start -->
        <div class="become-volunteer-area pt-115">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="become-volunteer-img pt-15">
                            <img src="{{asset('assets/front/img/'.$bs->approach_profile)}}" alt="" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-7">
                        <div class="become-volunteer-wrapper pb-100">
                            <div class="become-volunteer-text">
                                <h1>Become a Volunteer</h1>
                                <p>But I must explain to you how all this mistaken denouncing pleasure praising pain was born and I will give you a complete account of the system and expound the actua.</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <form action="#" id="volunteer-form">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <input name="name" placeholder="First Name :" type="text">
                                            </div>
                                            <div class="col-xl-12">
                                                <input name="name" placeholder="Last Name :" type="text">
                                            </div>
                                            <div class="col-xl-12">
                                                <input name="email" placeholder="Your Email :" type="email">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="message" cols="30" rows="10" placeholder="Message :"></textarea>
                                                <button class="btn" type="submit">Join our team</button>
                                            </div>
                                        </div>
                                        <p class="ajax-response"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- become-volunteer-area-end -->
        
@endsection
