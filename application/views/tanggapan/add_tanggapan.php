<?php 
	$num_rows = $this->db->get_where('tanggapan', ['id_pengaduan' => $this->uri->segment(3)])->num_rows();

	// cek apakah status sudah selesai
	if ($num_rows == 4) 
	{
		redirect('tanggapan/index/' . $this->uri->segment(3));
		exit;
	}

	$this->db->order_by('id_tanggapan', 'desc');
	$tanggapan = $this->db->get_where('tanggapan', ['id_pengaduan' => $this->uri->segment(3)])->row_array();

?>

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
			  	<h3 class="my-auto"><i class="fas fa-fw fa-plus"></i> Tambah Tanggapan</h3>
			  </div>
			  <div class="card-body">
			  	<form action="<?= base_url('tanggapan/addTanggapan/' . $pengaduan['id_pengaduan']); ?>" method="post">
						<div class="form-group">
							<label for="foto">Foto</label><br>
							<a href="<?= base_url('assets/img/img_pengaduan/') . $pengaduan['foto']; ?>" class="enlarge">
								<img src="<?= base_url('assets/img/img_pengaduan/') . $pengaduan['foto']; ?>" class="img-fluid img-w-150" alt="<?= $pengaduan['foto']; ?>">
							</a>
						</div>
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
						<?php if ($num_rows == 0): ?>
							<label>Dalam Proses?</label>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="status_tanggapan" id="proses" value="proses" checked>
							  <label class="form-check-label" for="proses">
							    <i class="fas fa-fw fa-sync"></i> Proses
							  </label>
							</div>
						<?php elseif ($num_rows == 1 && $tanggapan['status_tanggapan'] == 'proses'): ?>
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
						<?php elseif ($num_rows == 2 && $tanggapan['status_tanggapan'] == 'valid'): ?>
							<label>Dalam Pengerjaan?</label>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="status_tanggapan" id="pengerjaan" value="pengerjaan" checked>
							  <label class="form-check-label" for="pengerjaan">
							    <i class="fas fa-fw fa-hammer"></i> Pengerjaan
							  </label>
							</div>
						<?php elseif ($num_rows == 3 && $tanggapan['status_tanggapan'] == 'pengerjaan'): ?>
							<label>Sudah Selesai?</label>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="status_tanggapan" id="selesai" value="selesai" checked>
							  <label class="form-check-label" for="selesai">
							    <i class="fas fa-fw fa-check-double"></i> Selesai
							  </label>
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
