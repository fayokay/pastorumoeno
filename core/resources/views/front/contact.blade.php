@extends("front.$version.layout")

@section('pagename')
- {{__('Contact Us')}}
@endsection

@section('meta-keywords', "$be->contact_meta_keywords")
@section('meta-description', "$be->contact_meta_description")

@section('breadcrumb-title', $bs->contact_title)
@section('breadcrumb-subtitle', $bs->contact_subtitle)
@section('breadcrumb-link', __('Contact Us'))

@section('content')

<!-- contact-area-start -->
        <div class="contact-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="contact-wrapper mb-30">
                            <h1 class="contact-title">Get In Touch</h1>
                            
                            <div class="contact-text">
                                <h1><span>(General Office)</span></h1>
                                <ul class="contact-link">
                                    @php
                                        $addresses = explode(PHP_EOL, $bex->contact_addresses);
                                    @endphp
                                    @foreach ($addresses as $address)
                                    <li>{{$address}}</li>
                                    @endforeach
                                    @php
                                        $mails = explode(',', $bex->contact_mails);
                                    @endphp
                                    @foreach ($mails as $mail)
                                    <li>{{$mail}}</li>
                                    @endforeach
                                    @php
                                        $phones = explode(',', $bex->contact_numbers);
                                    @endphp
                                    @foreach ($phones as $phone)
                                    <li>{{$phone}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="contact2-wrapper mb-30">
                            <h1 class="contact-title">Contact Us</h1>
                            <form action="#" id="contact-form">
                                <div class="row">
                                    <div class="col-xl-12 mb-20">
                                        <input name="name" placeholder="Name :" type="text">
                                    </div>
                                    <div class="col-xl-12 mb-30">
                                        <input name="email" placeholder="Email :" type="email">
                                    </div>
                                    <div class="col-xl-12 mb-35">
                                        <textarea name="message" cols="30" rows="10" placeholder="Mesage :" id="message"></textarea>
                                    </div>
                                    <div class="col-xl-12">
                                        <button class="btn" type="submit">Send message</button>
                                    </div>
                                </div>
                                <p class="form-message"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area-end -->
@endsection
