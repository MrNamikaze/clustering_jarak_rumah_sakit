<?php
session_start();
if(is_null($_SESSION["user"])){
    header("Location: index.php");
}
else{
    require_once("koneksi.php");
    $poli_tujuan = filter_input(INPUT_POST, 'poli_tujuan', FILTER_SANITIZE_STRING);
    $tgl_kunjungan = filter_input(INPUT_POST, 'tgl_kunjungan', FILTER_SANITIZE_STRING);
    $id_dokter = filter_input(INPUT_POST, 'id_dokter', FILTER_SANITIZE_STRING);
    $fkrl = filter_input(INPUT_POST, 'fkrl', FILTER_SANITIZE_STRING);
    $id_user = $_SESSION["user"]["id"];
    $bpjs = $_SESSION["user"]["bpjs"];
    $nama_lengkap = $_SESSION["user"]["nama_lengkap"];
    $tanggal = $_SESSION["user"]["tgl_lahir"];
    $tgl_lahir = date("d/m/Y", strtotime($tanggal));
    $jenis = $_SESSION["user"]["jk"];
    if($jenis == 'laki-laki'){
        $jk = 'L';
    }
    else{
        $jk = 'P';
    }
    require 'clustering.php';
    if($fkrl == '2'){
        $sql = "SELECT * FROM clustering_2 WHERE id_user = $id_user";
        $row = $db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        $id_rumah_sakit = $hasil['id_rumah_sakit'];
        $sql = "SELECT * FROM dokter WHERE id_dokter = $id_dokter AND id_rumah_sakit = $id_rumah_sakit";
        $row = $db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        if($hasil == false){
            header("Location: rujukan.php");
        }
        else{
            $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
            $row = $db->prepare($sql);
            $row->execute();
            $hasil = $row->fetch();
            if($hasil == false){
                $sql = "INSERT INTO rujukan (id_user, id_rumah_sakit, id_dokter, poli, faskes, tanggal, keluhan) 
                                VALUES (:id_user, :id_rumah_sakit, :id_dokter, :poli, :faskes, :tanggal, :keluhan)";
                $stmt = $db->prepare($sql);

                // bind parameter ke query
                $params = array(
                    ":id_user" => $id_user,
                    ":id_rumah_sakit" => $id_rumah_sakit,
                    ":id_dokter" => $id_dokter,
                    ":poli" => $poli_tujuan,
                    ":faskes" => '2',
                    ":tanggal" => $tgl_kunjungan,
                    ":keluhan" => '1',
                );

                // eksekusi query untuk menyimpan ke database
                $saved = $stmt->execute($params);
                if($saved){
                    $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil = $row->fetch();
                    $id_rumah_sakit = $hasil['id_rumah_sakit'];
                    $id_surat = $hasil['id'];
                    $tanggal1 = $hasil['tanggal'];
                    $tgl_rujukan = date("d/m/Y", strtotime($tanggal1));

                    $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil2 = $row->fetch();
                    $nama_rumah_sakit = $hasil2['nama_rumah_sakit'];

                    $sql = "SELECT * FROM clustering WHERE id_user = $id_user";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil3 = $row->fetch();
                    $id_rumah_sakit2 = $hasil3['id_rumah_sakit'];

                    $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit2";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil2 = $row->fetch();
                    $nama_rumah_sakit3 = $hasil2['nama_rumah_sakit'];
                    require 'view_print_rujukan.php';
                }
                else{
                    $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil = $row->fetch();
                    header("Location: rujukan.php");
                }
            }
            else{
                $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil = $row->fetch();
                $id_rumah_sakit = $hasil['id_rumah_sakit'];
                $id_surat = $hasil['id'];
                $tanggal1 = $hasil['tanggal'];
                $tgl_rujukan = date("d/m/Y", strtotime($tanggal1));

                $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil2 = $row->fetch();
                $nama_rumah_sakit = $hasil2['nama_rumah_sakit'];

                $sql = "SELECT * FROM clustering WHERE id_user = $id_user";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil3 = $row->fetch();
                $id_rumah_sakit2 = $hasil3['id_rumah_sakit'];

                $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit2";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil2 = $row->fetch();
                $nama_rumah_sakit3 = $hasil2['nama_rumah_sakit'];
                require 'view_print_rujukan.php';
            }
        }
    }
    else if($fkrl == 'lanjutan'){
        $sql = "SELECT * FROM clustering_lanjutan WHERE id_user = $id_user";
        $row = $db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        $id_rumah_sakit = $hasil['id_rumah_sakit'];
        $sql = "SELECT * FROM dokter WHERE id_dokter = $id_dokter AND id_rumah_sakit = $id_rumah_sakit";
        $row = $db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        if($hasil == false){
            header("Location: rujukan.php");
        }
        else{
            $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = $poli_tujuan AND tanggal = $tgl_kunjungan";
            $row = $db->prepare($sql);
            $row->execute();
            $hasil = $row->fetch();
            if($hasil == false){
                $sql = "INSERT INTO rujukan (id_user, id_rumah_sakit, id_dokter, poli, faskes, tanggal, keluhan) 
                                VALUES (:id_user, :id_rumah_sakit, :id_dokter, :poli, :faskes, :tanggal, :keluhan)";
                $stmt = $db->prepare($sql);

                // bind parameter ke query
                $params = array(
                    ":id_user" => $id_user,
                    ":id_rumah_sakit" => $id_rumah_sakit,
                    ":id_dokter" => $id_dokter,
                    ":poli" => $poli_tujuan,
                    ":faskes" => 'lanjutan',
                    ":tanggal" => $tgl_kunjungan,
                    ":keluhan" => '1',
                );

                // eksekusi query untuk menyimpan ke database
                $saved = $stmt->execute($params);
                if($saved){
                    $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil = $row->fetch();
                    $id_rumah_sakit = $hasil['id_rumah_sakit'];
                    $id_surat = $hasil['id'];
                    $tanggal1 = $hasil['tanggal'];
                    $tgl_rujukan = date("d/m/Y", strtotime($tanggal1));

                    $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil2 = $row->fetch();
                    $nama_rumah_sakit = $hasil2['nama_rumah_sakit'];

                    $sql = "SELECT * FROM clustering WHERE id_user = $id_user";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil3 = $row->fetch();
                    $id_rumah_sakit2 = $hasil3['id_rumah_sakit'];

                    $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit2";
                    $row = $db->prepare($sql);
                    $row->execute();
                    $hasil2 = $row->fetch();
                    $nama_rumah_sakit3 = $hasil2['nama_rumah_sakit'];

                    
                    require 'view_print_rujukan.php';
                }
                else{
                    header("Location: rujukan.php");
                }
            }
            else{
                $sql = "SELECT * FROM rujukan WHERE id_user = $id_user AND id_rumah_sakit = $id_rumah_sakit AND poli = '$poli_tujuan' AND tanggal = '$tgl_kunjungan'";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil = $row->fetch();
                $id_rumah_sakit = $hasil['id_rumah_sakit'];
                $id_surat = $hasil['id'];
                $tanggal1 = $hasil['tanggal'];
                $tgl_rujukan = date("d/m/Y", strtotime($tanggal1));

                $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil2 = $row->fetch();
                $nama_rumah_sakit = $hasil2['nama_rumah_sakit'];

                $sql = "SELECT * FROM clustering WHERE id_user = $id_user";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil3 = $row->fetch();
                $id_rumah_sakit2 = $hasil3['id_rumah_sakit'];

                $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit2";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil2 = $row->fetch();
                $nama_rumah_sakit3 = $hasil2['nama_rumah_sakit'];
                require 'view_print_rujukan.php';
            }
        }
    }
    else{
        header("Location: rujukan.php");
    }
}

?>