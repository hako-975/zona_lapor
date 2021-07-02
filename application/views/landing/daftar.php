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
	        <a class="nav-link page-scroll" href="<?= base_url('landing/'); ?>#tentang"><h5 class="my-auto">Tentang</h5></a>
	        <a class="nav-link page-scroll" href="<?= base_url('landing/'); ?>#daftar_laporan"><h5 class="my-auto">Daftar Laporan</h5></a>
	        <a class="nav-link page-scroll" href="<?= base_url('landing/'); ?>#saran"><h5 class="my-auto">Saran</h5></a>
	      </div>
	      <div class="navbar-nav ml-auto">
	        <a class="nav-link btn btn-sm font-weight-bold m-1 btn-login" href="<?= base_url('landing/masuk'); ?>"><i class="fas fa-fw fa-sign-in-alt"></i> MASUK</a>
	        <a class="nav-link btn btn-sm font-weight-bold m-1 btn-danger text-white" href="<?= base_url('landing/daftar'); ?>"><i class="fas fa-fw fa-file-signature"></i> DAFTAR</a>
	      </div>
	    </div>
	  </div>
	</nav>
</header>

<?php if (validation_errors()): ?>
  <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="z-index: 999999; position: fixed; right: 1.5rem; bottom: 3.5rem">
    <div class="toast-header">
      <strong class="mr-auto">Gagal!</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?= validation_errors(); ?>
    </div>
  </div>
<?php endif ?>

<main class="flex-shrink-0 mt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 p-3">
				<div class="card">
				  <div class="card-header">
				  	<h3 class="my-auto"><i class="fas fa-fw fa-file-signature"></i> Daftar</h3>
				  </div>
				  <div class="card-body">
				  	<form action="<?= base_url('landing/daftar'); ?>" method="post">
							<div class="form-group">
								<label for="nama"><i class="fas fa-fw fa-id-card"></i> Nama Lengkap</label>
								<input type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama" required value="<?= set_value('nama'); ?>">
								<div class="invalid-feedback">
		              <?= form_error('nama'); ?>
		            </div>
							</div>
							<div class="form-group">
								<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
								<input type="text" id="username" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" name="username" required placeholder="Huruf kecil semua tanpa spasi" value="<?= set_value('username'); ?>">
								<div class="invalid-feedback">
		              <?= form_error('username'); ?>
		            </div>
							</div>
							<div class="form-group">
								<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
								<input type="password" id="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" name="password" required placeholder="Minimal 3 digit" value="<?= set_value('password'); ?>">
								<div class="invalid-feedback">
		              <?= form_error('password'); ?>
		            </div>
							</div>
							<div class="form-group">
								<label for="password_verify"><i class="fas fa-fw fa-lock"></i> Verifikasi Password</label>
								<input type="password" id="password_verify" class="form-control <?= (form_error('password_verify')) ? 'is-invalid' : ''; ?>" name="password_verify" required placeholder="Masukkan ulang password sebelumnya" value="<?= set_value('password_verify'); ?>">
								<div class="invalid-feedback">
		              <?= form_error('password_verify'); ?>
		            </div>
							</div>
							<div class="form-group">
								<label for="no_telepon"><i class="fas fa-fw fa-phone"></i> No. Telepon</label>
								<input type="number" id="no_telepon" class="form-control <?= (form_error('no_telepon')) ? 'is-invalid' : ''; ?>" name="no_telepon" required placeholder="contoh: 08123456789" value="<?= set_value('no_telepon'); ?>">
								<div class="invalid-feedback">
		              <?= form_error('no_telepon'); ?>
		            </div>
							</div>
							<div class="form-group">
								<label for="alamat"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
								<textarea id="alamat" class="form-control <?= (form_error('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" required><?= set_value('alamat'); ?></textarea>
								<div class="invalid-feedback">
		              <?= form_error('alamat'); ?>
		            </div>
							</div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
							</div>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
</main>
