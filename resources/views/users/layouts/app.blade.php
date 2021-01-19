<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir = {{ isArabic()? "rtl" : ""}}>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{__('Sihr Al Sharq')}}</title>

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset("assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">





  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">


</head>
<style>
    .toto:hover{
        text-decoration: none;

        color:white;
    }
</style>
<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top header-inner-pages">
    <div class="container d-flex">
      <div class="contact-info {{isArabic()?"ml-auto":"mr-auto"}}">
        <i class="icofont-envelope"></i> <a href="mailto:{{App\Models\Contact::find(1)->email}}">{{App\Models\Contact::find(1)->email}}</a>
        <i class="icofont-phone"></i>{{App\Models\Contact::find(1)->phone}}
      </div>
      <div class="social-links">
              @if(App\Models\Contact::find(1)->facebook)
              <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
              @endif
              @if(App\Models\Contact::find(1)->twitter)
              <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
              @endif
              @if(App\Models\Contact::find(1)->instagram)
              <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
              @endif
              @if(App\Models\Contact::find(1)->linked_in)
              <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              @endif
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h2 class="logo {{isArabic()? "ml-auto":"mr-auto"}}"><a class="toto" href="{{route('users.home')}}">{{__('Al Sharq')}}</a></h2>
      <!-- Uncomment below if you prefer to use an images logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block " style="">
        <ul>
          @guest
              @if (Route::has('login'))
                <li class="nav-item">
                    <a class="toto" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="toto" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif

                <li class="nav-item"><a class="toto" href="{{route('questionnaires.index')}}">{{__('Questionnaires')}}</a></li>

                  @php $locale = session()->get('locale'); @endphp
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="toto dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          @switch($locale)
                              @case('ar')
                              <img src="{{asset('assets/img/ar.png')}}" width="30px" height="20x"> {{__('Arabic')}}
                              @break
                              @default('en')
                              <img src="{{asset('assets/img/us.jpg')}}" width="30px" height="20x"> {{__('English')}}

                          @endswitch
                      </a>

                      <div class="dropdown-menu" style="background: #0c0c0c; width:50px;" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item toto {{isArabic()? "text-right":""}}" href="lang/en"><img src="{{asset('assets/img/us.jpg')}}" width="30px" height="20x">  {{__('English')}}</a>
                          <hr>
                          <a class="dropdown-item toto {{isArabic()? "text-right":""}}" href="lang/ar"><img src="{{asset('assets/img/ar.png')}}" width="30px" height="20x">  {{__('Arabic')}}</a>
                      </div>
                  </li>

          @else
          <li class="nav-item"><a class="toto" href="{{route('users.home')}}">{{__('Home')}}</a> </li>
          <li><a class="toto" href="{{route('profiles.index')}}">{{__('Profile')}}</a></li>
          <li><a class="toto" href="{{route('questionnaires.index')}}">{{__('Questionnaires')}}</a></li>
            <li class="nav-item">
                <a class="toto" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
            </li>
                @php $locale = session()->get('locale'); @endphp
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="toto dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @switch($locale)
                            @case('ar')
                            <img src="{{asset('assets/img/ar.png')}}" width="30px" height="20x"> {{__('Arabic')}}
                            @break
                            @default('en')
                            <img src="{{asset('assets/img/us.jpg')}}" width="30px" height="20x"> {{__('English')}}

                        @endswitch
                    </a>

                    <div class="dropdown-menu" style="background: #0c0c0c; width:50px;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item toto {{isArabic()? "text-right":""}}" href="lang/en"><img src="{{asset('assets/img/us.jpg')}}" width="30px" height="20x">  {{__('English')}}</a>
                        <hr>
                        <a class="dropdown-item toto {{isArabic()? "text-right":""}}" href="lang/ar"><img src="{{asset('assets/img/ar.png')}}" width="30px" height="20x">  {{__('Arabic')}}</a>
                    </div>
                </li>

          @endguest

        </ul>
      </nav><!-- .nav-menu -->





    </div>
  </header><!-- End Header -->

  <div id="main">
  @yield('content')
    <!-- ======= Breadcrumbs ======= -->
    <!-- End Breadcrumbs -->



  </div><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="footer-top">
          <div class="container">
              <div class="row">

                  <div class="col-lg-6 col-md-6">
                      <div class="footer-info">
                          <h3>{{__('Sihr Al Sharq')}}</h3>
                          <p>
                              {{App\Models\Contact::find(1)->address}}
                              <br><br>
                              <strong>{{__('Phone')}} : </strong>{{App\Models\Contact::find(1)->phone}}<br>
                              <strong>{{__('Email')}} : </strong>{{App\Models\Contact::find(1)->email}}<br>
                          </p>
                          <div class="social-links mt-3">
                              @if(App\Models\Contact::find(1)->facebook)
                                  <a href="{{App\Models\Contact::find(1)->facebook}}" class="facebook"><i class="icofont-facebook"></i></a>
                              @endif
                              @if(App\Models\Contact::find(1)->twitter)
                                  <a href="{{App\Models\Contact::find(1)->twitter}}" class="twitter"><i class="icofont-twitter"></i></a>
                              @endif
                              @if(App\Models\Contact::find(1)->instagram)
                                  <a href="{{App\Models\Contact::find(1)->instagram}}" class="instagram"><i class="icofont-instagram"></i></a>
                              @endif
                              @if(App\Models\Contact::find(1)->linked_in)
                                  <a href="{{App\Models\Contact::find(1)->linked_in}}" class="linkedin"><i class="icofont-linkedin"></i></a>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6 ">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3638.5583399014276!2d55.76590618500969!3d24.222243184358895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e8ab7d35e8144bb%3A0x3dab3e046024f279!2sGRAFFITI%20INTERIOR%20DESIGN!5e0!3m2!1sar!2s!4v1610497541858!5m2!1sar!2s" width="600" height="450" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                          {{--<iframe class=""--}}
                                  {{--src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"--}}
                                  {{--frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen>--}}

                          {{--</iframe>--}}
                  </div>
              </div>
          </div>
      </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Al Sharq</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="#">Al-Sharq</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset("assets/vendor/jquery/jquery.min.js")}}"></script>

  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/index.js')}}" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>