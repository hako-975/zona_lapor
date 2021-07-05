<div id="carouselInterval" class="carousel slide mt-5 pt-3" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="3000">
      <img src="<?= base_url('assets/img/img_properties/img_carousel/carousel-1.jpg'); ?>" class="d-block h-500 w-100">
    </div>
    <div class="carousel-item" data-interval="3000">
      <img src="<?= base_url('assets/img/img_properties/img_carousel/carousel-2.jpg'); ?>" class="d-block h-500 w-100">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/img/img_properties/img_carousel/carousel-3.jpg'); ?>" class="d-block h-500 w-100">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

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
	        <a class="nav-link page-scroll" href="#saran"><h5 class="my-auto">Saran</h5></a>
	      </div>
	      <div class="navbar-nav ml-auto">
	        <a class="nav-link btn btn-sm font-weight-bold m-1 btn-login" href="<?= base_url('landing/masuk'); ?>"><i class="fas fa-fw fa-sign-in-alt"></i> MASUK</a>
	        <a class="nav-link btn btn-sm font-weight-bold m-1 btn-danger text-white" href="<?= base_url('landing/daftar'); ?>"><i class="fas fa-fw fa-file-signature"></i> DAFTAR</a>
	      </div>
	    </div>
	  </div>
	</nav>
</header>

<main class="flex-shrink-0">
	<div class="container pb-5">
		<div class="row justify-content-center py-4">
			<div class="col-lg">
				<h4>Tata Cara Penggunaan Zona Lapor</h4>
				<div class="row justify-content-center">
					<div class="py-2 col-xl-2 col-lg-3 col-md-3">
						<div class="card">
						  <div class="card-body text-center">
						  	<i class="fas fa-fw fa-file-signature"></i>
							<h4>Daftar</h4>
							<p>Melakukan Pendaftaran, dengan menekan tombol <a href="<?= base_url('landing/daftar'); ?>"> Daftar</a>. Jika sudah mendaftar tekan tombol <a href="<?= base_url('landing/masuk'); ?>"> Masuk</a>.</p>
						  </div>
						</div>
					</div>
					<div class="py-2 col-lg-1 my-auto card-guide">
						<div class="progress rounded-pill">
						  <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="py-2 col-xl-2 col-lg-3 col-md-3">
						<div class="card">
						  <div class="card-body text-center">
						  	<i class="fas fa-fw fa-sign-in-alt"></i>
							<h4>Masuk</h4>
							<p>Masuk, dengan mengisi username dan password yang telah Anda buat sebelumnya. Jika belum mendaftar tekan tombol <a href="<?= base_url('landing/daftar'); ?>"> Daftar</a>.</p>
						  </div>
						</div>
					</div>
					<div class="py-2 col-lg-1 my-auto card-guide">
						<div class="progress rounded-pill">
						  <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="py-2 col-xl-2 col-lg-3 col-md-3">
						<div class="card">
						  <div class="card-body text-center">
						  	<i class="fas fa-fw fa-exclamation"></i>
							<h4>Pengaduan</h4>
							<p>Pada bagian sidebar tekan menu tambah pengaduan untuk membuat laporan pengaduan.</p>
						  </div>
						</div>
					</div>
					<div class="py-2 col-lg-1 my-auto card-guide">
						<div class="progress rounded-pill">
						  <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="py-2 col-xl-2 col-lg-3 col-md-3">
						<div class="card">
						  <div class="card-body text-center">
						  	<i class="fas fa-fw fa-reply"></i>
							<h4>Tanggapan</h4>
							<p>Pada bagian sidebar tekan menu pengaduan untuk melihat seluruh pengaduan yang telah Anda buat. Untuk melihat tanggapan petugas, tekan tombol <button type="button" class="btn btn-xs btn-info"><i class="fas fa-fw fa-reply"></i></button>.</p>
						  </div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row py-4" id="tentang">
			<div class="col-lg">
				<h4>Tentang</h4>
				<p>Zona Lapor adalah pengelolaan pengaduan pelayanan publik di daerah Tangerang Selatan, setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi yang baik dan benar dalam penanganan pengaduan masyarakat maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik yang efektif. Tujuannya, masyarakat memiliki saluran pengaduan yang baik, benar, terorganisir dan terpercaya.</p>
			</div>
		</div>
		<div class="row py-4" id="daftar_laporan">
			<div class="col-lg">
				<h4>Daftar Laporan</h4>
				<p class="text-justify">Berikut adalah daftar pengaduan-pengaduan masyarakat berdasarkan terbaru:</p>
				<div class="table-responsive">
					<table class="table table-bordered" id="table_id">
						<thead class="thead-dark">
							<tr>
								<th class="align-middle">No.</th>
								<th style="width: 12rem" class="align-middle">Tanggal Pengaduan</th>
								<th style="width: 12rem" class="align-middle">Isi Laporan</th>
								<th class="align-middle">Lokasi</th>
								<th style="width: 6.5rem" class="align-middle">Foto</th>
								<th class="align-middle">Status</th>
								<th class="align-middle">Tanggapan</th>
								<th class="align-middle">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($pengaduan as $dp): ?>
								<?php 
									$getTanggapan = $this->db->order_by('tanggapan.id_tanggapan', 'desc')->get_where('tanggapan', ['id_pengaduan' => $dp['id_pengaduan']])->row_array();
									if ($getTanggapan) 
									{
										$status = explode('_', $getTanggapan['status_tanggapan']);
										$status = implode(' ', $status);
										$status = ucwords(strtolower($status));
									}
								?>
								<tr>
									<td class="align-middle"><?= $i++; ?></td>
									<td class="align-middle"><?= date('d-M-Y,\P\u\k\u\l H:i', strtotime($dp['tgl_pengaduan'])); ?></td>
									<td class="align-middle"><?= $dp['isi_laporan']; ?></td>
									<td class="align-middle"><?= $dp['kelurahan']; ?></td>
									<td class="align-middle text-center">
										<a href="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="enlarge">
											<img src="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="img-fluid img-w-100-hm-100" alt="<?= $dp['foto']; ?>">
										</a>
									</td>
									<td class="align-middle">
										<?php if ($getTanggapan): ?>
											<?php if ($getTanggapan['status_tanggapan'] == 'proses'): ?>
												<button type="button" class="btn btn-sm text-center btn-danger"><i class="fas fa-fw fa-sync"></i> <?= $status; ?></button>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'valid'): ?>
												<button type="button" class="btn btn-sm text-center btn-success"><i class="fas fa-fw fa-check"></i> <?= $status; ?></button>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'pengerjaan'): ?>
												<button type="button" class="btn btn-sm text-center btn-warning"><i class="fas fa-fw fa-hammer"></i> <?= $status; ?></button>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'selesai'): ?>
												<button type="button" class="btn btn-sm text-center btn-primary"><i class="fas fa-fw fa-check-double"></i> <?= $status; ?></button>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'tidak_valid'): ?>
												<button type="button" class="btn btn-sm text-center btn-secondary"><i class="fas fa-fw fa-times"></i> <?= $status; ?></button>
											<?php endif ?>
										<?php else: ?>
											<button type="button" class="btn text-center btn-xs p-2 btn-secondary"><i class="fas fa-fw fa-times"></i> Belum ditanggapi</button>
										<?php endif ?>
									</td>
									<td class="align-middle">
										<?php if ($getTanggapan): ?>
											<?php if ($getTanggapan['status_tanggapan'] == 'proses'): ?>
												<p><?= $getTanggapan['isi_tanggapan']; ?></p>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'valid'): ?>
												<p><?= $getTanggapan['isi_tanggapan']; ?></p>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'pengerjaan'): ?>
												<p><?= $getTanggapan['isi_tanggapan']; ?></p>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'selesai'): ?>
												<p><?= $getTanggapan['isi_tanggapan']; ?></p>
											<?php elseif ($getTanggapan['status_tanggapan'] == 'tidak_valid'): ?>
												<p><?= $getTanggapan['isi_tanggapan']; ?></p>
											<?php endif ?>
										<?php else: ?>
											<p>-</p>
										<?php endif ?>
									</td>
									<td class="align-middle text-center">
										<a href="<?= base_url('landing/detailPengaduan/' . $dp['id_pengaduan']); ?>" class="btn btn-sm btn-info m-1"><i class="fas fa-fw fa-align-justify"></i> Detail</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row py-4 justify-content-center" id="saran">
			<div class="col-lg-6 my-2">
				<div class="border p-3 rounded">
					<h4>Saran</h4>
					<p>Berikan saran terbaik Anda agar aplikasi Zona Lapor bekerja lebih baik lagi.</p>
					<form action="<?= base_url('landing/saran'); ?>" method="post">
						<div class="form-group">
							<label for="nama"><i class="fas fa-fw fa-id-card"></i> Nama Lengkap</label>
							<input type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama" required value="<?= set_value('nama'); ?>">
							<div class="invalid-feedback">
					          <?= form_error('nama'); ?>
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
						<div class="form-group">
							<label for="saran"><i class="fas fa-fw fa-lightbulb"></i> Saran</label>
							<textarea id="saran" class="form-control <?= (form_error('saran')) ? 'is-invalid' : ''; ?>" name="saran" required><?= set_value('saran'); ?></textarea>
							<div class="invalid-feedback">
			              		<?= form_error('saran'); ?>
		            		</div>
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6 my-2">
				<div class="border p-3 rounded">
					<h4>Peta Tangerang Selatan</h4>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126904.29821208435!2d106.63827143352435!3d-6.295327749784684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fab10419c095%3A0x8706481c2c4aafe4!2sKota%20Tgr.%20Sel.%2C%20Kota%20Tangerang%20Selatan%2C%20Banten!5e0!3m2!1sid!2sid!4v1625382079280!5m2!1sid!2sid" style="border:0; width: 100%; height: 33.125rem;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</div>
</main>