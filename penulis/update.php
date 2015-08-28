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
	$nama = $_POST ['nama'];
	$alamat = $_POST ['alamat'];
	$telepon = $_POST ['telepon'];

	$sql = mysql_query("UPDATE penulis SET
				
				nama = '".$nama."',
				alamat = '".$alamat."',
				telepon = '".$telepon."'
				
				WHERE id ='".$id."';") or die(mysql_error());

	print $id;
	print $nama;
	print $alamat;
	print $telepon;
	///header("location: ../form/update.php?id_buku=".$id_buku);
}
?>



<?php include "../layout/header.php" ?>
<div align="center">
		<form action="" method="post" >
		  
					<?php
						$conn=mysql_connect("localhost","root",""); 
						mysql_select_db("perpustakaan"); 
						$id = $_GET['id'];
						$sql="select * from penulis WHERE id = ".$_GET['id']; 
						$hasil=mysql_query($sql,$conn); 

					?>

					<?php 
						$judul = "";
						while($data = mysql_fetch_array($hasil)) {
							$nama = $data['nama'];
							$alamat = $data['alamat'];
							$telepon = $data['telepon']; 

						}
					?>
		  
		  <div>
			  <td colspan="2"><div align="center"><h3><b>Tentang Penulis</b></h3></div></td>
			</div>
		</br>

			<div class="form-group">
			  <label>Nama</label>
				<input name="nama" class="form-control" type="text" id="nama" value="<?php print $nama; ?>" size="30" maxlength="100" />
			  </div>

			<div class="form-group">
			  <label>Alamat</label>
				<input name="alamat" class="form-control" type="text" id="alamat" value="<?php print $alamat; ?>" size="30" maxlength="100" />
			  </div>

			<div class="form-group">
			  <label>Telepon</label>
				<input name="telepon" class="form-control" type="text" id="telepon" value="<?php print $telepon; ?>" size="30" maxlength="100" />
			  </div>
			
			
			<tr>
			  <td colspan="2">
			  <input name="proses" type="hidden" value="1">
			  <input name="id" type="hidden" value="<?php print $_GET['id']; ?>">
				<div class="form-actions well">
  					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Save</button>
  			</div></td>
			</tr>
			
		 
		  
		  <p>&nbsp;</p>
		</form>

</div>