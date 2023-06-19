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
        <form method="post" action="/admin/kos/{{ $data->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')  
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama">Nama Kos</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                <i class="fa fa-home"></i>
                </span>
                <input type="text" class="form-control" id="nama" value="{{ old('nama', $data->nama) }}" placeholder="Nama Kos" name="nama" autocomplete="off" autofocus>
              </div>
              @error('nama')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                  <i class="fa-solid fa-location-dot"></i>
                </span>
                <input type="text" class="form-control" id="lokasi" value="{{ old('lokasi', $data->lokasi) }}" placeholder="Alamat Kos" name="lokasi" autocomplete="off" autofocus>
              </div>
              @error('lokasi')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
        
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="category">Category</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span  class="input-group-text">
                    <i class="fa-solid fa-home"></i>
                </span>
                <select class="form-select" id="category_id" name="category_id">
                
                  <option value="{{ $data->category->id }}" selected>{{ $data->category->nama }}</option>
                  @if ($category->count() == 0)
                  <option value=""   disabled>Tidak Ada category</option>
                  @else
                  @foreach ($category as $class)
                  <option value="{{ $class->id }}"  @if (old('category_id')== $class->id ) selected @endif>{{ $class->nama }}</option>
                  @endforeach
                  @endif
                  </select>
              </div>
              @error('category_id')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="harga">Harga Kos</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                <i class="fa-solid fa-rupiah-sign"></i>
                </span>
                <input type="text" class="form-control rupiah" id="harga" value="{{ old('harga', $data->harga) }}" placeholder="Harga" name="harga" autocomplete="off" autofocus>
              </div>
              @error('harga')<small class="text-danger mr-2">{{ $message }}</small>@enderror
            </div>
          </div> 
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="image">Gambar</label>
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

<script>
 
    $(document).ready(function() {
    // Mask Input
    $('.rupiah').mask("#.##0", {reverse: true});
    });
</script>
@endsection