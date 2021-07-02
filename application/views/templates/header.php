<!DOCTYPE html>
<html lang="en" class="h-100" id="page-top">
<head>
  <?php include 'include/js.php'; ?>
  <?php include 'include/css.php'; ?>
  <title><?= $title; ?></title>
</head>
<body class="d-flex flex-column h-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
          <img src="<?= base_url('assets/img/img_properties/favicon-text.png'); ?>" class="d-inline-block align-top img-fluid img-w-100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link page-scroll" href="#tentang"><h5 class="my-auto">Tentang</h5></a>
            <a class="nav-link page-scroll" href="#daftar_laporan"><h5 class="my-auto">Daftar Laporan</h5></a>
          </div>
          <div class="navbar-nav ml-auto">
            <a class="nav-link btn btn-sm font-weight-bold m-1 btn-login" href="<?= base_url(''); ?>"><i class="fas fa-fw fa-sign-in-alt"></i> MASUK</a>
            <a class="nav-link btn btn-sm font-weight-bold m-1 btn-danger text-white" href="<?= base_url(''); ?>"><i class="fas fa-fw fa-file-signature"></i> DAFTAR</a>
          </div>
        </div>
      </div>
    </nav>
  </header>        
        
