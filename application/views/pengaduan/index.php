<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-exclamation"></i> Pengaduan</h3>
		</div>
		<div class="col-lg header-button">
			<a href="<?= base_url('pengaduan/addPengaduan'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Pengaduan</a>
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
							<th>Username Masyarakat</th>
							<th>Pengaduan</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($pengaduan as $dp): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dp['isi_laporan']; ?></td>
								<td><?= $dp['username']; ?></td>
								<td><?= $dp['kelurahan']; ?></td>
								<td>
									<a href="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="enlarge">
										<img src="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" class="img-fluid img-w-150" alt="<?= $dp['foto']; ?>">
									</a>
								</td>
									<td>
										<a href="<?= base_url('pengaduan/editPengaduan/' . $dp['id_pengaduan']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
										<?php if ($dataUser['jabatan'] == 'administrator'): ?>
											<a href="<?= base_url('pengaduan/removePengaduan/' . $dp['id_pengaduan']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dp['isi_laporan']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
