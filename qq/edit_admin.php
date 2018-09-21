<script type="text/javascript">
	document.title="Edit Kasir";
	document.getElementById('users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Akun</h3>
				<form class="form-input" method="post" action="handler.php?action=edit_akun">
					<?php $f=$root->edit_akun($_GET['id_kasir']) ?>
					<input type="hidden" name="id" value="<?= $f['id'] ?>">
					<label>Nama     : </label>
					<input type="text" name="nama" placeholder="Nama" required="required" value="<?= $f['nama'] ?>">
					<label>Nama     : </label>
					<input type="text" name="nama_kasir" placeholder="Username Kasir" required="required" value="<?= $f['username'] ?>">
					<label>Password     : </label>
					<input type="text" name="password" placeholder="Password">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="setting_akun.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
