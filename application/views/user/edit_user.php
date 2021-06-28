<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg">
			<h3>Ubah User - <?= $user['username']; ?></h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg-6">
			<form action="<?= base_url('user/editUser/' . $user['id_user']); ?>" method="post">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama" required value="<?= (form_error('nama')) ? set_value('nama') : $user['nama']; ?>">
					<div class="invalid-feedback">
		              <?= form_error('nama'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="no_telepon">No. Telepon</label>
					<input type="number" id="no_telepon" class="form-control <?= (form_error('no_telepon')) ? 'is-invalid' : ''; ?>" name="no_telepon" required value="<?= (form_error('no_telepon')) ? set_value('no_telepon') : $user['no_telepon']; ?>">
					<div class="invalid-feedback">
		              <?= form_error('no_telepon'); ?>
		            </div>
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<select id="jabatan" class="custom-select <?= (form_error('jabatan')) ? 'is-invalid' : ''; ?>" name="jabatan">
						<?php if (form_error('jabatan')): ?>
							<option value="<?= set_value('jabatan'); ?>"><?= ucwords(set_value('jabatan')); ?></option>
							<option disabled>----------</option>
							<option value="administrator">Administrator</option>
							<option value="operator">Operator</option>
						<?php else: ?>
							<option value="<?= $user['jabatan']; ?>"><?= ucwords($user['jabatan']); ?></option>
							<option disabled>----------</option>
							<option value="administrator">Administrator</option>
							<option value="operator">Operator</option>
						<?php endif ?>
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