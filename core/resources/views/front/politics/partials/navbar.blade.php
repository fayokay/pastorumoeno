<!-- header-start -->
        <header class="header-transparent"> 
            <!-- header-top-area-end -->
            <div id="sticky-header" class="main-menu-area pt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{route('front.index')}}"><img src="{{asset('assets/front/img/'.$bs->logo)}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            
                            <div class="main-menu text-right f-right">
                                <nav id="mobile-menu">
                                    
                                    <ul>
                                        @php
                                        $links = json_decode($menus, true);
                                        //  dd($links);
                                    @endphp
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
                                        @guest
                                        <li>
                                        <a class="" href="{{route('user.login')}}">Login</a></li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="extra-info">
                <div class="close-icon">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index.html">
                        <img src="img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-menu mb-30">
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                        </li>
                        <li>
                            <a href="#">Blog Details</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="instagram">
                    <a href="#">
                        <img src="img/instagram/1.jpg" alt="">
                    </a>
                    <a href="#">
                        <img src="img/instagram/2.jpg" alt="">
                    </a>
                    <a href="#">
                        <img src="img/instagram/3.jpg" alt="">
                    </a>
                    <a href="#">
                        <img src="img/instagram/4.jpg" alt="">
                    </a>
                    <a href="#">
                        <img src="img/instagram/5.jpg" alt="">
                    </a>
                    <a href="#">
                        <img src="img/instagram/6.jpg" alt="">
                    </a>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div> -->
        </header>
        <!-- header-end -->