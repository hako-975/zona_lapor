<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3><i class="fas fa-fw fa-user"></i> Profil - <?= $dataUser['username']; ?></h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg-6">
			<div class="card">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Username: <?= $dataUser['username']; ?></li>
					<li class="list-group-item">Nama: <?= $dataUser['nama']; ?></li>
					<li class="list-group-item">No. Telepon: <?= $dataUser['no_telepon']; ?></li>
					<li class="list-group-item">Jabatan: <?= $dataUser['jabatan']; ?></li>
					<li class="list-group-item">
						<div class="row">
							<div class="col">
								<a href="<?= base_url('admin/changePassword'); ?>" class="btn btn-danger"><i class="fas fa-fw fa-lock"></i> Ganti Password</a>
							</div>
							<div class="col">
								<a href="<?= base_url('admin/editProfile'); ?>" class="btn btn-success"><i class="fas fa-fw fa-user-edit"></i> Ubah Profil</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>