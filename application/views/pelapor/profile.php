<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3><i class="fas fa-fw fa-user"></i> Profil - <?= $dataUser['username']; ?></h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg-6 bg-white border rounded p-3">
			<table>
				<tr>
					<th>Username</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td><?= $dataUser['username']; ?></td>
				</tr>
				
				<tr>
					<th>Nama Lengkap</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td><?= $dataUser['nama']; ?></td>
				</tr>
				
				<tr>
					<th>No. Telepon</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td><?= $dataUser['no_telepon']; ?></td>
				</tr>

				<tr>
					<th>Alamat</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td><?= $dataUser['alamat']; ?></td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="row pt-3">
							<div class="col">
								<a href="<?= base_url('pelapor/changePassword'); ?>" class="btn btn-danger"><i class="fas fa-fw fa-lock"></i> Ganti Password</a>
							</div>
							<div class="col">
								<a href="<?= base_url('pelapor/editProfile'); ?>" class="btn btn-success"><i class="fas fa-fw fa-user-edit"></i> Ubah Profil</a>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>