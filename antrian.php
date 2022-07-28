<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
	require_once("koneksi.php");
    $poli_tujuan = filter_input(INPUT_POST, 'poli_tujuan', FILTER_SANITIZE_STRING);
    $tgl_kunjungan = filter_input(INPUT_POST, 'tgl_kunjungan', FILTER_SANITIZE_STRING);
    $keluhan = filter_input(INPUT_POST, 'keluhan', FILTER_SANITIZE_STRING);
    require 'clustering.php';
    $bpjs = $_SESSION["user"]["bpjs"];
    $id2 = $_SESSION['user']['id'];
    $sql = "SELECT * FROM user WHERE bpjs = $bpjs";
    $row = $db->prepare($sql);
    $row->execute();
    $hasil = $row->fetch();
	$id_user = $hasil['id'];
	$sql2 = "SELECT * FROM clustering WHERE id_user = $id_user";
    $row = $db->prepare($sql2);
    $row->execute();
    $hasil2 = $row->fetch();
    $id_rumah_sakit = $hasil2['id_rumah_sakit'];
    $sql3 = "SELECT * FROM antrian_janji_medis WHERE id_user = '$id_user' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
    $row = $db->prepare($sql3);
    $row->execute();
    $hasil4 = $row->fetch();

    if($hasil4==false){
    	$sql3 = "SELECT * FROM antrian_janji_medis WHERE id_rumah_sakit = '$id_rumah_sakit' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
	    $row = $db->prepare($sql3);
	    $row->execute();
	    $hasil3 = $row->fetch();
	    if($hasil3==false){
		    $sql = "INSERT INTO antrian_janji_medis (id_user, id_rumah_sakit, poli, tanggal, keluhan, antrian) 
		                        VALUES (:id_user, :id_rumah_sakit, :poli, :tanggal, :keluhan, :antrian)";
		    $stmt = $db->prepare($sql);

		    // bind parameter ke query
		    $params = array(
		        ":id_user" => $id_user,
		        ":id_rumah_sakit" => $id_rumah_sakit,
		        ":poli" => $poli_tujuan,
		        ":tanggal" => $tgl_kunjungan,
		        ":keluhan" => $keluhan,
		        ":antrian" => 1,
		    );

		    // eksekusi query untuk menyimpan ke database
		    $saved = $stmt->execute($params);
		    // jika query simpan berhasil, maka user sudah terdaftar
		    // maka alihkan ke halaman login
		    if($saved){
		        $sql = "SELECT * FROM antrian_janji_medis WHERE id_rumah_sakit = '$id_rumah_sakit' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan' AND id_user = '$id2'";
			    $row = $db->prepare($sql);
			    $row->execute();
			    $hasil = $row->fetch();
			    $id3 = $hasil['id_user'];
			    $rumah_sakit = $hasil['id_rumah_sakit'];

			    $sql2 = "SELECT * FROM user WHERE id = $id3";
			    $row = $db->prepare($sql2);
			    $row->execute();
			    $hasil2 = $row->fetch();

			    $sql3 = "SELECT * FROM rumah_sakit WHERE id = $rumah_sakit";
			    $row = $db->prepare($sql3);
			    $row->execute();
			    $hasil3 = $row->fetch();
			    require 'view_antrian.php';
		    }
		    else{
		        $usr = 2;
		    }
	    }
	    else{
	    	$sql = "SELECT * FROM antrian_janji_medis WHERE id_rumah_sakit = '$id_rumah_sakit' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan' AND id_user = '$id2' ORDER BY id DESC";
		    $row = $db->prepare($sql);
		    $row->execute();
		    $hasil = $row->fetch();

		    if($hasil == false){
		    	$sql = "SELECT * FROM antrian_janji_medis WHERE id_rumah_sakit = '$id_rumah_sakit' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan' ORDER BY id DESC";
			    $row = $db->prepare($sql);
			    $row->execute();
			    $hasil = $row->fetch();
		    	$antrian = $hasil['antrian'];
			    //
		    	$sql = "INSERT INTO antrian_janji_medis (id_user, id_rumah_sakit, poli, tanggal, keluhan, antrian) 
		                        VALUES (:id_user, :id_rumah_sakit, :poli, :tanggal, :keluhan, :antrian)";
			    $stmt = $db->prepare($sql);

			    // bind parameter ke query
			    $params = array(
			        ":id_user" => $id_user,
			        ":id_rumah_sakit" => $id_rumah_sakit,
			        ":poli" => $poli_tujuan,
			        ":tanggal" => $tgl_kunjungan,
			        ":keluhan" => $keluhan,
			        ":antrian" => $antrian+1,
			    );

			    // eksekusi query untuk menyimpan ke database
			    $saved = $stmt->execute($params);
			    // jika query simpan berhasil, maka user sudah terdaftar
			    // maka alihkan ke halaman login
			    if($saved){
			        $sql = "SELECT * FROM antrian_janji_medis WHERE id_rumah_sakit = '$id_rumah_sakit' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan' AND id_user = '$id2'";
				    $row = $db->prepare($sql);
				    $row->execute();
				    $hasil = $row->fetch();
				    $id3 = $hasil['id_user'];
				    $rumah_sakit = $hasil['id_rumah_sakit'];

				    $sql2 = "SELECT * FROM user WHERE id = $id3";
				    $row = $db->prepare($sql2);
				    $row->execute();
				    $hasil2 = $row->fetch();

				    $sql3 = "SELECT * FROM rumah_sakit WHERE id = $rumah_sakit";
				    $row = $db->prepare($sql3);
				    $row->execute();
				    $hasil3 = $row->fetch();
					require 'view_antrian.php';
			    }
			    else{
			        $usr = 2;
			    }
		    }
		    else{
		    	$sql = "SELECT * FROM antrian_janji_medis WHERE id_rumah_sakit = '$id_rumah_sakit' AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan' AND id_user = '$id2'";
			    $row = $db->prepare($sql);
			    $row->execute();
			    $hasil = $row->fetch();
			    $id3 = $hasil['id_user'];
			    $rumah_sakit = $hasil['id_rumah_sakit'];

			    $sql2 = "SELECT * FROM user WHERE id = $id3";
			    $row = $db->prepare($sql2);
			    $row->execute();
			    $hasil2 = $row->fetch();

			    $sql3 = "SELECT * FROM rumah_sakit WHERE id = $rumah_sakit";
			    $row = $db->prepare($sql3);
			    $row->execute();
			    $hasil3 = $row->fetch();
				require 'view_antrian.php';
			    
		    }
	    }
    }
    else{
    	$sql = "SELECT * FROM antrian_janji_medis WHERE poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan' AND id_user = '$id2'";
	    $row = $db->prepare($sql);
	    $row->execute();
	    $hasil = $row->fetch();
	    $id3 = $hasil['id_user'];
	    $rumah_sakit = $hasil['id_rumah_sakit'];

	    $sql2 = "SELECT * FROM user WHERE id = $id3";
	    $row = $db->prepare($sql2);
	    $row->execute();
	    $hasil2 = $row->fetch();

	    $sql3 = "SELECT * FROM rumah_sakit WHERE id = $rumah_sakit";
	    $row = $db->prepare($sql3);
	    $row->execute();
	    $hasil3 = $row->fetch();
	    require 'view_antrian.php';

    }
	
}
?>