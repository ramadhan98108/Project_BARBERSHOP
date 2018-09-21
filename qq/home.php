<?php include "head.php"; ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="detail_transaksi") {
		include "detail_transaksi.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Dashboard";
	document.getElementById('dash').classList.add('active');
</script>
<div class="content">
	<div class="padding">
		<div class="box">
			<div class="padding">
			<i class="fa fa-money"></i>
			Pendapatan
			<span class="status greend">
			<?php
			$id_lokasi= $_SESSION['id_lokasi'];
			$tgl_transaksi=date('y-m-d');
			$getsum=$root->con->query("select sum(total_bayar) as grand_total from transaksi where id_lokasi like '%$id_lokasi%' and tgl_transaksi='$tgl_transaksi'");
			$getsum1=$getsum->fetch_assoc();
			?>
			<span> Rp. <?= number_format($getsum1['grand_total']) ?></span>
			</div>
		</div>
		<div class="box">
			<div class="padding">
				<i class="fa fa-clock-o"></i>
				Waktu
				<span class="status blued"> <?= date("d-m-Y") ?></span>
			</div>
		</div>
		<div class="box">
			<div class="padding">
				<i class="fa fa-bars"></i>
				Data Barang
				<span class="status blued"><?= $root->show_jumlah_barang() ?></span>
			</div>
		</div>
		<div class="box">
			<div class="padding">
				<i class="fa fa-book"></i>
				Jumlah Potong
				<span class="status blued"><?= $root->show_jumlah_trans2() ?></span>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<table class="datatable" id="datatable">
				<thead>
				<tr>
					<th width="10px">#</th>
					<th>No Invoice</th>
					<th>Pemotong</th>
					<th>Tanggal Transaksi</th>
					<th>Total Bayar</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$root->tampil_laporan2();
					?>
</tbody>

			</table>
			</div>
		</div>
	</div>
</div>
<?php
	}
 include"foot.php" ?>
