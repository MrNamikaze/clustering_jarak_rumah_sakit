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
                        <h3>Rujukan</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                    <div class="Appointment">
                        <div class="book_btn d-none d-lg-block">
                            <br>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#daftar">Klik Disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

<!-- form itself end-->
<div class="modal fade" id="daftar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="popup_box ">
                <div class="popup_inner">
                    <h3>Rujukan</h3>
		            <form action="print_rujukan.php" method="POST">
		                <div class="row">
                            <div class="col-xl-6">
                                <label for="poli_tujuan">Pilih poli</label>
                                <select name="poli_tujuan" id="poli_tujuan" class="form-control" style="height: 40px">
                                  <option value="poli mata">Poli mata</option>
                                  <option value="poli umum">Poli umum</option>
                                  <option value="poli gigi">Poli gigi</option>
                                  <option value="medical check up">Medical Check Up</option>
                                  <option value="poli kulit dan kelamin">Poli Kulit dan Kelamin</option>
                                  <option value="poli jantung">Poli jantung</option>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                                <input type="date" class="form-control" placeholder="tgl_kunjungan" name="tgl_kunjungan" id="tgl_kunjungan" style="height: 40px">
                            </div>
		                    <div class="col-xl-6">
		                        <input type="text" name="id_dokter" placeholder="ID Dokter">
		                    </div>
		                    <div class="col-xl-6">
		                        <select class="form-select wide" name="fkrl" id="default-select" class="">
		                            <option data-display="Select FKRL">FKRL</option>
		                            <option value="2">2</option>
		                            <option value="lanjutan">Lanjutan</option>
		                        </select>
		                    </div>
		                    <div class="col-xl-12">
		                        <button type="submit" class="boxed-btn3">Confirm</button>
		                    </div>
		                </div>
		            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form itself end -->

    
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
</body>