<?php 
	$proses = $this->db->get_where('tanggapan', ['status_tanggapan' => 'proses'])->num_rows();
	$valid = $this->db->get_where('tanggapan', ['status_tanggapan' => 'valid'])->num_rows();
	$pengerjaan = $this->db->get_where('tanggapan', ['status_tanggapan' => 'pengerjaan'])->num_rows();
	$selesai = $this->db->get_where('tanggapan', ['status_tanggapan' => 'selesai'])->num_rows();
	$tidak_valid = $this->db->get_where('tanggapan', ['status_tanggapan' => 'tidak_valid'])->num_rows();
?>

<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3><i class="fas fa-fw fa-tachometer-alt"></i> Dasbor</h3>
		</div>
	</div>
	<div class="row my-3">
		<div class="col-lg-3">
            <div class="card shadow">
	            <div class="card-body">
	              <h5><i class="fas fa-fw fa-times"></i> Belum ditanggapi</h5>
	              <h6 class="text-muted">Jumlah data: 0</h6>
	              <a href="<?= base_url('tanggapan'); ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
	            </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card shadow">
	            <div class="card-body">
	              <h5><i class="fas fa-fw fa-sync"></i> Proses</h5>
	              <h6 class="text-muted">Jumlah data: <?= $proses; ?></h6>
	              <a href="<?= base_url('tanggapan/allTanggapan/proses'); ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
	            </div>
            </div>
        </div>
        <div class="col-lg-3">
        	<div class="card shadow">
	            <div class="card-body">
	              <h5><i class="fas fa-fw fa-check"></i> Valid</h5>
	              <h6 class="text-muted">Jumlah data: <?= $valid; ?></h6>
	              <a href="<?= base_url('tanggapan/allTanggapan/valid'); ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
	            </div>
	        </div>
	    </div>
        <div class="col-lg-3">
	        <div class="card shadow">
	            <div class="card-body">
	              <h5><i class="fas fa-fw fa-hammer"></i> Pengerjaan</h5>
	              <h6 class="text-muted">Jumlah data: <?= $pengerjaan; ?></h6>
	              <a href="<?= base_url('tanggapan/allTanggapan/pengerjaan'); ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
	            </div>
	        </div>
        </div>
        <div class="col-lg-3">
	        <div class="card shadow">
	            <div class="card-body">
	              <h5><i class="fas fa-fw fa-check-double"></i> Selesai</h5>
	              <h6 class="text-muted">Jumlah data: <?= $selesai; ?></h6>
	              <a href="<?= base_url('tanggapan/allTanggapan/selesai'); ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
	            </div>
	        </div>
        </div>
        <div class="col-lg-3">
	        <div class="card shadow">
	            <div class="card-body">
	              <h5><i class="fas fa-fw fa-times"></i> Tidak Valid</h5>
	              <h6 class="text-muted">Jumlah data: <?= $tidak_valid; ?></h6>
	              <a href="<?= base_url('tanggapan/allTanggapan/tidak_valid'); ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
	            </div>
	        </div>
        </div>
	</div>
	<hr>
	<div class="row my-3">
		<div class="col-lg">
			<h4><i class="fas fa-fw fa-times"></i> Laporan yang belum ditanggapi</h4>
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th class="align-middle">No.</th>
							<th class="align-middle">Tanggal Pengaduan</th>
							<th class="align-middle">Isi Laporan</th>
							<th class="align-middle">Lokasi</th>
							<th class="align-middle">Foto</th>
							<th class="align-middle">Pelapor</th>
							<th class="align-middle">Status</th>
							<th class="align-middle">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($pengaduan as $dp): ?>
							<?php 
								$this->db->order_by('tanggapan.id_tanggapan', 'desc');
								$getStatusTanggapan = $this->db->get_where('tanggapan', ['id_pengaduan' => $dp['id_pengaduan']])->row_array();
								if ($getStatusTanggapan) 
								{
									$status = $getStatusTanggapan['status_tanggapan'];
									$status = explode('_', $status);
									$status = implode(' ', $status);
									$status = ucwords(strtolower($status));
								}
							?>

							<?php if (!$getStatusTanggapan): ?>
								<tr>
									<td class="align-middle"><?= $i++; ?></td>
									<td class="align-middle"><?= $dp['tgl_pengaduan']; ?></td>
									<td class="align-middle"><?= $dp['isi_laporan']; ?></td>
									<td class="align-middle"><?= $dp['kelurahan']; ?></td>
									<td class="align-middle text-center">
										<a href="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="enlarge">
											<img src="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="img-fluid img-w-75-hm-100" alt="<?= $dp['foto']; ?>">
										</a>
									</td>
									<td class="align-middle"><?= $dp['username']; ?></td>
									<td class="align-middle"><button type="button" class="btn text-center btn-sm btn-secondary"><i class="fas fa-fw fa-times"></i> Belum ditanggapi</button></td>
									<td class="align-middle text-center">
										<a href="<?= base_url('tanggapan/index/' . $dp['id_pengaduan']); ?>" class="btn btn-sm btn-info m-1"><i class="fas fa-fw fa-reply"></i></a>
									</td>
								</tr>
							<?php endif ?>
						<?php endforeach ?>
						<?php if ($pengaduan == null): ?>
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