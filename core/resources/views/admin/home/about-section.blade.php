@extends('admin.layout')

@if(!empty($abs->language) && $abs->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select,
    select {
        direction: rtl;
    }
    form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
  <div class="page-header">
    <h4 class="page-title">About Section</h4>
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
        <a href="#">Home Page</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">About Section</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">Update About Section</div>
                </div>
                <div class="col-lg-2">
                    @if (!empty($langs))
                        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>Select a Language</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pt-5 pb-4">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">

              <form id="ajaxForm" action="{{route('admin.aboutsection.update', $lang_id)}}" method="post">
                @csrf

                <div class="row">
                    <div class="{{$be->theme_version == 'logistic' || $be->theme_version == 'lawyer' ? 'col-lg-6' : 'col-lg-12'}}">

                        {{-- Image Part --}}
                        <div class="form-group">
                            <label for="">Image ** </label>
                            <br>
                            <div class="thumb-preview" id="thumbPreview1">
                                <img src="{{asset('assets/front/img/'.$abs->about_bg)}}" alt="Image">
                            </div>
                            <br>
                            <br>


                            <input id="fileInput1" type="hidden" name="image">
                            <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false" data-toggle="modal" data-target="#lfmModal1">Choose Image</button>


                            <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                            <p class="text-danger mb-0 em" id="errimage"></p>

                            <!-- Image LFM Modal -->
                            <div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
                                <i class="fas fa-times-circle"></i>
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <iframe src="{{url('laravel-filemanager')}}?serial=1" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   
                        <div class="col-lg-6">

                            {{-- Image 2 Part --}}
                            <div class="form-group">
                                <label for="">Image 2 ** </label>
                                <br>
                                <div class="thumb-preview" id="thumbPreview2">
                                    <img src="{{asset('assets/front/img/'.$abe->about_bg2)}}" alt="Image">
                                </div>
                                <br>
                                <br>


                                <input id="fileInput2" type="hidden" name="image_2">
                                <button id="chooseImage2" class="choose-image btn btn-primary" type="button" data-multiple="false" data-toggle="modal" data-target="#lfmModal2">Choose Image</button>


                                <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                <p class="text-danger mb-0 em" id="errimage_2"></p>

                                <!-- Image 2 LFM Modal -->
                                <div class="modal fade lfm-modal" id="lfmModal2" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
                                    <i class="fas fa-times-circle"></i>
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <iframe src="{{url('laravel-filemanager')}}?serial=2" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Title **</label>
                          <input type="text" class="form-control" name="about_section_title" value="{{$abs->about_section_title}}">
                          <p id="errabout_section_title" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Video Link </label>
                          <input type="text" class="form-control ltr" name="about_section_video_link" value="{{$abs->about_section_video_link}}">
                          <p class="text-warning mb-0">Link will be formatted automatically after submitting form.</p>
                          <p id="errabout_section_video_link" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Text **</label>
                            <input name="about_section_text" class="form-control" value="{{$abs->about_section_text}}">
                            <p id="errabout_section_text" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Text2 **</label>
                            <input name="about_section_text2" class="form-control" value="{{$abs->about_section_text2}}">
                            <p id="errabout_section_text2" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Text3 **</label>
                            <input name="about_section_text3" class="form-control" value="{{$abs->about_section_text3}}">
                            <p id="errabout_section_text3" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Text4 **</label>
                            <textarea id="serviceContent" class="form-control summernote" name="about_section_text4" data-height="300" placeholder="Enter content">{{$abs->about_section_text4}}</textarea>
                            <p id="errabout_section_text4" class="mb-0 text-danger em"></p>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Button Text</label>
                            <input type="text" class="form-control" name="intro_section_button_text" value="{{$abs->intro_section_button_text}}">
                            <p id="errintro_section_button_text" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Button URL</label>
                            <input type="text" class="form-control ltr" name="intro_section_button_url" value="{{$abs->intro_section_button_url}}">
                            <p id="errintro_section_button_url" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div> -->
              </form>

            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
