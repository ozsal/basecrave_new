@include('frontend.layouts.header')

<body>

  @include('frontend.layouts.navbar')
    <!-- end header section -->
    <!-- slider section -->
    @yield('content')

  <!-- end client section -->

  @include('frontend.layouts.footer')

</body>

</html>