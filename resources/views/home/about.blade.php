<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.jpeg') }}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />
    <meta name="dicoding:email" content="F102XB171@dicoding.org">
    <meta name="dicoding:email" content="F066YB179@dicoding.org">
    <meta name="dicoding:email" content="F066YB106@dicoding.org">
    <meta name="dicoding:email" content="F089XB145@dicoding.org">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('properti')}}/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="{{asset('properti')}}/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="{{ asset('properti') }}/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ asset('properti') }}/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('properti') }}/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>
     {{ $title }}
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap" style="background-color: #FF76E3">
          <div class="site-navigation">
            <a href="/" class="logo m-0 float-start">Bukost</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class=""><a href="/">Home</a></li>
              <li class="has-children">
                <a href="">Kategori</a>
                <ul class="dropdown">
                  <li><a href="/kos?c=putra">Putra</a></li>
                  <li><a href="/kos?c=putri">Putri</a></li>
                  <li><a href="/kos?c=campur">Campur</a></li>
                </ul>
              </li>
              <li><a href="/about" class="active">About</a></li>
              @if (Auth::check())
              <li class="has-children">
                <a href="">{{ auth()->user()->name }}</a>
                <ul class="dropdown">
                    <li><a href="/logout">Logout</a></li>
                  </ul>
              </li>
              @else
              <li><a href="/auth/login" class="active">Login</a></li>
              @endif
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>
<div
      class="hero page-inner overlay"
      style="background-image: url('{{ asset('properti') }}/images/hero_bg_3.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">About</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  About
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row text-left mb-5">
          <div class="col-12">
            <h2 class="font-weight-bold heading text-primary mb-4">About Us</h2>
          </div>
          <div class="col-lg-6">
            <p class="text-black-50">
            Kostan modern dan terjangkau dipusat kota, cocok untuk mahasiswa 
            dan pekerja muda.
            </p>
            <p class="text-black-50">
              Kamar-kamar nyaman dengan furniture minimalis dan fasilitas lengkap.
              Area umum luas,akses internet cepat, dan parkir aman. Layanan tambahan seperti
              laundry dan dukungan teknis. Hunian yang praktis dan nyaman di tengah kesibukan perkotaan
            </p>
          
        </div>
      </div>
    </div>

   

    <div class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="widget">
                <h3>Contact</h3>
                <address>Bukost</address>
                <ul class="list-unstyled links">
                  <li><a href="tel://089745674587">089745674587</a></li>
                  <li>
                    <a href="mailto:bukost@gmail.com">bukost@gmail.com</a>
                  </li>
                </ul>
              </div>
              <!-- /.widget -->
            </div>
            <div class="col-lg-8">
              <div class="widget">
                <h3>Nama Anggota Kelompok</h3>
                <address>C23-M4085</address>
                <ul class="list-unstyled ">
                  <li><span href="">Irsyad Panca Gunawan</span></li>
                  <li><span href="">Dyah Rosyana Habibah</span></li>
                  <li><span href="">Fanesa Dwiana Sari</span></li>
                  <li><span href="">Mohammad Ramdhan</span></li>
                </ul>
              </div>
              <!-- /.widget -->
            </div>
            <!-- /.col-lg-4 -->
          </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            . All Rights Reserved. &mdash; Designed with love by
            <a href="">Bukost C23-M4085</a>
            <!-- License information: https://untree.co/license/ -->
          </p>
          <div>
            Distributed by
            <a href="https://themewagon.com/" target="_blank">themewagon</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.site-footer -->

  <!-- Preloader -->
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <script src="{{ asset('properti') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('properti') }}/js/tiny-slider.js"></script>
  <script src="{{ asset('properti') }}/js/aos.js"></script>
  <script src="{{ asset('properti') }}/js/navbar.js"></script>
  <script src="{{ asset('properti') }}/js/counter.js"></script>
  <script src="{{ asset('properti') }}/js/custom.js"></script>
</body>
</html>
