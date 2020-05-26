<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" style="color:white">
        <div class="sidebar-brand-icon">
          <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PERPUSTAKAAN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('buku') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Buku</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('peminjaman') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Peminjaman</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->