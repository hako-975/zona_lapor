<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-file"></i> Masyarakat</h3>
		</div>
		<div class="col-lg header-button">
			<a href="<?= base_url('masyarakat/addMasyarakat'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Masyarakat</a>
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
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($masyarakat as $dm): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dm['username']; ?></td>
								<td><?= $dm['nama']; ?></td>
								<td><?= $dm['no_telepon']; ?></td>
								<td><?= $dm['alamat']; ?></td>
									<td>
										<a href="<?= base_url('masyarakat/editMasyarakat/' . $dm['id_masyarakat']); ?>" class="btn btn-sm btn-success m-1"><i class="fas fa-fw fa-edit"></i></a>
										<?php if ($dataUser['jabatan'] == 'administrator'): ?>
											<a href="<?= base_url('masyarakat/removeMasyarakat/' . $dm['id_masyarakat']); ?>" class="btn btn-sm btn-danger m-1 btn-delete" data-nama="<?= $dm['username']; ?>"><i class="fas fa-fw fa-fw fa-trash"></i></a>
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
