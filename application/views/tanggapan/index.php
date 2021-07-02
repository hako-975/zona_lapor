<?php
	if ($tanggapan != null) 
	{
		$last_row = $this->db->select('*')->limit(1)->order_by('id_tanggapan','DESC')->get_where('tanggapan', ['id_pengaduan' => $pengaduan['id_pengaduan']])->row_array()['id_tanggapan'];
	}
	
	$num_rows = $this->db->get_where('tanggapan', ['id_pengaduan' => $this->uri->segment(3)])->num_rows();
 ?>
<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-reply"></i> Tanggapan - <?= $pengaduan['isi_laporan']; ?></h3>
		</div>
		<?php if ($num_rows != 4): ?>
			<?php if ($num_rows == 0): ?>
				<div class="col-lg header-button">
					<a href="<?= base_url('tanggapan/addTanggapan/' . $pengaduan['id_pengaduan']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</a>
				</div>
			<?php else: ?>
					<?php if ($tanggapan[$num_rows-1]['status_tanggapan'] != 'tidak_valid'): ?>
						<div class="col-lg header-button">
							<a href="<?= base_url('tanggapan/addTanggapan/' . $pengaduan['id_pengaduan']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</a>
						</div>
					<?php else: ?>
						<div class="col-lg header-button">
							<button class="btn btn-primary" type="button" disabled><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</button>
							<br><small>Pengaduan Tidak Valid</small>
						</div>
					<?php endif ?>
			<?php endif ?>
		<?php else: ?>
			<div class="col-lg header-button">
				<button class="btn btn-primary" type="button" disabled><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</button>
				<br><small>Pengaduan Sudah Selesai</small>
			</div>
		<?php endif ?>
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
			<?php if ($num_rows == 0): ?>
				<div class="progress">
					<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<small class="text-danger">Tambahkan tanggapan untuk merubah status menjadi dalam proses.</small>
			<?php else: ?>
				<?php if ($tanggapan[$num_rows-1]['status_tanggapan'] == 'proses'): ?>
					<div class="progress">
					  <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="15"></div>
					   <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<small class="text-success">Tambahkan tanggapan lagi untuk merubah status menjadi valid atau tidak valid.</small>
				<?php elseif ($tanggapan[$num_rows-1]['status_tanggapan'] == 'valid'): ?>
					<div class="progress">
					  <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
					   <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<small class="text-warning">Tambahkan tanggapan lagi untuk merubah status menjadi dalam pengerjaan.</small>
				<?php elseif ($tanggapan[$num_rows-1]['status_tanggapan'] == 'pengerjaan'): ?>
					<div class="progress">
					  <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
					   <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<small class="text-warning">Tambahkan tanggapan lagi untuk merubah status menjadi selesai.</small>
				<?php elseif ($tanggapan[$num_rows-1]['status_tanggapan'] == 'selesai'): ?>
					<div class="progress">
					  <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<small class="text-primary">Kasus pengaduan sudah selesai. Untuk mengubah status menjadi tidak valid hapus tanggapan sampai status valid.</small>
				<?php endif ?>
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
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($tanggapan as $dt): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dt['tgl_tanggapan']; ?></td>
								<td><?= $dt['isi_tanggapan']; ?></td>
								<?php 
									$status = explode('_', $dt['status_tanggapan']);
									$status = implode(' ', $status);
									$status = ucwords(strtolower($status));
								?>
								<td><?= $status; ?></td>
								<td><?= $dt['username']; ?></td>
								<td>
									<a href="<?= base_url('tanggapan/editTanggapan/' . $pengaduan['id_pengaduan'] . '/' . $dt['id_tanggapan']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
									<?php if ($dataUser['jabatan'] == 'administrator'): ?>
										<?php if ($dt['id_tanggapan'] == $last_row): ?>
											<a href="<?= base_url('tanggapan/removeTanggapan/' . $pengaduan['id_pengaduan'] . '/' . $dt['id_tanggapan']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dt['isi_tanggapan']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
										<?php endif ?>
									<?php endif ?>
								</td>
							</tr>
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
</div>
