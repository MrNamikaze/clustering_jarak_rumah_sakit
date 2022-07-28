<?php 
$usr = 0;
require_once("koneksi.php");
session_start();
$nilai = isset ($_SESSION["user"]) ? $_SESSION["user"]:'';
if($nilai){
    header("Location: dashboard.php");
}
else{
    if(isset($_POST['login'])){
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        if($status == 'daftar'){
            $bpjs = filter_input(INPUT_POST, 'bpjs', FILTER_SANITIZE_STRING);
            $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_VALIDATE_EMAIL);
            // enkripsi password
            $password2 = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_EMAIL);
            $konfirm_pass = filter_input(INPUT_POST, 'konfirm_pass', FILTER_VALIDATE_EMAIL);
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            if($password2 == $konfirm_pass){
                $sql = "SELECT * FROM user WHERE bpjs = '$bpjs'";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil = $row->fetchAll();

                if(!empty($hasil)){
                    $usr = 3;
                }
                else{
                    // menyiapkan query
                    $sql = "INSERT INTO user (bpjs, no_hp, password) 
                            VALUES (:bpjs, :no_hp, :password)";
                    $stmt = $db->prepare($sql);

                    // bind parameter ke query
                    $params = array(
                        ":bpjs" => $bpjs,
                        ":no_hp" => $no_hp,
                        ":password" => $password
                    );

                    // eksekusi query untuk menyimpan ke database
                    $saved = $stmt->execute($params);
                    // jika query simpan berhasil, maka user sudah terdaftar
                    // maka alihkan ke halaman login
                    if($saved){
                        header("Location: index.php");
                    }
                    else{
                        $usr = 2;
                    }
                }
            }
            else{
                    $usr = 4;
            }
        }
        else{
            $bpjs = filter_input(INPUT_POST, 'bpjs', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $sql = "SELECT * FROM user WHERE bpjs=:bpjs";
            $stmt = $db->prepare($sql);
            
            // bind parameter ke query
            $params = array(
                ":bpjs" => $bpjs
            );

            $stmt->execute($params);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // jika user terdaftar
            if($user){
                // verifikasi password
                if(password_verify($password, $user["password"])){
                    // buat Session
                    session_start();
                    $_SESSION["user"] = $user;
                    // login sukses, alihkan ke halaman timeline
                    header("Location: dashboard.php");
                }
                else{
                    $usr = 2;
                }
            }
            else{
                $usr = 1;
            }
        }
    }
}

?>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Telemedicine</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <!--<div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> info@docmed.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i> 160160</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/Logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        
                                        <li><a href="Department.html">Janji Medis</a></li>
                                        <!--<li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">elements</a></li>
                                                <li><a href="about.html">about</a></li>
                                            </ul>
                                        </li>-->
                                        <li><a href="Doctors.html">Rekam Medis</a></li>
                                        <li><a href="contact.html">Faskes</a></li>
                                        <li><a href="rujukan.html">Rujukan</a></li>
                                        <li><a href="pembayaran.html">Pembayaran</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a data-toggle="modal" data-target="#daftar">Daftar</a>
                                    <a data-toggle="modal" data-target="#login">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start 
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Health care</span> <br>
                                    For Hole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a href="#" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Health care</span> <br>
                                    For Hole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a href="#" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Health care</span> <br>
                                    For Hole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a href="#" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     slider_area_end 

    service_area_start 
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-electrocardiogram"></i>
                        </div>
                        <h3>Hospitality</h3>
                        <p>Clinical excellence must be the priority for any health care service provider.</p>
                        <a href="#" class="boxed-btn3-white">Apply For a Bed</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-emergency-call"></i>
                        </div>
                        <h3>Emergency Care</h3>
                        <p>Clinical excellence must be the priority for any health care service provider.</p>
                        <a href="#" class="boxed-btn3-white">+10 672 356 3567</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <h3>Chamber Service</h3>
                        <p>Clinical excellence must be the priority for any health care service provider.</p>
                        <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- service_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="img/about/1.png" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Selamat Datang di Telemedicine</h2>
                        <h3>Perawatan Terbaik untuk <br>
                                Kesehatan Anda</h3>
                        <p>Disiplin 3 Plus menuju Kebiasaan Baru</p>
                        <ul>
                            <li> <i class="flaticon-right"></i> Gunakan Masker. </li>
                            <li> <i class="flaticon-right"></i> Jaga Jarak.</li>
                            <li> <i class="flaticon-right"></i> Cuci Tangan dan Terapkan Perilaku Sehat. </li>
                            <li> <i class="flaticon-right"></i> PLUS! Manfaatkan Layanan Berbasis Online</li>
                        </ul>
                        <a href="#" class="boxed-btn3-white-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Janji Medis</h3>
                        <p>Berikut Layanan yang Tersedia </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Poli Mata</a></h3>
                            <p>Poli mata adalah klinik yang memberikan pemeriksaan, perawatan, 
                                serta diagnosis yang berhubungan dengan penyakit mata dan gangguan penglihatan.</p>
                            <a href="#" class="learn_more">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/2.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Poli Umum</a></h3>
                            <p>Memberikan pelayanan kedokteran berupa pemeriksaan kesehatan, pengobatan dan penyuluhan kepada 
                                pasien atau masyarakat agar tidak terjadi penularan dan komplikasi penyakit.</p>
                            <a href="#" class="learn_more">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/3.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Poli Gigi</a></h3>
                            <p>Memberikan pelayanan kesehatan gigi dan mulut </p>
                            <a href="#" class="learn_more">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/4.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Medical Check Up</a></h3>
                            <p>Medical check up adalah pemeriksaan kesehatan secara menyeluruh yang dilakukan pada pasien. 
                                Dalam hal ini, pasien akan diperiksa secara detail melalui beberapa tahap pemeriksaan guna melihat potensi penyakit sejak dini.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/5.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Poli Kulit dan Kelamin</a></h3>
                            <p>Berfokus untuk menangani masalah kesehatan pada kulit dan kelamin</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/6.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Poli Jantung</a></h3>
                            <p>Menangani hal-hal yang berkaitan dengan jantung dan pembuluh darah, atau kardiovaskuler</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- testmonial_area_start 
    <div class="testmonial_area">
        <div class="testmonial_active owl-carousel">
            <div class="single-testmonial testmonial_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>Kenali fasilitas dan layanan kesehatan <br>
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                    <br>
                                    Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                <div class="testmonial_author">
                                    <h4>Asana Korim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testmonial testmonial_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                    <br>
                                    Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                <div class="testmonial_author">
                                    <h4>Asana Korim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testmonial testmonial_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.
                                    <br>
                                    Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                <div class="testmonial_author">
                                    <h4>Asana Korim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    testmonial_area_end -->

    <!-- business_expert_area_start  -->
    <div class="business_expert_area">
        <div class="business_tabs_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                            aria-selected="true">Faskes Tingkat 1</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="false">Faskes Tingkat 2</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                            aria-selected="false">Faskes Tingkat Lanjutan</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                    <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                    <div class="row align-items-center">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="business_info">
                                                    <div class="icon">
                                                        <i class="flaticon-first-aid-kit"></i>
                                                    </div>
                                                    <h3>Fasilitas Kesehatan Tingkat Pertama</h3>
                                                    <p>Memberikan pelayanan kesehatan dasar. 
                                                        Pembagian faskes tingkat 1 BPJS Kesehatan adalah sebagai berikut: <br>
                                                        Puskesmas atau yang setara.<br>
                                                        Praktik dokter.<br>
                                                        Praktik dokter gigi.<br>
                                                        Klinik pratama atau yang setara.<br>
                                                        Rumah sakit kelas D pratama atau yang setara.<br>
                                                        Faskes Penunjang: Apotik dan Laboratorium.<br>
                                                    
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="business_thumb">
                                                    <img src="img/about/pertama.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row align-items-center">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="business_info">
                                                    <div class="icon">
                                                        <i class="flaticon-first-aid-kit"></i>
                                                    </div>
                                                    <h3>Fasilitas Kesehatan Tingkat Kedua</h3>
                                                    <p>Memberikan pelayanan kesehatan spesialistik.Tempat pelayanan kesehatan lanjutan setelah 
                                                        mendapat rujukan dari Faskes I yang spesialistis yang dilakukan dokter spesialis.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="business_thumb">
                                                    <img src="img/about/klinik.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row align-items-center">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="business_info">
                                                    <div class="icon">
                                                        <i class="flaticon-first-aid-kit"></i>
                                                    </div>
                                                    <h3>Fasilitas Kesehatan Tingkat Lanjutan</h3>
                                                    <p>Memberikan pelayanan kesehatan subspesialistik. 
                                                        Pembagian faskes tingkat lanjutan BPJS Kesehatan adalah sebagai berikut: <br>
                                                        Klinik Utama <br>
                                                        Rumah Sakit Umum <br>
                                                        Rumah Sakit Khusus
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="business_thumb">
                                                    <img src="img/about/rs.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                          </div>
            </div>
        </div>
    </div>
    <!-- business_expert_area_end  -->


    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="doctors_title mb-55">
                        <h3>Pilih Dokter</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="expert_active owl-carousel">
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/1.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Hendy Nurahadi </h3>
                                <span>Dokter Umum</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/2.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Victor Giovannie</h3>
                                <span>Spesialis Jantung</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/3.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Hadi Firmansyah</h3>
                                <span>Spesialis Kulit dan Kelamin</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/4.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Roy Steve</h3>
                                <span>Spesialis Mata</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/7.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Drg. Karmellia Nikke</h3>
                                <span>Dokter Gigi</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/6.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Dr. Stanley Setiawan</h3>
                                <span>Spesialis Saraf</span>
                            </div>
                        </div>
                    </div>
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

    <div class="modal fade" id="daftar">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="popup_box ">
                    <div class="popup_inner">
                        <h3>Daftar Akun</h3>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" name="bpjs" placeholder="No BPJS">
                                    <input type="text" name="status" value="daftar" hidden>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="no_hp" placeholder="No HP">
                                </div>
                                <div class="col-xl-6">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-xl-6">
                                    <input type="password" name="konfirm_pass" placeholder="Konfirmasi Password">
                                </div>
                                <br>
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

    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="popup_box ">
                    <div class="popup_inner">
                        <h3>Login</h3>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" name="bpjs" placeholder="No BPJS">
                                    <input type="text" name="status" value="login" hidden>
                                </div>
                                <div class="col-xl-6">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <br>
                                <div class="col-xl-6">
                                    <button type="button" class="boxed-btn3" data-dismiss="modal">Close</button>
                                </div>
                                <div class="col-xl-6">
                                    <button type="submit" class="boxed-btn3" name="login">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form itself end -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>