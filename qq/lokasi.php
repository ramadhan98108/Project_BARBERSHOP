<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="tambah_lokasi") {
		include "tambah_lokasi.php";
	}
	else if (isset($_GET['action']) && $_GET['action']=="edit_lokasi") {
		include "edit_lokasi.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Data Lokasi";
	document.getElementById('lokasi').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
			<div class="contenttop">
				<div class="left">
				<a href="?action=tambah_lokasi" class="btnblue">Tambah Lokasi</a>
				</div>
				<div class="both"></div>
			</div>
			<span class="label">Jumlah Lokasi : <?= $root->show_jumlah_lokasi() ?></span>
			<table class="datatable" id="datatable" style="width: 600px;">
				<thead>
				<tr>
					<th width="10px">No</th>
					<th>Alamat</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$root->tampil_lokasi3();
					?>
</tbody>

			</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function myconfirm(){
		confirm("Yakin Ingin Menghapus Barang?");
		return false;
	}
</script>

<?php 
}
include "foot.php" ?>
