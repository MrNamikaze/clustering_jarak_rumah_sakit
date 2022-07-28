<style type="text/css">
        .marker_lokasi {
        display: block;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        padding: 0;
    }
    </style>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php require "navbar.php"?>
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
            <h3>Profile</h3>
            <form method="POST" action="">
              <div class="row">
                <div class="col">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $_SESSION["user"]["nama_lengkap"]?>" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="col">
                  <label for="no_hp">Nomor Telepon</label>
                  <input type="text" name="no_hp" id="no_hp" value="<?= $_SESSION["user"]["no_hp"]?>" class="form-control" placeholder="No Telepon">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <label for="nik">Nomor KTP (NIK)</label>
                  <input type="text" name="nik" id="nik" value="<?= $_SESSION["user"]["nik"]?>" class="form-control" placeholder="Nomor KTP (NIK)">
                </div>
                <div class="col">
                  <label for="nama_kepala">Nama Kepala Keluarga</label>
                  <input type="text" name="nama_kepala" id="nama_kepala" value="<?= $_SESSION["user"]["nama_kepala"]?>" class="form-control" placeholder="Nama Kepala Keluarga">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" placeholder="tgl_lahir" name="tgl_lahir" id="tgl_lahir" value="<?= $_SESSION["user"]["tgl_lahir"]?>">
                </div>
                <div class="col">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <label for="pekerjaan">Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                      <option value="mahasiswa">Mahasiswa</option>
                      <option value="buruh">Buruh</option>
                    </select>
                </div>
                <div class="col">
                  <label for="status_menikah">Status Menikah</label>
                    <select name="status_menikah" id="status_menikah" class="form-control">
                      <option value="lajang">Lajang</option>
                      <option value="menikah">Menikah</option>
                    </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $_SESSION["user"]["alamat"]?>" placeholder="Alamat">
              </div>
              <div class="form-group">
                <?php
                if($_SESSION["user"]["longitude"]=='0'){
                    $koor = '';
                }
                else{
                    $koor = 'LngLat('.$_SESSION["user"]["longitude"].','.$_SESSION["user"]["latitude"].')';
                }
                ?>
                <div id='map_tambah_lokasi' style='width: 100%; height: 400px;'></div>
                <input type="text" class="form-control" name="coordinates" id="coordinates" placeholder="Koordinat" value="<?= $koor?>" hidden>
              </div>
              <br>
              <button class="btn btn-success" name="profile" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
<script>
    getLocationTambahLokasi()
    function getLocationTambahLokasi() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionTambahLokasi);

      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPositionTambahLokasi(position) {
        var coor = position.coords.longitude+', '+position.coords.latitude;
        mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FnYWdhMTU5IiwiYSI6ImNsM2Nrdnh1cjBpZTYzY3BhOTEyNmY2NGkifQ.MbKI1QY8hAACQaRANPF5rw';
        var map_tambah_lokasi = new mapboxgl.Map({
          container: 'map_tambah_lokasi',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [position.coords.longitude, position.coords.latitude],
          zoom: 14
        });

        map_tambah_lokasi.on('style.load', function() {
          map_tambah_lokasi.on('click', function(e) {
            var coordinates = e.lngLat;
            const marker = new mapboxgl.Marker()
            .setLngLat(coordinates)
            .setPopup(new mapboxgl.Popup().setHTML('you clicked here: <br/>' + coordinates))
            .addTo(map_tambah_lokasi);
            marker.togglePopup();
            document.getElementById("coordinates").value = coordinates;
          });
        });
    }
    //
</script>