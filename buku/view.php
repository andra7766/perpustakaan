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
				$sql="select * from buku WHERE id = ".$_GET['id']; 
				$hasil=mysql_query($sql,$conn);
				?>
				<?php while($data = mysql_fetch_array($hasil)) { ?>
			
				<h2>Buku</h2>
				<table>
				<div id="view-buku">
				<tr><p class="bg-warning">JUDUL &nbsp;:&nbsp;<?php print $data['judul']; ?></p>
				<tr><p class="bg-warning">ISBN &nbsp;:&nbsp;<?php print $data['isbn']; ?></p>
				<tr><p class="bg-warning">SINOPSIS &nbsp;:&nbsp;<?php print $data['sinopsis']; ?></p>
				<tr><p class="bg-warning">SAMPUL &nbsp;:&nbsp;<?php print $data['sampul']; ?></p>
				<tr><p class="bg-warning">KATEGORI &nbsp;:&nbsp;<?php print $data['id_kategori']; ?></p>
				<tr><p class="bg-warning">PENULIS &nbsp;:&nbsp;<?php print $data['id_penulis']; ?></p>
				<tr><p class="bg-warning">PENERBIT &nbsp;:&nbsp;<?php print $data['id_penerbit']; ?></p>	
			</div>
				<?php } ?>
			</div>
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "../layout/footer.php";	?>
