<?php
	if ($tanggapan != null) 
	{
		$last_row = $this->db->select('*')->limit(1)->order_by('id_tanggapan','DESC')->get_where('tanggapan', ['id_pengaduan' => $pengaduan['id_pengaduan']])->row_array()['id_tanggapan'];
	}
	
	$num_rows = $this->db->get_where('tanggapan', ['id_pengaduan' => $this->uri->segment(3)])->num_rows();
 ?>

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
				<h3><i class="fas fa-fw fa-reply"></i> Tanggapan - <?= $pengaduan['isi_laporan']; ?></h3>
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
				<h5>Tanggal Pengaduan: <?= date('d-M-Y, \P\u\k\u\l H:i', strtotime($pengaduan['tgl_pengaduan'])); ?></h5>
				<h5>Lokasi: <?= $pengaduan['kelurahan']; ?></h5>
			</div>
		</div>

		<?php if ($num_rows > 0 && $tanggapan[$num_rows-1]['status_tanggapan'] != 'tidak_valid'): ?>
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
		<?php elseif ($num_rows != 0): ?>
			<div class="row my-2">
				<div class="col-3">
					<div class="text-center bg-secondary py-3 rounded text-white">
	    				<h6><i class="fas fa-fw fa-exclamation"></i></h6>
	    				<h6>Tidak Valid</h6>
					</div>
				</div>
			</div>
		<?php else: ?>
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
		<?php endif ?>
		<div class="row my-3">
			<div class="col">
				<?php if ($num_rows != 0): ?>
					<?php if ($tanggapan[$num_rows-1]['status_tanggapan'] == 'proses'): ?>
						<div class="progress">
						  <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="15"></div>
						</div>
					<?php elseif ($tanggapan[$num_rows-1]['status_tanggapan'] == 'valid'): ?>
						<div class="progress">
						  <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
						</div>
					<?php elseif ($tanggapan[$num_rows-1]['status_tanggapan'] == 'pengerjaan'): ?>
						<div class="progress">
						  <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
						</div>
					<?php elseif ($tanggapan[$num_rows-1]['status_tanggapan'] == 'selesai'): ?>
						<div class="progress">
						  <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					<?php endif ?>
				<?php else: ?>
					<div class="progress">
					  <div class="progress-bar bg-secondary" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5"></div>
					</div>
					<br>
					<small class="text-secondary">Belum ditanggapi</small>
				<?php endif ?>
			</div>
		</div>
		
		<div class="row py-3">
			<div class="col-lg">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th>No.</th>
								<th>Tanggal Tanggapan</th>
								<th>Isi Tanggapan</th>
								<th>Status</th>
								<th>Penanggap</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($tanggapan as $dt): ?>
								<tr>
									<td class="align-middle"><?= $i++; ?></td>
									<td class="align-middle"><?= $dt['tgl_tanggapan']; ?></td>
									<td class="align-middle"><?= $dt['isi_tanggapan']; ?></td>
									<?php 
										$status = explode('_', $dt['status_tanggapan']);
										$status = implode(' ', $status);
										$status = ucwords(strtolower($status));
									?>
									<td class="align-middle">
										<?php if ($dt['status_tanggapan'] == 'proses'): ?>
											<button class="align-middle text-center btn btn-danger"><i class="fas fa-fw fa-sync"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'valid'): ?>
											<button class="align-middle text-center btn btn-success"><i class="fas fa-fw fa-check"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'pengerjaan'): ?>
											<button class="align-middle text-center btn btn-warning"><i class="fas fa-fw fa-hammer"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'selesai'): ?>
											<button class="align-middle text-center btn btn-primary"><i class="fas fa-fw fa-check-double"></i> <?= $status; ?></button>
										<?php elseif ($dt['status_tanggapan'] == 'tidak_valid'): ?>
											<button class="align-middle text-center btn btn-secondary"><i class="fas fa-fw fa-times"></i> <?= $status; ?></button>
										<?php endif ?>
									</td>
									<td class="align-middle"><?= $dt['username']; ?></td>
							<?php endforeach ?>
							<?php if ($tanggapan == null): ?>
								<tr>
									<td colspan="6" class="text-center">Tidak ada data.</td>
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
