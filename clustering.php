<?php
require_once("koneksi.php");
// clustering faskes 1
$sql = "TRUNCATE TABLE clustering";
$stmt = $db->prepare($sql);
$saved = $stmt->execute();
$bpjs = $_SESSION["user"]["bpjs"];
$sql = "SELECT * FROM user";
$row = $db->prepare($sql);
$row->execute();
$hasil = $row->fetchAll();
$d=0;
foreach ($hasil as $b ) {
	$user_longitude = $b['longitude'];
	$user_latitude = $b['latitude'];
	$id_user_clustering = $b['id'];
	$sql2 = "SELECT * FROM rumah_sakit WHERE tingkat = '1'";
    $row = $db->prepare($sql2);
    $row->execute();
    $hasil2 = $row->fetchAll();
    $c = 0;
    foreach ($hasil2 as $result) {
		$longitude = $result['longitude'];
		$latitude = $result['latitude'];
        $long_before = $user_longitude;
        $latitude_before = $user_latitude;
        $long_after = $longitude;
        $latitude_after = $latitude;

        $earthRadius = 6371000;
        $latFrom = deg2rad($latitude_before);
        $lonFrom = deg2rad($long_before);
        $latTo = deg2rad($latitude_after);
        $lonTo = deg2rad($long_after);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $hasil3[$c] = $angle * $earthRadius;
        $c++;
	}
	$jarak_min = min($hasil3);
	foreach ($hasil2 as $result) {
		$nama_rumah_sakit = $result['nama_rumah_sakit'];
		$alamat_rumah_sakit = $result['alamat_rumah_sakit'];
		$id_rumah_sakit = $result['id'];

		$longitude = $result['longitude'];
		$latitude = $result['latitude'];
        $long_before = $user_longitude;
        $latitude_before = $user_latitude;
        $long_after = $longitude;
        $latitude_after = $latitude;

        $earthRadius = 6371000;
        $latFrom = deg2rad($latitude_before);
        $lonFrom = deg2rad($long_before);
        $latTo = deg2rad($latitude_after);
        $lonTo = deg2rad($long_after);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $hasil1 = $angle * $earthRadius;
        if($jarak_min==$hasil1){
        	$hasil_akhir[$d] = array('id_rumah_sakit' => $id_rumah_sakit, 'id_user_clustering' => $id_user_clustering, 'jarak' => $jarak_min);
        }
	}
	$d++;
}
foreach ($hasil_akhir as $b) {
	$id_rumah_sakit = $b['id_rumah_sakit'];
	$id_user_clustering = $b['id_user_clustering'];
	$jarak = $b['jarak'];
	$sql = "INSERT INTO clustering (id_rumah_sakit, id_user, jarak) 
                    VALUES (:id_rumah_sakit, :id_user, :jarak)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":id_rumah_sakit" => $id_rumah_sakit,
        ":id_user" => $id_user_clustering,
        ":jarak" => $jarak
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved){
        
    }
    else{
        $usr = 2;
    }
}
// clustering faskes 2
$sql = "TRUNCATE TABLE clustering_2";
$stmt = $db->prepare($sql);
$saved = $stmt->execute();
$bpjs = $_SESSION["user"]["bpjs"];
$sql = "SELECT * FROM user";
$row = $db->prepare($sql);
$row->execute();
$hasil = $row->fetchAll();
$d=0;
foreach ($hasil as $b ) {
	$user_longitude = $b['longitude'];
	$user_latitude = $b['latitude'];
	$id_user_clustering = $b['id'];
	$sql2 = "SELECT * FROM rumah_sakit WHERE tingkat = '2'";
    $row = $db->prepare($sql2);
    $row->execute();
    $hasil2 = $row->fetchAll();
    $c = 0;
    foreach ($hasil2 as $result) {
		$longitude = $result['longitude'];
		$latitude = $result['latitude'];
        $long_before = $user_longitude;
        $latitude_before = $user_latitude;
        $long_after = $longitude;
        $latitude_after = $latitude;

        $earthRadius = 6371000;
        $latFrom = deg2rad($latitude_before);
        $lonFrom = deg2rad($long_before);
        $latTo = deg2rad($latitude_after);
        $lonTo = deg2rad($long_after);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $hasil3[$c] = $angle * $earthRadius;
        $c++;
	}
	$jarak_min = min($hasil3);
	foreach ($hasil2 as $result) {
		$nama_rumah_sakit = $result['nama_rumah_sakit'];
		$alamat_rumah_sakit = $result['alamat_rumah_sakit'];
		$id_rumah_sakit = $result['id'];

		$longitude = $result['longitude'];
		$latitude = $result['latitude'];
        $long_before = $user_longitude;
        $latitude_before = $user_latitude;
        $long_after = $longitude;
        $latitude_after = $latitude;

        $earthRadius = 6371000;
        $latFrom = deg2rad($latitude_before);
        $lonFrom = deg2rad($long_before);
        $latTo = deg2rad($latitude_after);
        $lonTo = deg2rad($long_after);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $hasil1 = $angle * $earthRadius;
        if($jarak_min==$hasil1){
        	$hasil_akhir[$d] = array('id_rumah_sakit' => $id_rumah_sakit, 'id_user_clustering' => $id_user_clustering, 'jarak' => $jarak_min);
        }
	}
	$d++;
}
foreach ($hasil_akhir as $b) {
	$id_rumah_sakit = $b['id_rumah_sakit'];
	$id_user_clustering = $b['id_user_clustering'];
	$jarak = $b['jarak'];
	$sql = "INSERT INTO clustering_2 (id_rumah_sakit, id_user, jarak) 
                    VALUES (:id_rumah_sakit, :id_user, :jarak)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":id_rumah_sakit" => $id_rumah_sakit,
        ":id_user" => $id_user_clustering,
        ":jarak" => $jarak
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved){
        
    }
    else{
        $usr = 2;
    }
}
// clustering lanjutan
$sql = "TRUNCATE TABLE clustering_lanjutan";
$stmt = $db->prepare($sql);
$saved = $stmt->execute();
$bpjs = $_SESSION["user"]["bpjs"];
$sql = "SELECT * FROM user";
$row = $db->prepare($sql);
$row->execute();
$hasil = $row->fetchAll();
$d=0;
foreach ($hasil as $b ) {
	$user_longitude = $b['longitude'];
	$user_latitude = $b['latitude'];
	$id_user_clustering = $b['id'];
	$sql2 = "SELECT * FROM rumah_sakit WHERE tingkat = 'lanjutan'";
    $row = $db->prepare($sql2);
    $row->execute();
    $hasil2 = $row->fetchAll();
    $c = 0;
    foreach ($hasil2 as $result) {
		$longitude = $result['longitude'];
		$latitude = $result['latitude'];
        $long_before = $user_longitude;
        $latitude_before = $user_latitude;
        $long_after = $longitude;
        $latitude_after = $latitude;

        $earthRadius = 6371000;
        $latFrom = deg2rad($latitude_before);
        $lonFrom = deg2rad($long_before);
        $latTo = deg2rad($latitude_after);
        $lonTo = deg2rad($long_after);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $hasil3[$c] = $angle * $earthRadius;
        $c++;
	}
	$jarak_min = min($hasil3);
	foreach ($hasil2 as $result) {
		$nama_rumah_sakit = $result['nama_rumah_sakit'];
		$alamat_rumah_sakit = $result['alamat_rumah_sakit'];
		$id_rumah_sakit = $result['id'];

		$longitude = $result['longitude'];
		$latitude = $result['latitude'];
        $long_before = $user_longitude;
        $latitude_before = $user_latitude;
        $long_after = $longitude;
        $latitude_after = $latitude;

        $earthRadius = 6371000;
        $latFrom = deg2rad($latitude_before);
        $lonFrom = deg2rad($long_before);
        $latTo = deg2rad($latitude_after);
        $lonTo = deg2rad($long_after);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $hasil1 = $angle * $earthRadius;
        if($jarak_min==$hasil1){
        	$hasil_akhir[$d] = array('id_rumah_sakit' => $id_rumah_sakit, 'id_user_clustering' => $id_user_clustering, 'jarak' => $jarak_min);
        }
	}
	$d++;
}
foreach ($hasil_akhir as $b) {
	$id_rumah_sakit = $b['id_rumah_sakit'];
	$id_user_clustering = $b['id_user_clustering'];
	$jarak = $b['jarak'];
	$sql = "INSERT INTO clustering_lanjutan (id_rumah_sakit, id_user, jarak) 
                    VALUES (:id_rumah_sakit, :id_user, :jarak)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":id_rumah_sakit" => $id_rumah_sakit,
        ":id_user" => $id_user_clustering,
        ":jarak" => $jarak
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved){
        
    }
    else{
        $usr = 2;
    }
}
?>