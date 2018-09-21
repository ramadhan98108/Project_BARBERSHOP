<script type="text/javascript">
	document.title="Edit Paket";
	document.getElementById('paket').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Paket</h3>
				<?php
				$f=$root->edit_paket($_GET['id_paket']);
				?>
				<form class="form-input" method="post" action="handler.php?action=edit_paket" style="padding-top: 30px;">	<input type="hidden" name="id_paket" value="<?= $f['id_paket'] ?>">
					<input type="text" placeholder="ID Paket" disabled="disabled" value="ID Paket : <?= $f['id_paket'] ?>">
					<label>Nama Paket :</label>
					<input type="text" name="nama_paket" placeholder="Nama Paket" required="required" value="<?= $f['nama_paket'] ?>">
					<label>Keterangan :</label>
					<input name="keterangan" placeholder="Keterangan" required="required" value="<?= $f['keterangan'] ?>">
					<label>Harga      :</label>
					<input name="harga_jual" placeholder="Harga" required="required" value="<?= $f['harga_jual'] ?>">
			
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="barang.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
