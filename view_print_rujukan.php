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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style type="text/css">
        div {
          -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
          color-adjust: exact !important;
          background-image: url("img/surat-rujukan.jpg");
          width: 768px;
          height: 1024px;
        }
        a.download {
          position: absolute;
          left: 320px;
          top: 2px;
        }
        a.print {
          position: absolute;
          left: 360px;
          top: 2px;
        }
        a.delete {
          position: absolute;
          left: 400px;
          top: 2px;
        }
        p.nama_rumah_sakit2 {
          position: absolute;
          left: 282px;
          top: 228px;
        }
        p.poli {
          position: absolute;
          left: 232px;
          top: 273px;
        }
        p.nama_rumah_sakit {
          position: absolute;
          left: 232px;
          top: 296px;
        }
        p.nama_lengkap {
          position: absolute;
          left: 216px;
          top: 346px;
        }
        p.bpjs {
          position: absolute;
          left: 216px;
          top: 371px;
        }
        p.tgl_lahir {
          position: absolute;
          left: 540px;
          top: 344px;
        }
        p.jk {
          position: absolute;
          left: 638px;
          top: 369px;
        }
        p.tgl_rujukan {
          position: absolute;
          left: 598px;
          top: 465px;
        }
    </style>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <a class="download" href="#" id="download-page-as-image"><i class="fa-solid fa-cloud-arrow-down"></i></a>
    <a class="print" href="#" onclick="window.print()"><i class="fa-solid fa-print"></i></a>
    <a class="delete" href="delete_rujukan.php?id=<?= $id_surat?>"><i class="fa-solid fa-trash"></i></a>
    <div>
        <p class="nama_rumah_sakit2"><?= $nama_rumah_sakit3?></p>
        <p class="poli"><?= $poli_tujuan?></p>
        <p class="nama_rumah_sakit"><?= $nama_rumah_sakit?></p>
        <p class="nama_lengkap"><?= $_SESSION["user"]["nama_lengkap"]?></p>
        <p class="bpjs"><?= $_SESSION["user"]["bpjs"]?></p>
        <p class="tgl_lahir"><?= $tgl_lahir?></p>
        <p class="jk"><?= $jk?></p>
        <p class="tgl_rujukan"><?= $tgl_rujukan?></p>
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
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type='text/javascript'>
       setUpDownloadPageAsImage();

        function setUpDownloadPageAsImage() {
          document.getElementById("download-page-as-image").addEventListener("click", function() {
            html2canvas(document.body).then(function(canvas) {
              console.log(canvas);
              simulateDownloadImageClick(canvas.toDataURL(), 'surat-rujukan.png');
            });
          });
        }

        function simulateDownloadImageClick(uri, filename) {
          var link = document.createElement('a');
          if (typeof link.download !== 'string') {
            window.open(uri);
          } else {
            link.href = uri;
            link.download = filename;
            accountForFirefox(clickLink, link);
          }
        }

        function clickLink(link) {
          link.click();
        }

        function accountForFirefox(click) { // wrapper function
          let link = arguments[1];
          document.body.appendChild(link);
          click(link);
          document.body.removeChild(link);
        }
    </script>   
</body>

</html>