<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-file"></i> Tanggapan - <?= $pengaduan['isi_laporan']; ?></h3>
		</div>
		<div class="col-lg header-button">
			<a href="<?= base_url('tanggapan/addTanggapan/' . $pengaduan['id_pengaduan']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</a>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
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
											<a href="<?= base_url('tanggapan/removeTanggapan/' . $pengaduan['id_pengaduan'] . '/' . $dt['id_tanggapan']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dt['isi_tanggapan']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
										<?php endif ?>
									</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
