<?php
	session_start();
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php include "../layout/header.php" ?>
<?php include "../include/fungsi.php" ?>
<?php 
$conn = mysql_connect("localhost","root","");
		mysql_select_db("perpustakaan",$conn);
$sql_1 = mysql_query("SELECT `id`,`nama` FROM `penulis`");
$sql_2 = mysql_query("SELECT `id`,`nama` FROM `penerbit`");
$sql_3 = mysql_query("SELECT `id`,`nama` FROM `kategori`");
?>

<div id="content" class="container">
	<div class="row">
		<div id="main_content" class="col-sm-9">
			<h2>Data Buku</h2>
					
			<a href="input.php" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Buku
			</a>

			<div>&nbsp;</div>

			<table class="table table-hover table-bordered"> 
				<tr>
						<th>No</th>
						<th>JUDUL</th>
						<th>ISBN</th>
						<th>SINOPSIS</th>
						<th>SAMPUL</th>
						<th>KATEGORI</th>
						<th>PENULIS</th>
						<th>PENERBIT</th>
						<th>OPTION</th>
					</tr>

					<?php 
						$conn=mysql_connect("localhost","root",""); 
						mysql_select_db("perpustakaan"); 
						$sql="select * from buku"; 
						$hasil=mysql_query($sql,$conn); 
					?>
					<?php $no = 1; ?>
					<?php while($data = mysql_fetch_array($hasil)) { ?>
					<tr>
						<td><?php print $no; ?></td>
						<td><?php print $data['judul']; ?></td>
						<td><?php print $data['isbn']; ?></td>
						<td><?php print $data['sinopsis']; ?></td>
						<td><?php print $data['sampul']; ?></td>
						<td><?php print getNamaKategori($data['id_kategori']); ?></td>
						<td><?php print getNamaPenulis($data['id_penulis']); ?></td>
						<td><?php print getNamaPenerbit($data['id_penerbit']); ?></td>
						<td>
							<a href="view.php?id=<?php print $data['id']; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="update.php?id=<?php print $data['id']; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="delete.php?id=<?php print $data['id']; ?>" onclick="javascript: return confirm('Anda yakin?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
							<a href="../member/input.php?id=<?php print $data['id']; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ok"></i>Pinjam</a>

						</td>
					</tr>	
					<?php $no++; } ?>
			</table>
		</div><!-- #main_content -->
		
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div><!-- .row -->
</div><!-- #content -->

<?php include "../layout/footer.php";	?>
