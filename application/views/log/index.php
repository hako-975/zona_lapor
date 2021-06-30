<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-history"></i> Aktivitas</h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Isi Log</th>
							<th>Tanggal Log</th>
							<th>Username</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($log as $dl): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $dl['isi_log']; ?></td>
								<td><?= $dl['tgl_log']; ?></td>
								<td><?= $dl['username']; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>