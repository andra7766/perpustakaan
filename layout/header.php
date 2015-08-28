
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Perpustakaan</title>
	<link  href="http://localhost/project1/include/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="http://localhost/project1/include/bootstrap/js/bootstrap.js"></script>
	<link  href="http://localhost/project1/include/style/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id='header' class='container'>
	<div class="row">
		<p align="right">Hallo, <b><?php print $_SESSION['username']; ?></b>
			<a href="http://localhost/project1/logout.php">LogOut</a></p>
			<img src='http://localhost/project1/include/images/logo.jpg' class='img-responsive'>
		
	</div>
</div>

<div id='main_menu' class='container'>
	<div class="row">
		<div class="col-sm-12">
				<ul>
					<li><a href='http://localhost/project1/index.php'>HOME</a></li>
					<li><a href='http://localhost/project1//member/index.php'>MEMBER</a></li>
					<li><a href='http://localhost/project1/buku/index.php'>BUKU</a></li>
					<li><a href='http://localhost/project1/penulis/index.php'>PENULIS</a></li>	
					<li><a href='http://localhost/project1/penerbit/index.php'>PENERBIT</a></li>
					<li><a href='http://localhost/project1/kategori/index.php'>KATEGORI</a></li>
				</ul>
		</div>
	</div>
</div>
