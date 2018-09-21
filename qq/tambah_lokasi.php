<script type="text/javascript">
	document.title="Tambah Lokasi";
	document.getElementById('lokasi').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Tambah Lokasi</h3>
				<form class="form-input" method="post" action="handler.php?action=tambah_lokasi">
					<label>Alamat :  </label>
					<input type="text" name="alamat" placeholder="ALAMAT" required="required">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="lokasi.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
