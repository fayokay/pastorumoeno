@extends("front.$version.layout")

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/nice-select.css')}}">
@endsection

@section('pagename')
    - {{__('Events')}}
@endsection

@section('meta-keywords', "$be->events_meta_keywords")
@section('meta-description', "$be->events_meta_description")

@section('breadcrumb-title', convertUtf8($bs->event_title))
@section('breadcrumb-subtitle', convertUtf8($bs->event_subtitle))
@section('breadcrumb-link', __('Events'))

@section('content')
    <!-- events-area-start -->
        <div class="events-area pt-110 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title section2-title text-center mb-60">
                            <span>{{$bs->event_title}}</span>
                            <h1>{{$bs->event_subtitle}}</h1>
                        </div>
                    </div>
                </div>
        @if (count($events) > 0)
            @foreach($events as $event)
                <div class="row mb-60">
                    @php
                        $images = json_decode($event->image, true);
                    @endphp
                    <div class="co-xl-5 col-lg-5">
                        <div class="events-list-img">
                            <a href="#"><img src="{{(!empty($images)) ? asset('/assets/front/img/events/sliders/'.$images[0]) : ''}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="events-list-wrapper">
                            <div class="event-list-text">
                                <h2><a href="#">{{strlen($event->title) > 30 ? mb_substr($event->title,0,30,'utf-8') . '...' : $event->title}}</a></h2>
                                <span>{{date_format(date_create($event->date),"d/m/Y")}}</span>
                                <p>{!! strlen($event->content) > 500 ? mb_substr($event->content,0,500,'utf-8') . '...' : $event->content !!} </p>
                                <a class="btn" href="{{route('front.event_details',[$event->slug])}}">view details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
                    <div class="col-12">
                        <div class="bg-secondary-py-5 text-center">
                            <h3>{{__('NO EVENT FOUND')}}</h3>
                        </div>
                    </div>
                @endif
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="paginations text-center">
                            {{$events->appends(['title' => request()->input('title'),'location' => request()->input('location'),'category' => request()->input('category'),'date' => request()->input('date')])->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- events-area-end -->
        
@endsection
@section('scripts')
    <script src="{{asset('/assets/front/js/jquery.nice-select.min.js')}}"></script>
@endsection
