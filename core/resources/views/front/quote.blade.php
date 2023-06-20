@extends("front.$version.layout")

@section('pagename')
 - {{__('Join Us')}}
@endsection

@section('meta-keywords', "$be->quote_meta_keywords")
@section('meta-description', "$be->quote_meta_description")

@section('breadcrumb-title', $bs->quote_title)
@section('breadcrumb-subtitle', $bs->quote_subtitle)
@section('breadcrumb-link', __('Supporters'))

@section('content')
<style type="text/css">
   #loading {
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
}

#loading-image {
  z-index: 100;
}
}
</style>

<div id="loading" style="display:none">
  <img id="loading-image" src="{{asset('assets/front/candidate/images/ajax_loader.gif')}}" alt="Loading..." />
</div>

  <!--   quote area start   -->
  <div class="quote-area pt-115 pb-115">
    <div class="container">
      <div class="row">
         @if (session('success'))
        <div class="col-md-12">
           
            <div class="alert alert-success" role="alert">
                <p><span>Success!</span> {!! Session::get('success')!!}.</p>
               <!--  <a href="{{url('register')}}" class="btn">Would you like to register to canvass? Click here to register for an account and share your link</a> -->
            </div>
        </div>
        @endif

        <div class="col-lg-12">

        <div class="become-volunteer-wrapper pb-100">
          <form action="{{route('front.sendsupport')}}" enctype="multipart/form-data" method="POST"  id="volunteer-form">
            @csrf
            <h3> kindly complete the form below to register as <b>connect initiative</b> support member. Thank you. </h3>
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('PVC')}} <span style="color:red">*</span></label>
                        <input name="pvc" class="pvcno" id="pvcno" type="text" value="{{old("pvc")}}" placeholder="{{__('Enter PVC')}}">
                        <small class="help-block with-errors text-success" id="pvc_valid"></small>


                        @if ($errors->has("pvc"))
                        <p class="text-danger mb-0">{{$errors->first("pvc")}}</p>
                        @endif
                    </div>
                                    </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Full Name')}}<span style="color:red">*</span></label>
                        <input name="name" type="text" value="{{old("name")}}" placeholder="{{__('Enter Full Name')}}">

                        @if ($errors->has("name"))
                        <p class="text-danger mb-0">{{$errors->first("name")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Email')}} </label>
                        <input name="email" type="text" value="{{old("email")}}" placeholder="{{__('Enter Email Address')}}">

                        @if ($errors->has("email"))
                        <p class="text-danger mb-0">{{$errors->first("email")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Phone Number')}} <span style="color:red">*</span></label>
                        <input name="phone" type="text" value="{{old("phone")}}" placeholder="{{__('Enter Phone Number')}}">

                        @if ($errors->has("phone"))
                        <p class="text-danger mb-0">{{$errors->first("phone")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Village')}} </label>
                        <input name="village" type="text" value="{{old("village")}}" placeholder="{{__('Enter Village')}}">

                        @if ($errors->has("village"))
                        <p class="text-danger mb-0">{{$errors->first("village")}}</p>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="lga" id="lga" />
                <input type="hidden" name="ward" id="ward" />
                <input type="hidden" name="pu" id="pu" />
                <input type="hidden" name="gender" id="gender" />
                <input type="hidden" name="occupation" id="occupation" />

                
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Educational Qualification')}}</label>
                         <input name="educ" type="text" value="{{old("educ")}}" placeholder="{{__('Enter Educational Qualification')}}">

                        @if ($errors->has("educ"))
                        <p class="text-danger mb-0">{{$errors->first("educ")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Current Work/Business')}} </label>
                         <input name="work" type="text" value="{{old("work")}}" placeholder="{{__('Enter Current Work/Business')}}">

                        @if ($errors->has("work"))
                        <p class="text-danger mb-0">{{$errors->first("work")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Area of support required?')}} </label>
                         <input name="support" type="text" value="{{old("support")}}" placeholder="{{__('Enter Current Work/Business')}}">

                        @if ($errors->has("support"))
                        <p class="text-danger mb-0">{{$errors->first("support")}}</p>
                        @endif
                    </div>
                </div>
                                
                                            

                                          
            </div>



            @if ($bs->is_recaptcha == 1)
              <div class="row mb-4">
                <div class="col-lg-12">
                  {!! NoCaptcha::renderJs() !!}
                  {!! NoCaptcha::display() !!}
                  @if ($errors->has('g-recaptcha-response'))
                    @php
                        $errmsg = $errors->first('g-recaptcha-response');
                    @endphp
                    <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                  @endif
                </div>
              </div>
            @endif

            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="subscribes-form">
                <button class="btn btn-primary" type="submit" name="button" id="submit" disabled>{{__('Submit')}}</button>
            </div>
              </div>
            </div>
          </form>
        </div></div>



        <div class="col-lg-12">
            
    </div>



      </div>
    </div>
  </div>
  <!--   quote area end   -->

  <!-- <div class="counter-area pt-140 pb-110" style="background-image:url('{{asset('assets/front/img/'.$be->statistics_bg)}}')">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-4 cl-lg-4 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter">{{$lgacnt}}</h1>
                                <span>31 LGAs</span>
                            </div>
                        </div>
                    </div>

                     <div class="col-xl-4 cl-lg-4 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter">{{$wardscnt}}</h1>
                                <span>329 Wards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 cl-lg-4col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-text">
                                <h1 class="counter">{{$unitscnt}}</h1>
                                <span>4353 Units</span>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div> -->

        <script>
         
</script>
<script src = "https://code.jQuery.com/jQuery-1.11.0.min.js"></script>
    <script>

     

        $(document).ready(function(){

                   
                   $(document).on('keyup', '.pvcno', function(e) {
                    //$('.pvcno').keyup(function(e) {
                    e.preventDefault();
                      var pvc = $(this).val().split("-").join(""); // remove hyphens
                      if (pvc.length > 0) {
                        pvc = pvc.match(new RegExp('.{1,4}', 'g')).join("-");
                      }
                      $(this).val(pvc);
                    });

                   $(document).on('blur', '.pvcno', function(e) {
                   //$(".pvcno").blur(function(e){  
                    e.preventDefault();
                    // vin = $(".pvcno").val();
                    var vin = $(this).val();
                    vin = vin.replaceAll('-', '')

                    var currentId = $(this).data('id');
                    //alert(currentId);

                    $('#loading').show();

                    $.ajax({
                      url: '{{route("pvc-list")}}',
                      type: 'post',
                      data: {_token: "{{ csrf_token() }}", vin: vin},
                      dataType: 'json',
                      success:function(response){
                        console.log(response['lga']);

                         if(response != "0"){
                            var lga = response['lga'];
                            var ward = response['ward'];
                            var pu = response['pu'];
                            var gender = response['gender'];
                            var occupation = response['occupation'];

                            // Set value to textboxes
                            document.getElementById('lga').value = lga;
                            document.getElementById('ward').value = ward;
                            document.getElementById('pu').value = pu;
                            document.getElementById('gender').value = gender;
                            document.getElementById('occupation').value = occupation;
                            //$("#pvc_valid").html('<font color=green>Your PVC/VIN No. format seems valid</font>');
                            $("#pvc_valid").html('<font color=green>Your PVC/VIN No. format seems valid</font>');
                            console.log("Valid"); 
                            $('#loading').hide();
                            document.querySelector('#submit').disabled = false;
                            
         
                         }
                         else{
                            $("#pvc_valid").html('<font color=red>Your PVC/VIN No. format seems invalid or this supporter is already registered</font>');
                            document.querySelector('#submit').disabled = true;
                             $('#loading').hide();
                             console.log("INValid");

                         }
         
                      }
                   });

                });
       

           
        });

    </script>
@endsection

