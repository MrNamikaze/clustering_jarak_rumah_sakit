<?php

session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $keterangan = $_GET['id'];
    $keterangan2 = str_replace("_"," ",$keterangan);
    $id_user = $_SESSION["user"]["id"];
    $bpjs = $_SESSION["user"]["bpjs"];
    $nama_lengkap = $_SESSION["user"]["nama_lengkap"];
    $sql = "SELECT * FROM antrian_janji_medis WHERE id_user = '$id_user' AND poli = '$keterangan2' GROUP BY tanggal DESC";
    $row = $db->prepare($sql);
    $row->execute();
    $hasil = $row->fetch();
    if($hasil==false){
    	header("Location: janji_medis.php");
    }
    else{
    	$id_rumah_sakit = $hasil['id_rumah_sakit'];
	    $sql2 = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit";
	    $row = $db->prepare($sql2);
	    $row->execute();
	    $hasil3 = $row->fetch();
    }
}

?>
<h1><?= $hasil3['nama_rumah_sakit']?></h1>
<h2><?= $hasil3['alamat_rumah_sakit']?></h2>
<h2>Poli: <?= $hasil['poli']?></h2>
<h1>Antrian no: <?= $hasil['antrian']?></h1>
<h2>No BPJS: <?= $bpjs?></h2>
<h2>Nama: <?= $nama_lengkap?></h2>
<h2>Hadir pada:</h2>
<h2><?php
$tanggal = $hasil['tanggal'];
$date=date_create($tanggal);
echo date_format($date,"d-m-Y");
?></h2>