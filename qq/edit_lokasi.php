<script type="text/javascript">
	document.title="Edit Lokasi";
	document.getElementById('lokasi').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Lokasi</h3>
				<?php $f=$root->edit_lokasi($_GET['id_lokasi']) ?>
				<form class="form-input" method="post" action="handler.php?action=edit_lokasi">
					<input type="text" placeholder="ID Lokasi" disabled="disabled" value="ID Lokasi : <?= $f['id_lokasi'] ?>">
					<input type="text" name="alamat" placeholder="Alamat" required="required" value="<?= $f['alamat'] ?>">
					<input type="hidden" name="id_lokasi" value="<?= $f['id_lokasi'] ?>">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Update</button>
					<a href="lokasi.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
