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

<main class="flex-shrink-0 mt-4">
	<div class="container pb-5">
		<div class="row justify-content-center py-4">
			<div class="col-lg">
				<h3>Landing Page</h3>
				<p>Ab omnis excepturi rerum vero possimus, molestiae corporis voluptates dignissimos eveniet dolores recusandae! Cupiditate excepturi blanditiis magnam veritatis commodi ipsam minus, illo labore enim, modi! Inventore eos consectetur repellat mollitia, magnam neque cumque recusandae necessitatibus nisi, explicabo adipisci eaque placeat ducimus nihil aspernatur, modi, quo non dolor repellendus. Corporis quam, voluptates numquam accusantium illo id alias eaque quae, praesentium fuga, at quis, minus sequi quisquam odio nulla modi ad tenetur vel quasi est veritatis quia doloremque repudiandae soluta. Accusantium, ad. Officia corrupti excepturi aliquam provident consequuntur, molestias sunt nostrum et inventore rerum consequatur sit enim totam deleniti ab facere, voluptatem modi alias ipsa eveniet dolor, repellat vel asperiores quod! Quis quas maxime, quos similique deleniti, quaerat!</p>
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
				<p class="text-justify">Berikut adalah daftar pengaduan-pengaduan masyarakat:</p>
				<div class="table-responsive">
					<table class="table table-bordered" id="table_id">
						<thead class="thead-dark">
							<tr>
								<th class="align-middle">No.</th>
								<th class="align-middle">Tanggal Pelaporan</th>
								<th class="align-middle">Isi Laporan</th>
								<th class="align-middle">Pelapor</th>
								<th class="align-middle">Lokasi</th>
								<th class="align-middle">Foto</th>
								<th class="align-middle">Status</th>
								<th class="align-middle">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($pengaduan as $dp): ?>
								<?php 
									$tanggapan = $this->db->select('*')->limit(1)->order_by('id_tanggapan','DESC')->get_where('tanggapan', ['id_pengaduan' => $dp['id_pengaduan']])->row_array();
									if ($tanggapan != null) 
									{
										$status = $tanggapan['status_tanggapan'];
									}
								?>
								<tr>
									<td class="align-middle"><?= $i++; ?></td>
									<td style="width: 12rem" class="align-middle"><?= date("d-M-Y, \P\u\k\u\l H:i", strtotime($dp['tgl_pengaduan'])); ?></td>
									<td style="width: 12rem" class="align-middle"><?= $dp['isi_laporan']; ?></td>
									<td style="width: 8rem" class="align-middle"><?= $dp['username']; ?></td>
									<td class="align-middle"><?= $dp['kelurahan']; ?></td>
									<td class="align-middle">
										<a href="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="enlarge">
											<img src="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="img-fluid img-w-100-hm-100" alt="<?= $dp['foto']; ?>">
										</a>
									</td>

									<?php if ($tanggapan != null): ?>
										<td class="align-middle">
											<?php if ($status == 'proses'): ?>
												<button type="button" class="btn btn-danger text-white"> <i class="fas fa-fw fa-sync"></i>
											<?php elseif ($status == 'valid'): ?>
												<button type="button" class="btn btn-success text-white"> <i class="fas fa-fw fa-check"></i>
											<?php elseif ($status == 'pengerjaan'): ?>
												<button type="button" class="btn btn-warning text-white"> <i class="fas fa-fw fa-hammer"></i>
											<?php elseif ($status == 'selesai'): ?>
												<button type="button" class="btn btn-primary text-white"> <i class="fas fa-fw fa-check-double"></i>
											<?php elseif ($status == 'tidak_valid'): ?>
												<button type="button" class="btn btn-secondary text-white"> <i class="fas fa-fw fa-times"></i>
											<?php else: ?>
												<button type="button" class="btn">
											<?php endif ?>

											<?php 
												$status = explode('_', $status);
												$status = implode(' ', $status);
												$status = ucwords(strtolower($status));
											?>
											<?= $status; ?>
											</button>
										</td>
									<?php else: ?>
										<td class="align-middle"><button type="button" class="btn btn-xs btn-secondary text-white"><i class="fas fa-fw fa-times"></i> Belum ditanggapi</button></td>
									<?php endif ?>
									<td class="align-middle">
										<a href="<?= base_url('landing/detailPengaduan/' . $dp['id_pengaduan']); ?>" class="btn btn-sm btn-info m-1"><i class="fas fa-fw fa-align-justify"></i> Detail</a>
									</td>
								</tr>
							<?php endforeach ?>
							<?php if ($pengaduan == null): ?>
								<tr>
									<td colspan="8" class="text-center">Tidak ada data.</td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row py-4" id="saran">
			<div class="col-lg-6 border p-3 rounded">
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
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>