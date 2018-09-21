<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="tambah_paket") {
		include "tambah_paket.php";
	}
	else if (isset($_GET['action']) && $_GET['action']=="edit_paket") {
		include "edit_paket.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Paket";
	document.getElementById('Paket').classList.add('active');
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
				<a href="?action=tambah_paket" class="btnblue"><i class="fa fa-plus"></i> Tambah Paket</a>
				<a href="cetak_paket.php" class="btnblue" target="_blank"><i class="fa fa-print"></i> Cetak</a>
			</div>
			<table class="datatable" id="datatable">
				<thead>
				<tr>
					<th width="10px">#</th>
					<th>Nama Paket </i></th>
					<th>Keterangan </i></th>
					<th>Harga</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $root->tampil_paket() ?>
</tbody>

			</table>
			</div>
		</div>
	</div>
</div>


<?php 
}
include "foot.php" ?>
