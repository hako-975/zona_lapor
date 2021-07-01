<?php if (validation_errors()): ?>
  <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="z-index: 999999; position: fixed; right: 1.5rem; bottom: 3.5rem">
    <div class="toast-header">
      <strong class="mr-auto">Gagal!</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?= validation_errors(); ?>
    </div>
  </div>
<?php endif ?>

<div class="container">
	<div class="row">
		<div class="col-lg-6 p-3">
			<div class="card">
				<div class="card-header">
					<h3 class="my-auto"><i class="fas fa-fw fa-edit"></i> Ubah Kelurahan</h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('kelurahan/editKelurahan/' . $kelurahan['id_kelurahan']); ?>" method="post">
						<div class="form-group">
							<label for="id_kecamatan">Kecamatan</label>
							<select id="id_kecamatan" class="custom-select <?= (form_error('id_kecamatan')) ? 'is-invalid' : ''; ?>" name="id_kecamatan">
								<option value="<?= $kelurahan['id_kecamatan']; ?>"><?= $kelurahan['kecamatan']; ?></option>
								<?php foreach ($kecamatan as $dk): ?>
									<?php if ($dk['id_kecamatan'] != $kelurahan['id_kecamatan']): ?>
										<option value="<?= $dk['id_kecamatan']; ?>"><?= ucwords(strtolower($dk['kecamatan'])); ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback">
				              <?= form_error('id_kecamatan'); ?>
				            </div>
						</div>
						<div class="form-group">
							<label for="kelurahan">Kelurahan</label>
							<input type="text" id="kelurahan" class="form-control <?= (form_error('kelurahan')) ? 'is-invalid' : ''; ?>" name="kelurahan" required value="<?= (form_error('kelurahan')) ? set_value('kelurahan') : $kelurahan['kelurahan']; ?>">
							<div class="invalid-feedback">
				              <?= form_error('kelurahan'); ?>
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
