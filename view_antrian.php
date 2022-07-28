<h1><?= $hasil3['nama_rumah_sakit']?></h1>
<h2><?= $hasil3['alamat_rumah_sakit']?></h2>
<h2><?= $hasil['poli']?></h2>
<h1><?= $hasil['antrian']?></h1>
<h2><?= $hasil2['bpjs']?></h2>
<h2><?= $hasil2['nama_lengkap']?></h2>
<h2>Hadir pada:</h2>
<h2><?php
$tanggal = $hasil['tanggal'];
$date=date_create($tanggal);
echo date_format($date,"d-m-Y");
?></h2>