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
              <li class="active"><a href="/">Home</a></li>
              <li class="has-children">
                <a href="">Kategori</a>
                <ul class="dropdown">
                    <li><a href="/kos?c=putra">Putra</a></li>
                    <li><a href="/kos?c=putri">Putri</a></li>
                    <li><a href="/kos?c=campur">Campur</a></li>
                  </ul>
              </li>
              <li><a href="/about">About</a></li>
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
style="background-image: url('images/hero_bg_3.jpg')"
>
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">
      {{ $kos->nama }}
      </h1>

      <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li
            class="breadcrumb-item active text-white-50"
            aria-current="page"
          >
            {{ $kos->nama }}
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>

<div class="section">
<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg-7">
      <div class="img-property-slide-wrap">
        <div class="img-property-slide">
          <img src="{{ asset('storage/' .$kos->image) }}" alt="Image" class="img-fluid" />
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <h2 class="heading text-primary">{{ $kos->nama }}</h2>
      <p class="meta">{{ $kos->lokasi }}</p>
      <p class="meta">{{ $kos->category->nama }}</p>
      <p class="text-black-50">
        <h1>{{ formatRupiah($kos->harga) }}</h1>
      </p>
      <hr>
      <h2 class="heading text-primary mt-5">Form Pemesanan</h2>
      <form action="/order" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
            @error('alamat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">No Hp</label>
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Hanphone">
            @error('nohp')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            @error('kos_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="hidden" class="form-control" id="kod_id" value="{{ $kos->id }}" name="kos_id">
          </div>
          <button type="submit" class="btn" style="background-color: #FF76E3">Order</button>
      </form>
    </div>
  </div>
</div>
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
