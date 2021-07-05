<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-building"></i> Kelurahan</h3>
		</div>
		<?php if ($dataUser['jabatan'] == 'administrator'): ?>
			<div class="col-lg header-button">
				<a href="<?= base_url('kelurahan/addKelurahan'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Kelurahan</a>
			</div>
		<?php endif ?>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th class="align-middle">No.</th>
							<th class="align-middle">Kelurahan</th>
							<th class="align-middle">Kecamatan</th>
							<?php if ($dataUser['jabatan'] == 'administrator'): ?>
								<th class="align-middle">Aksi</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($kelurahan as $dk): ?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $dk['kelurahan']; ?></td>
								<td class="align-middle"><?= $dk['kecamatan']; ?></td>
								<?php if ($dataUser['jabatan'] == 'administrator'): ?>
									<td class="align-middle text-center">
										<a href="<?= base_url('kelurahan/editKelurahan/' . $dk['id_kelurahan']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
										<?php if ($dataUser['jabatan'] == 'administrator'): ?>
											<a href="<?= base_url('kelurahan/removeKelurahan/' . $dk['id_kelurahan']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dk['kelurahan']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
										<?php endif ?>
									</td>
								<?php endif ?>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
