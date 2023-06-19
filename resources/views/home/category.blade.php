<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.jpeg') }}" />
    <meta name="dicoding:email" content="email kalian">
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

    <div class="hero">
      <div class="hero-slide">
        <div
          class="img overlay"
          style="background-image: url('{{ asset('properti') }}/images/hero_bg_3.jpg')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('{{ asset('properti') }}/images/hero_bg_2.jpg')"
        ></div>
        <div
          class="img overlay" style="background-image: url('{{ asset('properti') }}/images/hero_bg_1.jpg')"
        ></div>
      </div>

      
      <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
              <h1 class="heading" data-aos="fade-up">
               Butuh Info Kos Cepat?
              </h1><br>
              <h4 class="heading mb-5" data-aos="fade-up">
               Dapatkan info dan kost tepat buatmu segera...!
              </h4>
              <form
                action="#"
                class="narrow-w form-search d-flex align-items-stretch mb-3"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <input
                  type="text"
                  class="form-control px-4"
                  placeholder="Ketik Lokasi atau Nama Kos"
                />
                <button type="submit" class="btn" style="background-color: #FF76E3">Search</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
             Daftar Kos
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
          </div>
        </div>
        <div class="row">
            @foreach ($kos as $item)
          <div class="col-4 mt-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->nama }}</h5>
                  <p class="card-text">{{ $item->lokasi }}</p>
                  <h5 class="card-title">{{ formatRupiah($item->harga) }}</h5>
                  <a href="{{ route('show.kos', $item->id) }}" class="btn " style="background-color:#FF76E3; color:black; font-weight: bold ">Pesan Sekarang</a>
                </div>
              </div>
        </div>
            @endforeach
        </div>

        {{ $kos->links() }}
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
