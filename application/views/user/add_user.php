<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3>Tambah User</h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg-6">
			<form action="<?= base_url('user/addUser'); ?>" method="post">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama" required value="<?= set_value('nama'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('nama'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" name="username" required value="<?= set_value('username'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('username'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" name="password" required value="<?= set_value('password'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('password'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="password_verify">Verifikasi Password</label>
					<input type="password" id="password_verify" class="form-control <?= (form_error('password_verify')) ? 'is-invalid' : ''; ?>" name="password_verify" required value="<?= set_value('password_verify'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('password_verify'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="no_telepon">No. Telepon</label>
					<input type="number" id="no_telepon" class="form-control <?= (form_error('no_telepon')) ? 'is-invalid' : ''; ?>" name="no_telepon" required value="<?= set_value('no_telepon'); ?>">
					<div class="invalid-feedback">
		              <?= form_error('no_telepon'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<select id="jabatan" class="custom-select <?= (form_error('jabatan')) ? 'is-invalid' : ''; ?>" name="jabatan">
						<option value="administrator">Administrator</option>
						<option value="operator">Operator</option>
					</select>
					<div class="invalid-feedback">
		              <?= form_error('jabatan'); ?>
		            </div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>