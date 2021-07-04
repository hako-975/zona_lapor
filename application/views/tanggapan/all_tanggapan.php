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
							<th class="align-middle">No.</th>
							<th class="align-middle">Isi Laporan</th>
							<th class="align-middle">Tanggal Tanggapan</th>
							<th class="align-middle">Isi Tanggapan</th>
							<th class="align-middle">Status</th>
							<th class="align-middle">Penanggap</th>
							<th class="align-middle">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($all_tanggapan as $dt): ?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $dt['isi_laporan']; ?></td>
								<?php if ($dt['tgl_tanggapan']): ?>
									<td class="align-middle"><?= $dt['tgl_tanggapan']; ?></td>
								<?php else: ?>
									<td class="text-center align-middle">-</td>
								<?php endif ?>
								<?php if ($dt['isi_tanggapan']): ?>
									<td class="align-middle"><?= $dt['isi_tanggapan']; ?></td>
								<?php else: ?>
									<td class="align-middle">Belum ditanggapi</td>
								<?php endif ?>
								<?php 
									$status = explode('_', $dt['status_tanggapan']);
									$status = implode(' ', $status);
									$status = ucwords(strtolower($status));
								?>
								<td class="align-middle">
									<?php if ($dt['status_tanggapan'] == 'proses'): ?>
										<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-sync"></i> <?= $status; ?></button>
									<?php elseif ($dt['status_tanggapan'] == 'valid'): ?>
										<button type="button" class="btn btn-sm btn-success"><i class="fas fa-fw fa-check"></i> <?= $status; ?></button>
									<?php elseif ($dt['status_tanggapan'] == 'pengerjaan'): ?>
										<button type="button" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-hammer"></i> <?= $status; ?></button>
									<?php elseif ($dt['status_tanggapan'] == 'selesai'): ?>
										<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check-double"></i> <?= $status; ?></button>
									<?php elseif ($dt['status_tanggapan'] == 'tidak_valid'): ?>
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-times"></i> <?= $status; ?></button>
									<?php else: ?>
										<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-times"></i> Belum ditanggapi</button>
									<?php endif ?>
								</td>
								<?php if ($dt['username']): ?>
									<td class="align-middle"><?= $dt['username']; ?></td>
								<?php else: ?>
									<td class="align-middle">Belum ditanggapi</td>
								<?php endif ?>
								<td class="align-middle text-center"><a href="<?= base_url('tanggapan/index/' . $dt['id_pengaduan']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-align-justify"></i></a></td>
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
