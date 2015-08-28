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
		$alamat = $_POST ['alamat'];
		$telepon = $_POST ['telepon'];	
	
	if (trim($nama)=="") {
	echo "judul Masih Kosong,ulangi kembali";
	}
	elseif (trim($alamat)=="") {
	echo "isbn Masih Kosong,Ulangi Kembali";
	}
	elseif (trim($telepon)=="") {
	echo "sinopsis Masih Kosong,ulangi kembali";
	}
	else {
	$sql = "INSERT INTO penulis SET
			
			nama = '$nama',
			alamat = '$alamat',
			telepon = '$telepon'";
	
		
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
			  <td colspan="2"><div align="center"><h3><b>Tentang Penulis</b></h3></div></td>
			</div>
		</br>

			<div class="form-group">
			  <label>Nama</label>
				<input name="nama" class="form-control" type="text" id="nama" size="30" maxlength="100" />
			  </div>

			<div class="form-group">
			  <label>Alamat</label>
				<input name="alamat" class="form-control" type="text" id="alamat" size="30" maxlength="100" />
			  </div>

			<div class="form-group">
			  <label>Telepon</label>
				<input name="telepon" class="form-control" type="text" id="telepon" size="30" maxlength="100" />
			  </div>

			<tr>
			  <td colspan="2">
			  <input name="proses" type="hidden" value="1">
				<div class="form-actions well">
  					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Tambah</button>
  			</div></td>
			</tr>
			
		  
		  <p>&nbsp;</p>
		</form>
</div>	
