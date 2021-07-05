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
			<?php 
				if (strlen($pengaduan['isi_laporan']) > 30) 
				{
					$isi_laporan = substr($pengaduan['isi_laporan'], 0, 30) . '...';
				}
				else
				{
					$isi_laporan = $pengaduan['isi_laporan'];
				}
			?>
			<h3><i class="fas fa-fw fa-reply"></i> Tanggapan - <?= $isi_laporan; ?></h3>
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
					<div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<small class="text-secondary"> Belum ditanggapi</small>
			<?php else: ?>
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
							<th class="align-middle">Tanggal Tanggapan</th>
							<th class="align-middle">Isi Tanggapan</th>
							<th class="align-middle">Status</th>
							<th class="align-middle">Penanggap</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($tanggapan as $dt): ?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= date('d-M-Y,\P\u\k\u\l H:i', strtotime($dt['tgl_tanggapan'])); ?></td>
								<td class="align-middle"><?= $dt['isi_tanggapan']; ?></td>
								<?php 
									$status = explode('_', $dt['status_tanggapan']);
									$status = implode(' ', $status);
									$status = ucwords(strtolower($status));
								?>
								<td class="align-middle"><?= $status; ?></td>
								<td class="align-middle"><?= $dt['username']; ?></td>
							</tr>
						<?php endforeach ?>
						<?php if ($tanggapan == null): ?>
							<tr>
								<td class="text-center align-middle" colspan="5">Tidak ada data.</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
