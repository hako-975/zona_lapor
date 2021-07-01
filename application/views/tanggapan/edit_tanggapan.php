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
					<form action="<?= base_url('tanggapan/editTanggapan/' . $pengaduan['id_pengaduan'] . '/' . $tanggapan['id_tanggapan']); ?>" method="post">
						<div class="form-group">
							<label for="id_pengaduan">pengaduan</label>
							<textarea style="cursor: not-allowed;" type="text" class="form-control" disabled><?= $pengaduan['isi_laporan']; ?></textarea>
						</div>
						<div class="form-group">
							<label for="isi_tanggapan">Isi Tanggapan</label>
							<textarea id="isi_tanggapan" class="form-control <?= (form_error('isi_tanggapan')) ? 'is-invalid' : ''; ?>" name="isi_tanggapan" required><?= (form_error('isi_tanggapan')) ? set_value('isi_tanggapan') : $tanggapan['isi_tanggapan']; ?></textarea>
							<div class="invalid-feedback">
				              <?= form_error('isi_tanggapan'); ?>
				            </div>
						</div>
						<div class="form-group">
							<label for="tgl_tanggapan">Tanggal Tanggapan</label>
							<input type="datetime-local" id="tgl_tanggapan" class="form-control <?= (form_error('tgl_tanggapan')) ? 'is-invalid' : ''; ?>" name="tgl_tanggapan" value="<?= (form_error('tgl_tanggapan')) ? set_value('tgl_tanggapan') : date('Y-m-d\TH:i:s', strtotime($tanggapan['tgl_tanggapan'])); ?>" required>
							<div class="invalid-feedback">
				              <?= form_error('tgl_tanggapan'); ?>
				            </div>
						</div>
						<?php 
							$status_tanggapan = $this->db->get_where('tanggapan', ['id_tanggapan' => $this->uri->segment(4)])->row_array()['status_tanggapan'];
							$status_ke = 0;
							if ($status_tanggapan == 'valid') 
							{
								$status_ke = 1;
							} 
							elseif ($status_tanggapan == 'proses') 
							{
								$status_ke = 2;
							}
							elseif ($status_tanggapan == 'pengerjaan') 
							{
								$status_ke = 3;
							}
							elseif ($status_tanggapan == 'selesai') 
							{
								$status_ke = 4;
							}
							elseif ($status_tanggapan == 'tidak_valid') 
							{
								$status_ke = 5;
							}
							
							$num_rows = $this->db->get_where('tanggapan', ['id_pengaduan' => $this->uri->segment(3)])->num_rows();
						?>
						<?php if ($status_ke == 1): ?>
							<?php if ($num_rows == 1): ?>
								<label>Data Valid?</label>
								<?php if ($tanggapan['status_tanggapan'] == 'valid'): ?>
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
								<?php else: ?>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="status_tanggapan" id="valid" value="valid">
									  <label class="form-check-label" for="valid">
									    <i class="fas fa-fw fa-check"></i> Valid
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="status_tanggapan" id="invalid" value="tidak_valid" checked>
									  <label class="form-check-label" for="invalid">
									    <i class="fas fa-fw fa-times"></i> Tidak Valid
									  </label>
									</div>
								<?php endif ?>
							<?php else: ?>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status_tanggapan" id="valid" value="valid" checked>
								  <label class="form-check-label" for="valid">
								    <i class="fas fa-fw fa-check"></i> Valid
								  </label>
								</div>
								<div class="form-check">
								  <input disabled class="form-check-input" type="radio" name="status_tanggapan" id="invalid" value="tidak_valid">
								  <label class="form-check-label mb-2" for="invalid">
								    <i class="fas fa-fw fa-times"></i> Tidak Valid
								    <br>
								    <small>(Hapus semua tanggapan hingga tersisa 1)</small>
								  </label>
								</div>
							<?php endif ?>
						<?php elseif($status_ke == 5): ?>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="status_tanggapan" id="valid" value="valid">
							  <label class="form-check-label" for="valid">
							    <i class="fas fa-fw fa-check"></i> Valid
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="status_tanggapan" id="invalid" value="tidak_valid" checked>
							  <label class="form-check-label" for="invalid">
							    <i class="fas fa-fw fa-times"></i> Tidak Valid
							  </label>
							</div>
						<?php else: ?>
							<?php if ($status_ke == 2): ?>
								<label>Dalam Proses?</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status_tanggapan" id="proses" value="proses" checked>
								  <label class="form-check-label" for="proses">
								    <i class="fas fa-fw fa-sync"></i> Proses
								  </label>
								</div>
							<?php elseif ($status_ke == 3): ?>
								<label>Dalam Pengerjaan?</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status_tanggapan" id="pengerjaan" value="pengerjaan" checked>
								  <label class="form-check-label" for="pengerjaan">
								    <i class="fas fa-fw fa-hammer"></i> Pengerjaan
								  </label>
								</div>
							<?php elseif ($status_ke == 4): ?>
								<label>Sudah Selesai?</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status_tanggapan" id="selesai" value="selesai" checked>
								  <label class="form-check-label" for="selesai">
								    <i class="fas fa-fw fa-check-double"></i> Selesai
								  </label>
								</div>
							<?php endif ?>
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
