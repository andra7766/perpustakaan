<?php 
// difinisi session
session_start();
// hapus semua session
session_destroy();
header("location:login.php");
?>