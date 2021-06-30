<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-file"></i> Kecamatan</h3>
		</div>
		<div class="col-lg header-button">
			<a href="<?= base_url('kecamatan/addKecamatan'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Kecamatan</a>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Kecamatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($kecamatan as $dk): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dk['kecamatan']; ?></td>
									<td>
										<a href="<?= base_url('kecamatan/editKecamatan/' . $dk['id_kecamatan']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
										<?php if ($dataUser['jabatan'] == 'administrator'): ?>
											<a href="<?= base_url('kecamatan/removeKecamatan/' . $dk['id_kecamatan']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dk['kecamatan']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
