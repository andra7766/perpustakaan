<?php
	session_start();
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php

//error_reporting(E_ALL);

include "../include/conn.php";

	if (isset($_POST['proses'])){
	$id = $_POST ['id'];
	$id_buku = $_POST ['id_buku'];
	$id_user = $_POST ['id_user'];
	$tgl_peminjaman = $_POST ['tgl_peminjaman'];
	$lama_peminjaman = $_POST ['lama_peminjaman'];
	$tgl_pengembalian = $_POST ['tgl_pengembalian'];
	$status = $_POST ['status'];
	
	$sql = mysql_query("UPDATE peminjaman SET
				
				id_buku = '".$id_buku."',
				id_user = '".$id_user."',
				tgl_peminjaman = '".$tgl_peminjaman."',
				lama_peminjaman = '".$lama_peminjaman."',
				tgl_pengembalian = '".$tgl_pengembalian."',
				status = '".$status."'
				
				WHERE id ='".$id."';") or die(mysql_error());

	print $id;
	print $id_buku;
	print $id_user;
	print $tgl_peminjaman;
	print $lama_peminjaman;
	print $tgl_pengembalian;
	print $status;
	
	///header("location: ../form/update.php?id_buku=".$id_buku);
}
?>


<?php include "../layout/header.php" ?>
<div align="center">
		<form action="" method="post" target="_self">
		  
					<?php
						$conn=mysql_connect("localhost","root",""); 
						mysql_select_db("perpustakaan"); 
						$id = $_GET['id'];
						$sql="select * from peminjaman WHERE id = ".$_GET['id']; 
						$hasil=mysql_query($sql,$conn); 

					?>

					<?php 
						$id_buku = "";
						while($data = mysql_fetch_array($hasil)) {
							$id_buku = $data['id_buku'];
							$id_user = $data['id_user'];
							$tgl_peminjaman = $data['tgl_peminjaman']; 
							$lama_peminjaman = $data['lama_peminjaman'];
							$tgl_pengembalian = $data['tgl_pengembalian'];
							$status = $data['status'];
							
						}
					?>
		  
		  <div>
			  <td colspan="2"><div align="center"><h3><b>Pinjam Buku</b></h3></div></td>
			</div>
			</br>

			<div class="form-group">
			  <label>Id_Buku</label>
				<input name="id_buku" class="form-control" value="<?php print $id_buku; ?>" type="text" id="id_buku" size="30" maxlength="100"/>
			</div>

			<div class="form-group">
			  <label>Id_User</label>
				<input name="id_user" class="form-control" value="<?php print $id_user; ?>" type="text" id="id_user" size="30" maxlength="100"/>
			</div>

			<div class="form-group">
			  <label>Tanggal Peminjaman</label>
				<input name="tgl_peminjaman" class="form-control" value="<?php print $tgl_peminjaman; ?>" type="date" id="tgl_peminjaman"/>
			</div>

			<div class="form-group">
    				<label>lama_peminjaman</label>
    				<input type="text" class="form-control" id="lama_peminjaman" value="<?php print $lama_peminjaman; ?>" name="lama_peminjaman">
  			</div>

			<div class="form-group">
			  <label>Tanggal Pengembalian</label>
				<input name="tgl_pengembalian" class="form-control" value="<?php print $tgl_pengembalian; ?>" type="date" id="tgl_pengembalian"/>
			</div>

			<div class="form-group">
			  <label>Status Kembali</label>
				<input name="status" class="form-control" type="text" id="status" value="<?php print $status; ?>" size="30" maxlength="100"/>
			</div>
						
			<tr>
			  <td colspan="2"><label>
			  <input name="proses" type="hidden" value="1">
			  <input name="id" type="hidden" value="<?php print $_GET['id']; ?>">
			  <div class="form-actions well">
  					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Save</button>
  			</div></td>
			</tr>
			
		  </table>
		  
		  <p>&nbsp;</p>
		</form>

</div>