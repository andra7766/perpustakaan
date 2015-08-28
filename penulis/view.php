<?php
	session_start();
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php include "../include/fungsi.php" ?>
<?php include "../layout/header.php" ?>
	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-9">
				<?php 
				$conn=mysql_connect("localhost","root",""); 
				mysql_select_db("perpustakaan"); 
				$id = $_GET['id'];
				$sql="select * from penulis WHERE id = ".$_GET['id']; 
				$hasil=mysql_query($sql,$conn);
				?>
				<?php while($data = mysql_fetch_array($hasil)) { ?>
			
				<h1>Data Penulis</h1>
				
				<table class="table">
				<tr>
					<th width="10%">NAMA</th>
					<td width="90%">: <?php print $data['nama']; ?></td>
				</tr>
				<tr>
					<th>ALAMAT</th>
					<td>: <?php print $data['alamat']; ?></td>
				</tr>
				<tr>
					<th>TELEPON</th>
					<td>: <?php print $data['telepon']; ?></td>
				</tr>
				</table>
				<?php } ?>

				<h2>Daftar Buku</h2>
				<?php $id = $_GET['id']; ?>
				<?php $sql = "SELECT * FROM buku WHERE id_penulis = '$id'"; ?>
				<?php $dataBuku = mysql_query($sql); ?>
				<table class="table">
				<tr>	
					<th width="10%">No</th>
					<th width="90%">Judul</th>
				</tr>
				<?php $no = 1; ?>
				<?php while($data = mysql_fetch_array($dataBuku)) { ?>
				<tr>
					<td><?php print $no; ?></td>
					<td><?php print $data['judul']; ?></td>
				</tr>
				<?php $no++; } ?>
				</table>
			</div>
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "../layout/footer.php";	?>
