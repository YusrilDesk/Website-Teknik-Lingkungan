
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/umkendari.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap5" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="<?= base_url() ?>assets2/fonts/icomoon/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets2/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets2/css/tiny-slider.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets2/css/aos.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets2/css/glightbox.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets2/css/style.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets2/css/flatpickr.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <style>.container_gtranslate{padding:5px;text-align:left;}@media (max-width: 991.98px){.container_gtranslate{text-align: center;}}.skiptranslate iframe {display: none !important;}body {top: 0px !important;} </style>

  <script type="text/javascript">function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'en,id'}, 'google_translate_element');}</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <style type="text/css">
    .img-wrap {
      overflow: hidden;
    }

    .slider {
      display: flex;
      transition: transform 0.5s ease;
    }

    .slider img {
      width: 100%;
      height: auto;
    }
  </style>


  <title><?= get_setting_data()[0]->sub_web; ?></title>
</head>
<body>

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
    <div class="container">
      <div class="menu-bg-wrap">
        <div class="site-navigation">
          <div class="row g-0 align-items-center">
            <div class="col-2">
              <a href="<?= site_url() ?>" class="logo m-0 float-start">
                <img src="<?php echo base_url('uploads/logo_web/').get_setting_data()[0]->logo_web; ?>" alt="Profile">
              </a>
            </div>
            <div class="col-8 text-center ">
              <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                <li class="active"><a href="<?= site_url() ?>">Home</a></li>
                <li class="has-children">
                  <a href="financing.html">About</a>
                  <ul class="dropdown">
                    <li><a href="<?= site_url('landing_page/sejarah') ?>" class="<?php if($title == 'sejarah'){echo 'active';} ?>">Sejarah</a></li>
                    <li><a href="<?= site_url('landing_page/visi_misi') ?>" class="<?php if($title == 'visi_misi'){echo 'active';} ?>">Visi, Misi & Tujuan</a></li>
                    <li><a href="<?= site_url('landing_page/struktur_organisasi') ?>" class="<?php if($title == 'struktur'){echo 'active';} ?>">Struktur Organisasi</a></li>
                    <li><a href="<?= site_url('landing_page/akreditasi') ?>" class="<?php if($title == 'akreditasi'){echo 'active';} ?>">Akreditasi</a></li>
                    <li><a href="<?= site_url('landing_page/tugas_pokok') ?>" class="<?php if($title == 'tugas_pokok'){echo 'active';} ?>">Tugas Pokok & Fungsi</a></li>
                    <li><a class="<?php if($title == 'tugas_pokok'){echo 'active';} ?>" href="<?= site_url('pengurus') ?>">Tim</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">Information</a>
                  <ul class="dropdown">
                    <li><a href="<?= site_url('berita') ?>" class="<?php if($title == 'berita'){echo 'active';} ?>">Berita</a></li>
                    <li><a href="<?= site_url('landing_page/pengumuman') ?>" class="<?php if($title == 'pengumuman'){echo 'active';} ?>">Pengumuman</a></li>
                    <li><a href="<?= site_url('landing_page/kursus') ?>">Kurikulum</a></li>
                    <li><a  href="<?= site_url('landing_page/dokumenDAKA') ?>">Dokumen</a></li>
                  </ul>
                </li>
                <li><a target="_blank" href="https://admisi.umkendari.ac.id/">Admisi</a></li>
                <li><a target="_blank" href="https://tracerstudy.umkendari.ac.id/">Tracer Study</a></li>
                <li><a class="<?php if($title == 'Contact'){echo 'active';} ?>" href="<?= site_url('contact') ?>">Contact</a></li>


              </ul>
            </div>
            <div class="col-2 text-end">
              <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                <span></span>
              </a>

              <a href="#" class="call-us d-flex align-items-center">
                <span class="icon-translate"></span>
                <div class="container_gtranslate">
                <center>
                  <span id="google_translate_element"></span>
                </center>
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="hero overlay">
    <img src="<?= base_url() ?>assets2/images/blob.svg" alt="" class="img-fluid blob">
    <div class="container">
      <div class="row align-items-center justify-content-between pt-5">
        <div class="col-lg-7 text-center text-lg-start pe-lg-5">
          <h1 class="heading text-white mb-3" data-aos="fade-up"><?= get_setting_data()[0]->nama_web; ?></h1>
          <div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
            <a href="contact.html" class="btn btn-outline-white-reverse me-4">Layanan</a>
            <!-- <a href="https://www.youtube.com/watch?v=Mb1zrW_zra4" class="text-white glightbox">Watch the video</a> -->
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
          <div class="img-wrap">
            <div class="slider">
              <?php foreach ($slider as $key => $sl): ?>
                <img src="<?php echo base_url('uploads/slider/').$sl->slider; ?>" alt="Image 1" class="img-fluid rounded">
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="section">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 mb-4 mb-lg-0">
          <img src="<?= base_url() ?>assets/img/bg1.jpg" alt="Image" class="img-fluid rounded
          ">
        </div>
        <div class="col-lg-4 ps-lg-2">
          <div class="mb-5">
            <h2 class="text-black h4">Tentang <?= get_setting_data()[0]->sub_web; ?></h2>
            <p ><?= is_array($sambutan) ? $sambutan['sambutan_ketua'] : $sambutan; ?></p>
          </div>

        </div>

      </div>
    </div>
  </div>

  

  <div class="section sec-testimonial bg-light">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 class="heading">Pengumuman</h2>
        </div>

      </div>


      <div class="testimonial-slider-wrap">
        <div class="testimonial-slider" id="testimonial-slider">
          <div class="item">
            <div class="testimonial-half d-lg-flex bg-white">
              <div class="img" style="background-image: url(<?php echo base_url('uploads/foto_pengumuman/').$pengumuman[0]->foto_pengumuman; ?>">

              </div>
              <div class="text">
                <strong class="d-block text-black"><?= $pengumuman[0]->nama_pengumuman; ?></strong>
                <p><?= $pengumuman[0]->isi_pengumuman; ?></p>

                <div class="author">

                  <span><?= $pengumuman[0]->waktu; ?></span>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>



  <div class="section sec-news">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7">
          <h2 class="heading">Berita Terbaru</h2>
        </div>
      </div>


      <div class="row">
        <?php foreach ($berita_terbaru as $key): ?>
          <div class="col-lg-4">
            <div class="card post-entry">
              <a href="<?= base_url('berita/baca_berita/' . $key->slug_berita) ?>"><img src="<?= base_url('uploads/foto_berita/' . $key->foto_berita) ?>" class="card-img-top" alt="Image"></a>
              <div class="card-body">
                <div><span class="text-uppercase font-weight-bold date"><?= $key->waktu ?></span></div>
                <h5 class="card-title"><a href="<?= base_url('berita/baca_berita/' . $key->slug_berita) ?>"><?= $key->nama_berita ?></a></h5>
                <p><?= character_limiter($key->isi_berita, 150)?></p>
                <p class="mt-5 mb-0"><a href="<?= base_url('berita/baca_berita/' . $key->slug_berita) ?>">Read more</a></p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>
    </div>
  </div>

  <div class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="widget">
            <h3>About</h3>
            <span><?= get_setting_data()[0]->nama_web; ?></span>
          </div> <!-- /.widget -->
          <div class="widget">
            <address><?= get_setting_data()[0]->alamat; ?></address>
            <ul class="list-unstyled links">
              <li><a href="<?= get_setting_data()[0]->no_telp; ?>"><?= get_setting_data()[0]->no_telp; ?></a></li>
              <li><a href="<?= get_setting_data()[0]->email; ?>"><?= get_setting_data()[0]->email; ?></a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-2">
          <div class="widget">
            <h3>Company</h3>
            <ul class="list-unstyled float-start links">
              <li><a href="https://umkendari.ac.id/">UM Kendari</a></li>
              <li><a href="https://admisi.umkendari.ac.id/">Admisi UM Kendari</a></li>
              <li><a href="https://teknik.umkendari.ac.id/">Teknik UM Kendari</a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-6">
          <div class="widget">
            <h3>Navigation</h3>
            <ul class="list-unstyled float-start links">
              <li><a href="#">About</a></li>
              <li><a href="#">Information</a></li>
              <li><a href="#">Layanan</a></li>
            </ul>

            <ul class="list-unstyled float-start links">
              <li><a href="#">Tim</a></li>
              <li><a href="#">Dokumen</a></li>
              <li><a href="#">Contact</a></li>
            </ul>

            <h3>Social</h3>
            <ul class="list-unstyled social">
              <li><a href="<?= get_setting_data()[0]->instagram; ?>"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="<?= get_setting_data()[0]->facebook; ?>"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
      </div> <!-- /.row -->

      <div class="row mt-5">
        <div class="col-12 text-center">


          <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. <?= get_setting_data()[0]->sub_web; ?>. &mdash; Designed by. <a href="https://dsti.umkendari.ac.id">DSTI</a>
          </span>
        </div>
      </div>
    </div> <!-- /.container -->
  </div> <!-- /.site-footer -->

  <!-- Preloader -->
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>


  <script src="<?= base_url() ?>assets2/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets2/js/tiny-slider.js"></script>

  <script src="<?= base_url() ?>assets2/js/flatpickr.min.js"></script>

  <script type="text/javascript">
    window.addEventListener('scroll', function() {
      var nav = document.querySelector('.site-nav');
      var navHeight = nav.offsetHeight;
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      var root = document.documentElement;
      var primaryColor = getComputedStyle(root).getPropertyValue('--bs-primary').trim();

      if (scrollTop > navHeight) {
        nav.classList.add('sticky');
        nav.style.backgroundColor = primaryColor;
      } else {
        nav.classList.remove('sticky');
        nav.style.backgroundColor = 'transparent';
      }
    });
  </script>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      let slider = document.querySelector('.slider');
      let images = document.querySelectorAll('.slider img');
      let currentImageIndex = 0;
      let imageWidth = images[0].clientWidth;

      function nextSlide() {
        currentImageIndex++;
        if (currentImageIndex >= images.length) {
          currentImageIndex = 0;
        }
        updateSlide();
      }

      function updateSlide() {
        slider.style.transform = `translateX(-${currentImageIndex * imageWidth}px)`;
      }

  setInterval(nextSlide, 3000); // Ganti gambar setiap 3 detik
});
</script>





<script src="<?= base_url() ?>assets2/js/aos.js"></script>
<script src="<?= base_url() ?>assets2/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets2/js/navbar.js"></script>
<script src="<?= base_url() ?>assets2/js/counter.js"></script>
<script src="<?= base_url() ?>assets2/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</body>
</html>
