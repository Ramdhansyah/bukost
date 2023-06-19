@extends('auth.layouts.login')
@section('content')
     <!-- Content -->

     <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            @if (session()->has('success'))     
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <div class=" bs-toast toast fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class='bx bx-check'></i>
                      <div class="me-auto fw-semibold">Success</div>
                    </div>
                    <div class="toast-body">
                     {{session('success')}}
                    </div>
                  </div>
            </div>
            @elseif (session()->has('error'))     
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <div class=" bs-toast toast fade show bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class='bx bx-triangle'></i>
                      <div class="me-auto fw-semibold">Peringatan</div>
                    </div>
                    <div class="toast-body">
                     {{session('error')}}
                    </div>
                  </div>
            </div>
            @endif
            <!-- Register -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <a href="/" class="app-brand-link gap-2">
                <img src="{{ asset('logo.jpeg') }}" alt="" width="30%" style="margin-left: 30%; margin-bottom: 0%">  
               </a>
               
                <!-- /Logo -->
               
  
                <form id="" class="mb-3" action="{{ route('auth.authentication') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" autofocus/>
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                      <a href="auth-forgot-password-basic.html">
                        {{-- <small>Lupa Password?</small> --}}
                      </a>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  {{-- <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                  </div> --}}
                  <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                  </div>
                </form>
  
                <p class="text-center">
                  <span>Belum punya akun?</span>
                  <a href="{{ route('auth.register') }}">
                    <span>Daftar sekarang!</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
      </div>
  
      <!-- / Content -->
  
@endsection