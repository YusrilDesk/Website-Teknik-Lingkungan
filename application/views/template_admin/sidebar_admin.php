<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" >

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/img/umkendari.png') ?>" alt="">
        <span class="d-none d-lg-block"><?= get_setting_data()[0]->sub_web; ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">



          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">





        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo base_url('uploads/foto_admin/').$this->session->userdata('foto_admin'); ?>" alt="Profile" class="rounded-circle">

            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama'); ?></span>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $this->session->userdata('nama'); ?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= site_url('admin/pengguna') ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= site_url('auth/logout') ?>">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?php echo ($title == 'dashboard') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/dashboard_admin') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->



    <li class="nav-heading">Menu</li>

    <li class="nav-item ">
      <a class="nav-link <?php echo ($title == 'profile') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/profil') ?>">
        <i class="ri ri-account-box-fill"></i>
        <span>Profil <?= get_setting_data()[0]->sub_web; ?></span>
      </a>
    </li>

    <li class="nav-item ">
      <a class="nav-link <?php echo ($title == 'kepengurusan') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/pengurus') ?>">
        <i class="ri ri-account-box-fill"></i>
        <span>Tim</span>
      </a>
    </li>



    <li class="nav-item ">
      <a class="nav-link <?php echo ($title == 'SOP') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/sop') ?>">
        <i class="bi bi-book"></i>
        <span>Data Dokumen</span>
      </a>
    </li>

    <li class="nav-item ">
      <a class="nav-link <?php echo ($title == 'kursus') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/kursus') ?>">
        <i class="bi bi-bookmarks"></i>
        <span>Kursus</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-checklist"></i><span>Informasi Publik</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       <li class="nav-item ">
        <a class="nav-link <?php echo ($title == 'Admin - List Berita') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/berita') ?>">
         <i class="bi bi-circle"></i>
          <span>Berita</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link <?php echo ($title == 'pengumuman') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/pengumuman') ?>">
         <i class="bi bi-circle"></i>
          <span>Pengumuman</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link <?php echo ($title == 'kinerja') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/laporan_kinerja') ?>">
         <i class="bi bi-circle"></i>
          <span>Rencana dan Laporan Kinerja</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link <?php echo ($title == 'anggaran') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/anggaran') ?>">
         <i class="bi bi-circle"></i>
          <span>Laporan Anggaran</span>
        </a>
      </li>
      
    </ul>
  </li>





  <li class="nav-item ">
    <a class="nav-link <?php echo ($title == 'layanan') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/layanan') ?>">
      <i class="bi bi-layout-text-sidebar-reverse"></i>
      <span>Data Layanan</span>
    </a>
  </li>





    <li class="nav-heading">Admin</li>

    <li class="nav-item">
      <a class="nav-link <?php echo ($title == 'Admin') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/pengguna') ?>">
        <i class="ri ri-admin-line"></i>
        <span>Data Admin</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link <?php echo ($title == 'setting_web') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/setting') ?>">
            <i class="bi bi-circle"></i><span>Setting Web</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($title == 'slider') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/setting/slider') ?>">
            <i class="bi bi-circle"></i><span>Slider</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($title == 'divisi') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/setting/divisi') ?>">
            <i class="bi bi-circle"></i><span>Kategori Divisi</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($title == 'dokumen') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/setting/dokumen') ?>">
            <i class="bi bi-circle"></i><span>Kategori Dokumen</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($title == 'layanan') ? '' : 'collapsed'; ?>" href="<?= site_url('admin/setting/layanan') ?>">
            <i class="bi bi-circle"></i><span>Kategori Layanan</span>
          </a>
        </li>
      </ul>
    </li>



  </ul>

  </aside><!-- End Sidebar-->