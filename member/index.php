<?php
	session_start();
	//error_reporting(E_ALL);
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php include "../layout/header.php" ?>
<?php include "../include/conn.php" ?>

<div id="content" class="container">
	<div class="row">
		<div id="main_content" class="col-sm-9">
			<h2>Data Member</h2>
					
			</a>

			<div>&nbsp;</div>

			<table class="table table-hover table-bordered"> 
				<tr>
						<th>Id</th>
						<th>Buku Dipinjam</th>
						<th>Id User</th>
						<th>Tanggal Peminjaman</th>
						<th>Lama Peminjaman</th>
						<th>Tanggal Pengembalian</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>

					<?php 
						$conn=mysql_connect("localhost","root",""); 
								mysql_select_db("perpustakaan"); 
						$sql="SELECT * FROM peminjaman"; 
						$hasil=mysql_query($sql,$conn); 
					?>
					<?php $no = 1; ?>
					<?php while($data = mysql_fetch_array($hasil)) { ?>

					<tr>	
						<td><?php print $no; ?></td>
						<td><?php print $data['id_buku']; ?></td>
						<td><?php print $data['id_user']; ?></td>
						<td><?php print $data['tgl_peminjaman']; ?></td>
						<td><?php print $data['lama_peminjaman']; ?></td>
						<td><?php print $data['tgl_pengembalian']; ?></td>
						<td><?php print $data['status']; ?></td>
						<td>
							<a href="view.php?id=<?php print $data['id']; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="update.php?id=<?php print $data['id']; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="delete.php?id=<?php print $data['id']; ?>" onclick="javascript: return confirm('Anda yakin ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
