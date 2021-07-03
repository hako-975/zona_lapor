<script type="text/javascript">
	$(document).ready(function(){
		$('body').on("change", "#form_kecamatan", function() {
			var id = $(this).val();
			var data = "id="+id+"&data=kelurahan";

			$.ajax({
				type: 'POST',
				url: "<?= base_url('pelaporPengaduan/getKelurahanFilePelapor'); ?>",
				data: data,
				success: function(hasil) {
					$("#form_kelurahan").html(hasil);
					$("#form_kelurahan").show();
				}
			});
		});
	});
</script>