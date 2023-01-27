<?php
require_once("koneksi.php");
$sql = "SELECT * FROM antrian_janji_medis WHERE id_user = 1 AND poli = 'poli jantung' ORDER BY id DESC";
$row = $db->prepare($sql);
$row->execute();
$hasil = $row->fetch();
var_dump($hasil);
?>