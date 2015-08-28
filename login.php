<?php 
include "include/conn.php"; 
?>

<?php

session_start();

if (isset($_POST['username'])) 
{
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$query = mysql_query("select * from login where password='$password' AND username='$username'", $koneksi);
		$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login']=1;
				$_SESSION['username']=$username;
				header("location: index.php");
				} else {
				print "<script>
					alert(\"Gagal\");	
				</script>";
				}
				mysql_close($koneksi);
	}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Login</title>
</head>

<body>
<fieldset>
<legend>Login</legend>
<form action="login.php" method="post" name="login" id="login">
	<p>Username :
		<input name="username" type="text" id="username" placeholder="Enter Username">
	</p>
	<p>Password :
		<input name="password" type="password" id="password" placeholder="*******">
	</p>
	<p>
		<input type="submit" name="Submit" value="Login">
	</p>
	<a href="daftar.php">Daftar Baru</a>
</form>
</fieldset>
</body>
</html>