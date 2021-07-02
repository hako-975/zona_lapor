<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('pelapor'); ?>" class="brand-link">
    <img src="<?= base_url('assets/img/img_properties/favicon.png'); ?>" alt="AdminLTE Logo" class="img-w-50">
    <span class="brand-text">Zona Lapor</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/zona_lapor/pelapor/profile' || 
            $_SERVER['REQUEST_URI'] == '/zona_lapor/pelapor/profile/'
          ): ?>
            <a href="<?= base_url('pelapor/profile'); ?>" class="nav-link active"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
          <?php else: ?>
            <a href="<?= base_url('pelapor/profile'); ?>" class="nav-link"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
          <?php endif ?>
        </li>
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/zona_lapor/pelapor' || 
            $_SERVER['REQUEST_URI'] == '/zona_lapor/pelapor/'
          ): ?>
            <a href="<?= base_url('pelapor'); ?>" class="nav-link active">
          <?php else: ?>
            <a href="<?= base_url('pelapor'); ?>" class="nav-link">
          <?php endif ?>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dasbor
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/zona_lapor/pelaporPengaduan' || 
            $_SERVER['REQUEST_URI'] == '/zona_lapor/pelaporPengaduan/'
          ): ?>
            <a href="<?= base_url('pelaporPengaduan'); ?>" class="nav-link active">
              <i class="fas fa-exclamation nav-icon"></i>
              <p>Pengaduan</p>
            </a>
          <?php else: ?>
            <a href="<?= base_url('pelaporPengaduan'); ?>" class="nav-link">
              <i class="fas fa-exclamation nav-icon"></i>
              <p>Pengaduan</p>
            </a>
          <?php endif ?>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>