<?php
	session_start();
	if (isset($_POST['username'])) {
	$_SESSION['username']=$username;
		}
	?>
<?php

//error_reporting(E_ALL);

		include "../include/conn.php";

		if (isset($_POST['id'])){

		$judul = $_POST ['judul'];
		$isbn = $_POST ['isbn'];
		$sinopsis = $_POST ['sinopsis'];
		$sampul = $_POST ['sampul'];
		$id_kategori = $_POST ['id_kategori'];
		$id_penulis = $_POST ['id_penulis'];
		$id_penerbit = $_POST ['id_penerbit'];
		
	
	if (trim($judul)=="") {
	echo "judul Masih Kosong,ulangi kembali";
	}
	elseif (trim($isbn)=="") {
	echo "isbn Masih Kosong,Ulangi Kembali";
	}
	elseif (trim($sinopsis)=="") {
	echo "sinopsis Masih Kosong,ulangi kembali";
	}
	elseif (trim($sampul)=="") {
	echo "sampul Masih Kosong,Ulangi Kembali";
	}
	elseif (trim($id_kategori)=="") {
	echo "kategori Masih Kosong,ulangi kembali";
	}
	elseif (trim($id_penulis)=="") {
	echo "penulis Masih Kosong,ulangi kembali";
	}
	elseif (trim($id_penerbit)=="") {
	echo "penerbit Masih Kosong,ulangi kembali";
	}
	else {
	$sql = "INSERT INTO buku SET
			
			judul = '$judul',
			isbn = '$isbn',
			sinopsis = '$sinopsis',
			sampul = '$sampul',
			id_kategori = '$id_kategori',
			id_penulis = '$id_penulis',
			id_penerbit = '$id_penerbit'";
	
		
		mysql_query($sql, $koneksi)
			or die ("SQL Error : ".mysql_error());
			echo "Berhasil Menyimpan judul Baru : <b>$judul</b>";
			}
	}		
?>

<?php

		$conn = mysql_connect("localhost","root","");
		mysql_select_db("perpustakaan",$conn);
		$sql_1 = mysql_query("SELECT `id`,`nama` FROM `penulis`");
		$sql_2 = mysql_query("SELECT `id`,`nama` FROM `penerbit`");
		$sql_3 = mysql_query("SELECT `id`,`nama` FROM `kategori`");

?>


<?php include "../layout/header.php" ?>

<div align="center">
		<form action="" method="post" name="form1" target="_self" id="form1">
		  
		   	<div>
			  <td colspan="2"><div align="center"><h3><b>Tentang Buku</b></h3></div></td>
			</div>
		</br>

			<div class="form-group">
			  <label>Judul</label>
				<input name="judul" class="form-control" type="text" id="judul" size="30" maxlength="100"/>
			</div>
			
			<div class="form-group">
			  <label>ISBN</label>
				<input name="isbn" class="form-control" type="text" id="isbn" size="30" maxlength="100"/>
			  </div>
			
			<div class="form-group">
			  <label>Sinopsis</label>
				<input name="sinopsis" class="form-control" type="text" id="sinopsis" size="30" maxlength="100"/>
			</div>

			<div class="form-group">
			  <label>Sampul</label>
				<input name="sampul" class="form-control" type="text" id="sampul" size="30" maxlength="100"/>
			  </div>
			
			<div class="form-group">
			  <label>Id Kategori</label>
								<select name="id_kategori" class="form-control" id="id_kategori">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_3)) {
										if ($view_1['id']!=""){
											echo "<option value='". $view_1['id']."'>". $view_1['nama']."
											</option>";
										} 
										else{
											echo "<option value='none'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</div>

						<div class="form-group">
			  				<label>Id Penulis</label>
								<select name="id_penulis" id="id_penulis" class="form-control">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_1)) {
										if ($view_1['id']!=""){
											echo "<option value='". $view_1['id']."'>". $view_1['nama']."
											</option>";
										} 
										else{
											echo "<option value='none'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</div>

						<div class="form-group">
			  				<label>Id Penerbit</label>
								<select name="id_penerbit" id="id_penerbit" class="form-control">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_2)) {
										if ($view_1['id']!=""){
											echo "<option value='". $view_1['id']."'>". $view_1['nama']."
											</option>";
										} 
										else{
											echo "<option value='none'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</div>

			<tr>
			  <td colspan="2">
			  <input name="proses" type="hidden" value="1">
			  <input name="id" type="hidden" value="1">
				<div class="form-actions well">
  					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Tambah</button>
  			</div></td>
			</tr>
			
		  
		  
		  <p>&nbsp;</p>
		</form>
</div>	

