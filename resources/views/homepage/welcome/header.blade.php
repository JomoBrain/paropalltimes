<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Parop AllTimes</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
  {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <style>
    *{
      list-style: none;
    }
    .blue {
     counter-reset: section;
    } 

    .link::before {
      counter-increment: section;
      content: " " counter(section) ".";
      color: #ff901c;
      font-size: 13px;
    }
    
  </style>
  
</head>

<body>
<!-- ======= Header ======= -->
 <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        {{-- <img src="assets/img/logo.png" alt=""> --}}
        <span>Parop</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>         
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="/user/dashboard">Dashboard</a></li>
       
          <li><a href="{{route('admin.all-blogs')}}">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @guest
          <li><a class="getstarted scrollto" href="{{route('register')}}">Sign Up</a></li>
          <li><a class="getstarted scrollto bg-success" href="{{route('login')}}">Login</a></li>
          @endguest
          @auth
              <li><a class="getstarted scrollto bg-success" href="{{route('logout')}}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>  
          @endauth
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
 