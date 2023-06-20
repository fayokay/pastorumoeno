
        <!-- slider-start -->
        <div class="slider-area">

                
            <div class="myslider">
                @if (!empty($sliders))
                    @foreach ($sliders as $key => $slider)
                    <div class="single-slider slider-height d-flex align-items-center" style="background-image:url({{asset('assets/front/img/sliders/'.$slider->image)}}); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: scroll">
                <!-- <div class="single-slider slider-height d-flex align-items-center" style="background-image:url({{asset('assets/front/img/sliders/'.$slider->image)}}); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed"> -->
                   <div class="container">
                       <div class="row ">
                           <div class="col-xl-12">
                                <div class="slider-content">
                                  <span data-animation="fadeInUp" data-delay=".4s" style="font-family:'Uniform Bold';font-size: {{$slider->title_font_size}}px; color: #{{$slider->title_color}};">
                                    <center><b>{{convertUtf8($slider->title)}}</b> </center>
                                </span>
                                        <h1 data-animation="fadeInUp" data-delay=".6s" style="font-family:'Uniform Bold';font-size: {{$slider->bold_text_font_size}}px; color: #{{$slider->bold_text_color}};">
                                            <center><b>{{convertUtf8($slider->bold_text)}}</b></center>
                                        </h1>
                                        <h1 data-animation="fadeInUp" data-delay=".6s" style="font-size: {{$slider->text_font_size}}px; color: #{{$slider->text_color}};">
                                            <center><b>{{convertUtf8($slider->text)}}</b></center>
                                        </h1>
                                        @if (!empty($slider->button_url) && !empty($slider->button_text))
                                            <a href="{{$slider->button_url}}" class="main-btn hero-btn" style="font-size: {{$slider->button_text_font_size}}px" data-animation="fadeInUp" data-delay=".8s">
                                                <center>{{convertUtf8($slider->button_text)}}</center>
                                            </a>
                                        @endif
                                </div>
                           </div>
                       </div>
                   </div>
                </div>
            @endforeach
                @endif
                
            </div>
        </div>
        <!-- slider-start -->