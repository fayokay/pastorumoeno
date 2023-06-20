@extends('user.layout')

@section('pagename')
 - {{__('Supporters Dashboard')}}
@endsection

@section('content')

    <!--   hero area start   -->
    <div class="breadcrumb-area services service-bg" style="background-image: url('{{asset  ('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
        <div class="container">
            <div class="breadcrumb-txt">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-sm-10">
                        <h1>{{__('Supporters Dashboard')}}</h1>
                        <ul class="breadcumb">
                            <li>{{__('Dashboard')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area-overlay"></div>
    </div>
    <!--   hero area end    -->
 <!--====== CHECKOUT PART START ======-->
 <section class="user-dashbord">
    <div class="container">
        <div class="row">
            @include('user.inc.site_bar')
            <div class="col-lg-9">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="row">
                             <div class="col-md-6 mb-4">
                                <a class="card card-box box-1 user" href="{{route('user-supporters')}}">
                                    <div class="card-info">
                                        <h4>{{__('Registered Members')}}</h4>
                                        <p>{{App\Quote::where('verified', 'Yes')->where('ref',Auth::user()->id)->count()}}</p>
                                    </div>
                                </a>
                            </div>
                           
                            <!-- <div class="col-md-6">
                                <a class="card card-box box-2 mb-4 product" href="#">
                                    <div class="card-info">
                                        <h4>{{__('LGAs')}}</h4>
                                        <p>{{$lgacnt}}/31</p>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-6">
                                <a class="card card-box box-3 course" href="#">
                                    <div class="card-info">
                                        <h4>{{__('Wards')}}</h4>
                                        <p>{{$wardscnt}}/329</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-4">
                                <a class="card card-box box-5" href="#">
                                    <div class="card-info">
                                        <h4>{{__('Polling Units')}}</h4>
                                        <p>{{$unitscnt}}/4353</p>
                                    </div>
                                </a>
                            </div> -->
                          
                           @if ($bex->is_event == 1)
                            <div class="col-md-6 mb-4">
                                <a class="card card-box box-3 event" href="{{route('user-events')}}">
                                    <div class="card-info">
                                        <h4>{{__('Event Bookings')}}</h4>
                                        <p>{{App\EventDetail::where('user_id',Auth::user()->id)->count()}}</p>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="user-profile-details">
                            <div class="account-info">
                                <div class="title">
                                    <h4>{{__('Your Supporters Referral Link')}}</h4>
                                </div>

                                    <p> Use the link below to invite supporters to register and count for you.</p>
                                <div class="main-info">
                                    <h5><a href="{{route('front.quote', ['ref'=>$user->id])}}" target="_blank"> {{route('front.quote', ['ref'=>$user->id])}}</a></h5>
                                    <!-- <ul class="list">
                                        <li><span>{{__('Email')}}:</span></li>
                                        <li><span>{{__('Phone')}}:</span></li>
                                        <li><span>{{__('City')}}:</span></li>
                                        <li><span>{{__('State')}}:</span></li>
                                        <li><span>{{__('Address')}}:</span></li>
                                        <li><span>{{__('Country')}}:</span></li>
                                    </ul>
                                    <ul class="list">
                                        <li>{{convertUtf8($user->email)}}</li>
                                        <li>{{convertUtf8($user->number)}}</li>
                                        <li>{{convertUtf8($user->fax)}}</li>
                                        <li>{{convertUtf8($user->city)}}</li>
                                        <li>{{convertUtf8($user->state)}}</li>
                                        <li>{{convertUtf8($user->address)}}</li>
                                        <li>{{convertUtf8($user->country)}}</li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                @if ($bex->is_shop == 1)
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="account-info">
                                <div class="title">
                                    <h4>{{__('Recent Orders')}}</h4>
                                </div>
                                <div class="main-info">
                                    <div class="main-table">
                                        <div class="table-responsiv">
                                            <table id="ordersTable" class="dataTables_wrapper dt-responsive table-striped dt-bootstrap4" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>{{__('Order number')}}</th>
                                                        <th>{{__('Date')}}</th>
                                                        <th>{{__('Total Price')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @if($orders)
                                                        @foreach ($orders as $order)
                                                        <tr>
                                                        <td>{{$order->order_number}}</td>
                                                            <td>{{$order->created_at->format('d-m-Y')}}</td>
                                                            <td>{{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}} {{$order->total}} {{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}</td>
                                                            <td><a href="{{route('user-orders-details',$order->id)}}" class="btn">{{__('Details')}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr class="text-center">
                                                            <td colspan="4">
                                                                {{__('No Orders')}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endif


                    <!-- <div class="counter-area pt-140 pb-110" style="background-image:url('{{asset('assets/front/img/'.$be->statistics_bg)}}')"> -->
            <div class="counter-area pt-50 pb-50" style="background-image:url('{{asset('assets/front/img/'.$be->statistics_bg)}}'); ">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-3 cl-lg-4 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter2">{{$lgacnt}}</h1>
                                <span>31 LGAs</span>
                            </div>
                        </div>
                    </div>

                     <div class="col-xl-3 cl-lg-4 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter2">{{$wardscnt}}</h1>
                                <span>329 Wards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 cl-lg-4col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter2">{{$unitscnt}}</h1>
                                <span>4353 Units</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 cl-lg-4col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter2">{{App\Quote::where('verified', 'Yes')->where('ref',Auth::user()->id)->count()}}</h1>
                                <span>{{$unitscnt+450}} Volunteers</span>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>

            <!-- </div> -->
        </div>
    </div>


</section>
  
<script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>


        <script src="{{asset('assets/front/politics/js/waypoints.min.js')}}"></script>
 <script src="{{asset('assets/front/politics/js/jquery.counterup.min.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('assets/user/js/main.js')}}"></script>

    <script>
     

      /* counter */
$('.counter').counterUp({
    delay: 10,
    time: 1000
});
    </script>     
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            responsive: true,
            ordering: false
        });
    });
</script>
@endsection
