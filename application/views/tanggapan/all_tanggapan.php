<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<?php if ($this->uri->segment(3) == 'proses'): ?>
				<h3><i class="fas fa-fw fa-reply"></i> Tanggapan Proses</h3>
			<?php elseif ($this->uri->segment(3) == 'valid'): ?>
				<h3><i class="fas fa-fw fa-reply"></i> Tanggapan Valid</h3>
			<?php elseif ($this->uri->segment(3) == 'pengerjaan'): ?>
				<h3><i class="fas fa-fw fa-reply"></i> Tanggapan Pengerjaan</h3>
			<?php elseif ($this->uri->segment(3) == 'selesai'): ?>
				<h3><i class="fas fa-fw fa-reply"></i> Tanggapan Selesai</h3>
			<?php elseif ($this->uri->segment(3) == 'tidak_valid'): ?>
				<h3><i class="fas fa-fw fa-reply"></i> Tanggapan Tidak Valid</h3>
			<?php else: ?>
				<h3><i class="fas fa-fw fa-reply"></i> Semua Tanggapan</h3>
			<?php endif ?>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col text-center m-1">
			<a href="<?= base_url('tanggapan/allTanggapan'); ?>" class="btn btn-info"><i class="fas fa-fw fa-clipboard-list"></i> All</a>
		</div>
		<div class="col text-center m-1">
			<a href="<?= base_url('tanggapan/allTanggapan/proses'); ?>" class="btn btn-danger"><i class="fas fa-fw fa-sync"></i> Proses</a>
		</div>
		<div class="col text-center m-1">
			<a href="<?= base_url('tanggapan/allTanggapan/valid'); ?>" class="btn btn-success"><i class="fas fa-fw fa-check"></i> Valid</a>
		</div>
		<div class="col text-center m-1">
			<a href="<?= base_url('tanggapan/allTanggapan/pengerjaan'); ?>" class="btn btn-warning"><i class="fas fa-fw fa-hammer"></i> Pengerjaan</a>
		</div>
		<div class="col text-center m-1">
			<a href="<?= base_url('tanggapan/allTanggapan/selesai'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-check-double"></i> Selesai</a>
		</div>
		<div class="col text-center m-1">
			<a href="<?= base_url('tanggapan/allTanggapan/tidak_valid'); ?>" class="btn btn-secondary"><i class="fas fa-fw fa-times"></i> Tidak Valid</a>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Isi Laporan</th>
							<th>Tanggal Tanggapan</th>
							<th>Isi Tanggapan</th>
							<th>Status</th>
							<th>Penanggap</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($all_tanggapan as $dt): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dt['isi_laporan']; ?></td>
								<td><?= $dt['tgl_tanggapan']; ?></td>
								<td><?= $dt['isi_tanggapan']; ?></td>
								<?php 
									$status = explode('_', $dt['status_tanggapan']);
									$status = implode(' ', $status);
									$status = ucwords(strtolower($status));
								?>
								<?php if ($dt['status_tanggapan'] == 'proses'): ?>
									<td class="bg-danger"><i class="fas fa-fw fa-sync"></i> <?= $status; ?></td>
								<?php elseif ($dt['status_tanggapan'] == 'valid'): ?>
									<td class="bg-success"><i class="fas fa-fw fa-check"></i> <?= $status; ?></td>
								<?php elseif ($dt['status_tanggapan'] == 'pengerjaan'): ?>
									<td class="bg-warning"><i class="fas fa-fw fa-hammer"></i> <?= $status; ?></td>
								<?php elseif ($dt['status_tanggapan'] == 'selesai'): ?>
									<td class="bg-primary"><i class="fas fa-fw fa-check-double"></i> <?= $status; ?></td>
								<?php elseif ($dt['status_tanggapan'] == 'tidak_valid'): ?>
									<td class="bg-secondary"><i class="fas fa-fw fa-times"></i> <?= $status; ?></td>
								<?php endif ?>
								<td><?= $dt['username']; ?></td>
								<td><a href="<?= base_url('tanggapan/index/' . $dt['id_pengaduan']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-align-justify"></i></a></td>
							</tr>
						<?php endforeach ?>
						<?php if ($all_tanggapan == null): ?>
							<tr>
								<td colspan="6" class="text-center">Tidak ada data.</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
