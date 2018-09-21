<script type="text/javascript">
	document.title="Tambah Kasir";
	document.getElementById('owner_users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Tambah Pegawai</h3>
				<form class="form-input" method="post" action="handler.php?action=owner_tambah_kasir">
					<input type="text" name="nama" placeholder="Nama Lengkap" required="required">
					<input type="text" name="email" placeholder="Email" required="required">
					<input type="text" name="nama_kasir" placeholder="Username Kasir" required="required">
					<input autocomplete="off" type="text" name="password" placeholder="Password" required="required">
					<select style="width: 372px;cursor: pointer;" required="required" name="status">
						<option value="">Pilih Status :</option>
						<?php $root->tampil_status(); ?>
					</select>
					<select style="width: 372px;cursor: pointer;" required="required" name="id_lokasi">
						<option value="">Pilih Alamat :</option>
						<?php $root->tampil_lokasi2(); ?>
					</select>
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="owner_users.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
