@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Polling Units Statistical View</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Polling Units Statistical View</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Polling Units Statistical View</a>
      </li>
    </ul>
  </div>

  <div class="row">
    @if(empty($warddata) && empty($pudata))
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
        <div class="row">
          <div class="col-lg-4">
            <div class="card-title d-inline-block">LGA Statistical View</div>
          </div>
          <div class="col-lg-3">
                        <select name="lga" class="form-control"
              onchange="window.location='{{route('admin.statistics.getIncrease','lga') . '/'}}'+this.value">
              <option value="" selected disabled>Select LGA</option>
              @foreach($lga as $list)
                  <option value="{{$list->lga}}">{{$list->lga}}</option>
                  @endforeach
                          </select>
                      </div>
          <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
            <a href="{{route('admin.statistics.getIncrease','lga')}}" class="btn btn-primary float-right btn-sm"><i
                class="fas fa-list"></i> Statistics</a>
          </div>
        </div>
      </div>


        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div id="chartContainer" style="height: 370px; width: 100%;"></div>
               
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">LGA Data</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($lgatable) == 0)
                        <h3 class="text-center">NO DATA FOUND</h3>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped mt-3" id="basic-datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">LGA</th>
                                        <th scope="col">Old Total</th>
                                        <th scope="col">New Total</th>
                                        <th scope="col">Difference</th>
                                        <th scope="col">% Increase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lgatable as  $data_lga)
                                    <tr>
                                        <td>{{$data_lga->lga}}</td>
                                        <td>{{number_format($data_lga->oldtotal)}}</td>
                                        <td>{{number_format($data_lga->total)}}</td>
                                        <td>{{number_format($data_lga->difference)}}</td>
                                        <td>{{$data_lga->y}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif               
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif


    @if(!empty($warddata) && !empty($lgadata) && empty($pudata))
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="row">
          <div class="col-lg-4">
            <div class="card-title d-inline-block">Ward Statistical View</div>
          </div>
          <div class="col-lg-3">
                        <select name="lga" class="form-control"
              onchange="window.location='{{route('admin.statistics.getIncreaseWard',['lga', $lganame]) . '/'}}'+this.value">
              <option value="" selected disabled>Select Ward</option>
              @foreach($warddata as $list)
                  <option value="{{$list->label}}">{{$list->label}}</option>
                  @endforeach
                          </select>
                      </div>
                      <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
            <a href="{{route('admin.statistics.getIncrease','lga')}}" class="btn btn-primary float-right btn-sm"><i
                class="fas fa-list"></i> Back to LGA</a>
          </div>
        </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
               
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">


      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">WARD Data for {{$lganame}}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($wardtable) == 0)
                        <h3 class="text-center">NO DATA FOUND</h3>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped mt-3" id="basic-datatables2">
                                <thead>
                                    <tr>
                                        <th scope="col">Ward</th>
                                        <th scope="col">Old Total</th>
                                        <th scope="col">New Total</th>
                                        <th scope="col">Difference</th>
                                        <th scope="col">% Increase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wardtable as  $data_lga)
                                    <tr>
                                        <td>{{$data_lga->ward}}</td>
                                        <td>{{number_format($data_lga->oldtotal)}}</td>
                                        <td>{{number_format($data_lga->total)}}</td>
                                        <td>{{number_format($data_lga->difference)}}</td>
                                        <td>{{$data_lga->y}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif               
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
     @if(!empty($pudata) && !empty($warddata) && !empty($lgadata))
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
         <div class="row">
          <div class="col-lg-4">
            <div class="card-title d-inline-block">Ward Statistical View</div>
          </div>
          <div class="col-lg-3">

                      </div>
                      <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
            <a href="{{url()->previous()}}" class="btn btn-primary float-right btn-sm"><i
                class="fas fa-list"></i> Back to Ward</a>
          </div>
        </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
               
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">PU Data for {{$wardname}}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($putable) == 0)
                        <h3 class="text-center">NO DATA FOUND</h3>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped mt-3" id="basic-datatables3">
                                <thead>
                                    <tr>
                                        <th scope="col">Polling Unit</th>
                                        <th scope="col">Ward</th>
                                        <th scope="col">Old Total</th>
                                        <th scope="col">New Total</th>
                                        <th scope="col">Difference</th>
                                        <th scope="col">Unit Type</th>
                                        <th scope="col">% Increase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($putable as  $data_lga)
                                    <tr>
                                        <td>{{$data_lga->pu}}</td>
                                        <td>{{$data_lga->ward}}</td>
                                        <td>{{number_format($data_lga->oldtotal)}}</td>
                                        <td>{{number_format($data_lga->total)}}</td>
                                        <td>{{number_format($data_lga->difference)}}</td>
                                        <td>{{$data_lga->status}}</td>
                                        <td>{{$data_lga->y}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif               
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif


  


  

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
 @if(empty($warddata) && empty($pudata)) 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title: {
    text: "LGA Percentage Increase"
  },
  axisY: {
    suffix: "%",
    scaleBreaks: {
      autoCalculate: true
    }
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0\"%\"",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($lgadata, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

@endif

@if(!empty($warddata) && !empty($lgadata) && empty($pudata))
////////////////////////////WARD////////////////////////////////
var chart = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  theme: "light2",
  title: {
    text: "WARD Percentage Increase <?php echo $lganame;?>"
  },
  axisY: {
    suffix: "%",
    scaleBreaks: {
      autoCalculate: true
    }
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0\"%\"",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($warddata, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
@endif

@if(!empty($pudata) && !empty($warddata) && !empty($lgadata))
////////////////////////////WARD////////////////////////////////
var chart = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  theme: "light2",
  title: {
    text: "PU Percentage Increase <?php echo $wardname;?>"
  },
  axisY: {
    suffix: "%",
    scaleBreaks: {
      autoCalculate: true
    }
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0\"%\"",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($pudata, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
@endif
 
}
</script>
  
@endsection
