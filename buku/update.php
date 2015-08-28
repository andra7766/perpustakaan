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
	$judul = $_POST ['judul'];
	$isbn = $_POST ['isbn'];
	$sinopsis = $_POST ['sinopsis'];
	$sampul = $_POST ['sampul'];
	$id_kategori = $_POST ['id_kategori'];
	$id_penulis = $_POST ['id_penulis'];
	$id_penerbit = $_POST ['id_penerbit'];
	
	$sql = mysql_query("UPDATE buku SET
				
				judul = '".$judul."',
				isbn = '".$isbn."',
				sinopsis = '".$sinopsis."',
				sampul = '".$sampul."',
				id_kategori = '$id_kategori',
				id_penulis = '$id_penulis',
				id_penerbit = '$id_penerbit'
				WHERE id ='".$id."';") or die(mysql_error());

	print $id;
	print $judul;
	print $isbn;
	print $sinopsis;
	print $sampul;
	print $id_kategori;
	print $id_penulis;
	print $id_penerbit;
	///header("location: ../form/update.php?id_buku=".$id_buku);
}
?>

<?php
		$conn = mysql_connect("localhost","root","");
		mysql_select_db("perpustakaan",$conn);
		$sql_1 = mysql_query("SELECT `id`,`nama` FROM `kategori`");
		$sql_2 = mysql_query("SELECT `id`,`nama` FROM `penulis`");
		$sql_3 = mysql_query("SELECT `id`,`nama` FROM `penerbit`");
?>

<?php include "../layout/header.php" ?>
<div align="center">
		<form action="" method="post" >
		  
					<?php
						$conn=mysql_connect("localhost","root",""); 
						mysql_select_db("perpustakaan"); 
						$id = $_GET['id'];
						$sql="select * from buku WHERE id = ".$_GET['id']; 
						$hasil=mysql_query($sql,$conn); 

					?>

					<?php 
						$judul = "";
						while($data = mysql_fetch_array($hasil)) {
							$judul = $data['judul'];
							$isbn = $data['isbn'];
							$sinopsis = $data['sinopsis']; 
							$sampul = $data['sampul'];
							$id_kategori = $data['id_kategori'];
							$id_penulis = $data['id_penulis'];
							$id_penerbit = $data['id_penerbit'];
						}
					?>
		  
		  <div>
			  <td colspan="2"><div align="center"><h3><b>Tentang Buku</b></h3></div></td>
			</div>
		</br>

			<div class="form-group">
			  <label>Judul</label>
				<input name="judul" class="form-control" type="text" id="judul" value="<?php print $judul; ?>" size="30" maxlength="100"/>
			</div>
			
			<div class="form-group">
			  <label>ISBN</label>
				<input name="isbn" class="form-control" type="text" id="isbn" value="<?php print $isbn; ?>" size="30" maxlength="100"/>
			  </div>
			
			<div class="form-group">
			  <label>Sinopsis</label>
				<input name="sinopsis" class="form-control" type="text" id="sinopsis" value="<?php print $sinopsis; ?>" size="30" maxlength="100"/>
			</div>

			<div class="form-group">
			  <label>Sampul</label>
				<input name="sampul" class="form-control" type="text" id="sampul" value="<?php print $sampul; ?>" size="30" maxlength="100"/>
			  </div>

							<div class="form-group">
			  				<label>Id Kategori</label>
								<select name="id_kategori" class="form-control" id="id_kategori">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_1)) {
									if ($view_1['id']!=""){

										if($view_1['id']==$id_kategori)
											{
												echo "<option selected value='". $view_1['id']."'>". $view_1['nama']."
													</option>";
											} else {
												echo "<option value='". $view_1['id']."'>". $view_1['nama']."
													</option>";
											}
											} else {
												echo "<option value='none'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</div>

						<div class="form-group">
			  				<label>Id Penulis</label>
								<select name="id_penulis" class="form-control" id="id_penulis">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_2)) {
									if ($view_1['id']!=""){

										if($view_1['id']==$id_penulis)
											{
												echo "<option selected value='". $view_1['id']."'>". $view_1['nama']."
													</option>";
											} else {
												echo "<option value='". $view_1['id']."'>". $view_1['nama']."
													</option>";
											}
											} else {
												echo "<option value='none'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</div>

						<div class="form-group">
			 				 <label>Id Penerbit</label>
								<select name="id_penerbit" class="form-control" id="id_penerbit">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_3)) {
									if ($view_1['id']!=""){

										if($view_1['id']==$id_penerbit)
											{
												echo "<option selected value='". $view_1['id']."'>". $view_1['nama']."
													</option>";
											} else {
												echo "<option value='". $view_1['id']."'>". $view_1['nama']."
													</option>";
											}
											} else {
												echo "<option value='none'>tidak ada data</option>";
										}
									}
									?>
								</select>
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