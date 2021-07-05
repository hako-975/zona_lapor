<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-user"></i> User</h3>
		</div>
		<?php if ($dataUser['jabatan'] == 'administrator'): ?>
			<div class="col-lg header-button">
				<a href="<?= base_url('user/addUser'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah User</a>
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
							<th class="align-middle">Jabatan</th>
							<?php if ($dataUser['jabatan'] == 'administrator'): ?>
								<th class="align-middle">Aksi</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($user as $du): ?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $du['username']; ?></td>
								<td class="align-middle"><?= $du['nama']; ?></td>
								<td class="align-middle"><?= $du['no_telepon']; ?></td>
								<td class="align-middle"><?= $du['jabatan']; ?></td>
								<?php if ($dataUser['jabatan'] == 'administrator'): ?>
									<?php if ($du['jabatan'] != 'administrator'): ?>
										<td class="align-middle text-center">
											<a href="<?= base_url('user/editUser/' . $du['id_user']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
											<a href="<?= base_url('user/removeUser/' . $du['id_user']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $du['username']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
										</td>
									<?php else: ?>
										<td class="align-middle"></td>
									<?php endif ?>
								<?php endif ?>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>