@extends('admin.layouts.admin')
@section('content')


<!-- Basic Layout & Basic with Icons -->
<div class="row">
 
  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">{{ $title }}</h5>
       
      </div>
      <div class="card-body">
        <form method="post" action="/admin/user">
        @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Nama</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                <i class="fa fa-user"></i>
                </span>
                <input type="text" class="form-control" id="name" value="{{ old('name') }}" placeholder="Nama Lengkap" name="name" autocomplete="off" autofocus>
              </div>
              @error('name')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="text" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off" autofocus>
              </div>
              @error('email')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
        
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="username">Username</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                  <i class="fa-solid fa-at"></i>
                </span>
                <input type="text" class="form-control" id="username" value="{{ old('username') }}" placeholder="Username" name="username" autocomplete="off" autofocus>
              </div>
              @error('username')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nohp">Nohp</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                  <i class="fa-solid fa-mobile"></i>
                </span>
                <input type="text" class="form-control" id="nohp" value="{{ old('nohp') }}" placeholder="No. Handphone" name="nohp" autocomplete="off" autofocus>
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
                <input type="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Password" name="password" autocomplete="off" autofocus>
              </div>
              @error('password')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
        
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="role">Role</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span  class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <select class="form-select" id="role" name="role">
                  <option value="" disabled selected>Pilih role</option>
                  <option value="admin"  @if (old('role')== 'admin' ) selected @endif>Admin</option>
                  <option value="user"  @if (old('role')== 'user' ) selected @endif>User</option>
                  </select>
              </div>
              @error('role')<small class="text-danger mr-2">{{ $message }}</small>@enderror
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

<script>
 
    $(document).ready(function() {
    // Mask Input
    $('.rupiah').mask("#.##0", {reverse: true});
    });
</script>
@endsection