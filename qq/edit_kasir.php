<script type="text/javascript">
	document.title="Edit Kasir";
	document.getElementById('users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Pegawai</h3>
				<form class="form-input" method="post" action="handler.php?action=edit_kasir">
					<?php $f=$root->edit_kasir($_GET['id_kasir']) ?>
					<input type="hidden" name="id" value="<?= $f['id'] ?>">
					<label>Nama     : </label>
					<input type="text" name="nama" placeholder="Nama" required="required" value="<?= $f['nama'] ?>">
					<input type="hidden" name="nama_kasir" placeholder="Username Kasir" required="required" value="<?= $f['username'] ?>">
					<input autocomplete="on" type="hidden" name="password" placeholder="Password">
					<label>* Hanya dapat mengubah nama</label><br>
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="users.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
