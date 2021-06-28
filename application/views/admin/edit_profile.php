<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3><i class="fas fa-fw fa-user"></i> Ubah Profil - <?= $dataUser['username']; ?></h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg-6">
			<form action="<?= base_url('admin/editProfile'); ?>" method="post">
				<div class="form-group">
					<label for="nama"><i class="fas fa-fw fa-user"></i> Nama</label>
					<input type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama" required value="<?= (form_error('nama')) ? set_value('nama') : $dataUser['nama']; ?>">
					<div class="invalid-feedback">
		              <?= form_error('nama'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="no_telepon"><i class="fas fa-fw fa-phone"></i> No. Telepon</label>
					<input type="number" id="no_telepon" class="form-control <?= (form_error('no_telepon')) ? 'is-invalid' : ''; ?>" name="no_telepon" required value="<?= (form_error('no_telepon')) ? set_value('no_telepon') : $dataUser['no_telepon']; ?>">
					<div class="invalid-feedback">
		              <?= form_error('no_telepon'); ?>
		            </div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>