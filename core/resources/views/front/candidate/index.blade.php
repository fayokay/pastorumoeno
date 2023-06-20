@extends('front.candidate.layout')

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
            @includeif('front.candidate.partials.static')
        @elseif ($bs->home_version == 'slider')
            @includeif('front.candidate.partials.slider')
        @elseif ($bs->home_version == 'video')
            @includeif('front.candidate.partials.video')
        @elseif ($bs->home_version == 'particles')
            @includeif('front.candidate.partials.particles')
        @elseif ($bs->home_version == 'water')
            @includeif('front.candidate.partials.water')
        @elseif ($bs->home_version == 'parallax')
            @includeif('front.candidate.partials.parallax')
        @endif
        <!--   hero area end    -->

    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

    <div id="content">
      
       @if ($bs->feature_section == 1)
       <div class="page-section-bg2">
        
        <div class="container extra-size">
          
          <div class="row">
            
            <div class="col-sm-4">
            
              <h6 class="section-sub-title">Main issues</h6>
              <h2 class="section-title">{{$bs->feature_section_title}}</h2>
              <p>{{$bs->feature_section_subtitle}}</p>
              <a href="{{$bs->feature_section_url}}" class="info-btn">Read More</a>

            </div>
            <div class="col-sm-8">
              
              <div class="icons-box">

                <div class="row flex-row">
                  
                  @foreach ($features as $key => $feature)
               
                <div class="col-md-2 col-xs-6">
                  
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                    <div class="icons-wrap">

                      <div class="icons-item">
                        <a href="#" class="item-box">
                          <i class="{{$feature->icon}}"></i>
                          <h5 class="icons-box-title"><span>{{convertUtf8($feature->title)}}</span></h5>
                        </a>
                      </div>

                    </div>

                  </div>
                @endforeach
                  
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
      @endif

      <div class="page-section type2">
        
        <div class="container extra-size">

          <div class="row type-2">
            <div class="col-md-6 col-sm-12">

              <a href="{{$bs->about_section_video_link}}" data-fancybox="video"><img src="{{asset('assets/front/img/'.$bs->about_bg)}}" alt=""></a>

            </div>
            <div class="col-md-6 col-sm-12">
              
              <div class="push-top">
                
                <h6 class="section-sub-title">meet umo eno</h6>
                <h2 class="section-title">{{$bs->about_section_title }}</h2>
                <p class="text-size-big">{{$bs->about_section_text }} </p>
                <a href="#" class="btn btn-style-3">Read more</a>

              </div>

            </div>
          </div>
          
        </div>

      </div>

      <!-- actions -->

      <div class="action-widget pull-bottom">
        
        <div class="container extra-size">
          
          <div class="row flex-row">
            
            <!-- action-register -->

            <div class="col-md-3">
              
              <a href="https://support.umoeno2023.com" class="action-item get-involved">
                <div class="action-inner">
                  <i class="icon icon-ecommerce-megaphone"></i>
                  <h5 class="action-title">Get Involved</h5>
                  <p>Become a volunteer</p>
                </div>
              </a>
              
            </div>

            <!-- action-register -->

            <div class="col-md-6">
              
              <div class="action-item donate">
                <div class="action-inner">
                  
                  <h3 class="action-title size-2"><b>{{convertUtf8($bs->cta_section_title)}}</b></h3>
                  <div id="chose-donate" class="">
                    <p class="text-white"><font color=white>{{convertUtf8($bs->cta_section_text)}}</font></p>
                    <a href="{{$bs->cta_section_button_url}}" class="btn btn-style-4 btn-big">{{convertUtf8($bs->cta_section_button_text)}}</a>
                  </div>

                </div>
              </div>
              
            </div>

            <!-- action-register -->

            <div class="col-md-3">
              
              <a href="{{url('events')}}" class="action-item register">
                <div class="action-inner">
                  <i class="icon icon-basic-calendar"></i>
                  <h5 class="action-title">Attend Events</h5>
                  <p>View upcoming events</p>
                </div>
              </a>
              
            </div>

          </div>

        </div>

      </div>
 @if ($bs->approach_section == 1)
 <div class="page-section-bg3 type3">
        
        <div class="container">
      <div class="content-element7">
            
            <h3>{{convertUtf8($bs->approach_title)}}</h3>
              
            <div class="row">
              <div class="col-md-8 col-sm-12">
                
                <div class="accordion">

                  <!--accordion item--> 
                  @foreach ($points as $key => $point)         
                  <div class="accordion-item">
                    <h6 class="a-title @if($loop->first) active @endif">{{convertUtf8($point->title)}}</h6>
                    <div class="a-content">
                      <p>{!! convertUtf8($point->short_text) !!}</p>
                    </div>
                  </div>
                  @endforeach

                </div>

              </div>
              <div class="col-md-4 col-sm-12">
                
                <div class="action-widget style-2 type-vr">
          
                  <!-- action-item -->

                  <a href="#" class="action-item register">
                    <i class="icon icon-basic-todo-txt"></i>
                    <h5 class="action-title"><b>Register to vote</b></h5>
                    <p>Submit your application</p>
                  </a>

                  <!-- action-item -->

                  <a href="#" class="action-item get-involved">
                    <i class="icon icon-ecommerce-megaphone"></i>
                    <h5 class="action-title"><b>Get Involved</b></h5>
                    <p>Become a volunteer</p>
                  </a>

                  <!-- action-item -->

                  <a href="#" class="action-item event">
                    <i class="icon icon-basic-mail-open-text"></i>
                    <h5 class="action-title"><b>Vote By Mail</b></h5>
                    <p>Request your ballot</p>
                  </a>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @endif

      <div class="page-section">
        
        <div class="container extra-size2">
          
          <h6 class="section-sub-title">Timeline</h6>
          <h2 class="section-title">Umo Eno's Story</h2>

          <div class="tabs tabs-section type-2 vertical clearfix">
            <!--tabs navigation-->                  
            <ul class="tabs-nav clearfix">
              <li>
                <a href="#tab-1">Intro</a>
              </li>
              <!-- <li>
                <a href="#tab-2">Early Years</a>
              </li> -->
              <li>
                <a href="#tab-3">Education</a>
              </li>
              <li>
                <a href="#tab-4">Work Profile</a>
              </li>
              <li>
                <a href="#tab-5">Contribution</a>
              </li>
              <li>
                <a href="#tab-6">Marriage</a>
              </li>
            </ul>
            <!--tabs content-->                 
            <div class="tabs-content">
              <div id="tab-1">

                <div class="row">
                  
                  <div class="col-md-6 col-sm-12">
                    
                    <img src="{{asset('assets/front/candidate/images/umoeno.jpg')}}" alt="">

                  </div>
                  <div class="col-md-6 col-sm-12">
                    
                    <p>Pastor Umo Eno is a visionary entrepreneur and a bi-vocational pastor. He has proven track records in achieving positive results through development of strategic business alliances, identifying new markets and developing business processes. With deep passion for excellence, his cardinal objective is to build synergy with individuals, corporate organisations, private and government institutions-in human capacity building, maximizing productivity and wealth creation, as well as ensuring strong future growth for national development and enhancement of humanity.</p>

                  </div>

                </div>

              </div>
              <!-- <div id="tab-2">

                <p>  </p>

              </div> -->
              <div id="tab-3">

                <p>He attended the Local Government Authority Primary School, Lagos; and had his Secondary education at St. Francis Secondary School, Ikot Ataku, Eket, before returning to Victory High School, Lagos, where he completed same and obtained the West African Senior School Certificate.</p>
                <p>To broaden his horizon about management and business, he attended quite a number of courses, conferences and seminars including the Conference of International Association of Hospitality Practitioners in Chicago, USA; Continuing Professional Education for Hospitality Practitioners by Nigerian Hotel and Catering Institute; Capacity Development Programme for Hospitality Practitioners by Nigeria Hotel and Catering Institute; Water and Mineral Bottling Business Course, in India; Executive Team Leadership Training at the Lagos Business School; Making Catering Contract Work Course, in London, United Kingdom; Materials Purchasing/Procurement and Stores Inventory Management in Eket, as well as Basic Water Survival Training, also in Eket. He has also attended courses in Development of Tourism in Small Islands and Sub-Saharan Africa, in Seychelles; Effective Negotiation-Strategy, United Kingdom; Strategic Marketing Course, United Kingdom; Corporate Treasury Course in Lagos; Interpretation of the Banks and Other Financial Institutions Decree (BOFID) Training, Lagos; Interpretational Conference on Capital Market Development (Seminar); Bank Credit Analysis Course, Union Bank Training School, Surulere, Lagos; Cashiers Course, Union Bank Training School, Surulere, Lagos. </p>

              </div>
              <div id="tab-4">

                <p>Pastor Umo Eno is a visionary entrepreneur and a bi-vocational pastor. He has proven track records in achieving positive results through development of strategic business alliances, identifying new markets and developing business processes. With deep passion for excellence, his cardinal objective is to build synergy with individuals, corporate organisations, private and government institutions-in human capacity building, maximizing productivity and wealth creation, as well as ensuring strong future growth for national development and enhancement of humanity.</p>
                <p>He worked with the Union Bank Plc. as a Banking Officer in the Business Advisory and Financial Planning Department between 1982 and 1990 and later joined the Norman Investment Ltd between 1991 and 1997 where he distinguished himself as a man of excellence and towering integrity. </p>
                <p>He developed a financial roadmap and increased revenue generation in the said company, moving the growth rate from 5% to 15% in a year. He rose through the ranks from Finance and Investment Manager to General Manager and then to Group General Manager of the Holding Company (Norman Holdings Ltd).</p>
                <p>From a humble beginning in 1997, he established Royalty Hotels & Recreations Ltd. With just five rooms in Eket, Akwa Ibom State, the business gradually evolved into a conglomerate of hospitality and allied services that has become one of the leading brands in the hospitality industry both in Akwa Ibom State and Nigeria.</p>
                <p>The portfolio of the Group covers hotels, apartments, eatery and coffeeshops (Big Daddy), industrial catering and AkwaFresh Premium TableWater. Collectively, the Royalty Group provides employment opportunities in most cases to more than 2,500 persons across the country - 80% of which are Akwa Ibom state indigenes.</p>
                <p>In 2004, he was called into public service and appointed as Chairman, Hotels and Tourism Management Board by His Excellency, Arch. Obong Victor Attah, the then Governor of AkwaIbom State. He held the position until the end of that administration in 2007. Key among his achievements is the first ever state-wide hotel inspection for categorization and classification. He also developed and printed the first AkwaIbom Hotels Directory, which serves as a veritable source of information for the sector and guide to travelers and tourists visiting the state. His second foray into public service was in September, 2019, when he was appointed as the Executive Director, Agricultural Investment in the AkwaIbom State Investment Corporation (AKICORP) by His Excellency, Deacon Udom Emmanuel, the current Governor of the State. He still holds that position. On January 4, 2021, he was appointed into the AkwaIbom State Executive Council and sworn in as Commissioner for Lands and Water Resources.</p>

              </div>
              <div id="tab-5">

                <p>Umo Eno is a grassroots mobiliser who is well known by his people. With his keen interest in community development and as a corporate citizen, he understands the essence of corporate social responsibility and has been involved in community development, including upgrading some secondary schools within his environs and providing platforms for the students’ industrial work experience scheme (SIWES) among others.</p>
                <p>He has attracted visible development to his community including a cassava off-taking center built by the Udom Emmanuel-led administration. He has awarded scholarships to many students across the different levels of formal education as well as several others in the area of skill and vocational studies.  </p>
                <p>Since 2004 he initiated and periodically embarked on a number of social welfare schemes, including medical interventions, building of houses for people within and outside his community and empowering youths through training and conferences, one of which is themed 'The Ignite". Umo Eno has been involved in business training and providing small business start-up packs to women in his community. Through the company he founded in 1997 he has employed between 1500 and 2500 AkwaIbom indigenes and others, at various times.</p>
                <p>Umo Eno is an ordained apostle in the body of Christ and is the Under-shepherd of the All-Nations Christian Ministry International in Eket; a ministry called to build a community of Christian Believers that transcend race, tribe, colour, tradition and denominations into a kingdom focused church. He strives in his daily work to enthrone kingdom principles in doing business in the market place. He is a good social mixer who believes in hardwork, integrity and strong character.
He is an author of several books including such inspiring titles as, Wealth Creation, God’s Way, Breakforth, Dream Again, True Friendship, and Exercising Your Dominion Mandate. He is the Publisher/Editor-in-Chief of Hospitality Connect which covers the hospitality and tourism potentials of AkwaIbom State as well as The Appetizer magazines. He is also a regular contributor to Christian journals and is a well sought-after public speaker.</p>

              </div>
              <div id="tab-6">

                <p>He is married to Pastor ( Mrs) Patience Eno and they are blessed with children and grandchildren.</p>
                

              </div>
              
            </div>
          </div>

        </div>

      </div>

      <div class="page-section-bg4 type4 half-bg-col">

        <div class="img-col-right"><div class="col-bg" data-bg="{{asset('assets/front/img/'.$bs->intro_bg)}}"></div></div>
        
        <div class="container extra-size2">
          <div class="row">
            <div class="col-md-6">
              
              <h6 class="section-sub-title">upcoming Event</h6>
              <h2 class="section-title">{{convertUtf8($bs->intro_section_title)}}</h2>

              <div class="event-info content-element3">
                <div class="event-info-item"><i class="icon icon-location"></i>{{($bs->intro_section_text)}}</div>
              </div>
<!-- 
              <div class="countdown content-element2" data-year="2017" data-month="9" data-day="16" data-hours="15" data-minutes="0" data-seconds="0"></div> -->

              <a href="{{$bs->intro_section_button_url}}" class="btn btn-style-4 type-2">{{convertUtf8($bs->intro_section_button_text)}}</a>

            </div>
            <div class="col-md-6"></div>
          </div>
        </div>

      </div>

      <div class="get-mobile-section align-center">
        
        <div class="get-mobile">
          
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                
                <h3><b>Get Mobile Alert</b></h3>
                <p>Get periodic messages from Umo Eno. <br>
                Message & data rates may apply.</p>

              </div>
              <div class="col-sm-6">
                
                <div class="search-holder">
                  <form class="join-form">
                    <button type="submit" class="btn btn-style-6 btn-big f-right">Submit</button>
                    <div class="input-holder">
                      <input type="email" name="newsletter-email" placeholder="Phone number">
                    </div>
                  </form>
                </div>
                <p class="terms">Text STOP to 2233 to stop receiving messages. <span>Terms & Conditions</span></p>

              </div>
            </div>
          </div>

        </div>

      </div>

       @if ($bs->news_section == 1)
       <div class="page-section">
        
        <div class="container extra-size2">
          
          <h2 class="section-title">{{convertUtf8($bs->blog_section_title)}}</h2>

          <div class="row">
            <div class="col-md-8 col-sm-12">
              
              <div class="events-holder content-element2">

                @foreach ($blogs as $key => $blog)                
                <div class="event-item">
                  <div class="event-date">
                    <div class="event-month">{{$blog->created_at->format('M')}}</div>
                    <div class="event-day">{{$blog->created_at->format('d')}}</div>
                  </div>
                  <div class="event-info">
                    <h4 class="event-link"><a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">{{strlen($blog->title) > 40 ? mb_substr($blog->title, 0, 40, 'utf-8') . '...' : $blog->title}}</a></h4>
                    <p>{!! strlen(strip_tags($blog->content)) > 200 ? mb_substr(strip_tags($blog->content), 0, 200, 'utf-8') . '...' : strip_tags($blog->content) !!} </p>
                    <a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}" class="info-btn">Read More</a>
                  </div>
                </div>

                @endforeach

              </div>

              <div class="align-center">
                <a href="{{url('/blogs')}}" class="btn">More News</a>
              </div>

            </div>
            <div class="col-md-4 col-sm-12">
              
              <div class="widget-holder style-2">
                
                <div class="widget-fb">

                  <header><h5>From Facebook</h5></header>
                  
                  <p>Donec porta diam eu massa. Quisque diam lorem, pede. Donec eget tellus non erat lacinia fermentum. </p>

                  <!-- - - - - - - - - - - - - - Entry Meta - - - - - - - - - - - - - - - - -->

                  <div class="entry-meta">

                    <time class="entry-date" datetime="2018-03-25">March 25, 2018</time>

                  </div>

                  <!-- - - - - - - - - - - - - - End of Meta - - - - - - - - - - - - - - - - -->

                  <div class="slash-list">
                    <a href="#">See Post </a>
                    <a href="#">Share</a>
                  </div>

                  <a href="#" class="info-btn">Follow Umo Eno on Facebook</a>
                  
                </div>

                <div class="widget-instagram">

                  <header><h5>From Instagram</h5></header>
                  
                  <div class="carousel-type-2 type-2">
                    <div id="instafeed" class="instagram-feed" data-instagram="6"></div>
                  </div>

                  <a href="#" class="info-btn">Follow Umo Eno on Instagram</a>

                </div>

              </div>

            </div>
          </div>

        </div>

      </div>

    </div>
    @endif

    <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->


@endsection
