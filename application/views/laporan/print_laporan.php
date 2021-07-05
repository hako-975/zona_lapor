<?php 
	$filter = explode('/', $filter);
	$dari_tgl = $filter[0];
	$sampai_tgl = $filter[1];
	$status_pengaduan = $filter[2];
	
	$dari_tgl = date("Y-m-d\T00:00:01", strtotime($dari_tgl));
	$sampai_tgl = date("Y-m-d\T23:59:59", strtotime($sampai_tgl));
	$this->db->join('masyarakat', 'pengaduan.id_masyarakat=masyarakat.id_masyarakat');
	$this->db->join('kelurahan', 'pengaduan.id_kelurahan=kelurahan.id_kelurahan');
	$this->db->order_by('id_pengaduan', 'desc');
	if ($status_pengaduan == 'semua')
	{
		$pengaduan = $this->db->get_where('pengaduan', ['tgl_pengaduan >=' => $dari_tgl, 'tgl_pengaduan <=' => $sampai_tgl])->result_array();
	}
	else
	{
		$pengaduan = $this->db->get_where('pengaduan', ['tgl_pengaduan >=' => $dari_tgl, 'tgl_pengaduan <=' => $sampai_tgl, 'status_pengaduan' => $status_pengaduan])->result_array();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<style>
		.btn {
		  display: inline-block;
		  font-weight: 400;
		  color: #212529;
		  text-align: center;
		  vertical-align: middle;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		  background-color: transparent;
		  border: 2px solid transparent;
		  padding: 0.375rem 0.75rem;
		  font-size: 1rem;
		  line-height: 1.5;
		  border-radius: 0.25rem;
		  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		  text-decoration: none;
		}

		.btn-success {
		  color: #fff;
		  background-color: #28a745;
		  border-color: #28a745;
		}

		@media print {
			.not-printed {
				display: none;
			}
		}
	</style>
</head>
<body>
	<a class="btn btn-success not-printed" href="<?= base_url('laporan/printLaporan/') . $filter[0] . '/' . $filter[1] . '/' . $filter[2]; ?>">Cetak</a>
	<?php 
		$status_pengaduan = explode('_', $status_pengaduan);
		$status_pengaduan = implode(' ', $status_pengaduan);
		$status_pengaduan = ucwords($status_pengaduan);
	?>
	<h4>Laporan - <?= date('Y-M-d', strtotime($dari_tgl)); ?> s/d <?= date('Y-M-d', strtotime($sampai_tgl)); ?>, status: <?= $status_pengaduan; ?></h4>
	<table cellpadding="10" cellspacing="0" border="1">
		<thead>
			<tr>
				<th>No.</th>
				<th>Pelapor</th>
				<th>Tanggal Pengaduan</th>
				<th>Isi Laporan</th>
				<th>Lokasi</th>
				<th>Foto</th>
				<th>Status</th>
				<th>Tanggapan</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($pengaduan as $dp): ?>
				<?php 
					$getTanggapan = $this->db->order_by('tanggapan.id_tanggapan', 'desc')->get_where('tanggapan', ['id_pengaduan' => $dp['id_pengaduan']])->row_array();
					$status_pengaduan = explode('_', $dp['status_pengaduan']);
					$status_pengaduan = implode(' ', $status_pengaduan);
					$status_pengaduan = ucwords($status_pengaduan);
				?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $dp['username']; ?></td>
					<td><?= date('Y-m-d, \P\u\k\u\l H:i', strtotime($dp['tgl_pengaduan'])); ?></td>
					<td><?= $dp['isi_laporan']; ?></td>
					<td><?= $dp['kelurahan']; ?></td>
					<td>
						<img height="75" src="<?= base_url('assets/img/img_pengaduan/') . $dp['foto']; ?>" alt="<?= $dp['foto']; ?>">
					</td>
					<td><?= $status_pengaduan; ?></td>
					<td>
						<?php if ($getTanggapan): ?>
							<?php if ($getTanggapan['status_tanggapan'] == 'proses'): ?>
								<p><?= $getTanggapan['isi_tanggapan']; ?></p>
							<?php elseif ($getTanggapan['status_tanggapan'] == 'valid'): ?>
								<p><?= $getTanggapan['isi_tanggapan']; ?></p>
							<?php elseif ($getTanggapan['status_tanggapan'] == 'pengerjaan'): ?>
								<p><?= $getTanggapan['isi_tanggapan']; ?></p>
							<?php elseif ($getTanggapan['status_tanggapan'] == 'selesai'): ?>
								<p><?= $getTanggapan['isi_tanggapan']; ?></p>
							<?php elseif ($getTanggapan['status_tanggapan'] == 'tidak_valid'): ?>
								<p><?= $getTanggapan['isi_tanggapan']; ?></p>
							<?php endif ?>
						<?php else: ?>
							<p>-</p>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

<script>
	window.print();
</script>
</body>
</html>

