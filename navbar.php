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
                    <div class="col-xl-9 col-lg-10">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    
                                    <li><a href="janji_medis.php">Janji Medis</a></li>
                                    <!-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
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
                                    </li> -->
                                    <li><a href="rekam_medis.php">Rekam Medis</a></li>
                                    <li><a href="contact.html">Faskes</a></li>
                                    <li><a href="rujukan.php">Rujukan</a></li>
                                    <li><a href="history.php">History</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li>Hallo, <a href="#"><?= $_SESSION["user"]["bpjs"]?></a>
                                        <ul class="submenu" style="background-color: black">
                                            <li><a href="logout.php" style="color: white">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
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