<div class="hero_area">
    <div class="bg-box">
          <img src="{{asset('images/banner').'/'.$banners[0]->image}}" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section" style="background-color:black">
      <div class="container" >
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{route('frontend.index')}}">
            @foreach($settings as $row)
            <span>
              <img src="{{asset('images/logo').'/'.$row->logo }}">
            </span>
            @endforeach
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('frontend.index')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('frontend.menu')}}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('frontend.about')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://squareup.com/gift/ML391HJ0HKN6Y/order">Gift Card</a>
              </li>
              <li class="dropdown nav-item">
                <a  class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Media</a>
                <ul class="dropdown-menu" style="padding:0.2rem 0;min-width:9rem;">
                    <a class="nav-link" style="color:black;" href="{{route('frontend.gallery')}}">Gallery</a>
                    <a class="nav-link" style="color:black;" href="{{route('frontend.media')}}">Media</a>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('frontend.booktable')}}">Book Table</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="https://base-crave-restaurant.square.site" class="order_online">
                Order Online
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>