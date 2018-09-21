<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="owner_tambah_barang") {
		include "owner_tambah_barang.php";
	}
	else if (isset($_GET['action']) && $_GET['action']=="owner_edit_barang") {
		include "owner_edit_barang.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Barang";
	document.getElementById('owner_barang').classList.add('active');
</script>
<script type="text/javascript" src="assets/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
    $(function(){
    	$.tablesorter.addWidget({
    		id:"indexFirstColumn",
    		format:function(table){
    			$(table).find("tr td:first-child").each(function(index){
    				$(this).text(index+1);
    			})
    		}
    	});
    	$("table").tablesorter({
    		widgets:['indexFirstColumn'],
    		headers:{
        		0:{sorter:false},
        		3:{sorter:false},
        		4:{sorter:false},
        		5:{sorter:false},
        		6:{sorter:false},
        		7:{sorter:false},
        	}
    	});
    });
</script>
<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
			<div class="contenttop">
				<div class="left">
				<a href="?action=owner_tambah_barang" class="btnblue"><i class="fa fa-plus"></i> Tambah Barang</a>
				<a href="cetak_barang.php" class="btnblue" target="_blank"><i class="fa fa-print"></i> Cetak</a>
				</div>
				<div class="right">
					<script type="text/javascript">
						function gotocat(val){
							var value=val.options[val.selectedIndex].value;
							window.location.href="owner_barang.php?id_cat="+value+"";
						}
					</script>
					<select class="leftin1" onchange="gotocat(this)">
						<option value="">Filter Lokasi</option>
						<?php
							$data=$root->con->query("select * from lokasi");
							while ($f=$data->fetch_assoc()) {
								?>
									<option <?php if (isset($_GET['id_cat'])) { if ($_GET['id_cat'] == $f['id_lokasi']) { echo "selected"; } } ?> value="<?= $f['id_lokasi'] ?>"><?= $f['alamat'] ?></option>
								<?php
							}
						?>
					</select>
					<form class="leftin">
						<input type="search" name="q" placeholder="Cari Barang..." value="<?php echo $keyword=isset($_GET['q'])?$_GET['q']:""; ?>">
						<button><i class="fa fa-search"></i></button>
					</form>
				</div>
				<div class="both"></div>
			</div>
			<span class="label">Jumlah Barang : <?= $root->show_jumlah_barang2() ?></span>
			<table class="datatable" id="datatable">
				<thead>
				<tr>
					<th width="10px">#</th>
					<th style="cursor: pointer;">Nama Barang <i class="fa fa-sort"></i></th>
					<th style="cursor: pointer;" width="100px">Alamat <i class="fa fa-sort"></i></th>
					<th>Stok</th>
					<th width="120px">Harga Beli</th>
					<th width="150px">Tanggal Ditambahkan</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					if (isset($_GET['id_cat']) && $_GET['id_cat']) {
						$root->tampil_barang_filter_owner($_GET['id_cat']);
					}else{
						$keyword=isset($_GET['q'])?$_GET['q']:"null";
						$root->tampil_barang_owner($keyword);
					}
					?>
</tbody>

			</table>
			</div>
		</div>
	</div>
</div>


<?php 
}
include "foot.php" ?>
