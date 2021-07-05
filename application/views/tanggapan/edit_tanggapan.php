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
					<?php 
						$status = explode('_', $tanggapan['status_tanggapan']);
						$status = implode(' ', $status);
						$status = ucwords(strtolower($status));
					?>
					<h3 class="my-auto"><i class="fas fa-fw fa-edit"></i> Ubah Tanggapan - <?= $status; ?></h3>
				</div>
			  	<div class="card-body">
					<form action="<?= base_url('tanggapan/editTanggapan/' . $pengaduan['id_pengaduan'] . '/' . $tanggapan['id_tanggapan']); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="foto">Foto</label><br>
							<a href="<?= base_url('assets/img/img_pengaduan/') . $pengaduan['foto']; ?>" class="enlarge">
								<img src="<?= base_url('assets/img/img_pengaduan/') . $pengaduan['foto']; ?>" class="img-fluid img-w-150" alt="<?= $pengaduan['foto']; ?>">
							</a>
						</div>
						<div class="form-group">
							<label for="id_pengaduan">pengaduan</label>
							<textarea style="cursor: not-allowed;" type="text" class="form-control" disabled><?= $pengaduan['isi_laporan']; ?></textarea>
						</div>
						<div class="form-group">
							<label for="tgl_pengaduan">Tanggal Pengaduan</label>
							<input disabled type="datetime-local" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($pengaduan['tgl_pengaduan'])); ?>">
						</div>

						<div class="form-group">
							<label for="foto_tanggapan">Foto</label> <br>
							<a href="<?= base_url('assets/img/img_tanggapan/') . $tanggapan['foto_tanggapan']; ?>" class="enlarge" id="check_enlarge_photo">
								<img class="img-fluid rounded img-w-150 border border-dark" id="check_photo" src="<?= base_url('assets/img/img_tanggapan/') . $tanggapan['foto_tanggapan']; ?>" alt="<?= $tanggapan['foto_tanggapan']; ?>">
							</a>
							<br>
						</div>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">Upload Foto</span>
						  </div>
						  <div class="custom-file">
						    <input type="file" class="custom-file-input" id="foto" aria-describedby="foto_tanggapan" name="foto_tanggapan">
						    <label class="custom-file-label" for="foto_tanggapan">Pilih file</label>
						  </div>
						</div>

						<div class="form-group">
							<label for="isi_tanggapan">Isi Tanggapan</label>
							<textarea id="isi_tanggapan" class="form-control <?= (form_error('isi_tanggapan')) ? 'is-invalid' : ''; ?>" name="isi_tanggapan" required><?= (form_error('isi_tanggapan')) ? set_value('isi_tanggapan') : $tanggapan['isi_tanggapan']; ?></textarea>
							<div class="invalid-feedback">
	              <?= form_error('isi_tanggapan'); ?>
	            </div>
						</div>
						<?php if ($tanggapan['status_tanggapan'] == 'tidak_valid'): ?>
							<div class="form-group">
								<small class="text-danger"><i class="fas fa-fw fa-exclamation"></i> Untuk mengubah status menjadi valid, hapus tanggapan ini</small>
							</div>
						<?php endif ?>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
