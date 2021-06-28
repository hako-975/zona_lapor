<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
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
            $_SERVER['REQUEST_URI'] == '/zona_lapor/admin/profile' || 
            $_SERVER['REQUEST_URI'] == '/zona_lapor/admin/profile/'
          ): ?>
            <a href="<?= base_url('admin/profile'); ?>" class="nav-link active"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
          <?php else: ?>
            <a href="<?= base_url('admin/profile'); ?>" class="nav-link"><i class="nav-icon fas fa-fw fa-user"></i> <p><?= $dataUser['username']; ?></p></a>
          <?php endif ?>
        </li>
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/zona_lapor/admin' || 
            $_SERVER['REQUEST_URI'] == '/zona_lapor/admin/'
          ): ?>
            <a href="<?= base_url('admin'); ?>" class="nav-link active">
          <?php else: ?>
            <a href="<?= base_url('admin'); ?>" class="nav-link">
          <?php endif ?>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dasbor
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (
            $_SERVER['REQUEST_URI'] == '/zona_lapor/user' || 
            $_SERVER['REQUEST_URI'] == '/zona_lapor/user/'
          ): ?>
            <a href="<?= base_url('user'); ?>" class="nav-link active">
              <i class="fas fa-user nav-icon"></i>
              <p>user</p>
            </a>
          <?php else: ?>
            <a href="<?= base_url('user'); ?>" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>user</p>
            </a>
          <?php endif ?>
        </li>
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-file nav-icon"></i>
            <p>Laporan</p>
          </a>
        </li> -->
        <div class="dropdown-divider"></div>
        <li class="nav-item">
          <a href="<?= base_url('log'); ?>" class="nav-link">
            <i class="fas fa-fw fa-history nav-icon"></i>
            <p>Riwayat</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>