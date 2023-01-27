<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $id = $_SESSION["user"]["id"];
    $sql = "SELECT rekam_medis.* , rumah_sakit.nama_rumah_sakit, dokter.nama_dokter FROM rekam_medis LEFT JOIN rumah_sakit ON rekam_medis.rumah_sakit=rumah_sakit.id LEFT JOIN dokter ON rekam_medis.dokter=dokter.id_dokter WHERE id_user =  $id";
	$row = $db->prepare($sql);
	$row->execute();
	$hasil2 = $row->fetchAll();
    require 'partial/header.php';
	require 'view_rekam_medis.php';
	require 'partial/footer.php';
}
?>