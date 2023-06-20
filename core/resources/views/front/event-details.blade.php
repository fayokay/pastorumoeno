@extends("front.$version.layout")

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery.nice-number.min.css')}}">
    <style>
        input {
            margin-bottom: 10px;
        }

        .anonymous_user {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }

        .anonymous_user input {
            height: 14px;
            width: 14px;
            margin-right: 5px;
        }

        #stripe-section, #razorpay-section, #payumoney-section {
            margin-top: 10px;
        }

        .gateway-desc {
            background: #f1f1f1;
            font-size: 14px;
            padding: 10px 25px;
            margin-bottom: 20px;
            color: #212529;
            margin-top: 20px;
        }
    </style>
@endsection

@section('pagename')
    - {{__('Event')}} - {{convertUtf8($event->title)}}
@endsection

@section('meta-keywords', "$event->meta_keywords")
@section('meta-description', "$event->meta_description")

@section('breadcrumb-title', $bs->event_details_title)
@section('breadcrumb-subtitle', strlen($event->title) > 30 ? mb_substr($event->title,0,30,'utf-8') . '...' : $event->title)
@section('breadcrumb-link', __('Event Details'))

@section('content')
   <!-- events-deatils-area-start -->
        <div class="events-deatils-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        @php
                            $images = json_decode($event->image, true);
                        @endphp
                        <div class="event-details-img">
                            <img src="{{asset('/assets/front/img/events/sliders/'.$images[0])}}" alt="" width="300" />
                        </div>
                        <div class="events-deatils-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{date_format(date_create($event->date),"M d,Y")}}</span>
                            <span><i class="far fa-clock"></i> {{date_format(date_create($event->time),"h:i:sa")}}</span>
                            <span><i class="far fa-map"></i> {{convertUtf8($event->venue)}}, {{convertUtf8($event->venue_location)}}</span>
                        </div>
                        <div class="row mb-30">
                            <div class="col-xl-4 col-lg-4 cl-md-4">
                                <div class="event-details-text mb-20">
                                    <h2>{{convertUtf8($event->title)}}.</h2>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 cl-md-8">
                                <div class="event-details-info mb-20">
                                    <p>{!! replaceBaseUrl(mb_substr($event->content,0,550,'utf-8')) !!}</p>
                                </div>
                            </div>
                        </div>
                         @if ($event->image != 'null')
                        <div class="row mb-10">
                            @php $i=0; @endphp
                            @foreach(json_decode($event->image) as $event_image)
                            
                            @if($i>0)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="event-details-img mb-20">
                                    <img src="{{asset('/assets/front/img/events/sliders/'.$event_image)}}" alt="" />
                                </div>
                            </div>
                            @endif
                            @php $i++; @endphp
                            @endforeach
                            
                        </div>
                        @endif
                        <div class="events2-details-info">
                            <p>{!! replaceBaseUrl(mb_substr($event->content,550,55550,'utf-8')) !!}</p>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="events2-details-button">
                                    <a class="btn" href="#">prev event</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="events2-details-button text-md-right">
                                    <a class="btn" href="#">next event</a>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- events-deatils-area-end -->
@endsection
@section('scripts')
<script src="{{asset('/assets/front/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('/assets/front/js/jquery.nice-number.min.js')}}"></script>
<script src="{{asset('/assets/front/js/jquery.easypiechart.min.js')}}"></script>
{{-- <script src="{{asset('/assets/front/js/jquery.syotimer.min.js')}}"></script> --}}
<script src="{{asset('/assets/front/js/event.js')}}"></script>
<script type="text/javascript">
    const d = new Date('{!! $event->date !!}');
    const ye = parseInt(new Intl.DateTimeFormat('en', {year: 'numeric'}).format(d));
    const mo = parseInt(new Intl.DateTimeFormat('en', {month: 'numeric'}).format(d));
    const da = parseInt(new Intl.DateTimeFormat('en', {day: '2-digit'}).format(d));
    const t = ' {!! $event->time !!}';
    const time = t.split(":");
    const hr = parseInt(time[0]);
    const min = parseInt(time[1]);
    $('#simple_timer').syotimer({
        year: ye,
        month: mo,
        day: da,
        hour: hr,
        minute: min,
    });
</script>
<script>
    $(document).ready(function () {
        $("#addToCart").on('click', function () {
            const quantity = $("#tickets").val();
            const cost = $("#cost").val();
            const total = quantity * cost;
            $("#quantity").html(`<span>${quantity}<span/>`);
            $("#ticket-quantity").val(quantity);
            $("#total").html(`<span>${total}<span/>`);
            $("#total-cost").val(total);
            $("#purchase-section").css('display', 'none');
            $("#invoice-section").css('display', 'block');
        })
        $("#cancel").on('click', function () {
            $("#purchase-section").css('display', 'block');
            $("#invoice-section").css('display', 'none');
        });
        $("#payment-method").change(function () {
            var selectedPaymentMethod = $(this).children("option:selected").val();
            let offline = {!! $offline !!};
            let data = [];
            offline.map(({id, name}) => {
                data.push(name);
            });
            if (selectedPaymentMethod == "Stripe") {
                $('#razorpay-section').fadeOut();
                $('#payumoney-section').fadeOut();
                $('#stripe-section').fadeIn(5);
            } else if (selectedPaymentMethod == "Razorpay") {
                $('#stripe-section').fadeOut();
                $('#payumoney-section').fadeOut();
                $('#razorpay-section').fadeIn(5);
            } else if (selectedPaymentMethod == "PayUmoney") {
                $('#stripe-section').fadeOut();
                $('#razorpay-section').fadeOut();
                $('#payumoney-section').fadeIn(5);
            } else if (data.indexOf(selectedPaymentMethod) !== -1) {
                $('#stripe-section').fadeOut();
                $('#razorpay-section').fadeOut();
                $('#payumoney-section').fadeOut();
                //ajax call for instructions
                let name = selectedPaymentMethod;
                let formData = new FormData();
                formData.append('name', name);
                $.ajax({
                    url: '{{route('front.payment.instructions')}}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    cache: false,
                    data: formData,
                    success: function (data) {
                        console.log(data);
                        let instruction = $("#instructions");
                        let instructions = `<div class="gateway-desc">${data.instructions}</div>`;
                        let description = `<div class="gateway-desc"><p>${data.description}</p></div>`;
                        let receipt = `<div class="form-element mb-2">
                                        <label>Receipt  <span>**</span> </label>
                                        <input type="file" name="receipt" value="" class="file-input">
                                        <p class="mb-0 text-warning">** Receipt image must be .jpg / .jpeg / .png</p>
                                    </div>`;
                        if (data.is_receipt === 1) {
                            $("#is_receipt").val(1);
                            let finalInstruction = instructions + description + receipt;
                            instruction.html(finalInstruction);
                        } else {
                            $("#is_receipt").val(0);
                            let finalInstruction = instructions + description;
                            instruction.html(finalInstruction);
                        }
                        $('#instructions').fadeIn();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                })
            } else {
                $('#stripe-section').fadeOut();
                $('#razorpay-section').fadeOut();
                $('#payumoney-section').fadeOut();
                $('#instructions').fadeOut();
            }
        });
    });
</script>
@endsection
