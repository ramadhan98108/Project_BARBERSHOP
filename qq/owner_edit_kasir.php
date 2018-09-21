<script type="text/javascript">
	document.title="Edit Pegawai";
	document.getElementById('owner_users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Pegawai</h3>
				<form class="form-input" method="post" action="handler.php?action=owner_edit_kasir">
					<?php $f=$root->owner_edit_kasir($_GET['id']) ?>
					<input type="hidden" name="id" value="<?= $f['id'] ?>">
					<label>Nama     : </label>
					<input type="text" name="nama" placeholder="Nama" required="required" value="<?= $f['nama'] ?>">
					<label>Lokasi    : </label>
					<select style="width: 372px;cursor: pointer;" required="required" name="alamat">
						<option value="">Pilih lokasi :</option>
						<?php $root->tampil_lokasi4($_GET['id']); ?>
					</select>
					<label>Status    : </label>
					<select style="width: 372px;cursor: pointer;" required="required" name="keterangan">
						<option value="">Pilih lokasi :</option>
						<?php $root->tampil_status2($_GET['id']); ?>
					</select>
					<input type="hidden" name="nama_kasir" placeholder="Username Kasir" required="required" value="<?= $f['username'] ?>">
					<input autocomplete="on" type="hidden" name="password" placeholder="Password">
		
					<label>* Tidak dapat mengubah ussername dan password</label><br>
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="users.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
