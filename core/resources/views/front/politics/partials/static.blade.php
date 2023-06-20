
        <!-- slider-start -->
        <div class="slider-area">
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" style="background-image:url({{asset('assets/front/img/'.$bs->hero_bg)}})">
                   <div class="container">
                       <div class="row ">
                           <div class="col-xl-12">
                                <div class="slider-content">
                                    <h1 data-animation="fadeInUp" data-delay=".4s"><center>{!! convertUtf8($bs->hero_section_title) !!}</center></h1>
                                    <p data-animation="fadeInUp" data-delay=".6s"><center>{{convertUtf8($bs->hero_section_text)}}</center></p>
                                    @if (!empty($bs->hero_section_button_url) && !empty($bs->hero_section_button_text))
                                    <center><a data-animation="fadeInUp" data-delay=".8s" class="btn" href="{{$bs->hero_section_button_url}}">{{convertUtf8($bs->hero_section_button_text)}}</a></center>
                                     @endif
                                </div>
                           </div>
                       </div>
                   </div>
                </div>
                
            </div>
        </div>
        <!-- slider-start -->