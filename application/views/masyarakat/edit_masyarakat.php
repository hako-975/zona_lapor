<div class="container">
	<div class="row">
		<div class="col-lg-6 p-3">
			<div class="card">
				<div class="card-header">
					<h3 class="my-auto"><i class="fas fa-fw fa-edit"></i> Ubah Masyarakat</h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('masyarakat/editMasyarakat/' . $masyarakat['id_masyarakat']); ?>" method="post">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" id="nama" class="form-control <?= (form_error('nama')) ? 'is-invalid' : ''; ?>" name="nama" required value="<?= (form_error('nama')) ? set_value('nama') : $masyarakat['nama']; ?>">
							<div class="invalid-feedback">
				              <?= form_error('nama'); ?>
				            </div>
						</div>
						<div class="form-group">
							<label for="no_telepon">No. Telepon</label>
							<input type="number" id="no_telepon" class="form-control <?= (form_error('no_telepon')) ? 'is-invalid' : ''; ?>" name="no_telepon" required value="<?= (form_error('no_telepon')) ? set_value('no_telepon') : $masyarakat['no_telepon']; ?>">
							<div class="invalid-feedback">
				              <?= form_error('no_telepon'); ?>
				            </div>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea id="alamat" class="form-control <?= (form_error('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" required><?= (form_error('alamat')) ? set_value('alamat') : $masyarakat['alamat']; ?></textarea>
							<div class="invalid-feedback">
				              <?= form_error('alamat'); ?>
				            </div>
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
