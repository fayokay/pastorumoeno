@extends('front.politics.layout')

@section('pagename')
 -
 @if (empty($category))
 {{__('Meet')}}
 @else
 {{$category->name}}
 @endif
 {{__('Umo Eno ')}}
@endsection

@section('meta-keywords', "Meet Umo Eno")
@section('meta-description', "Who is Umo Eno")

@section('breadcrumb-title', convertUtf8("Meet Umo Eno"))
@section('breadcrumb-link', __('Meet Umo Eno'))

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




<div id="i39h6">
  <!-- about-me-area-start -->
  <div class="about-me-area pt-120 pb-90" id="iwfor">
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-7">

             <link rel="stylesheet" href="{{asset('assets/front/carousel/css/flipster.min.css')}}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{asset('assets/front/carousel/script/jquery.flipster.min.js')}}"></script>

<div class="testimonial-area pt-50 pb-50">
    <div id="coverflow">
        <ul class="flip-items">
            @foreach($flipper as $caro)
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
    style: 'flat',
    spacing: -0.25,
    autoplay: 5000,
    loop: true,
});

//     $("#coverflow").flipster({
//     style: 'carousel',
//     spacing: -0.5,
//     autoplay: 5000,
//     loop: true,
// });
</script>


<!-- <link rel="stylesheet" href="{{asset('assets/front/css/impulseslider.css')}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}" type="text/css" media="screen"/>

<div class="single2-about-me mb-50">
    <div class="container">

    <div id="cubeCarousel">
        <div id="cubeSpinner">
            <?php $i=1;?>
            
            @foreach($flipper as $flip)
            <div class="face {{numberTowords($i)}}">
                <img class="img_slider @if($loop->first) active @endif" src="{{asset('assets/front/img/sliders/'.$flip->image)}}" width="400">
            </div>
            <?php $i++;?>
            @endforeach
        </div>
        <div class="nav">
            <div class="left arrow"></div>
            <div class="right arrow"></div>
        </div>
      

    </div>

</div>
</div> -->

<!-- <script src="{{asset('assets/front/js/jquery-1.8.2.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.impulse.slider-0.4.js')}}"></script>
<script type="text/javascript">
     $(window).load(function(){
      $('#cubeSpinner').impulseslider({
            height: 250,
            width: 250,
          depth:270,
          perspective:800
      });
    });
</script> -->

        </div>
        <div class="col-xl-5 col-lg-5">
          <div class="about-me-wrapper2 mb-30">
            <div class="about-me-text about2-me-text">
              <!-- <span>About me</span> -->
              <h2>MEET UMO ENO
              </h2>
              <p>Pastor Umo Bassey Eno, is a native of Ikot Ekpene Udo, in Nsit Ubium Local Government Area of Akwa Ibom State. He was born in Enugu on April 24, 1964. His father, Bassey Umo Eno was a Chief Superintendent of Police (CSP) while his mother, Deaconess Eka Bassey Umo Eno was into merchandising.
                <br/>
                <br/>
                Pastor Umo Eno&#039;s vision revolves around furthering peace and prosperity by connecting the dots from our past, present to the future, developing our communities and providing sustainable jobs through industrialization and rapid development.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- video-area-end -->
  <!-- political-area-start -->
  <div id="ihef6" class="">
    <div class="container">
     
      <div class="political-bg mb-20">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="political-text mb-10">
              <h3>Education
              </h3>
              <!-- <span>2014 - 2015</span> -->
            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9">
            <div class="political-info mb-10">
              <p>He attended the Local Government Authority Primary School, Lagos; and had his Secondary education at St. Francis Secondary School, Ikot Ataku, Eket, before returning to Victory High School, Lagos, where he completed same and obtained the West African Senior School Certificate. 
                <br/>
                <br/> A man with a voracious appetite for knowledge, Umo Eno graduated from the University of Uyo, with a Bachelor of Science degree in Political Science and Public Administration and a Master of Science degree in Public Administration. He is currently working on his thesis for an award of a PhD in Political Administration from the same university. 
                <br/>
                <br/>To broaden his horizon about management and business, he attended quite a number of courses, conferences and seminars including the Conference of International Association of Hospitality Practitioners in Chicago, USA; Continuing Professional Education for Hospitality Practitioners by Nigerian Hotel and Catering Institute; Capacity Development Programme for Hospitality Practitioners by Nigeria Hotel and Catering Institute; Water and Mineral Bottling Business Course, in India; Executive Team Leadership Training at the Lagos Business School;
                Making Catering Contract Work Course, in London, United Kingdom; Materials Purchasing/Procurement and Stores Inventory Management in Eket, as well as Basic Water Survival Training, also in Eket.
                He has also attended courses in Development of Tourism in Small Islands and Sub-Saharan Africa, in Seychelles; Effective Negotiation-Strategy, United Kingdom; Strategic Marketing Course, United Kingdom; Corporate Treasury Course in Lagos; Interpretation of the Banks and Other Financial Institutions Decree (BOFID) Training, Lagos; Interpretational Conference on Capital Market Development (Seminar); Bank Credit Analysis Course, Union Bank Training School, Surulere, Lagos; Cashiers Course, Union Bank Training School, Surulere, Lagos.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="political-bg mb-20">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="political-text mb-10">
              <h3>Work Profile
              </h3>
              <!-- <span>2015 - 2016</span> -->
            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9">
            <div class="political-info mb-10">
              <p>Pastor Umo Eno is a visionary entrepreneur and a bi-vocational pastor. He has proven track records in achieving positive results through development of strategic business alliances, identifying new markets and developing business processes. With deep passion for excellence, his cardinal objective is to build synergy with individuals, corporate organisations, private and government institutions-in human capacity building, maximizing productivity and wealth creation, as well as ensuring strong future growth for national development and enhancement of humanity.
                <br/>
                <br/>
              </p>
              <p>He worked with the Union Bank Plc. as a Banking Officer in the Business Advisory and Financial Planning Department between 1982 and 1990 and later joined the Norman Investment Ltd between 1991 and 1997 where he distinguished himself as a man of excellence and towering integrity.
                <br/>
                <br/>
              </p>
              <p>He developed a financial roadmap and increased revenue generation in the said company, moving the growth rate from 5% to 15% in a year. He rose through the ranks from Finance and Investment Manager to General Manager and then to Group General Manager of the Holding Company (Norman Holdings Ltd).
                <br/>
                <br/>
                From a humble beginning in 1997, he established Royalty Hotels &amp; Recreations Ltd. With just five rooms in Eket, Akwa Ibom State, the business gradually evolved into a conglomerate of hospitality and allied services that has become one of the leading brands in the hospitality industry both in Akwa Ibom State and Nigeria.
                <br/>
                <br/>
                The portfolio of the Group covers hotels, apartments, eatery and coffeeshops (Big Daddy), industrial catering and AkwaFresh Premium TableWater. Collectively, the Royalty Group provides employment opportunities in most cases to more than 2,500 persons across the country - 80% of which are Akwa Ibom state indigenes.
                <br/>
                <br/>
                In 2004, he was called into public service and appointed as Chairman, Hotels and Tourism Management Board by His Excellency, Arch. Obong Victor Attah, the then Governor of AkwaIbom State. He held the position until the end of that administration in 2007. Key among his achievements is the first ever state-wide hotel inspection for categorization and classification. He also developed and printed the first AkwaIbom Hotels Directory, which serves as a veritable source of information for the sector and guide to travelers and tourists visiting the state.
                His second foray into public service was in September, 2019, when he was appointed as the Executive Director, Agricultural Investment in the AkwaIbom State Investment Corporation (AKICORP) by His Excellency, Deacon Udom Emmanuel, the current Governor of the State. He still holds that position. On January 4, 2021, he was appointed into the AkwaIbom State Executive Council and sworn in as Commissioner for Lands and Water Resources.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="political-bg">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="political-text mb-10">
              <h3>Relationship with the people
              </h3>
              <!-- <span>2016 - 2017</span> -->
            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9">
            <div class="political-info mb-10">
              <p>Umo Eno is a grassroots mobiliser who is well known by his people. With his keen interest in community development and as a corporate citizen, he understands the essence of corporate social responsibility and has been involved in community development, including upgrading some secondary schools within his environs and providing platforms for the students’ industrial work experience scheme (SIWES) among others.
                <br/>
                <br/>
                He has attracted visible development to his community including a cassava off-taking center built by the Udom Emmanuel-led administration. He has awarded scholarships to many students across the different levels of formal education as well as several others in the area of skill and vocational studies.
                <br/>
                <br/>
                Since 2004 he initiated and periodically embarked on a number of social welfare schemes, including medical interventions, building of houses for people within and outside his community and empowering youths through training and conferences, one of which is themed &#039;The Ignite&quot;. Umo Eno has been involved in business training and providing small business start-up packs to women in his community. Through the company he founded in 1997 he has employed between 1500 and 2500 AkwaIbom indigenes and others, at various times.
                <br/>
                <br/>
                Umo Eno is an ordained apostle in the body of Christ and is the Under-shepherd of the All-Nations Christian Ministry International in Eket; a ministry called to build a community of Christian Believers that transcend race, tribe, colour, tradition and denominations into a kingdom focused church. He strives in his daily work to enthrone kingdom principles in doing business in the market place. He is a good social mixer who believes in hardwork, integrity and strong character.
                <br/>
                He is an author of several books including such inspiring titles as, Wealth Creation, God’s Way, Breakforth, Dream Again, True Friendship, and Exercising Your Dominion Mandate. He is the Publisher/Editor-in-Chief of Hospitality Connect which covers the hospitality and tourism potentials of AkwaIbom State as well as The Appetizer magazines. He is also a regular contributor to Christian journals and is a well sought-after public speaker.
                <br/>
                <br/>
                He is married to Pastor ( Mrs) Patience Eno and they are blessed with children and grandchildren.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- political-area-end -->
</div>

@endsection
