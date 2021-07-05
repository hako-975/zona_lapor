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
<main class="flex-shrink-0">
	<div class="container mb-5">
		<div class="row justify-content-center py-3">
			<div class="col-lg header-title">
				<h3 class="text-center"><?= $pengaduan['isi_laporan']; ?></h3>
			</div>
		</div>

		<div class="row text-center py-3">
			<div class="col-lg">
				<a href="<?= base_url('assets/img/img_pengaduan/') . $pengaduan['foto']; ?>" class="enlarge">
					<img src="<?= base_url('assets/img/img_pengaduan/') . $pengaduan['foto']; ?>" class="img-fluid img-hm-200" alt="<?= $pengaduan['foto']; ?>">
				</a><br>
				<small>Klik gambar untuk perbesar</small>
			</div>
		</div>

		<div class="row my-3">
			<div class="col-lg">
				<table>
					<tr>
						<th class="align-middle">Isi Laporan</th>
						<td style="width: 3rem" class="align-middle text-center">:</td>
						<td class="align-middle"><?= $pengaduan['isi_laporan']; ?></td>
					</tr>
					<tr>
						<th class="align-middle">Tanggal Pengaduan</th>
						<td style="width: 3rem" class="align-middle text-center">:</td>
						<td class="align-middle"><?= date('d-M-Y, \P\u\k\u\l H:i', strtotime($pengaduan['tgl_pengaduan'])); ?></td>
					</tr>
					<tr>
						<th class="align-middle">Lokasi</th>
						<td style="width: 3rem" class="align-middle text-center">:</td>
						<td class="align-middle"><?= $pengaduan['kelurahan']; ?></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-3">
				<div class="text-center bg-danger py-3 rounded text-white">
					<h6><i class="fas fa-fw fa-sync"></i></h6>
					<h6>Proses</h6>
				</div>
			</div>
			<div class="col-3">
				<div class="text-center bg-success py-3 rounded text-white">
					<h6><i class="fas fa-fw fa-check"></i></h6>
					<h6>Valid</h6>
				</div>
			</div>
			<div class="col-3">
				<div class="text-center bg-warning py-3 rounded text-white">
					<h6><i class="fas fa-fw fa-hammer"></i></h6>
					<h6>Pengerjaan</h6>
				</div>
			</div>
			<div class="col-3">
				<div class="text-center bg-primary py-3 rounded text-white">
					<h6><i class="fas fa-fw fa-calendar-check"></i></h6>
					<h6>Selesai</h6>
				</div>
			</div>
		</div>

		<div class="row my-3">
			<div class="col">
				<?php if ($pengaduan['status_pengaduan'] == 'belum_ditanggapi'): ?>
					<div class="progress">
						<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				<?php elseif ($pengaduan['status_pengaduan'] == 'proses'): ?>
					<div class="progress">
					  <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="15"></div>
					</div>
				<?php elseif ($pengaduan['status_pengaduan'] == 'valid'): ?>
					<div class="progress">
					  <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
					</div>
				<?php elseif ($pengaduan['status_pengaduan'] == 'pengerjaan'): ?>
					<div class="progress">
					  <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
					</div>
				<?php elseif ($pengaduan['status_pengaduan'] == 'selesai'): ?>
					<div class="progress">
					  <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				<?php endif ?>
			</div>
		</div>
		
		<div class="row py-3">
			<div class="col-lg">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th class="align-middle">No.</th>
								<th class="align-middle">Penanggap</th>
								<th class="align-middle">Tanggal Tanggapan</th>
								<th class="align-middle">Isi Tanggapan</th>
								<th class="align-middle">Foto Tanggapan</th>
								<th class="align-middle">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($tanggapan as $dt): ?>
								<tr>
									<td class="align-middle"><?= $i++; ?></td>
									<td class="align-middle"><?= $dt['username']; ?></td>
									<td class="align-middle"><?= date('d-M-Y, \P\u\k\u\l H:i', strtotime($dt['tgl_tanggapan'])); ?></td>
									<td class="align-middle"><?= $dt['isi_tanggapan']; ?></td>
									<?php 
										$status = explode('_', $dt['status_tanggapan']);
										$status = implode(' ', $status);
										$status = ucwords(strtolower($status));
									?>
									<td class="align-middle text-center">
										<a href="<?= base_url('assets/img/img_tanggapan/') . $dt['foto_tanggapan']; ?>" class="enlarge">
											<img src="<?= base_url('assets/img/img_tanggapan/') . $dt['foto_tanggapan']; ?>" class="img-fluid img-w-75-hm-100" alt="<?= $dt['foto_tanggapan']; ?>">
										</a>
									</td>
									<td class="align-middle">
										<?php if ($dt['status_tanggapan'] == 'proses'): ?>
											<button type="button" class="btn btn-sm text-center btn-danger"><i class="fas fa-fw fa-sync"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'valid'): ?>
											<button type="button" class="btn btn-sm text-center btn-success"><i class="fas fa-fw fa-check"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'pengerjaan'): ?>
											<button type="button" class="btn btn-sm text-center btn-warning"><i class="fas fa-fw fa-hammer"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'selesai'): ?>
											<button type="button" class="btn btn-sm text-center btn-primary"><i class="fas fa-fw fa-check-double"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'tidak_valid'): ?>
											<button type="button" class="btn btn-sm text-center btn-secondary"><i class="fas fa-fw fa-times"></i> <?= $status; ?></button>
										<?php else: ?>
											<button type="button" class="btn btn-sm text-center btn-secondary"><i class="fas fa-fw fa-times"></i> <?= $status; ?></button>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
							<?php if ($tanggapan == null): ?>
								<tr>
									<td class="text-center align-middle" colspan="6">Tidak ada data.</td>
								</tr>	
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
		<div class="row py-3">
			<div class="col-lg">
				<div class="card">
					<div class="card-header mt-2">
						<h4><i class="fas fa-fw fa-id-card"></i> Data Pelapor</h4>
					</div>
					<div class="card-body">
						<table>
							<tr>
								<th>Username</th>
								<td style="width: 2rem; text-align: center;"> : </td>
								<td><?= $pengaduan['username']; ?></td>
							</tr>
							
							<tr>
								<th>Nama Lengkap</th>
								<td style="width: 2rem; text-align: center;"> : </td>
								<td><?= $pengaduan['nama']; ?></td>
							</tr>
							
							<tr>
								<th>No. Telepon</th>
								<td style="width: 2rem; text-align: center;"> : </td>
								<td><?= $pengaduan['no_telepon']; ?></td>
							</tr>

							<tr>
								<th>Alamat</th>
								<td style="width: 2rem; text-align: center;"> : </td>
								<td><?= $pengaduan['alamat']; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
