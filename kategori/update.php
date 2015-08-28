<?php
	session_start();
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php

//error_reporting(E_ALL);

if(isset($_POST['id'])){
include "../include/conn.php";

	$id = $_POST ['id'];
	$nama = $_POST ['nama'];


	$sql = mysql_query("UPDATE kategori SET
				
				nama = '".$nama."'
				
				WHERE id ='".$id."';") or die(mysql_error());

	print $id;
	print $nama;

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
						$sql="select * from kategori WHERE id = ".$_GET['id']; 
						$hasil=mysql_query($sql,$conn); 

					?>

					<?php 
						$judul = "";
						while($data = mysql_fetch_array($hasil)) {
							$nama = $data['nama']; 
						}
					?>
		  
		  <div>
			  <td colspan="2"><div align="center"><h3><b>Tentang Kategori</b></h3></div></td>
			</div>
		</br>

			<div class="form-group">
			  <label>Nama</label>
				<input name="nama" class="form-control" type="text" id="nama" value="<?php print $nama; ?>" size="30" maxlength="100"  />
			  </div>
			
			<tr>
			  <td colspan="2" align="center">
			  <input name="proses" type="hidden" value="1">
			   <input name="id" type="hidden" value="1">
				<div class="form-actions well">
  					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Save</button>
  			</div></td>
			</tr>
		  
		  <p>&nbsp;</p>
		</form>

</div>