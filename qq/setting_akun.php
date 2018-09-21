<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="tambah_kasir") {
		include "tambah_kasir.php";
	}
	else if (isset($_GET['action']) && $_GET['action']=="edit_admin") {
		include "edit_admin.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Data Pegawai";
	document.getElementById('users').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<table class="datatable" id="datatable">
				<thead>
				<tr>
					<th width="10px">#</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Status</th>
					<th>Tanggal Didaftarkan</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$root->tampil_setting();
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
