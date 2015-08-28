<?php

session_start();
    
    if($_SESSION['login']==0)
    {
    header("location:login.php");
    } 
?>
<?php 
	include "layout/header.php" ?>
		<div id="content" class="container">
			<div class="row">
					<div id="main_content" class="col-sm-9">
					
						<H1>Selamat Datang</H1>
						<H1>Di Perpustakaan Online</H1>
						<br>
					</div>
					
<?php include "layout/sidebar.php"; ?>
					
			</div>
		</div>
		
<?php include "layout/footer.php";	?>
