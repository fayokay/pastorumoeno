@extends('front.candidate.pages')

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


 <div class="page-content-wrap">
        
        <div class="container">
          
          <div class="row">
            <main id="main" class="col-md-8 col-sm-12">
              
              <div class="content-element3">
                
                <h3>{{$bs->about_section_title}}</h3>

                <p>{{$bs->about_section_text}} </p>

              </div>

              <div class="content-element3">
                <img src="{{asset('assets/front/img/'.$bs->about_bg)}}" alt="">
              </div>

              <div class="content-element3">
                <p>{{$bs->about_section_text2}}  </p>
              </div>

              <div class="content-element3">
                <div class="blockquote-holder with-bg style-2">
                  <blockquote>
                    <p>“{{$bs->about_section_text3}} ”</p>
                    <div class="author">Umo Eno</div>
                    <div class="author-status">PDP Candidate</div>
                  </blockquote>
                </div>
              </div>

              <div class="content-element2">
                <p>{!! $bs->about_section_text4 !!}  </p>
              </div>

              

            </main>
            <aside id="sidebar" class="col-md-4 col-sm-12">
              
              <!-- widget -->

              <div class="widget">
                
                <div class="action-widget style-2 type-vr">
          
                  <!-- action-item -->

                  <!-- action-item -->
                </div>

              </div>

              <!-- widget -->

              

              <!-- widget -->

              <div class="widget-holder style-2">
                
                <div class="widget-fb">

                  <header><h5>From Facebook</h5></header>
                  
                  <div class="fb-page" data-href="https://www.facebook.com/teamumoeno" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/teamumoeno" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/teamumoeno">Team Umo Eno</a></blockquote></div>
                  
                </div>

              </div>

            </aside>
          </div>

        </div>

      </div>

    </div>

    <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
@endsection
