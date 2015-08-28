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
		$nama = $_POST ['nama'];
		
	
	if (trim($nama)=="") {
	echo "nama Masih Kosong,ulangi kembali";
	}
	else {
	$sql = "INSERT INTO kategori SET
			
			nama = '$nama'";
	
		
		mysql_query($sql, $koneksi)
			or die ("SQL Error : ".mysql_error());
			echo "Berhasil Menyimpan judul Baru : <b>$nama</b>";
			}
	}
?>



<?php include "../layout/header.php" ?>

<div align="center">
		<form action="" method="post" name="form1" target="_self" id="form1">
		 <div>
			  <td colspan="2"><div align="center"><h3><b>Tentang Kategori</b></h3></div></td>
			</div>
		</br>

			<div class="form-group">
			  <label>Nama</label>
				<input name="nama" class="form-control" type="text" id="nama" size="30" maxlength="100"  />
			  </div>
			
			<tr>
			  <td colspan="2" align="center">
			  <input name="proses" type="hidden" value="1">
				<div class="form-actions well">
  					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Tambah</button>
  			</div></td>
			</tr>
			
		  
		  <p>&nbsp;</p>
		</form>
</div>	
