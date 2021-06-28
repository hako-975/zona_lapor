<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3><i class="fas fa-fw fa-user"></i> Ganti Password - <?= $dataUser['username']; ?></h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg-6">
			<form action="<?= base_url('admin/changePassword'); ?>" method="post">
				<div class="form-group">
					<label for="old_password"><i class="fas fa-fw fa-lock"></i> Password Lama</label>
					<input type="password" id="old_password" class="form-control <?= (form_error('old_password')) ? 'is-invalid' : ''; ?>" name="old_password" required value="<?= set_value('old_password'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('old_password'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="new_password"><i class="fas fa-fw fa-lock"></i> Password Baru</label>
					<input type="password" id="new_password" class="form-control <?= (form_error('new_password')) ? 'is-invalid' : ''; ?>" name="new_password" required value="<?= set_value('new_password'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('new_password'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="verify_new_password"><i class="fas fa-fw fa-lock"></i> Verifikasi Password Baru</label>
					<input type="password" id="verify_new_password" class="form-control <?= (form_error('verify_new_password')) ? 'is-invalid' : ''; ?>" name="verify_new_password" required value="<?= set_value('verify_new_password'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('verify_new_password'); ?>
		            </div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>