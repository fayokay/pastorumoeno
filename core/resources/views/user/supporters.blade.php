@extends('user.layout')

@section('pagename')
 - {{__('Registered Members')}}
@endsection

@section('content')
  <!--   hero area start   -->
  <div class="breadcrumb-area services service-bg" style="background-image: url('{{asset  ('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="breadcrumb-txt">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-sm-10">
                    <h1>{{__('Registered Supporters')}}</h1>
                    <ul class="breadcumb">
                        <li><a href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a></li>
                        <li>{{__('Registered Supporters')}}</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user-profile-details">
                            <div class="account-info">
                                <div class="title">
                                    <h4>{{__('Registered Supporters')}}</h4>
                                </div>
                                <div class="main-info">
                                    <div class="main-table">
                                    <div class="table-responsiv">
                                        <table id="eventsTable" class="dataTables_wrapper dt-responsive table-striped dt-bootstrap4" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Email')}}</th>
                                                    <th>{{__('Phone No.')}}</th>
                                                    <th>{{__('Gender')}}</th>
                                                    <th>{{__('Occupation')}}</th>
                                                    <th>{{__('LGA')}}</th>
                                                    <th>{{__('Ward')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($events)
                                                @foreach ($events as $event)
                                                 @php
                                                    $fields = json_decode($event->fields, true);
                                                  @endphp
                                                <tr>
                                                    <td>{{$event->name}}</td>
                                                     <td>xxxxxxxxxx<!-- {{$event->email}} --></td>
                                                     <td>xxxxxxxxxx<!-- {{ $fields['Phone_Number']['value']}} --></td>
                                                    <td>{{$event->gender}}</td>
                                                    <td>xxxxxxxxxx<!-- {{$event->occup}} --></td>
                                                    <td>{{$event->lga}}</td>
                                                    <td>{{$event->ward}}</td>
                                                    <!-- <td>
                                                        <a href="{{route('user-event-details', $event->id)}}" class="btn base-bg text-white">{{__('Details')}}</a>
                                                    </td> -->
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr class="text-center">
                                                    <td colspan="4">
                                                        {{__('You have not registered anybody')}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--    footer section start   -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#eventsTable').DataTable({
            responsive: true,
            ordering: false
        });
    });
</script>
@endsection

