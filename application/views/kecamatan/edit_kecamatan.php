<div class="container">
	<div class="row">
		<div class="col-lg-6 p-3">
			<div class="card">
				<div class="card-header">
					<h3 class="my-auto"><i class="fas fa-fw fa-edit"></i> Ubah Kecamatan</h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('kecamatan/editKecamatan/' . $kecamatan['id_kecamatan']); ?>" method="post">
						<div class="form-group">
							<label for="kecamatan">Kecamatan</label>
							<input type="text" id="kecamatan" class="form-control <?= (form_error('kecamatan')) ? 'is-invalid' : ''; ?>" name="kecamatan" required value="<?= (form_error('kecamatan')) ? set_value('kecamatan') : $kecamatan['kecamatan']; ?>">
							<div class="invalid-feedback">
				              <?= form_error('kecamatan'); ?>
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
