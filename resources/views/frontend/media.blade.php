<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('images/profile' .'/'. $profile[0]->favicon)}}" type="">

  <title> BaseCrave </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.min.css')}}" />
  <!-- nice select  -->
  <link rel="stylesheet" href="{{asset('frontend/css/nice-select.min.css')}}" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{asset('frontend/images/hero-bg.jpg')}}" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{route('frontend.index')}}">
          @foreach($settings as $row)
            <span style="color:white">
              <img src="{{asset('images/logo').'/'.$row->logo }}">
            </span>
            @endforeach
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('frontend.index')}}">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('frontend.menu')}}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('frontend.about')}}">About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://squareup.com/gift/ML391HJ0HKN6Y/order">Gift Card</a>
              </li>
              <li class="dropdown nav-item active">
                <a  class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"><span class="sr-only">(current)</span>Media</a>
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
    <!-- end header section -->
  </div>

  <!-- about section -->
  <section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Media Details</h3>
            </div>

            @if($medias->count() == 0)
            <marquee><h1 style="color:red">No media available at the moment.</h1></marquee>
            @else
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                      @foreach($medias->chunk(2) as $key=>$media)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}  ">
                            <div class="row">
                            @foreach($media as $row)
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{asset('images/media').'/'.$row->image }}" style="max-height: 500px !important;padding:18px;">
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align:center;background-color:#97a9a50d; ">{{$row->title}}</h4>
                                            <p class="card-text" style="text-align:justify;background-color:#d1c4e914">{{$row->short_description}} </p>
                                            <a href="{{$row->media_link}}" target="_blank">{{$row->media_link}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
          </div>
    </div>
</section>

  <!-- end about section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
    @foreach($settings as $row)
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="https://goo.gl/maps/xKqr6We3vf6C9CTTA">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  {{$row->location}}
                </span>
              </a>
              <a href="tel:{{$row->phoneno}}">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  {{$row->phoneno}}
                </span>
              </a>
              <a href="mailto:{{$row->gmail}}">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                {{$row->gmail}}
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
            <span>
              <img src="{{asset('images/logo').'/'.$row->logo }}">
            </span>
            </a>
            <p style="font-size:25px;margin-top:-25px">
              Relax! Rejuvenate!
            </p>
            <div class="footer_social">
              <a href="{{$row->fb_link}}">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="{{$row->twitter_link}}">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="{{$row->linkedin_link}}">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="{{$row->instagram_link}}">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <!-- <a href="{{$row->fb_link}}">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a> -->
            </div>
          </div>
        </div>
       
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          @foreach($openinghours as $op)
          <p>
          {{$op->day}} : {{$op->fromtime}} AM – {{$op->totime}} PM
          </p>
          @endforeach
        </div>
      </div>
      @endforeach
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="">Mitho Restaurant</a><br><br>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

<!-- jQery -->
  <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="{{asset('frontend/js/popper.min.js')}}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
  <!-- owl slider -->
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}">
  </script>
  <!-- isotope js -->
  <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
  <!-- nice select -->
  <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('frontend/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>