<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $id = $_GET['id'];
	$sql = "DELETE FROM rujukan WHERE id = ?";
	$row = $db->prepare($sql);
	$row->execute(array($id));
    header("Location: rujukan.php");
}
?>