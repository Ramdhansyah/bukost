@extends('admin.layouts.admin')

@section('content')

    <div class="row justify-content-center">
       
        <div class="col-md-12">
            @if(session()->has('success'))
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
            @elseif(session()->has('error'))
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <div class=" bs-toast toast fade show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class='bx bx-check'></i>
                      <div class="me-auto fw-semibold">Error</div>
                    </div>
                    <div class="toast-body">
                     {{session('error')}}
                    </div>
                  </div>
            </div>
             @endif
            <div class="card">
             
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Profile</h3>
                        </div>
                      
                    </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/'. auth()->user()->image) }}" class="img-fluid" alt="" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                          <table class="table table-striped table-sm">      
                              <thead>
                               
                                      <tr>
                                          <td><b>Nama </b></td>
                                          <td>:</td>
                                          <td>{{ auth()->user()->name }}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Email </b></td>
                                          <td>:</td>
                                          <td>{{ auth()->user()->email }}</td>
                                      </tr>
                                  
                                      <tr>
                                          <td><b>Username </b></td>
                                          <td>:</td>
                                          <td>{{ auth()->user()->username }}</td>
                                      </tr>
                                      <tr>
                                          <td><b>No. Hp </b></td>
                                          <td>:</td>
                                          <td>{{ auth()->user()->nohp }}</td>
                                      </tr>
                                  
                              </thead>
                          </table>
                          {{-- <button type="button" class="btn btn-warning btn-sm mt-4" id="edit-profil">Edit</button> --}}
                        </div>
                    </div>
                </div>
                </div>    
           </div>

           <div class="form-edit" >

           
            <div class="card mt-5">
             
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Edit Profile</h3>
                        </div>
                    </div>    
                    <form method="post" action="/profile/{{ auth()->user()->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')  
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="nama" value="{{ old('name', $data->name) }}" placeholder="Nama Lengkap" name="name" autocomplete="off" autofocus>
                              </div>
                              @error('name')<small class="text-danger mr-2">{{ $message }}</small>@enderror
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" class="form-control" id="email" value="{{ old('email', $data->email) }}" placeholder="Email" name="email" autocomplete="off" autofocus>
                              </div>
                              @error('email')<small class="text-danger mr-2">{{ $message }}</small>@enderror
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="username">Username</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                <i class="fa fa-at"></i>
                                </span>
                                <input type="text" class="form-control" id="username" value="{{ old('username', $data->username) }}" placeholder="Username" name="username" autocomplete="off" autofocus>
                              </div>
                              @error('username')<small class="text-danger mr-2">{{ $message }}</small>@enderror
                            </div>
                          </div>     
                         
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nohp">No Handphone</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                <i class="fa-solid fa-mobile"></i>
                                </span>
                                <input type="text" class="form-control rupiah" id="nohp" value="{{ old('nohp', $data->nohp) }}" placeholder="No Handphone" name="nohp" autocomplete="off" autofocus>
                              </div>
                              @error('nohp')<small class="text-danger mr-2">{{ $message }}</small>@enderror
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="password">Password</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                  <i class="fa-solid fa-key"></i>
                                </span>
                                <input type="password" class="form-control" id="password"  placeholder="Password" name="password" autocomplete="off" autofocus>
                              </div>
                              @error('password')<small class="text-danger mr-2">{{ $message }}</small>@enderror
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Foto Profile</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('storage/'.$data->image) }}" alt="" width="10%">
                              <div class="input-group input-group-merge mt-2">
                                <input type="file" class="form-control" id="image"   name="image" autocomplete="off" autofocus>
                              </div>
                              @error('image')<small class="text-danger mr-2">{{ $message }}</small>@enderror
                            </div>
                          </div> 
                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </form>
                </div>
                
           </div>
           </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#edit-profil').click(function () { 
                $('.form-edit').show();
                $(this).hide();
             });
        });
    </script>
@endsection
