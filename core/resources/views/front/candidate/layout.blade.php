<!doctype html>
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="manifest" href="{{url('/')}}">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/img/'.$bs->favicon)}}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{asset('assets/front/candidate/font-awesome/css/font-awesome.min.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CLato:300,400,700,900" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/front/candidate/font/linea-basic/styles.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/font/linea-ecommerce/styles.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/font/linea-arrows/styles.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/plugins/fancybox/jquery.fancybox.css')}}">

        <!-- CSS theme files
        ============================================ -->
        <link rel="stylesheet" href="{{asset('assets/front/candidate/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/css/fontello.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/candidate/css/responsive.css')}}">

      <link rel="stylesheet" href="{{asset('assets/front/css/plugin.min.css')}}">





      
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
        <div class="loader"></div>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        	@if (!request()->routeIs('front.index') && !request()->routeIs('front.packageorder.confirmation'))
        	<!-- Start finlance_header area -->
		    @includeIf('front.candidate.partials.navbar2')
		    <!-- End finlance_header area -->
		    @else
		    @includeIf('front.candidate.partials.navbar')

		    @endif


		@if (!request()->routeIs('front.index') && !request()->routeIs('front.packageorder.confirmation') && !request()->is('My-Blueprint'))
		 <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
      <div class="breadcrumbs-wrap with-bg">
        <div class="container">          
          <h1 class="page-title">@yield('breadcrumb-title')</h1>
          <ul class="breadcrumbs">
            <li><a href="{{route('front.index')}}">Home</a></li>
            <li>@yield('breadcrumb-link')</li>
          </ul>
        </div>
      </div>

      <!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->
        @elseif(request()->is('My-Blueprint'))
	<div class="breadcrumbs-wrap with-bg">
        <div class="container">          
          <h1 class="page-title">@yield('breadcrumb-title')</h1>
          <ul class="breadcrumbs">
            <li><a href="{{route('front.index')}}">Home</a></li>
            <li>@yield('breadcrumb-link')</li>
          </ul>
        </div>
      </div>
		@endif



		@yield('content')


        <!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

    <footer id="footer" class="footer">

      <div class="call-out join-us">
        
        <div class="container">

          <div class="row flex-row">
            <div class="col-md-8">
              
              <div class="bg-col-1">
                <h5>{{convertUtf8($bs->newsletter_text)}}</h5>
                <form id="footerSubscribeForm" class="join-form" action="{{route('front.subscribe')}}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-style-4 btn-big f-right" data-type="submit">Subscribe</button>
                  <div class="input-holder">
                    <input type="email" size="50" class="" name="email" placeholder="Email address">
                    <p id="erremail" class="text-danger mb-0 err-email"></p>
                  </div>
                </form>
              </div>

            </div>
            <a href="{{url('/contact')}}" class="col-md-4">
              
              <div class="bg-col-2">
                <div class="align-center">
                  <h5>Contact Us!</h5>
                </div>
              </div>

            </a>
          </div>

        </div>

      </div>

      <div class="main-footer">
        
        <div class="container">
        
          <div class="row">
            <div class="col-sm-4">
              
              <div class="widget">
                
                <a href="#" class="logo"><img src="{{asset('assets/front/img/'.$bs->logo)}}" alt=""></a>
                <p>@php
                                $addresses = explode(PHP_EOL, $bex->contact_addresses);
                                @endphp

                                @foreach ($addresses as $address)
                                    {{$address}}
                                    @if (!$loop->last)
                                        |
                                    @endif
                                @endforeach</p>
                <p>Phone: <span>{{$bs->support_phone}}</span> <br>
                E-mail: <a href="mailto:#" class="link-text">{{$bs->support_email}}</a></p>
                <a href="#" class="link-text">Privacy Policy</a>

              </div>

            </div>
            <div class="col-sm-4">
              
              <div class="widget">
                
                <h6 class="widget-title">Quick Links</h6>

                <ul class="info-links">
                  @foreach ($ulinks as $key => $ulink)
                        
                  <li><a href="{{$ulink->url}}">{{convertUtf8($ulink->name)}}</a></li>
                  @endforeach

                </ul>

              </div>

            </div>
            <div class="col-sm-4">
              
              <div class="widget">
                
                <h6 class="widget-title">Connect With Us</h6>

                <ul class="social-icons">
                  @foreach ($socials as $key => $social)

                  <li><a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></li>
                  @endforeach

                </ul>

              </div>

              <div class="widget">
                
                <div class="copyright">
                  
                  <div class="paid-by">Umoeno2023.com</div>
                  <p>{!! replaceBaseUrl(convertUtf8($bs->copyright_text)) !!}</p>

                </div>

              </div>

            </div>
          </div>

        </div>
        
      </div>

    </footer>

    <!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->

  </div>

  <!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->

  <!-- JS Libs & Plugins
  ============================================ -->
  <script src="{{asset('assets/front/candidate/js/libs/jquery.modernizr.js')}}"></script>
  <script src="{{asset('assets/front/candidate/js/libs/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/js/libs/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/js/libs/retina.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/plugins/instafeed.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/plugins/twitter/jquery.tweet.js')}}"></script>
  <script src="{{asset('assets/front/candidate/plugins/jquery.queryloader2.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/plugins/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/front/candidate/plugins/bootstrap.js')}}"></script>

  <!-- JS theme files
  ============================================ -->
  <script src="{{asset('assets/front/candidate/js/plugins.js')}}"></script>
  <script src="{{asset('assets/front/candidate/js/script.js')}}"></script>


  
</body>
</html>


		

{{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>




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
