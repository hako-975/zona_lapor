<div class="container">
	<div class="row justify-content-center py-3">
		<div class="col-lg header-title">
			<h3><i class="fas fa-fw fa-lightbulb"></i> Saran</h3>
		</div>
	</div>
	<div class="row py-3">
		<div class="col-lg">
			<div class="table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Tanggal Saran</th>
							<th>Isi Saran</th>
							<th>Nama</th>
							<th>No. Telepon</th>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($saran as $ds): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $ds['tgl_saran']; ?></td>
								<td><?= $ds['saran']; ?></td>
								<td><?= $ds['nama']; ?></td>
								<td><?= $ds['no_telepon']; ?></td>
								<td><?= $ds['alamat']; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>