<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-users"></i> Masyarakat</h3>
		</div>
		<?php if ($dataUser['jabatan'] == 'administrator'): ?>
			<div class="col-lg header-button">
				<a href="<?= base_url('masyarakat/addMasyarakat'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Masyarakat</a>
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
							<th class="align-middle">Username</th>
							<th class="align-middle">Nama</th>
							<th class="align-middle">No. Telepon</th>
							<th class="align-middle">Alamat</th>
							<?php if ($dataUser['jabatan'] == 'administrator'): ?>
								<th class="align-middle">Aksi</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($masyarakat as $dm): ?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $dm['username']; ?></td>
								<td class="align-middle"><?= $dm['nama']; ?></td>
								<td class="align-middle"><?= $dm['no_telepon']; ?></td>
								<td class="align-middle"><?= $dm['alamat']; ?></td>
								<?php if ($dataUser['jabatan'] == 'administrator'): ?>
									<td class="align-middle text-center">
										<a href="<?= base_url('masyarakat/editMasyarakat/' . $dm['id_masyarakat']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
										<?php if ($dataUser['jabatan'] == 'administrator'): ?>
											<a href="<?= base_url('masyarakat/removeMasyarakat/' . $dm['id_masyarakat']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dm['username']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
