<?php
//error_reporting(E_ALL);
		include "include/conn.php";

		if (isset($_POST['proses'])){
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		
	
	if (trim($username)=="") {
	echo "Username Masih Kosong,ulangi kembali";
	}
	else {
	$sql = "INSERT INTO login SET
			
			username = '$username',
			password = '$password'";
	
		
		mysql_query($sql, $koneksi)
			or die ("SQL Error : ".mysql_error());
			echo "Berhasil : <b>$username</b>";
			}
	}
?>



<div align="center">
		<form action="" method="post" name="form1" target="_self" id="form1">
		  <table border="1">  
		
		 	<tr>
		  		<p>&nbsp;</p>
		  	</tr>  
		   <tr>
			  <td colspan="2"><div align="center">Daftar Baru</div></td>
			</tr>
			<tr>
			  <td>Username</td>
			  <td><label>
				<input name="username" type="text" id="username" size="30" maxlength="100"  />
			  </label></td>
			</tr>
			<tr>
			  <td>Password</td>
			  <td><label>
				<input name="password" type="text" id="password" size="30" maxlength="100"  />
			  </label></td>
			</tr>
			
			<tr>
			  <td colspan="2" align="center"><label>
			  <input name="proses" type="hidden" value="1">
				<input   type="submit" name="submit" id="submit" value="tambah" />
			  </label></td>
			</tr>
		  </table>
		  Silahkan Login <a href="login.php">Disini</a>
		  <p>&nbsp;</p>
		</form>
</div>