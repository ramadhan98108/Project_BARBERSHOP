<script type="text/javascript">
	<?php
	if ($_SESSION['status']==1) {
		?>
	document.title="Detail laporan";
	document.getElementById('laporan').classList.add('active');
		<?php
	}else{
	?>
	document.title="Detail transaksi";
	document.getElementById('transaksi').classList.add('active');
	<?php } ?>
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<?php
				if ($_SESSION['status']==1) {
				?>
				<h3 class="jdl">Detail Laporan</h3>
				<?php }else{ ?>
				<h3 class="jdl">Detail Transaksi</h3>
				<?php } ?>
				<?php
				$getqheader=$root->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.id,transaksi.kode_kasir,lokasi.alamat from transaksi inner join lokasi on transaksi.id_lokasi=lokasi.id_lokasi  where id_transaksi='$_GET[id_transaksi]'");
				$getq=$getqheader->fetch_assoc();
				$getqheader=$root->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id  where id_transaksi='$_GET[id_transaksi]'");
				$get=$getqheader->fetch_assoc();
				$getqheader=$root->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.id,transaksi.id_lokasi,user.username from transaksi inner join user on transaksi.kode_kasir=user.id  where id_transaksi='$_GET[id_transaksi]'");
				$getqheader=$getqheader->fetch_assoc();
				?>
				<table>
					<tr>
						<td><span class="label">Lokasi </span></td><td><span class="label">:</span></td>
						<td><span class="label"><?= $getq['alamat'] ?></span></td>
					</tr>
					<tr>
						<td><span class="label">Nama Pemotong</span></td><td><span class="label">:</span></td>
						<td><span class="label"><?= $get['nama'] ?></span></td>
					</tr>
					<tr>
						<td><span class="label">Nama Kasir</span></td><td><span class="label">:</span></td>
						<td><span class="label"><?= $getqheader['username'] ?></span></td>
					</tr>
					<tr>
						<td><span class="label">Tanggal Transaksi</span></td><td><span class="label">:</span></td>
						<td><span class="label"><?= date("d-m-Y",strtotime($getqheader['tgl_transaksi'])) ?></span></td>
					</tr>
					<tr>
						<td><span class="label">No Invoice</span></td><td><span class="label">:</span></td>
						<td><span class="label"><?= $getqheader['no_invoice'] ?></span></td>
					</tr>
				</table>
				<table class="datatable" style="width: 100%;">
					<thead>
				<tr>
					<th width="35px">NO</th>
					<th>Nama Paket</th>
					<th>Jumlah Beli</th>
					<th>Harga</th>
					<th>Total Harga</th>
				</tr>
			</thead>
					<tbody>
				<?php
				$trx=date("d")."/AF/".$_SESSION['status']."/".date("y");
				$data=$root->con->query("select paket.nama_paket,paket.harga_jual,sub_transaksi.jumlah_beli,sub_transaksi.total_harga from sub_transaksi inner join paket on paket.id_paket=sub_transaksi.id_paket where sub_transaksi.id_transaksi='$_GET[id_transaksi]'");
				$getsum=$root->con->query("select sum(total_harga) as grand_total,sum(jumlah_beli) as jumlah_beli from sub_transaksi where id_transaksi='$_GET[id_transaksi]'");
				$getsum1=$getsum->fetch_assoc();
				$no=1;
				while ($f=$data->fetch_assoc()) {
					?><tr>
						<td><?= $no++ ?></td>
						<td><?= $f['nama_paket'] ?></td>
						<td><?= $f['jumlah_beli'] ?></td>
						<td>Rp. <?= number_format($f['harga_jual']) ?></td>
						<td>Rp. <?= number_format($f['total_harga']) ?></td>
						</tr>
					<?php
				}
				?>
				<tr>
					<td></td><td></td><td></td><td>Grand Total :</td><td> Rp. <?= number_format($getsum1['grand_total']) ?></td>
				</tr>
			</tbody>
				</table>
				<br>
				<div class="left">
					<?php
						$link=($_SESSION['status']==1) ? "laporan.php" : "transaksi.php";
					?>
					<a href="<?= $link ?>" class="btnblue" style="background: #f33155"><i class="fa fa-mail-reply"></i> Kembali</a>
					<?php if ($_SESSION['status']==2) {
					 ?>
					<a href="cetak_nota.php?oid=<?= base64_encode($_GET['id_transaksi']) ?>&id-uid=<?= base64_encode($getqheader['nama']) ?>&inf=<?= base64_encode($getqheader['no_invoice']) ?>&tb=<?= base64_encode($f['total_bayar']) ?>&uuid=<?= base64_encode(date("d-m-Y",strtotime($getqheader['tgl_transaksi']))) ?>" class="btnblue" target="_blank"><i class="fa fa-print"></i> Cetak Nota</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
