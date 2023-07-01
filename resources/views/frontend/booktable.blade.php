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
              <li class="nav-item">
                <a class="nav-link" href="{{route('frontend.index')}}">Home </a>
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
              <li class="nav-item active">
                <a class="nav-link" href="{{route('frontend.booktable')}}">Book Table <span class="sr-only">(current)</span> </a>
              </li>
            </ul>
            <div class="user_option">
              <a href="https://base-crave-restaurant.square.site/" class="order_online">
                Order Online
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
           @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="{{route('reservation')}}" method="POST">
              @csrf
              <div>
                <input type="text" class="form-control" placeholder="Your Name" name="name" required/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number"  name="phonenumber" required/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" name="email" required />
              </div>
              <div>
                <input type="number" class="form-control" name="numberofpeople" placeholder="How many persons?">
              </div>
              <div>
                <input type="date" class="form-control" name="date" required>
              </div>
              <div class="btn_box">
                <button type="submit">
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            @foreach($settings as $row)
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2947.1903849948108!2d-71.140239984582!3d42.38109057918547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e37773eddc6efb%3A0x2f8c7e137c083048!2s344%20Huron%20Ave%2C%20Cambridge%2C%20MA%2002138%2C%20USA!5e0!3m2!1sen!2snp!4v1655716848125!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            @endforeach
          </div>
        </div>
        
        <div class="col-md-12" style="margin-top:20px">
            <h2>{{ $settings[0]->footer_text}}</h2>
        </div>
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