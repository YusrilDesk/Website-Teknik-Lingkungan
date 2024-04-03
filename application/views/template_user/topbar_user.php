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
                <li><a href="<?= site_url() ?>">Home</a></li>
                <li class="has-children <?php if ($title == 'sejarah' || $title == 'visi_misi' || $title == 'struktur' || $title == 'tugas_pokok' || $title == 'Tim'){echo 'active'; } ?>">
                  <a href="#">About</a>
                  <ul class="dropdown">
                    <li><a href="<?= site_url('landing_page/sejarah') ?>" class="<?php if($title == 'sejarah'){echo 'active';} ?>">Sejarah</a></li>
                    <li><a href="<?= site_url('landing_page/visi_misi') ?>" class="<?php if($title == 'visi_misi'){echo 'active';} ?>">Visi, Misi & Tujuan</a></li>
                    <li><a href="<?= site_url('landing_page/struktur_organisasi') ?>" class="<?php if($title == 'struktur'){echo 'active';} ?>">Struktur Organisasi</a></li>
                    <li><a href="<?= site_url('landing_page/akreditasi') ?>" class="<?php if($title == 'akreditasi'){echo 'active';} ?>">Akreditasi</a></li>
                    <li><a href="<?= site_url('landing_page/tugas_pokok') ?>" class="<?php if($title == 'tugas_pokok'){echo 'active';} ?>">Tugas Pokok & Fungsi</a></li>
                    <li><a class="<?php if($title == 'tim'){echo 'active';} ?>" href="<?= site_url('pengurus') ?>">Tim</a></li>
                  </ul>
                </li>
                <li class="has-children <?php if ($title == 'berita' || $title == 'pengumuman' || $title == 'sop' || $title == 'kursus'){echo 'active'; } ?>">
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
                <li class="<?php if($title == 'contact'){echo 'active';} ?>"><a  href="<?= site_url('landing_page/contact') ?>">Contact</a></li>
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