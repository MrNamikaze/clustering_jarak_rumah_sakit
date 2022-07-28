<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    require 'partial/header.php';
	require 'view_janji_medis.php';
	require 'partial/footer.php';
}
?>