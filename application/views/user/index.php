<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-user"></i> User</h3>
		</div>
		<div class="col-lg header-button">
			<a href="<?= base_url('user/addUser'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah User</a>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Username</th>
							<th>Nama</th>
							<th>No. Telepon</th>
							<th>Jabatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($user as $du): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $du['username']; ?></td>
								<td><?= $du['nama']; ?></td>
								<td><?= $du['no_telepon']; ?></td>
								<td><?= $du['jabatan']; ?></td>
								<?php if ($du['jabatan'] != 'administrator'): ?>
									<td>
										<a href="<?= base_url('user/editUser/' . $du['id_user']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
										<a href="<?= base_url('user/removeUser/' . $du['id_user']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $du['username']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
									</td>
								<?php else: ?>
									<td></td>
								<?php endif ?>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>