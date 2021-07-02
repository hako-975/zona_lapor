<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-file"></i> Kelurahan</h3>
		</div>
		<div class="col-lg header-button">
			<a href="<?= base_url('kelurahan/addKelurahan'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Kelurahan</a>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Kelurahan</th>
							<th>Kecamatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($kelurahan as $dk): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dk['kelurahan']; ?></td>
								<td><?= $dk['kecamatan']; ?></td>
								<td>
									<a href="<?= base_url('kelurahan/editKelurahan/' . $dk['id_kelurahan']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
									<?php if ($dataUser['jabatan'] == 'administrator'): ?>
										<a href="<?= base_url('kelurahan/removeKelurahan/' . $dk['id_kelurahan']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dk['kelurahan']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
									<?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
						<?php if ($kelurahan == null): ?>
							<tr>
								<td colspan="4" class="text-center">Tidak ada data.</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
