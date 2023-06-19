  <!-- Menu -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
        <img src="{{ asset('logo.jpeg') }}" width="30%">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">BUKOST</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons  fa-solid fa-tachometer"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <!-- Data Kos -->
      <li class="menu-item {{ Route::is('admin.kos.*') ? 'active' : '' }}">
        <a href="{{ route('admin.kos.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Data Kos</div>
        </a>
      </li>
      <!-- Data User -->
      <li class="menu-item {{ Route::is('admin.user.*') ? 'active' : '' }}">
        <a href="{{ route('admin.user.index') }}" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-user"></i>
          <div data-i18n="Analytics">Data User</div>
        </a>
      </li>
      <!-- Logout -->
      <li class="menu-item ">
        <a href="/logout" class="menu-link" id="logout-button">
          <i class="menu-icon tf-icons bx bx-power-off"></i>
          <div data-i18n="Basic" >Logout</div>
        </a>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->

  <script>
    $(document).ready(function () {
      $('#logout-button').on('click', function(event) {
        var logoutButton = $('#logout-button');
        event.preventDefault();
        // Tampilkan konfirmasi SweetAlert2
        Swal.fire({
          title: 'Konfirmasi Logout',
          text: 'Apakah Anda yakin ingin logout?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Logout',
          cancelButtonText: 'Batal',
        }).then(function(result) {
          // Jika pengguna mengklik tombol "Logout"
          if (result.isConfirmed) {
            // Lakukan proses logout
            window.location.href = logoutButton.attr('href'); // Redirect ke halaman logout
          }
        });
      });
    });
  </script>