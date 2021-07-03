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
			  	<h3 class="my-auto"><i class="fas fa-fw fa-plus"></i> Tambah Pengaduan</h3>
			  </div>
			  <div class="card-body">
			  	<form action="<?= base_url('pengaduan/addPengaduan'); ?>" method="post" enctype="multipart/form-data">
			  		<div class="form-group">
						<label for="isi_laporan">Isi Laporan</label>
						<textarea id="isi_laporan" class="form-control <?= (form_error('isi_laporan')) ? 'is-invalid' : ''; ?>" name="isi_laporan" required><?= set_value('isi_laporan'); ?></textarea>
						<div class="invalid-feedback">
			              <?= form_error('isi_laporan'); ?>
			            </div>
					</div>
					<div class="form-group">
						<label for="id_masyarakat">Pelapor</label>
						<select id="id_masyarakat" class="custom-select <?= (form_error('id_masyarakat')) ? 'is-invalid' : ''; ?>" name="id_masyarakat">
							<?php foreach ($masyarakat as $dm): ?>
								<option value="<?= $dm['id_masyarakat']; ?>"><?= ucwords(strtolower($dm['username'])); ?></option>
							<?php endforeach ?>
						</select>
						<div class="invalid-feedback">
              <?= form_error('id_masyarakat'); ?>
            </div>
					</div>
					<div class="form-group">
						<label for="form_kecamatan">Kecamatan</label>
						<select class="custom-select <?= (form_error('id_kecamatan')) ? 'is-invalid' : ''; ?>" id="form_kecamatan">
							<option value="0">Pilih Kecamatan</option>
							<?php foreach ($kecamatan as $dataKecamatan): ?>
								<option value="<?= $dataKecamatan['id_kecamatan']; ?>"><?= $dataKecamatan['kecamatan']; ?></option>
							<?php endforeach ?>
						</select>
						<div class="invalid-feedback">
              <?= form_error('id_kecamatan'); ?>
            </div>
					</div>
					<div class="form-group">
						<label for="form_kelurahan">Kelurahan</label>
						<select id="form_kelurahan" class="custom-select <?= (form_error('id_kelurahan')) ? 'is-invalid' : ''; ?>" name="id_kelurahan">
							<option value="0">Pilih Kecamatan</option>
						</select>
						<div class="invalid-feedback">
              <?= form_error('id_kelurahan'); ?>
            </div>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label> <br>
						<a href="<?= base_url('assets/img/img_pengaduan/default.png'); ?>" class="enlarge" id="check_enlarge_photo">
							<img class="img-fluid rounded img-w-150 border border-dark" id="check_photo" src="<?= base_url('assets/img/img_pengaduan/default.png'); ?>" alt="Foto Pengaduan">
						</a>
						<br>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Upload Foto</span>
					  </div>
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="foto" aria-describedby="foto" id="foto" name="foto">
					    <label class="custom-file-label" for="foto">Pilih file</label>
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

