<!DOCTYPE html>
<html lang="en">
   <head>
	 <!--Start of Google Analytics script-->
      @if ($bs->is_analytics == 1)
      {!! $bs->google_analytics_script !!}
      @endif
      <!--End of Google Analytics script-->

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$bs->website_title}} @yield('pagename')</title>
        <meta name="description" content="@yield('meta-description')">
      	<meta name="keywords" content="@yield('meta-keywords')">

      	<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="{{url('/')}}">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/img/'.$bs->favicon)}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/meanmenu.css')}}">
      <!-- plugin css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/plugin.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/politics/css/responsive.css')}}">
      <!-- common css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/common-style.css')}}">
      <link href="https://fonts.cdnfonts.com/css/uniform" rel="stylesheet">
                

        

        @if ($bs->is_tawkto == 1 || $bex->is_whatsapp == 1)
      <style>
        #scroll_up {
            right: auto;
            left: 20px;
        }
      </style>
      @endif

      @if (count($langs) == 0)
      <style media="screen">
      .support-bar-area ul.social-links li:last-child {
          margin-right: 0px;
      }
      .support-bar-area ul.social-links::after {
          display: none;
      }
      </style>
      @endif
      @yield('styles')

      @if ($bs->is_appzi == 1)
      <!-- Start of Appzi Feedback Script -->
      <script async src="https://app.appzi.io/bootstrap/bundle.js?token={{$bs->appzi_token}}"></script>
      <!-- End of Appzi Feedback Script -->
      @endif

      <!-- Start of Facebook Pixel Code -->
      @if ($be->is_facebook_pexel == 1)
        {!! $be->facebook_pexel_script !!}
      @endif
      <!-- End of Facebook Pixel Code -->

      <!--Start of Appzi script-->
      @if ($bs->is_appzi == 1)
      {!! $bs->appzi_script !!}
      @endif
      <!--End of Appzi script-->
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        	@if (!request()->routeIs('front.index') && !request()->routeIs('front.packageorder.confirmation'))
        	<!-- Start finlance_header area -->
		    @includeIf('front.politics.partials.navbar2')
		    <!-- End finlance_header area -->
		    @else
		    @includeIf('front.politics.partials.navbar')

		    @endif


		@if (!request()->routeIs('front.index') && !request()->routeIs('front.packageorder.confirmation') && !request()->is('My-Blueprint'))
		<!-- breadcrumb-area-start -->
		<div class="breadcrumb-area pt-250 pb-250" style="background-image:url('{{asset('assets/front/img/' . $bs->breadcrumb)}}')">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-text text-center">
							<h1>@yield('breadcrumb-title')</h1>
							<ul class="breadcrumb-menu">
								<li><a href="{{route('front.index')}}">home</a></li>
								<li><span>@yield('breadcrumb-link')</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        @elseif(request()->is('My-Blueprint'))
		<!-- breadcrumb-area-end -->
        <div class="breadcrumb-area pt-600 pb-5" style="background-image:url('{{asset('assets/front/blueprint_bg.jpg')}}')">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-text text-center">
                            <h1>@yield('breadcrumb-title')</h1>
                            <ul class="breadcrumb-menu">
                                <li><a href="{{route('front.index')}}">home</a></li>
                                <li><span>@yield('breadcrumb-link')</span></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
		@endif



		@yield('content')


		<!-- footer-area-start -->
		<footer>
			<div class="footer-area footer-white pt-95 pb-70" style="background-image:url('{{asset('assets/front/politics/img/bg/6.jpg')}}'">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-6">
							<div class="footer-wrapper mb-30">
								<div class="footer-text">
									<h3>For any additional inquiries please feel free to send us an e-mail or call</h3>
									<p>{{$bs->support_email}}</p>
									<span>{{$bs->support_phone}}</span>
								</div>
								<div class="footer-info" style="color: white;">
									<h3 style="color: white;">Location</h3>
									<p style="color: white;">@php
                                $addresses = explode(PHP_EOL, $bex->contact_addresses);
                                @endphp

                                @foreach ($addresses as $address)
                                    {{$address}}
                                    @if (!$loop->last)
                                        |
                                    @endif
                                @endforeach</p>
								</div>
								<div class="footer-icon">
                                @foreach ($socials as $key => $social)
								   <a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a>
								@endforeach
							   </div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<div class="footer-wrapper mb-30">
								<h3 class="footer-title">Recent News</h3>
								<ul class="footer-news">
									@foreach ($news as $key => $blog)
									@php
                                                $newsDate = \Carbon\Carbon::parse($blog->created_at)->locale("$currentLang->code");
                                                $newsDate = $newsDate->translatedFormat('jS F, Y');
                                            @endphp
									<li>
										<div class="footer-news-img">
											<img src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="" width="100" />
										</div>
										<div class="footer-news-text">
											<h4><a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">{{strlen($blog->title) > 40 ? mb_substr($blog->title,0,40,'utf-8') . '...' : $blog->title}}</a></h4>
											<span>{{$newsDate}}</span>
										</div>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<div class="footer-wrapper mb-30">
								<h3 class="footer-title">Newsletters</h3>
								<div class="footer-content">
									<p>Enter your email to subscribe to our newsletter.</p>
								</div>
								<div class="subscribes-form">
									<form id="footerSubscribeForm" action="{{route('front.subscribe')}}" method="post">
                                    <input type="email" class="form_control" placeholder="{{__('Enter Email Address')}}" name="email" required>
                                    <p id="erremail" class="text-danger mb-0 err-email"></p>
										<button type="submit" class="btn">Subscribe</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom-area footer-bottom-white blue3-bg pt-25 pb-25">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<div class="copyright">
								<p>{!! replaceBaseUrl(convertUtf8($bs->copyright_text)) !!}</p>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
							<ul class="footer-footer-link text-lg-right">
								<li><a href="https://cvr.inecnigeria.org/" target="_blank">INEC CVR</a></li>
								<li><a href="https://pdpmembers.org/membership/registration" target="_blank">PDP e-Reg</a></li>
								<li><a href="https://teamumoeno.com/contact"> Contact Us </a></li>
								<li><a href="https://teamumoeno.com/news">News</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer-area-end -->


{{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>













		<!-- JS here -->
        <script src="{{asset('assets/front/politics/js/vendor/modernizr-3.5.0.min.js')}}"></script>
        @if (!request()->routeIs('front.meetprofile'))
        <script src="{{asset('assets/front/politics/js/vendor/jquery-1.12.4.min.js')}}"></script>
        @endif
        <script src="{{asset('assets/front/politics/js/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/jquery.meanmenu.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/slick.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/ajax-form.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/plugins.js')}}"></script>
        <script src="{{asset('assets/front/politics/js/main.js')}}"></script>



		{{-- Cookie alert dialog start --}}
		    @if ($be->cookie_alert_status == 1)
		    @include('cookieConsent::index')
		    @endif
		    {{-- Cookie alert dialog end --}}

		   

		      @php
		        $mainbs = [];
		        $mainbs = json_encode($mainbs);
		      @endphp

        <script>
        var mainbs = {!! $mainbs !!};
        var mainurl = "{{url('/')}}";
        var vap_pub_key = "{{env('VAPID_PUBLIC_KEY')}}";

        var rtl = {{ $rtl }};
      </script>
      <!-- popper js -->
      <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
      <!-- Plugin js -->
      <script src="{{asset('assets/front/js/plugin.min.js')}}"></script>
      <!-- pagebuilder custom js -->
      <script src="{{asset('assets/front/js/common-main.js')}}"></script>

     

      {{-- whatsapp init code --}}
      @if ($bex->is_whatsapp == 1)
        <script type="text/javascript">
            var whatsapp_popup = {{$bex->whatsapp_popup}};
            var whatsappImg = "{{asset('assets/front/img/whatsapp.svg')}}";
            $(function () {
                $('#WAButton').floatingWhatsApp({
                    phone: "{{$bex->whatsapp_number}}", //WhatsApp Business phone number
                    headerTitle: "{{$bex->whatsapp_header_title}}", //Popup Title
                    popupMessage: `{!! nl2br($bex->whatsapp_popup_message) !!}`, //Popup Message
                    showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                    buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                    position: "left" //Position: left | right

                });
            });
        </script>
      @endif

      @yield('scripts')

      @if (session()->has('success'))
      <script>
         toastr["success"]("{{__(session('success'))}}");
      </script>
      @endif

      @if (session()->has('error'))
      <script>
         toastr["error"]("{{__(session('error'))}}");
      </script>
      @endif

      <!--Start of subscribe functionality-->
      <script>
        $(document).ready(function() {
          $("#subscribeForm, #footerSubscribeForm").on('submit', function(e) {
            // console.log($(this).attr('id'));

            e.preventDefault();

            let formId = $(this).attr('id');
            let fd = new FormData(document.getElementById(formId));
            let $this = $(this);

            $.ajax({
              url: $(this).attr('action'),
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type: $(this).attr('method'),
              data: fd,
              contentType: false,
              processData: false,
              success: function(data) {
                // console.log(data);
                if ((data.errors)) {
                  $this.find(".err-email").html(data.errors.email[0]);
                } else {
                  toastr["success"]("You are subscribed successfully!");
                  $this.trigger('reset');
                  $this.find(".err-email").html('');
                }
              }
            });
          });

            // lory slider responsive
            $(".gjs-lory-frame").each(function() {
                let id = $(this).parent().attr('id');
                $("#"+id).attr('style', 'width: 100% !important');
            });
        });



                $('#pvcno').keyup(function() {
                  var pvc = $(this).val().split("-").join(""); // remove hyphens
                  if (pvc.length > 0) {
                    pvc = pvc.match(new RegExp('.{1,4}', 'g')).join("-");
                  }
                  $(this).val(pvc);
            });


                $("#pvcno").blur(function(){                    
                    var name = $("#lastname").val();                 
                    var vin = $("#pvcno").val();
                    vin = vin.replaceAll('-', '');
                    console.log(vin);
                    $.ajax({
                        type: "POST",
                        url: '{{env("APP_URL")}}/getPVC',
                        data: {_token: "{{ csrf_token() }}", name: name, vin: vin}
                    }).done(function(data){
                        console.log(data);
                        if(data!="0"){                            
                            $("#pvc_check").html(data);
                            $("#pvc_check").show();
                            $("#pvc_upload").hide();
                            $("#pvc_check_invalid").hide();
                            $("#verified").val("Yes");
                        }
                        else{
                        $("#pvc_check_invalid").show();
                            $("#pvc_upload").show();
                            $("#pvc_check").hide();
                            $("#verified").val("");
                        }
                    });
                });



                $(".dynamic2").change(function(){

                    //alert("here");
                    
                    var value = $(".dynamic2 option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: '{{env("APP_URL")}}/getWard',
                        data: {_token: "{{ csrf_token() }}", value: value}
                    }).done(function(data){
                        $("#ward").html(data);
                    });
                });
                $(".dynamic3").change(function(){
                    var value = $(".dynamic3 option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: '{{env("APP_URL")}}/getPU',
                        data: {_token: "{{ csrf_token() }}", value: value}
                    }).done(function(data){
                        $("#pu").html(data);
                    });
                });
                $(".dynamic4").change(function(){
                    var lga = $(".dynamic2 option:selected").val();
                    var village = $(".dynamic3 option:selected").val();
                    var location = $(".dynamic4 option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: '{{env("APP_URL2")}}/getZone/surveyor',
                        data: {_token: "{{ csrf_token() }}", lga: lga, village: village, location: location}
                    }).done(function(data){
                        $("#zone").val(data);
                    });
                });
            


            /*
Show a progress element for any form submission via POST.
Prevent the form element from being submitted twice.
*/
(function (win, doc) {
    'use strict';
    if (!doc.querySelectorAll || !win.addEventListener) {
        // doesn't cut the mustard.
        return;
    }
    var forms = doc.querySelectorAll('form[method="post"]'),
        formcount = forms.length,
        i,
        submitting = false,
        checkForm = function (ev) {
            if (submitting) {
                ev.preventDefault();
            } else {
                submitting = true;
                  $('#loading').show();
                this.appendChild(doc.createElement('progress'));
            }
        };
    for (i = 0; i < formcount; i = i + 1) {
        forms[i].addEventListener('submit', checkForm, false);
    }
}(this, this.document));
      </script>
      <!--End of subscribe functionality-->

      <!--Start of Tawk.to script-->
      @if ($bs->is_tawkto == 1)
      {!! $bs->tawk_to_script !!}
      @endif
      <!--End of Tawk.to script-->

      <!--Start of AddThis script-->
      @if ($bs->is_addthis == 1)
      {!! $bs->addthis_script !!}
      @endif
      <!--End of AddThis script-->
    </body>

</html>
