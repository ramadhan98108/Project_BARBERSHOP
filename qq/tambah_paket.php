<script type="text/javascript">
	document.title="Tambah Paket;
	document.getElementById('paket').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Tambah Paket</h3>
				<form class="form-input" method="post" action="handler.php?action=tambah_paket">
					<input type="text" name="nama_paket" placeholder="Nama Paket" required="required">
					<input type="text" name="keterangan" placeholder="Keterangan" required="required">
					<input type="number" name="harga_jual" placeholder="Harga" required="required">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="paket.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
