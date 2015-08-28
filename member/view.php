<?php
	session_start();
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php include "../layout/header.php" ?>
	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-9">
				<?php 
				$conn=mysql_connect("localhost","root",""); 
				mysql_select_db("perpustakaan"); 
				$id = $_GET['id'];
				$sql="select * from peminjaman WHERE id = ".$_GET['id']; 
				$hasil=mysql_query($sql,$conn);
				?>
				<?php while($data = mysql_fetch_array($hasil)) { ?>
			
				<h2>Data Peminjam</h2>
				<table>
				<div id="view-buku">
				<tr><p class="bg-warning">Id Buku &nbsp;:&nbsp;<?php print $data['id_buku']; ?></p>
				<tr><p class="bg-warning">Id User &nbsp;:&nbsp;<?php print $data['id_user']; ?></p>
				<tr><p class="bg-warning">Tanggal Peminjaman &nbsp;:&nbsp;<?php print $data['tgl_peminjaman']; ?></p>
				<tr><p class="bg-warning">Lama Peminjaman &nbsp;:&nbsp;<?php print $data['lama_peminjaman']; ?></p>
				<tr><p class="bg-warning">Tanggal Pengembalian &nbsp;:&nbsp;<?php print $data['tgl_pengembalian']; ?></p>
				<tr><p class="bg-warning">Status Pengembalian &nbsp;:&nbsp;<?php print $data['status']; ?></p>
					
			</div>
				<?php } ?>
			</div>
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "../layout/footer.php";	?>
