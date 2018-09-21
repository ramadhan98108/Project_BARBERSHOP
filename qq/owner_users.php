<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="owner_tambah_kasir") {
		include "owner_tambah_kasir.php";
	}
	else if (isset($_GET['action']) && $_GET['action']=="owner_edit_kasir") {
		include "owner_edit_kasir.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Data Pegawai";
	document.getElementById('owner_users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
			<div class="contenttop">
				<div class="left">
				<a href="?action=owner_tambah_kasir" class="btnblue">Tambah Pegawai</a>
				</div>
				<div class="both"></div>
			</div>
			<table class="datatable" id="datatable">
				<thead>
				<tr>
					<th width="10px">#</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Lokasi</th>
					<th>Status</th>
					<th>Tanggal Didaftarkan</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$root->tampil_kasir_owner();
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
