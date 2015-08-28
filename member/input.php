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
		$id_buku = $_POST ['id_buku'];
		$id_user = $_POST ['id_user'];
		$tgl_peminjaman = $_POST ['tgl_peminjaman'];
		$lama_peminjaman = $_POST ['lama_peminjaman'];
		$tgl_pengembalian = $_POST ['tgl_pengembalian'];
		$status = $_POST ['status'];
		
		
	
	if (trim($id_buku)=="") {
	echo "id_buku Masih Kosong,ulangi kembali";
	}
	elseif (trim($id_user)=="") {
	echo "id_user Masih Kosong,Ulangi Kembali";
	}
	elseif (trim($tgl_peminjaman)=="") {
	echo "tgl_peminjaman Masih Kosong,ulangi kembali";
	}
	elseif (trim($lama_peminjaman)=="") {
	echo "lama_peminjaman Masih Kosong,Ulangi Kembali";
	}
	elseif (trim($tgl_pengembalian)=="") {
	echo "tgl_pengembalian Masih Kosong,ulangi kembali";
	}
	elseif (trim($status)=="") {
	echo "status Masih Kosong,ulangi kembali";
	}
	else {
	$sql = "INSERT INTO peminjaman SET
			
			id_buku = '$id_buku',
			id_user = '$id_user',
			tgl_peminjaman = '$tgl_peminjaman',
			lama_peminjaman = '$lama_peminjaman',
			tgl_pengembalian = '$tgl_pengembalian',
			status = '$status'";
	
		
		mysql_query($sql, $koneksi)
			or die ("SQL Error : ".mysql_error());
			echo "Berhasil Meminjam";
			}
	}		
?>
<?php
// include "../include/conn.php";
$conn = mysql_connect("localhost","root","");
  mysql_select_db("perpustakaan",$conn);
          $id = $_GET['id'];
            $sql="SELECT * FROM buku WHERE id =$id"; 
            $hasil=mysql_query($sql,$conn); 
           $data = mysql_fetch_array($hasil);  ?>




<?php include "../layout/header.php" ?>

<div align="center">
		<form action="" method="post" name="form1" target="_self" id="form1">
		   
		   <div>
			  <td colspan="2"><div align="center"><h3><b>Pinjam Buku</b></h3></div></td>
			</div>
			</br>

			<div class="form-group">
			  <label>Id_Buku</label>
				<input name="id_buku" class="form-control" value="<?php print $data['judul']; ?>" type="text" id="id_buku" size="30" maxlength="100"/>
			</div>

			<div class="form-group">
			  <label>Id_User</label>
				<input name="id_user" class="form-control" value="<?php print $_SESSION['username']; ?>" type="text" id="id_user" size="30" maxlength="100"/>
			</div>

			<div class="form-group">
			  <label>Tanggal Peminjaman</label>
				<input name="tgl_peminjaman" class="form-control" type="date" id="tgl_peminjaman"/>
			</div>

			<div class="form-group">
    				<label>lama_peminjaman</label>
    				<input type="text" class="form-control" id="lama_peminjaman" name="lama_peminjaman">
  			</div>

			<div class="form-group">
			  <label>Tanggal Pengembalian</label>
				<input name="tgl_pengembalian" class="form-control" type="date" id="tgl_pengembalian"/>
			</div>

			<div class="form-group">
			  <label>Status Kembali</label>
				<input name="status" class="form-control" type="text" id="status" size="30" maxlength="100"/>
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

