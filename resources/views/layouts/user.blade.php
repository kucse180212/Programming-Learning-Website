<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.css">
  <!-- Our Custom CSS style sheet -->
  <link rel="stylesheet" href="/css/newstyle.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>programming language learning website</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">



        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif   
        </div>



       

        @stack('modals')


        <footer class="full-footer">
    <div class="container top-footer p-md-3 p-1">
      <div class="row">
        <div class="col-md-3 pl-4 pr-4">
          <img class="img-fluid" src="imgs/logo_text_white_small.png" alt="">
          <p>
            Simple Snippets is a Tech-Educational Channel / Platform / Blog / Medium for anyone and everyone ...<a href="#">Read
              more...</a>
          </p>
          <a style="color:silver;" class="p-1" href="#"><i class="fab fa-2x fa-facebook-square"></i></a>
          <a style="color: silver;" class="p-1" href="#"><i class="fab fa-2x fa-google-plus-square"></i></a>
          <a style="color: silver;" class="p-1" href="#"><i class="fab fa-2x fa-twitter-square"></i></a>
          <a style="color: silver;" class="p-1" href="#"><i class="fab fa-2x fa-instagram"></i></a>
        </div>
 
        <div class="col-md-3  pl-4 pr-4">
          <h3>Important Links</h3>
          <a href="#">Privacy Policy</a><br>
          <a href="#">Youtube Channel Link </a><br>
          <a href="#">Blog Articles </a><br>
          <a href="#">Social Media</a>
        </div>
 
        <div class="col-md-3  pl-4 pr-4">
          <h3>Our Services</h3>
          <a href="#">Web Designing </a><br>
          <a href="#">Web Development  </a><br>
          <a href="#">SEO services  </a><br>
          <a href="#">Software Development </a>
          <a href="#">Mobile App Development  </a>
          <a href="#">Graphic Designing</a>
        </div>
     
      <div class="col-md-3  pl-4 pr-4">
          <h3>Contact Us</h3>
          <a href="#"><i class="fas fa-phone"></i> +(91) 9090909090  </a><br>
          <a href="#"><i class="fas fa-envelope"></i> inquiry@simplesnippets.com  </a><br>
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241316.64333236168!2d72.74110193617271!3d19.082522317332813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1547151374329" frameborder="0"></iframe>
          </div>
          
      </div>
    </div>
    </div>
    <div class="container-fluid bottom-footer pt-2">
      <div class="row">
        <div class="col-12 text-center">
          <p>Copyrights © 2020 - All rights reserved</p>
        </div>
      </div>
    </div>
 
  </footer>
    </body>
</html>
