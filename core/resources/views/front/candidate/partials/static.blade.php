  <div class="media-holder full-src style-2" data-bg="{{asset('assets/front/img/'.$bs->hero_bg)}}">
      
      <div class="media-inner">
          
        <h1>{!! convertUtf8($bs->hero_section_title) !!}<br>
        <span>{{convertUtf8($bs->hero_section_button_text)}}</span></h1>

        <div class="join-us style-3">

          <p>{{convertUtf8($bs->hero_section_text)}}</p>
      
          <form id="footerSubscribeForm" class="join-form" action="{{route('front.subscribe')}}" method="POST">
             @csrf
            <button type="submit" class="btn btn-style-4 btn-big f-right" data-type="submit">Subscribe</button>
            <div class="input-holder">
              <input type="email" name="email" placeholder="Email address" size="50">
                    <p id="erremail" class="text-danger mb-0 err-email"></p>
            </div>
          </form>

        </div>

      </div>

      <ul class="social-icons style-2 v-type">

        <li><a href="#"><i class="icon-facebook"></i></a></li>
        <li><a href="#"><i class="icon-twitter"></i></a></li>
        <li><a href="#"><i class="icon-instagram-5"></i></a></li>
        <li><a href="#"><i class="icon-youtube-play"></i></a></li>
        <li><a href="#"><i class="icon-flickr"></i></a></li>
        <li><a href="#"><i class="icon-snapchat-ghost"></i></a></li>

      </ul>

    </div>




  