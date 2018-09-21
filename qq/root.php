<?php 
// coded by https://www.athoul.site
error_reporting(0);
class penjualan
{
	
	public $con;
	function __construct()
	{
		$this->con=new mysqli("localhost","root","","s");
	}
	function __destruct()
	{
		$this->con->close();
	}
	function alert($text){
		?><script type="text/javascript">
            alert( "<?= $text ?>" );
        </script>
        <?php
	}
	// coded by https://www.athoul.site
	function redirect($url){
		?>
		<script type="text/javascript">
		window.location.href="<?= $url ?>";
		</script>
		<?php
	}
	function go_back(){
		?>
		<script type="text/javascript">
		window.history.back();
		</script>
		<?php
	}
	function login($username,$password,$loginas){
		if (trim($username)=="") {
			$error[]="Username";
		}
		if (trim($password)=="") {
			$error[]="Password";
		}
		if (isset($error)) {
			echo "<div class='red'><i class='fa fa-warning'></i> Maaf sepertinya ".implode(' dan ', $error)." anda kosong.</div>";
		}else{
		$password=sha1($password);
		$query=$this->con->query("select * from user where username='$username' and password='$password' and status='$loginas'");
		// coded by https://www.athoul.site
		if ($query->num_rows > 0) {
			echo "<div class='green'><i class='fa fa-check'></i> Login Berhasil, silahkan tunggu beberapa saat.</div>";
			$data=$query->fetch_assoc();
			session_start();
			$_SESSION['username']=$data['username'];
			$_SESSION['status']=$data['status'];
			$_SESSION['id_lokasi']=$data['id_lokasi'];
			$_SESSION['id']=$data['id'];
			$_SESSION['nama']=$data['nama'];
			if ($data['status']=='1') {
				$this->redirect("home.php");
			}else if ($data['status']=='2') {
				$this->redirect("transaksi.php");
			}else if ($data['status']=='3') {
				$this->redirect("home_owner.php");
			}
			

		}else{
			echo "<div class='red'><i class='fa fa-warning'></i> Maaf sepertinya username atau password anda salah.</div>";
		}
		}
	}
	function tambah_barang($nama_barang,$stok,$harga_beli,$id_lokasi,$id_kategori){
		$query=$this->con->query("select * from barang where nama_barang='$nama_barang' and id_lokasi like '%$id_lokasi%'");
		if ($query->num_rows > 0) {
			$this->alert("Data barang sudah ada");
			$this->go_back();
		}
		else{
			$query2=$this->con->query("insert into barang set nama_barang='$nama_barang',id_kategori='$id_kategori',stok='$stok',harga_beli='$harga_beli',id_lokasi='$id_lokasi'");
			if ($query2===TRUE) {
				$this->alert("Barang Berhasil Ditambahkan");
				$this->redirect("barang.php");
			}
			else{
				$this->alert("Barang Gagal Ditambahkan");
				$this->redirect("barang.php");
			}
		}
	}
	function tambah_kasir($nama_kasir,$password,$id_lokasi,$nama){
		$nama_kasir=str_replace(" ", "", $nama_kasir);
		$query=$this->con->query("select * from  user where username='$nama_kasir' and status='2'");
		if ($query->num_rows > 0) {
			$this->alert("Username  untuk kasir  sudah ada.");
			$this->go_back();
		}
		else{
			$password=sha1($password);
			$query2=$this->con->query("insert into user set username='$nama_kasir',password='$password',status='2',id_lokasi='$id_lokasi',nama='$nama'");
			if ($query2 ===  TRUE) {
				$this->alert("Data kasir berhasil dismpan");
				$this->redirect("users.php");
			}
			else{
				$this->alert("Kasir Gagal Ditambahkan");
				$this->redirect("users.php");
			}
		}
	}
	// coded by https://www.athoul.site
	function tambah_kategori($nama_kategori){
		$query=$this->con->query("select * from kategori where nama_kategori='$nama_kategori'");
		if ($query->num_rows > 0) {
			$this->alert("Kategori Sudah Ada");
			$this->redirect("kategori.php");
		}else{
			$query2=$this->con->query("insert into kategori set nama_kategori='$nama_kategori'");
			if ($query2===TRUE) {
				$this->alert("kategori Berhasil Ditambahkan");
				$this->redirect("kategori.php");
			}
			else{
				$this->alert("kategori Gagal Ditambahkan");
				$this->redirect("kategori.php");
			}
		}
	}
	function tampil_barang($keyword){
		$id_lokasi= $_SESSION['id_lokasi'];	
		if ($keyword=="null") {
			$query=$this->con->query("select barang.id_barang,barang.nama_barang,barang.stok,barang.harga_beli,barang.id_lokasi,barang.date_added,kategori.nama_kategori from barang inner join kategori on kategori.id_kategori=barang.id_kategori where id_lokasi= '$id_lokasi'");
		}else{
			$query=$this->con->query("select barang.id_barang,barang.nama_barang,barang.stok,barang.harga_beli,barang.id_lokasi,barang.date_added,kategori.nama_kategori from barang inner join kategori on kategori.id_kategori=barang.id_kategori where nama_barang like '%$keyword%'");
		}
		if ($query->num_rows > 0) {
			$no=1;
			while ($data=$query->fetch_assoc()) {
				?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nama_barang'] ?></td>
						<td><?= $data['nama_kategori'] ?></td>
						<td><?= $data['stok'] ?></td>
						<td>Rp. <?= number_format($data['harga_beli']) ?></td>
						<td><?= date("d-m-Y",strtotime($data['date_added'])) ?></td>
						<td>
							<a href="?action=edit_barang&id_barang=<?= $data['id_barang'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
							<a href="handler.php?action=hapus_barang&id_barang=<?= $data['id_barang'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus <?= $data['nama_barang']." (id : ".$data['id_barang'] ?>) ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php
					$no++;
			}
		}else{
			echo "<td></td><td colspan='5'>Maaf, barang yang anda cari tidak ada!</td>";
		}
		
	}
	function tampil_barang_filter($id_cat){
		$id_lokasi= $_SESSION['id_lokasi'];	
			$query=$this->con->query("select barang.id_barang,barang.nama_barang,barang.stok,barang.harga_beli,barang.id_lokasi,barang.date_added,kategori.nama_kategori from barang inner join kategori on kategori.id_kategori=barang.id_kategori where kategori.id_kategori='$id_cat' and id_lokasi like '%$id_lokasi%'");
		if ($query->num_rows > 0) {
		
			$no=1;
			while ($data=$query->fetch_assoc()) {
				?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nama_barang'] ?></td>
						<td><?= $data['nama_kategori'] ?></td>
						<td><?= $data['stok'] ?></td>
						<td>Rp. <?= number_format($data['harga_beli']) ?></td>
						<td><?= date("d-m-Y",strtotime($data['date_added'])) ?></td>
						<td>
							<a href="?action=edit_barang&id_barang=<?= $data['id_barang'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
							<a href="handler.php?action=hapus_barang&id_barang=<?= $data['id_barang'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus <?= $data['nama_barang']." (id : ".$data['id_barang'] ?>) ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php
					$no++;
			}
		}else{
			echo "<td></td><td colspan='5'>Transaksi masih kosong</td>";
		}
	}
	// coded by https://www.athoul.site
	function tampil_kategori(){
		$query=$this->con->query("select * from kategori order by id_kategori desc");
		$no=1;
		while ($data=$query->fetch_assoc()) {
			?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $data['nama_kategori'] ?></td>
					<td>
						<a href="?action=edit_kategori&id_kategori=<?= $data['id_kategori'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
						<a href="handler.php?action=hapus_kategori&id_kategori=<?= $data['id_kategori'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus kategori : <?= $data['nama_kategori'] ?> ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php
			
			$no++;
		}
	}
	function tampil_kategori2(){
		$query=$this->con->query("select * from kategori order by id_kategori desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
			<?php
		}
	}
	function tampil_kategori3($id_barang){
		$q=$this->con->query("select * from barang where id_barang='$id_barang'");
		$q2=$q->fetch_assoc();
		$id_cat=$q2['id_kategori'];
		$query=$this->con->query("select * from kategori order by id_kategori desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option <?php if ($data['id_kategori']==$id_cat) { echo "selected"; } ?> value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
			<?php
		}
	}
	function tampil_kasir(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$query=$this->con->query("select * from user where status='2' and id_lokasi like '%$id_lokasi%'");
		$no=1;
		while ($data=$query->fetch_assoc()) {
			?>
			<tr>
					<td><?= $no ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['username'] ?></td>
					<td>Pegawai</td>
					<td><?= date("d-m-Y",strtotime($data['date_created'])) ?></td>
					<td>
						<a href="?action=edit_kasir&id_kasir=<?= $data['id'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
						<a href="handler.php?action=hapus_user&id_user=<?= $data['id'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus user : <?= $data['username'] ?> ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
					</td>
			</tr>
			<?php
			$no++;
		}
	}
		function tampil_laporan(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$tgl_transaksi=date('y-m-d');
		$query=$this->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id where transaksi.id_lokasi like '%$id_lokasi%' and tgl_transaksi='$tgl_transaksi' order by transaksi.id_transaksi desc");
		$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['nama'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	function tampil_laporan2(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$query=$this->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id where transaksi.id_lokasi like '%$id_lokasi%' order by transaksi.id_transaksi desc LIMIT 0,5");
		$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['nama'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	function tampil_laporan3(){
		
		$query=$this->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id order by transaksi.id_transaksi desc LIMIT 0,5");
		$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['nama'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	function filter_tampil_laporan($tanggal,$aksi){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$tgl_transaksi=date('y-m-d');
		if ($aksi==1) {
			$split1=explode('-',$tanggal);
			$tanggal=$split1[2]."-".$split1[1]."-".$split1[0];
			$query=$this->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id where transaksi.tgl_transaksi like '%$tanggal%'  and transaksi.id_lokasi like '%$id_lokasi%' order by transaksi.id_transaksi desc");
		}else{
			$split1=explode('-',$tanggal);
			$tanggal=$split1[1]."-".$split1[0];
			$query=$this->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id where transaksi.tgl_transaksi like '%$tanggal%'  and transaksi.id_lokasi like '%$id_lokasi%' order by transaksi.id_transaksi desc");
		}
		
		$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['nama'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	function tampil_pegawai_filter($id_cat){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$tgl_transaksi=date('y-m-d');
		$query=$this->con->query("select transaksi.id_transaksi,transaksi.tgl_transaksi,transaksi.no_invoice,transaksi.total_bayar,transaksi.kode_kasir,transaksi.id_lokasi,user.nama from transaksi inner join user on transaksi.id=user.id where user.id='$id_cat' and tgl_transaksi='$tgl_transaksi' order by transaksi.id_transaksi desc");
		if ($query->num_rows > 0) {
		
			$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['nama'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
		}
	}
	function show_jumlah_cat(){
		$query=$this->con->query("select * from kategori");
		echo $query->num_rows;
	}
	function show_jumlah_barang(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$query=$this->con->query("select * from barang where id_lokasi='$id_lokasi' ");
		echo $query->num_rows;
	}
	function show_jumlah_lokasi(){
		$query=$this->con->query("select * from lokasi ");
		echo $query->num_rows;
	}
	function show_jumlah_barang2(){
		
		$query=$this->con->query("select * from barang  ");
		echo $query->num_rows;
	}
	function show_jumlah_kasir(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$query=$this->con->query("select * from user where status='2' and id_lokasi like '%$id_lokasi'");
		echo $query->num_rows;
	}
	function show_jumlah_trans(){
		$tgl_transaksi=date('y-m-d');
		$query=$this->con->query("select * from transaksi where kode_kasir='$_SESSION[id]' and transaksi.tgl_transaksi like '%$tgl_transaksi%'");
		echo $query->num_rows;
	}
	function show_jumlah_trans2(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$tgl_transaksi=date('y-m-d');
		$query=$this->con->query("select * from transaksi where transaksi.id_lokasi like '%$id_lokasi%' and tgl_transaksi='$tgl_transaksi'");
		echo $query->num_rows;
	}
	function show_jumlah_trans3(){
		$tgl_transaksi=date('y-m-d');
		$query=$this->con->query("select * from transaksi where tgl_transaksi='$tgl_transaksi'");
		echo $query->num_rows;
	}
	function hapus_kategori($id_kategori){
		$query=$this->con->query("delete from kategori where id_kategori='$id_kategori'");
		if ($query === TRUE) {
			$this->alert("Kategori id $id_kategori telah dihapus");
			$this->redirect("kategori.php");
		}
	}
	function hapus_barang($id_barang){
		$query=$this->con->query("delete from barang where id_barang='$id_barang'");
		if ($query === TRUE) {
			$this->alert("barang id $id_barang telah dihapus");
			$this->redirect("barang.php");
		}
	}
	function hapus_user($id_user){
		$query=$this->con->query("delete from user where id='$id_user'");
		if ($query === TRUE) {
			$this->alert("Kasir id : $id_user berhasil dihapus");
			$this->redirect("users.php");
		}
	}
	function edit_kategori($id_kategori){
		$query=$this->con->query("select * from kategori where id_kategori='$id_kategori'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function edit_barang($id_barang){
		$query=$this->con->query("select * from barang where id_barang='$id_barang'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function edit_kasir($id_kasir){
		$query=$this->con->query("select * from user where id='$id_kasir'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function edit_akun($id_kasir){
		$query=$this->con->query("select * from user where id='$id_kasir'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function edit_admin($id_kasir){
		$query=$this->con->query("select * from user where id='$id_kasir'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function aksi_edit_kategori($id_kategori,$nama_kategori){
		$query=$this->con->query("update kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori'");
		 if ($query === TRUE) {
		 	$this->alert("Kategori berhasil di update");
		 	$this->redirect("kategori.php");
		 }else{
		 	$this->alert("Kategori gagal di update");
		 	$this->redirect("kategori.php");

		 }
	}
	function aksi_edit_barang($id_barang,$nama_barang,$stok,$harga_beli,$id_kategori){
		$query=$this->con->query("update barang set nama_barang='$nama_barang',stok='$stok',harga_beli='$harga_beli',id_lokasi=id_lokasi,id_kategori='$id_kategori',date_added=date_added where id_barang='$id_barang'");
		if ($query === TRUE) {
		 	$this->alert("Barang berhasil di update");
		 	$this->redirect("barang.php");
		}
		else{
		 	$this->alert("Barang gagal di update");
		 	$this->redirect("barang.php");
		 }
	}
	function aksi_edit_kasir($nama,$username,$password,$id){
		if (empty($password)) {
			$query=$this->con->query("update user set nama='$nama',username='$username',date_created=date_created where id='$id'");
		}else{
			$password=sha1($password);
			$query=$this->con->query("update user set nama='$nama',username='$username',password='$password',date_created=date_created where id='$id'");
		}

		if ($query === TRUE) {
			$this->alert("Pegawai berhasil di update");
		 	$this->redirect("users.php");
		}else{
			$this->alert("Pegawai gagal di update");
		 	$this->redirect("users.php");
		}
	}
	function aksi_edit_akun($nama,$username,$password,$id){
		if (empty($password)) {
			$query=$this->con->query("update user set nama='$nama',username='$username',date_created=date_created where id='$id'");
		}else{
			$password=sha1($password);
			$query=$this->con->query("update user set nama='$nama',username='$username',password='$password',date_created=date_created where id='$id'");
		}

		if ($query === TRUE) {
			$this->alert("Pegawai berhasil di update");
			session_start();
			session_destroy();
		 	$this->redirect("index.php");
		}else{
			$this->alert("Pegawai gagal di update");
		 	$this->redirect("setting_akun.php");
		}
	}
	function aksi_edit_admin($username,$password,$nama){
		if (empty($password)) {
			$query=$this->con->query("update user set nama='$nama',username='$username',date_created=date_created where id='1'");
		}else{
			$password=sha1($password);
			$query=$this->con->query("update user set nama='$nama',username='$username',password='$password',date_created=date_created where id='1'");
		}

		if ($query === TRUE) {
			$this->alert("admin berhasil di update, silahkan login kembali");
			session_start();
			session_destroy();
			$this->redirect("index.php");
		}else{
			$this->alert("admin gagal di update");
		 	$this->redirect("user.php");
		}
	}
	function tambah_tempo($id_paket,$jumlah,$trx){
		$q1=$this->con->query("select * from paket where id_paket='$id_paket'");
		$data=$q1->fetch_assoc();
			$q=$this->con->query("select * from tempo where id_paket='$id_paket'");
			if ($q->num_rows > 0) {
				$ubah=$q->fetch_assoc();
				$jumbel=$ubah['jumlah_beli']+$jumlah;
				$total_harga=$jumbel*$data['harga_jual'];
				$dbquery=$this->con->query("update tempo set jumlah_beli='$jumbel',total_harga='$total_harga' where id_paket='$id_paket'");
					if ($dbquery === TRUE) {
					$this->redirect("transaksi.php?action=transaksi_baru");

				}
			}else{
				$total_harga=$jumlah*$data['harga_jual'];
				$query1=$this->con->query("insert into tempo set id_paket='$id_paket',jumlah_beli='$jumlah',total_harga='$total_harga',trx='$trx'");
				if ($query1 === TRUE) {
					$this->redirect("transaksi.php?action=transaksi_baru");

				}
			}
		}
	function hapus_tempo($id_tempo,$id_barang,$jumbel){
		$query=$this->con->query("delete from tempo where id_subtransaksi='$id_tempo'");
			if ($query===TRUE) {
			$query2=$this->con->query("update barang set stok=stok+$jumbel where id_barang='$id_barang'");
			$this->alert("Barang berhasil dicancel");
			$this->redirect("transaksi.php?action=transaksi_baru");

		}
	}
	function tampil_pemotong(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$query=$this->con->query("select * from user where id_lokasi like '%$id_lokasi%'");
		while ($data=$query->fetch_assoc()) {
			?>
				<option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
			<?php
		}
	}
									
	function tampil_setting(){
		$id_lokasi= $_SESSION['id_lokasi'];	
		$id= $_SESSION['id'];	
		$query=$this->con->query("select * from user inner join level on level.status=user.status  where id='$id' and id_lokasi like '%$id_lokasi%'");
		$no=1;
		while ($data=$query->fetch_assoc()) {
			?>
			<tr>
					<td><?= $no ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['username'] ?></td>
					<td><?= $data['keterangan'] ?></td>
					<td><?= date("d-m-Y",strtotime($data['date_created'])) ?></td>
					<td>
						<a href="?action=edit_admin&id_kasir=<?= $data['id'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
					</td>
			</tr>
			<?php
			$no++;
		}
	}
	function tampil_barang_owner($keyword){
		if ($keyword=="null") {
			$query=$this->con->query("select barang.id_barang,barang.nama_barang,barang.stok,barang.harga_beli,barang.id_kategori,barang.date_added,lokasi.alamat from barang inner join lokasi on lokasi.id_lokasi=barang.id_lokasi");
		}else{
			$query=$this->con->query("select barang.id_barang,barang.nama_barang,barang.stok,barang.harga_beli,barang.id_kategori,barang.date_added,lokasi.alamat from barang inner join lokasi on lokasi.id_lokasi=barang.id_lokasi where alamat like '%$keyword%'");
		}
		if ($query->num_rows > 0) {
			$no=1;
			while ($data=$query->fetch_assoc()) {
				?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nama_barang'] ?></td>
						<td><?= $data['alamat'] ?></td>
						<td><?= $data['stok'] ?></td>
						<td>Rp. <?= number_format($data['harga_beli']) ?></td>
						<td><?= date("d-m-Y",strtotime($data['date_added'])) ?></td>
						<td>
							<a href="?action=owner_edit_barang&id_barang=<?= $data['id_barang'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
							<a href="handler.php?action=hapus_barang&id_barang=<?= $data['id_barang'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus <?= $data['nama_barang']." (id : ".$data['id_barang'] ?>) ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php
					$no++;
			}
		}else{
			echo "<td></td><td colspan='5'>Maaf, barang yang anda cari tidak ada!</td>";
		}
		
	}
	function tampil_barang_filter_owner($id_cat){
			$query=$this->con->query("select barang.id_barang,barang.nama_barang,barang.stok,barang.harga_beli,barang.id_kategori,barang.date_added,lokasi.alamat from barang inner join lokasi on lokasi.id_lokasi=barang.id_lokasi where lokasi.id_lokasi='$id_cat'");
		if ($query->num_rows > 0) {
		
			$no=1;
			while ($data=$query->fetch_assoc()) {
				?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $data['nama_barang'] ?></td>
						<td><?= $data['alamat'] ?></td>
						<td><?= $data['stok'] ?></td>
						<td>Rp. <?= number_format($data['harga_beli']) ?></td>
						<td><?= date("d-m-Y",strtotime($data['date_added'])) ?></td>
						<td>
							<a href="?action=edit_barang&id_barang=<?= $data['id_barang'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
							<a href="handler.php?action=hapus_barang&id_barang=<?= $data['id_barang'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus <?= $data['nama_barang']." (id : ".$data['id_barang'] ?>) ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php
					$no++;
			}
		}else{
			echo "<td></td><td colspan='5'>Barang dengan kategori tersebut masih kosong</td>";
		}
	}
	function tampil_lokasi2(){
		$query=$this->con->query("select * from lokasi order by id_lokasi desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option value="<?= $data['id_lokasi'] ?>"><?= $data['alamat'] ?></option>
			<?php
		}
	}
	function owner_tambah_barang($nama_barang,$stok,$harga_beli,$id_lokasi,$id_kategori){
		$query=$this->con->query("select * from barang where nama_barang='$nama_barang' and id_lokasi like '%$id_lokasi%'");
		if ($query->num_rows > 0) {
			$this->alert("Data barang sudah ada");
			$this->go_back();
		}
		else{
			$query2=$this->con->query("insert into barang set nama_barang='$nama_barang',id_kategori='$id_kategori',stok='$stok',harga_beli='$harga_beli',id_lokasi='$id_lokasi'");
			if ($query2===TRUE) {
				$this->alert("Barang Berhasil Ditambahkan");
				$this->redirect("owner_barang.php");
			}
			else{
				$this->alert("Barang Gagal Ditambahkan");
				$this->redirect("owner_barang.php");
			}
		}
	}
	function tampil_lokasi($id_barang){
		$q=$this->con->query("select * from barang where id_barang='$id_barang'");
		$q2=$q->fetch_assoc();
		$id_cat=$q2['id_lokasi'];
		$query=$this->con->query("select * from lokasi order by id_lokasi desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option <?php if ($data['id_lokasi']==$id_cat) { echo "selected"; } ?> value="<?= $data['id_lokasi'] ?>"><?= $data['alamat'] ?></option>
			<?php
		}
	
	}
	function owner_aksi_edit_barang($id_barang,$nama_barang,$stok,$harga_beli,$id_kategori,$id_lokasi){
		$query=$this->con->query("update barang set nama_barang='$nama_barang',stok='$stok',harga_beli='$harga_beli',id_lokasi='$id_lokasi',id_kategori='$id_kategori',date_added=date_added where id_barang='$id_barang'");
		if ($query === TRUE) {
		 	$this->alert("Barang berhasil di update");
		 	$this->redirect("owner_barang.php");
		}
		else{
		 	$this->alert("Barang gagal di update");
		 	$this->redirect("owner_barang.php");
		 }
	}
	function tampil_paket(){
		$query=$this->con->query("select * from paket order by id_paket asc");
		$no=1;
		while ($data=$query->fetch_assoc()) {
			?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $data['nama_paket'] ?></td>
					<td><?= $data['keterangan'] ?></td>
					<td>Rp. <?= $data['harga_jual'] ?></td>
					<td>
						<a href="?action=edit_paket&id_paket=<?= $data['id_paket'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
						<a href="handler.php?action=hapus_paket&id_paket=<?= $data['id_paket'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus kategori : <?= $data['nama_paket'] ?> ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php
			
			$no++;
		}
	}
	function tambah_paket($nama_paket,$keterangan,$harga_jual){
		$query=$this->con->query("select * from paket where nama_paket='$nama_paket'");
		if ($query->num_rows > 0) {
			$this->alert("Data paket sudah ada");
			$this->go_back();
		}
		else{
			$query2=$this->con->query("insert into paket set nama_paket='$nama_paket',keterangan='$keterangan',harga_jual='$harga_jual'");
			if ($query2===TRUE) {
				$this->alert("Paket Berhasil Ditambahkan");
				$this->redirect("paket.php");
			}
			else{
				$this->alert("Paket Gagal Ditambahkan");
				$this->redirect("paket.php");
			}
		}
	}
	function tampil_kasir_owner(){
		$query=$this->con->query("select * from user 
									inner join lokasi on user.id_lokasi=lokasi.id_lokasi
									inner join level on user.status=level.status
									order by user.id desc");
					$no=1;
		while ($data=$query->fetch_assoc()) {
			?>
			<tr>
					<td><?= $no ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['username'] ?></td>
					<td><?= $data['alamat'] ?></td>
					<td><?= $data['keterangan'] ?></td>
					<td><?= date("d-m-Y",strtotime($data['date_created'])) ?></td>
					<td>
						<a href="?action=owner_edit_kasir&id=<?= $data['id'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
						<a href="handler.php?action=hapus_user&id_user=<?= $data['id'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus user : <?= $data['username'] ?> ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
					</td>
			</tr>
			<?php
			$no++;
		}
	}
	function owner_tambah_kasir($nama,$nama_kasir,$password,$id_lokasi,$status){
		$nama_kasir=str_replace(" ", "", $nama_kasir);
		$query=$this->con->query("select * from  user where username='$nama_kasir' and status='$status'");
		if ($query->num_rows > 0) {
			$this->alert("Username  untuk kasir  sudah ada.");
			$this->go_back();
		}
		else{
			$password=sha1($password);
			$query2=$this->con->query("insert into user set nama='$nama',username='$nama_kasir',password='$password',status='$status',id_lokasi='$id_lokasi'");
			if ($query2 ===  TRUE) {
				$this->alert("Data kasir berhasil dismpan");
				$this->redirect("owner_users.php");
			}
			else{
				$this->alert("Kasir Gagal Ditambahkan");
				$this->redirect("owner_users.php");
			}
		}
	}
	function tampil_status(){
		$query=$this->con->query("select * from level order by status desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option value="<?= $data['status'] ?>"><?= $data['keterangan'] ?></option>
			<?php
		}
	}
	function owner_edit_kasir($id){
		$query=$this->con->query("select * from user where id='$id'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function owner_aksi_edit_kasir($nama,$username,$password,$id_lokasi,$status,$id){
		if (empty($password)) {
			$query=$this->con->query("update user set nama='$nama',username='$username',id_lokasi='$id_lokasi',status='$status',date_created=date_created where id='$id'");
		}else{
			$password=sha1($password);
			$query=$this->con->query("update user set nama='$nama',id_lokasi='$id_lokasi',status='$status',date_created=date_created where id='$id'");
		}

		if ($query === TRUE) {
			$this->alert("Pegawai berhasil di update");
		 	$this->redirect("owner_users.php");
		}else{
			$this->alert("User gagal di update");
		 	$this->redirect("owner_users.php");
		}
	}
	function tampil_lokasi4($id_user){
		$q=$this->con->query("select * from user where id='$id_user'");
		$q2=$q->fetch_assoc();
		$id_cat=$q2['id_lokasi'];
		$query=$this->con->query("select * from lokasi order by id_lokasi desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option <?php if ($data['id_lokasi']==$id_cat) { echo "selected"; } ?> value="<?= $data['id_lokasi'] ?>"><?= $data['alamat'] ?></option>
			<?php
		}
	
	}
	function tampil_status2($id_user){
		$q=$this->con->query("select * from user where id='$id_user'");
		$q2=$q->fetch_assoc();
		$id_cat=$q2['status'];
		$query=$this->con->query("select * from level order by status desc");
		while ($data=$query->fetch_assoc()) {
			?>
				<option <?php if ($data['status']==$id_cat) { echo "selected"; } ?> value="<?= $data['status'] ?>"><?= $data['keterangan'] ?></option>
			<?php
		}
	}
	function edit_paket($id_paket){
		$query=$this->con->query("select * from paket where id_paket='$id_paket'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function aksi_edit_paket($id_paket,$nama_paket,$keterangan,$harga_jual){
		$query=$this->con->query("update paket set nama_paket='$nama_paket',keterangan='$keterangan',harga_jual='$harga_jual' where id_paket='$id_paket'");
		if ($query === TRUE) {
		 	$this->alert("Paket berhasil di update");
		 	$this->redirect("paket.php");
		}
		else{
		 	$this->alert("Paket gagal di update");
		 	$this->redirect("paket.php");
		 }
	}
	function hapus_paket($id_paket){
		$query=$this->con->query("delete from paket where id_paket='$id_paket'");
		if ($query === TRUE) {
			$this->alert("paket id $id_paket telah dihapus");
			$this->redirect("paket.php");
		}
	}
	function tampil_lokasi3(){
		$query=$this->con->query("select * from lokasi order by id_lokasi asc");
		$no=1;
		while ($data=$query->fetch_assoc()) {
			?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $data['alamat'] ?></td>
					<td>
						<a href="?action=edit_lokasi&id_lokasi=<?= $data['id_lokasi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Edit</span><i class="fa fa-pencil"></i></a>
						<a href="handler.php?action=hapus_lokasi&id_lokasi=<?= $data['id_lokasi'] ?>" class="btn redtbl" onclick="return confirm('yakin ingin menghapus kategori : <?= $data['alamat'] ?> ?')"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php
			
			$no++;
		}
	}
	function tambah_lokasi($alamat){
		$query=$this->con->query("select * from lokasi where alamat='$alamat'");
		if ($query->num_rows > 0) {
			$this->alert("Alamat Sudah Ada");
			$this->redirect("lokasi.php");
		}else{
			$query2=$this->con->query("insert into lokasi set alamat='$alamat'");
			if ($query2===TRUE) {
				$this->alert("Alamat Berhasil Ditambahkan");
				$this->redirect("lokasi.php");
			}
			else{
				$this->alert("Alamat Gagal Ditambahkan");
				$this->redirect("lokasi.php");
			}
		}
	}
	function edit_lokasi($id_lokasi){
		$query=$this->con->query("select * from lokasi where id_lokasi='$id_lokasi'");
		$data=$query->fetch_assoc();
		return $data;
	}
	function aksi_edit_lokasi($id_lokasi,$alamat){
		$query=$this->con->query("update lokasi set alamat='$alamat' where id_lokasi='$id_lokasi'");
		if ($query === TRUE) {
		 	$this->alert("Lokasi berhasil di update");
		 	$this->redirect("lokasi.php");
		}
		else{
		 	$this->alert("Lokasi gagal di update");
		 	$this->redirect("lokasi.php");
		 }
	}
	function hapus_lokasi($id_lokasi){
		$query=$this->con->query("delete from lokasi where id_lokasi='$id_lokasi'");
		if ($query === TRUE) {
			$this->alert("Lokasi id $id_paket telah dihapus");
			$this->redirect("lokasi.php");
		}
	}
	function tampil_laporan_owner(){
		$tgl_transaksi=date('y-m-d');
		$query=$this->con->query("select * from transaksi 
									inner join user on transaksi.kode_kasir=user.id 
									inner join lokasi on transaksi.id_lokasi=lokasi.id_lokasi where tgl_transaksi='$tgl_transaksi' order by transaksi.id_transaksi desc");
		$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['username'] ?></td>
				<td><?= $f['alamat']?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	function tampil_lokasi_filter_owner($id_cat){
		$tgl_transaksi=date('y-m-d');
			$query=$this->con->query("select * from transaksi 
									inner join user on transaksi.kode_kasir=user.id 
									inner join lokasi on transaksi.id_lokasi=lokasi.id_lokasi where lokasi.id_lokasi='$id_cat' and tgl_transaksi='$tgl_transaksi' order by transaksi.id_transaksi desc");
		
			$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['username'] ?></td>
				<td><?= $f['alamat'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	
	function filter_tampil_laporan_owner($tanggal,$aksi){
		if ($aksi==1) {
			$split1=explode('-',$tanggal);
			$tanggal=$split1[2]."-".$split1[1]."-".$split1[0];
			$query=$this->con->query("select * from transaksi 
									inner join user on transaksi.kode_kasir=user.id 
									inner join lokasi on transaksi.id_lokasi=lokasi.id_lokasi  where transaksi.tgl_transaksi like '%$tanggal%'order by transaksi.id_transaksi desc");
			}else{
			$split1=explode('-',$tanggal);
			$tanggal=$split1[1]."-".$split1[0];
			$query=$this->con->query("select * from transaksi 
									inner join user on transaksi.kode_kasir=user.id 
									inner join lokasi on transaksi.id_lokasi=lokasi.id_lokasi where transaksi.tgl_transaksi like '%$tanggal%' order by transaksi.id_transaksi desc");
				}
		
		$no=1;
		while ($f=$query->fetch_assoc()) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $f['no_invoice'] ?></td>
				<td><?= $f['username'] ?></td>
				<td><?= $f['alamat'] ?></td>
				<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
				<td>Rp. <?= number_format($f['total_bayar']) ?></td>
				<td>
					<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Lihat</span><i class="fa fa-eye"></i></a>
					<a onclick="return confirm('yakin ingin menghapus <?= $f['no_invoice']." (id : ".$f['id_transaksi'] ?>) ?')" href="handler.php?action=delete_transaksi&id=<?= $f['id_transaksi'] ?>" class="btn redtbl"><span class="btn-hapus-tooltip">Hapus</span><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
	}

}
// coded by https://www.athoul.site
$root=new penjualan();
?>
