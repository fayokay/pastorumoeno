<!-- header-start -->
        <!-- header-start -->
        <header>
            <!-- header-top-area-start -->
            <div class="header-top-area pt-15 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="header-wrapper">
                                <div class="header-text">
                                    <span><i class="fas fa-headphones"></i> {{$bs->support_phone}}</span>
                                    <span><i class="fas fa-envelope"></i> {{$bs->support_email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="header-wrapper">
                                <div class="header-icon text-md-right">
                                    @foreach ($socials as $key => $social)
                                    <a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a>
                                    @endforeach
                                   
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top-area-end -->
            <div id="sticky-header" class="main-menu-area black-menu" style="background-color:#022F18;">                          
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo2">
                                <a href="{{route('front.index')}}"><img src="{{asset('assets/front/img/'.$bs->logo)}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="@guest col-xl-10 col-lg-10 @else col-xl-10 col-lg-10 @endguest">
                            <div class="main-menu text-right">
                                <nav id="mobile-menu">
                                    @php
                                        $links = json_decode($menus, true);
                                        //  dd($links);
                                    @endphp
                                    <ul>
                                        @foreach ($links as $link)
                                            @php
                                                $href = getHref($link);
                                            @endphp

                                            @if (strpos($link["type"], '-megamenu') !==  false)
                                                @includeIf('front.gym.partials.mega-menu')

                                            @else

                                                @if (!array_key_exists("children",$link))
                                                    {{--- Level1 links which doesn't have dropdown menus ---}}
                                                    @if($link["text"]=="Join Us" && Auth::user())
                                                    <li class=""><a href="{{route('user-dashboard')}}">Dashboard </a></li>
                                                    @else

                                                    <li class=""><a href="{{$href}}">{{$link["text"]}} </a></li>
                                                    @endif
                                                @else
                                                <li>
                                                     {{--- Level1 links which has dropdown menus ---}}
                                                        <a href="{{$href}}" target="{{$link["target"]}}">{{$link["text"]}}</a>
                                               
                                                    <ul class="sub-menu text-left">
                                                        {{-- START: 2nd level links --}}
                                                            @foreach ($link["children"] as $level2)
                                                                @php
                                                                    $l2Href = getHref($level2);
                                                                @endphp
                                                        <li  @if(array_key_exists("children", $level2)) class="submenus" @endif>
                                                             <a  href="{{$l2Href}}" target="{{$level2["target"]}}">{{$level2["text"]}}</a>

                                                                    {{-- START: 3rd Level links --}}
                                                                    @php
                                                                        if (array_key_exists("children", $level2)) {
                                                                            create_menu($level2);
                                                                        }
                                                                    @endphp
                                                                    {{-- END: 3rd Level links --}}
                                                        </li>
                                                        @endforeach
                                                            {{-- END: 2nd level links --}}
                                                    </ul>
                                                </li>
                                        @endif


                                            @endif



                                        @endforeach
                                         @guest <li><a class="" href="{{route('user.login')}}">Login</a></li>@endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- @guest
                        <div class="col-xl-2 col-lg-2">
                            <div class="header-button text-right d-none d-md-none d-lg-block">
                                <a class="btn" href="{{route('user.login')}}">Login</a>
                                <!-- <a class="btn" href="{{route('front.quote',['id' => 5])}}">Join Supporters</a> -->
                            </div>
                        </div>
                        @endguest -->
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->