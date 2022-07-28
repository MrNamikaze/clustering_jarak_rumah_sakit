<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");

    if(isset($_POST['profile'])){
    	$nama_lengkap = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
	    $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
	    $nik = filter_input(INPUT_POST, 'nik', FILTER_SANITIZE_STRING);
	    $nama_kepala = filter_input(INPUT_POST, 'nama_kepala', FILTER_SANITIZE_STRING);
	    $tgl_lahir = filter_input(INPUT_POST, 'tgl_lahir', FILTER_SANITIZE_STRING);
	    $jk = filter_input(INPUT_POST, 'jk', FILTER_SANITIZE_STRING);
	    $pekerjaan = filter_input(INPUT_POST, 'pekerjaan', FILTER_SANITIZE_STRING);
	    $status_menikah = filter_input(INPUT_POST, 'status_menikah', FILTER_SANITIZE_STRING);
	    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
	    $coordinates = filter_input(INPUT_POST, 'coordinates', FILTER_SANITIZE_STRING);
	    $koor1 = str_replace("LngLat","",$coordinates);
	    $koor2 = str_replace("(","",$koor1);
	    $koor3 = str_replace(")","",$koor2);
	    $coor = explode(", ",$koor3);
	    $id = $_SESSION['user']['id'];

        		$data[] = $nama_lengkap;
	            $data[] = $no_hp;
	            $data[] = $nik;
	            $data[] = $nama_kepala;
	            $data[] = $tgl_lahir;
	            $data[] = $jk;
	            $data[] = $pekerjaan;
	            $data[] = $alamat;
	            $data[] = $coor[0];
	            $data[] = $coor[1];
	            $data[] = $id;
	            $sql = "UPDATE user SET nama_lengkap=?, no_hp=?, nik=?, nama_kepala=?, tgl_lahir=?, jk=?, pekerjaan=?, alamat=?, longitude=?, latitude=? WHERE id=?";
	            $stmt = $db->prepare($sql);

	            // eksekusi query untuk menyimpan ke database
	            $saved = $stmt->execute($data);
	            session_destroy();
	            $sql = "SELECT * FROM user WHERE id=:id";
		        $stmt = $db->prepare($sql);
		        
		        // bind parameter ke query
		        $params = array(
		            ":id" => $id
		        );

		        $stmt->execute($params);

		        $user = $stmt->fetch(PDO::FETCH_ASSOC);
		        session_start();
		        $_SESSION["user"] = $user;
	            // jika query simpan berhasil, maka user sudah terdaftar
	            // maka alihkan ke halaman login
	            $not = 1;
	            require 'clustering.php';
    }
    require 'partial/header.php';
	require 'view_profile.php';
	require 'partial/footer.php';
}
?>