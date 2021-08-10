<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VMS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if($this->session->userdata('role') === 'petugas'){?>
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('dashboard')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Transaksi</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('dashboard/histori_transaksi')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Histori Transaksi</span></a>
      </li>
      <?php }else if(($this->session->userdata('role') === 'pengguna')) {?>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url('Dashboard/pengguna')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Kartu Warga</span></a>
      </li>
      <?php }
       else if(($this->session->userdata('role') === 'admin')) {?>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('Admin/dashboard')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Relasi</span>
          </a>
          <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Data Relasi:</h6>
              <a class="collapse-item" href="<?=base_url('RumahWarga')?>">Rumah Warga</a>
              <a class="collapse-item" href="<?=base_url('Admin/datatransaksi')?>">Transaksi</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Data Master:</h6>
              <a class="collapse-item" href="<?=base_url('Admin/datawarga')?>">Warga</a>
              <a class="collapse-item" href="<?=base_url('Admin/dataakunpetugas')?>">Petugas</a>
              <a class="collapse-item" href="<?=base_url('Admin/dataakunpengguna')?>">Pengguna</a>
              <a class="collapse-item" href="<?=base_url('Rumah')?>">Rumah</a>
              <a class="collapse-item" href="<?=base_url('Iuran')?>">Iuran</a>
            </div>
          </div>
        </li>
       <?php }?> 
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->