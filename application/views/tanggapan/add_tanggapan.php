<div class="container">
	<div class="row">
		<div class="col-lg-6 p-3">
			<div class="card">
			  <div class="card-header">
			  	<h3 class="my-auto"><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</h3>
			  </div>
			  <div class="card-body">
			  	<form action="<?= base_url('tanggapan/addTanggapan/' . $pengaduan['id_pengaduan']); ?>" method="post">
					<div class="form-group">
						<label for="id_pengaduan">Pengaduan</label>
						<textarea style="cursor: not-allowed;" type="text" class="form-control" disabled><?= $pengaduan['isi_laporan']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="isi_tanggapan">Isi Tanggapan</label>
						<textarea id="isi_tanggapan" class="form-control <?= (form_error('isi_tanggapan')) ? 'is-invalid' : ''; ?>" name="isi_tanggapan" required><?= set_value('isi_tanggapan'); ?></textarea>
						<div class="invalid-feedback">
			              <?= form_error('isi_tanggapan'); ?>
			            </div>
					</div>
					<div class="form-group">
						<label for="tgl_tanggapan">Tanggal Tanggapan</label>
						<input type="datetime-local" id="tgl_tanggapan" class="form-control <?= (form_error('tgl_tanggapan')) ? 'is-invalid' : ''; ?>" name="tgl_tanggapan" value="<?= (form_error('tgl_tanggapan')) ? date('Y-m-d\TH:i:s', strtotime(set_value('tgl_tanggapan'))) : date('Y-m-d\TH:i:s'); ?>" required>
						<div class="invalid-feedback">
			              <?= form_error('tgl_tanggapan'); ?>
			            </div>
					</div>
					<label>Data Valid?</label>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="status_tanggapan" id="valid" value="valid" checked>
					  <label class="form-check-label" for="valid">
					    <i class="fas fa-fw fa-check"></i> Valid
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="status_tanggapan" id="invalid" value="tidak_valid">
					  <label class="form-check-label" for="invalid">
					    <i class="fas fa-fw fa-times"></i> Tidak Valid
					  </label>
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