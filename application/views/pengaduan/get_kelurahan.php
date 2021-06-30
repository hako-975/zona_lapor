<?php 
	$data = $_POST['data'];
	$id = $_POST['id'];
?>

<?php if($data == "kelurahan") : ?>
	<select id="form_kelurahan" name="id_kelurahan">
		<?php 
			$this->db->order_by('kelurahan', 'asc');
			$kelurahan = $this->db->get_where('kelurahan', ['kelurahan.id_kecamatan' => $id])->result_array();
		?>
		<?php foreach ($kelurahan as $dataKelurahan): ?>
			<option value="<?= $dataKelurahan['id_kelurahan']; ?>"><?= $dataKelurahan['kelurahan']; ?></option>
		<?php endforeach ?>
	</select>
 
<?php endif ?>