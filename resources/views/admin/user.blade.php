@extends('admin.layouts.admin')

@section('content')

    <div class="row justify-content-center">
       
        <div class="col-md-12">
            <div class="card">
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
                <h5 class="card-header">{{ $title }}</h5>
                
                <div class="card-body">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                  <div class="table-responsive">
                    <table class="table table-striped" id="tabel-user">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>No Hp</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->email }}</td>
                                    <td>{{ $k->username }}</td>
                                    <td>{{ $k->nohp }}</td>
                                    <td>{{ $k->role }}</td>
                                    <td>
                                        <a href="/admin/user/{{ $k->id }}/edit" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                                        <form action="/admin/user/{{ $k->id }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete-user" ><i class="fa-solid fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    // Memilih elemen alert
    var alert = $('.toast');

    // Menghilangkan alert setelah 2 detik (2000 milidetik)
    setTimeout(function() {
        alert.fadeOut();
    }, 2000);
    // Konfirmasi Hapus
    $('.delete-user').click(function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Data yang dihapus tidak akan kembali',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
    // Table
  
    $('#tabel-user').DataTable({
    paging: true,
    searching: true,
    info: false,
    lengthChange: false,
    ordering: false,
    pageLength: 40,
    bFilter: false,
    language: {
        emptyTable: "Tidak ada data User"
    },
    initComplete: function () {
        $('#tabel-kos thead th').addClass('text-center');
    }
});
});
    </script>

@endsection
