<script type="text/javascript">
	document.title="Transaksi Baru";
	document.getElementById('transaksi').classList.add('active');
</script>
<script type="text/javascript">
		$(document).ready(function(){
			if ($.trim($('#contenth').text())=="") {
				$('#prosestran').attr("disabled","disabled");
				$('#prosestran').attr("title","tambahkan barang terlebih dahulu");
				$('#prosestran').css("background","#ccc");
				$('#prosestran').css("cursor","not-allowed");
			}
		})

</script>
<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Entry  Transaksi Baru</h3>
				<form class="form-input" method="post" action="handler.php?action=tambah_tempo" style="padding-top: 30px;">
					<label>Pilih Paket : </label>
					<select style="width: 372px;cursor: pointer;" required="required" name="id_paket">
						<?php
						$data=$root->con->query("select * from paket");
						while ($f=$data->fetch_assoc()) {
							echo "<option value='$f[id_paket]'>$f[nama_paket] (Keterangan : $f[keterangan] | Harga : ".number_format($f['harga_jual']).")</option>";
						}
						?>
					</select>
					<label>Jumlah Potong :</label>
					<input required="required" type="number" name="jumlah">
					<input type="hidden" name="trx" value="<?php echo date("d")."/AF/".$_SESSION['id']."/".date("y") ?>">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
				</form>
				
			</div>
		</div>
		<br>
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Data transaksi</h3>
				<table class="datatable" style="width: 100%;">
				<thead>
				<tr>
					<th width="35px">NO</th>
					<th>ID Paket</th>
					<th>Nama Paket</th>
					<th>Jumlah Beli</th>
					<th>Total Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="contenth">
				<?php
				$trx=date("d")."/AF/".$_SESSION['id']."/".date("y");
				$data=$root->con->query("select paket.nama_paket,tempo.id_subtransaksi,tempo.id_paket,tempo.jumlah_beli,tempo.total_harga from tempo inner join paket on paket.id_paket=tempo.id_paket where trx='$trx'");
				$getsum=$root->con->query("select sum(total_harga) as grand_total from tempo where trx='$trx'");
				$getsum1=$getsum->fetch_assoc();
				$no=1;
				while ($f=$data->fetch_assoc()) {
					?><tr>
						<td><?= $no++ ?></td>
						<td><?= $f['id_paket'] ?></td>
						<td><?= $f['nama_paket'] ?></td>
						<td><?= $f['jumlah_beli'] ?></td>
						<td>Rp. <?= number_format($f['total_harga']) ?></td>
						<td><a href="handler.php?action=hapus_tempo&id_tempo=<?= $f['id_subtransaksi'] ?>&id_barang=<?= $f['id_paket'] ?>&jumbel=<?= $f['jumlah_beli'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Cancel</span><i class="fa fa-close"></i></a></td>
						</tr>
					<?php
				}
				?>
			</tbody>
				
				<tr>
					<?php if ($getsum1['grand_total']>0) { ?>
					<td colspan="3"></td><td>Grand Total :</td>
					<td> Rp. <?= number_format($getsum1['grand_total']) ?></td>
					<td></td>
					<?php }else{ ?>
					<td colspan="6">Data masih kosong</td>
					<?php } ?>
				</tr>
				
			</table>
			<br>
			<?php
			//definisikan setiap variabel yang digunakan
				$nilai1 = "";
				$nilai2 = "";
				$nilai3 = "";
				if(isset($_POST['text1'])and
				($_POST['text2'])
				){
				$nilai1 = $_POST['text1'];    #mengambil nilai didalam
				$nilai2 = $_POST['text2'];    #formulir sesuai name yang ada
				$nilai3 = $nilai2-$nilai1;
				}
				?>
			<form class="form-input" method="post">
				<input required="required" type="hidden" name="text1" value=" <?=($getsum1['grand_total']) ?>" placeholder="masukkan angka">
			<label>Total Bayar :</label>
					<input required="required" type="text" name="text2" value="<?php echo $nilai2?>" placeholder="masukkan angka">
			
			<label>Kembalian :</label>
					<input  type="text" value="<?php echo $nilai3?>">
			<button class="btnblue" type="submit"></i> Hitung</button>
				
			</form>
			
			<form class="form-input" action="handler.php?action=selesai_transaksi" method="post">
					<label>Nama Pemotong :</label>
					<select style="width: 372px;cursor: pointer;" required="required" name="id">
						<option value="">Pilih Pemotong :</option>
						<?php $root->tampil_pemotong(); ?>
					</select>
					<input type="hidden" name="id_lokasi" placeholder="ID Lokasi" value="<?php echo $_SESSION['id_lokasi'];?>" required="required">
					<input type="date" name="tgl_transaksi" placeholder="TGL" value="<?php date("d-m-Y") ?>" required="required">
					<input type="hidden" name="total_bayar" value="<?= $getsum1['grand_total'] ?>">
					<button class="btnblue" id="prosestran" type="submit"><i class="fa fa-save"></i> Proses Transaksi</button>
			</form>

			</div>
		</div>


	</div>
</div>

<?php
include "foot.php";
?>
