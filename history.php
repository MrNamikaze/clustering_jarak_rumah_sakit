<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $id = $_SESSION["user"]["id"];
    $sql = "SELECT * FROM rekam_medis WHERE id_user = $id ORDER BY poli DESC";
	$row = $db->prepare($sql);
	$row->execute();
	$hasil2 = $row->fetchAll();
    require 'partial/header.php';
	require 'view_history.php';
	require 'partial/footer.php';
}
?>