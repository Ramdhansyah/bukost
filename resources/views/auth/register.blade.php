@extends('auth.layouts.login')
@section('content')
     <!-- Content -->

     <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <!-- Logo -->
                <div class="card-body">
                  <!-- Logo -->
                  <a href="/" class="app-brand-link gap-2">
                  <img src="{{ asset('logo.jpeg') }}" alt="" width="30%" style="margin-left: 30%; margin-bottom: 0%">  
                 </a>
                <!-- /Logo -->
               
                
                <form  class="mb-3" action="{{ route('auth.daftar') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus/>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus/>
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Username" autofocus/>
                    @error('username')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nohp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}" placeholder="nohp" autofocus/>
                    @error('nohp')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  {{-- <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                  </div> --}}
                  <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                  </div>
                </form>
  
                <p class="text-center">
                  <span>Sudah punya akun?</span>
                  <a href="{{ route('auth.login') }}">
                    <span>Masuk!</span>
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