<script type="text/javascript">
	document.title="Tambah Pegawai";
	document.getElementById('users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Tambah Pegawai</h3>
				<form class="form-input" method="post" action="handler.php?action=tambah_kasir">
				<label>Username :</label>
					<input type="text" name="nama_kasir" placeholder="Username Kasir" required="required">
				<label>Password :</label>
					<input autocomplete="off" type="text" name="password" placeholder="Password" required="required">
					<input type="hidden" name="id_lokasi" placeholder="Username Kasir" value="<?php echo $_SESSION['id_lokasi'] ?>" required="required">
				<label>Nama :</label>
					<input type="text" name="nama" placeholder="NAMA" required="required">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="users.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
