 <!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

  <div id="wrapper" class="wrapper-container">

    <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

    <nav id="mobile-advanced" class="mobile-advanced"></nav>

    <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

    <header id="header" class="sticky-header style-2">

      <!-- top-header -->

      <div class="top-header">

        <!-- logo -->

        <div class="logo-wrap">

          <a href="{{route('front.index')}}" class="logo"><img src="{{asset('assets/front/img/'.$bs->logo)}}" alt=""></a>

        </div>

        <!--main menu-->

        <div class="menu-holder">
          
          <div class="menu-wrap">

            <div class="nav-item">
              
              <!-- - - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - - - -->

              <nav id="main-navigation" class="main-navigation">
                <ul id="menu" class="clearfix">
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

          <li><a href="{{$href}}" target="{{$link["target"]}}">{{$link["text"]}}</a></li>
            <!--sub menu-->
            @else
             <li class="dropdown">
                {{--- Level1 links which has dropdown menus ---}}
                <a href="{{$href}}" target="{{$link["target"]}}">{{$link["text"]}}</a>
              <!--sub menu-->
              <div class="sub-menu-wrap">
                <ul>
                    {{-- START: 2nd level links --}}
                    @foreach ($link["children"] as $level2)
                        @php
                            $l2Href = getHref($level2);
                        @endphp
                  <li @if(array_key_exists("children", $level2)) @endif><a  href="{{$l2Href}}" target="{{$level2["target"]}}">{{$level2["text"]}}</a>

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
              </div>
            </li>
            @endif


            @endif



        @endforeach
                </ul>
              </nav>

              <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->

              <a href="#" class="btn btn-style-6 btn-big">Donate</a>

            </div>

          </div>

        </div>

      </div>
      
    </header>

    <!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

      
      