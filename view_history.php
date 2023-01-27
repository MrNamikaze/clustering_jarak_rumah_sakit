<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
 	<?php require "navbar.php"?>
    <!-- header-end -->

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Rekam Medis</h3>
                        <p><a href="index.php">Home /</a> Janji Medis</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- service_area_start -->
    <div class="">
        <div class="card">
            <h5 class="card-header">Rekam Medis</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">No</th>
                                <th class="border-0">Tanggal</th>
                                <th class="border-0">Keterangan</th>
                                <th class="border-0">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; foreach($hasil2 as $b){?>
                            <tr>
                                <td><?= $a?></td>
                                <td><?= $b['tanggal']?></td>
                                <td>Antri di <?= $b['poli']?> Rumah Sakit <?php
                                $id_rumah_sakit = $b['rumah_sakit'];
                                $sql = "SELECT * FROM rumah_sakit WHERE id = $id_rumah_sakit";
                                $row = $db->prepare($sql);
                                $row->execute();
                                $hasil3 = $row->fetch();
                                echo $hasil3['nama_rumah_sakit'];
                                ?></td>
                                <?php
                                $id_user_a = $b['id_user'];
                                $poli_a = $b['poli'];
                                $tanggal_a = $b['tanggal'];
                                $sql4 = "SELECT * FROM rujukan WHERE id_user = $id AND poli = '$poli_a' AND tanggal = '$tanggal_a' ";
                                $row = $db->prepare($sql4);
                                $row->execute();
                                $hasil4 = $row->fetch();
                                ?>
                                <td>
                                    <form method="POST" action="antrian.php">
                                        <input type="text" class="form-control" placeholder="tgl_kunjungan" name="poli_tujuan" id="poli_tujuan" value="<?= $b['poli']?>" hidden>
                                        <input type="date" class="form-control" placeholder="tgl_kunjungan" name="tgl_kunjungan" id="tgl_kunjungan" value="<?= $b['tanggal']?>" hidden>
                                        <input type="text" class="form-control" placeholder="keluhan" name="keluhan" id="keluhan" value="<?= $b['keluhan']?>" hidden>
                                        <input type="submit" value="Lihat No Antrian">
                                    </form>
                                </td>
                                <td>
                                    <form action="print_rujukan.php" method="POST">
                                        <input type="text" class="form-control" placeholder="tgl_kunjungan" name="poli_tujuan" id="poli_tujuan" value="<?= $b['poli']?>" hidden>
                                        <input type="date" class="form-control" placeholder="tgl_kunjungan" name="tgl_kunjungan" id="tgl_kunjungan" value="<?= $b['tanggal']?>" hidden> 
                                        <input type="text" class="form-control" placeholder="keluhan" name="id_dokter" id="id_dokter" value="<?= $b['dokter']?>" hidden>
                                        <input type="text" class="form-control" placeholder="keluhan" name="fkrl" id="fkrl" value="<?= $hasil4['faskes']?>" hidden>
                                        <input type="submit" value="Lihat Rekam Medis">
                                    </form>
                                </td>
                            </tr>
                            <?php $a++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info">
                            <h3>Kontak Darurat</h3>
                            <p>Dalam keadaan darurat, dapat segera menghubungi</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">+10 378 4673 467</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        <div class="info">
                            <h3>Buat Janji Online</h3>
                            
                        </div>
                        <div class="info_button">
                            <a href="Department.html" class="boxed-btn3-white">Buat Janji</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->

<!-- footer start -->
    <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <div class="footer_logo">
                                    <a href="#">
                                        <img src="img/Logo.png" alt="">
                                    </a>
                                </div>
                                <p>
                                        Untuk info lebih lanjut :
                                </p>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Janji Medis
                                </h3>
                                <ul>
                                    <li><a href="#">Poli Mata</a></li>
                                    <li><a href="#">Poli Umum</a></li>
                                    <li><a href="#">Poli Gigi</a></li>
                                    <li><a href="#">Medical Check Up</a></li>
                                    <li><a href="#">Poli Kulit dan Kelamin</a></li>
                                    <li><a href="#">Poli Jantung</a></li>
                                </ul>
    
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-2">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Tautan
                                </h3>
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="#">Rekam Medis</a></li>
                                    <li><a href="#">Faskes</a></li>
                                    <li><a href="#"> Rujukan</a></li>
                                    <li><a href="#"> Pembayaran</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Hubungi Kami
                                </h3>
                                <p>
                                    200, D-block, Green lane Jakarta <br>
                                    +10 367 467 8934 <br>
                                    Telemedicinecontact.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<!-- footer end  -->
    <!-- link that opens popup -->

    <!-- form itself end-->
    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="popup_box ">
                    <div class="popup_inner">
                        <h3>Janji Medis</h3>
                        <form method="POST" action="antrian.php">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="poli_tujuan">Pilih poli</label>
				                    <select name="poli_tujuan" id="poli_tujuan" class="form-control" style="height: 40px">
				                      <option value="poli gigi">Poli gigi</option>
				                      <option value="poli jantung">Poli jantung</option>
				                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                  					<input type="date" class="form-control" placeholder="tgl_kunjungan" name="tgl_kunjungan" id="tgl_kunjungan" style="height: 40px">
                                </div>
                                <br>
                                <div class="col-xl-12">
                  					<textarea name="keluhan" placeholder="keluhan" style="width: 100%"></textarea>
                                </div>
                                <div class="col-xl-6">
                                    <button type="button" class="boxed-btn3" data-dismiss="modal">Close</button>
                                </div>
                                <div class="col-xl-6">
                                    <button type="submit" class="boxed-btn3" name="login">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
	const picker = document.getElementById('tgl_kunjungan');
	picker.addEventListener('input', function(e){
	  var day = new Date(this.value).getUTCDay();
	  if([6,0].includes(day)){
	    e.preventDefault();
	    this.value = '';
	    alert('Hari sabtu dan minggu poli tutup');
	  }
	});
</script>