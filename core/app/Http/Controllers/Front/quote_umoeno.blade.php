@extends("front.$version.layout")

@section('pagename')
 - {{__('Join Us')}}
@endsection

@section('meta-keywords', "$be->quote_meta_keywords")
@section('meta-description', "$be->quote_meta_description")

@section('breadcrumb-title', $bs->quote_title)
@section('breadcrumb-subtitle', $bs->quote_subtitle)
@section('breadcrumb-link', __('Bo Eno'))

@section('content')


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
          <form action="{{route('front.sendquote')}}" enctype="multipart/form-data" method="POST"  id="volunteer-form">
            @csrf
            <h3> kindly complete the form below to register as teamumoeno support member. You would be sent a verification email, ensure your email address is correct. </h3>
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('First Name')}} <span>**</span></label>
                        <input name="name" type="text" value="{{old("name")}}" placeholder="{{__('Enter First Name')}}">

                        @if ($errors->has("name"))
                        <p class="text-danger mb-0">{{$errors->first("name")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Last Name')}} <span>**</span></label>
                        <input name="lname" type="text" value="{{old("lname")}}" placeholder="{{__('Enter Last Name')}}">

                        @if ($errors->has("lname"))
                        <p class="text-danger mb-0">{{$errors->first("lname")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-element mb-4">
                        <label>{{__('Email')}} <span>**</span></label>
                        <input name="email" type="text" value="{{old("email")}}" placeholder="{{__('Enter Email Address')}}">

                        @if ($errors->has("email"))
                        <p class="text-danger mb-0">{{$errors->first("email")}}</p>
                        @endif
                    </div>
                </div>

                @foreach ($inputs as $input)
                    <div class="{{$input->type == 4 || $input->type == 3 ? 'col-lg-12' : 'col-lg-6'}}">
                        <div class="form-element mb-4">
                            @if ($input->type == 1)
                                <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                <input name="{{$input->name}}" type="text" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}">
                            @endif

                            @if ($input->type == 2)
                                <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                <select name="{{$input->name}}">
                                    <option value="" selected disabled>{{convertUtf8($input->placeholder)}}</option>
                                    @foreach ($input->quote_input_options as $option)
                                        <option value="{{convertUtf8($option->name)}}" {{old("$input->name") == convertUtf8($option->name) ? 'selected' : ''}}>{{convertUtf8($option->name)}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if ($input->type == 3)
                                <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                @foreach ($input->quote_input_options as $option)
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" id="customCheckboxInline{{$option->id}}" name="{{$input->name}}[]" class="custom-control-input" value="{{convertUtf8($option->name)}}" {{is_array(old("$input->name")) && in_array(convertUtf8($option->name), old("$input->name")) ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customCheckboxInline{{$option->id}}">{{convertUtf8($option->name)}}</label>
                                    </div>
                                @endforeach
                            @endif

                            @if ($input->type == 4)
                                <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                <textarea name="{{$input->name}}" id="" cols="30" rows="10" placeholder="{{convertUtf8($input->placeholder)}}">{{old("$input->name")}}</textarea>
                            @endif

                            @if ($input->type == 6)
                                <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                <input class="datepicker" name="{{$input->name}}" type="text" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}" autocomplete="off">
                            @endif

                            @if ($input->type == 7)
                                <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                <input class="timepicker" name="{{$input->name}}" type="text" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}" autocomplete="off">
                            @endif

                            @if ($input->type == 5)
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-element mb-2">
                                  <label>{{$input->label}} @if($input->required == 1) <span>**</span> @endif</label>
                                  <input type="file" name="{{$input->name}}" value="">
                                </div>
                                <p class="text-warning mb-0">** {{__('Only zip file is allowed')}}</p>
                              </div>
                            </div>
                            @endif

                            @if ($errors->has("$input->name"))
                            <p class="text-danger mb-0">{{$errors->first("$input->name")}}</p>
                            @endif


                        </div>
                    </div>
                @endforeach
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Year of Birth')}} <span>**</span></label>
                        <select name="yearob" class="form-control" id="yearob">
                            <option value=""></option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                            <option value="1919">1919</option>
                            <option value="1918">1918</option>
                            <option value="1917">1917</option>
                            <option value="1916">1916</option>
                            <option value="1915">1915</option>
                            <option value="1914">1914</option>
                            <option value="1913">1913</option>
                            <option value="1912">1912</option>
                            <option value="1911">1911</option>
                            <option value="1910">1910</option>
                            <option value="1909">1909</option>
                            <option value="1908">1908</option>
                            <option value="1907">1907</option>
                            <option value="1906">1906</option>
                            <option value="1905">1905</option>
                            <option value="1904">1904</option>
                            <option value="1903">1903</option>
                            <option value="1902">1902</option>
                            <option value="1901">1901</option>
                            <option value="1900">1900</option>
                        </select>

                        @if ($errors->has("yearob"))
                        <p class="text-danger mb-0">{{$errors->first("yearob")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Gender')}} <span>**</span></label>
                        <select name="gender" class="form-control required" id="gender">
                            <option value="">-</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>

                        @if ($errors->has("gender"))
                        <p class="text-danger mb-0">{{$errors->first("gender")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Occupation')}} <span>**</span></label>
                        <select name="occup" class="form-control" id="occup">
                            <option value="">-</option>
                            <option value="PUBLIC SERVANT">PUBLIC SERVANT</option>
                            <option value="CIVIL SERVANT">CIVIL SERVANT</option>
                            <option value="ARTISAN">ARTISAN</option>
                            <option value="BUSINESS">BUSINESS</option>
                            <option value="STUDENT">STUDENT</option>
                            <option value="FARMING/FISHING">FARMING/FISHING</option>
                            <option value="TRADING">TRADING</option>
                            <option value="OTHER">OTHER</option>
                            <option value="HOUSE WIFE">HOUSE WIFE</option>
                        </select>

                        @if ($errors->has("occup"))
                        <p class="text-danger mb-0">{{$errors->first("occup")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Level of Education')}} <span>**</span></label>
                        <select name="edulevel" class="form-control" id="edulevel">
                            <option value="">-</option>
                            <option value="Not Specified">Not Specified</option>
                            <option value="None">None</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Tertiary">Tertiary</option>
                            <option value="Others">Others</option>
                        </select>

                        @if ($errors->has("edulevel"))
                        <p class="text-danger mb-0">{{$errors->first("edulevel")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Home Address')}} <span>**</span></label>
                        <input name="haddress" type="text" value="{{old("haddress")}}" placeholder="{{__('Home Address')}}">

                        @if ($errors->has("haddress"))
                        <p class="text-danger mb-0">{{$errors->first("haddress")}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>LGA (Where you normally vote) <span>**</span></label>
                        <select
                              name="lga"
                              id="lga"
                              class="form-control select-lga  select2 dynamic2"
                              required
                            >
                            <option value="">Select LGA</option>
                            @foreach($lgas as $lga)
                                <option value="{{$lga->lga}}"> {{$lga->lga}} </option>
                            @endforeach
                            </select>

                        @if ($errors->has("lga"))
                        <p class="text-danger mb-0">{{$errors->first("lga")}}</p>
                        @endif
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>Ward (Where you normally vote) <span>**</span></label>
                            <select name="ward" class="form-control select2 dynamic3" id="ward"> </select>

                        @if ($errors->has("ward"))
                        <p class="text-danger mb-0">{{$errors->first("ward")}}</p>
                        @endif
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-element mb-4">
                        <label>{{__('Polling Unit')}} (Where you normally vote) <span>**</span></label>
                        <select name="pu" class="form-control" id="pu"> </select>

                        @if ($errors->has("pu"))
                        <p class="text-danger mb-0">{{$errors->first("pu")}}</p>
                        @endif
                    </div>
                    <input type="hidden" name="ref" value="{{request()->query('ref')}}">
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
                <button class="btn btn-primary" type="submit" name="button">{{__('Submit')}}</button>
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
@endsection
