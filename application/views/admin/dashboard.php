<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">


      <center>
       <img width="300" height="300" src="<?= base_url('assets/img/umkendari.png') ?>">
       <h3><?= get_setting_data()[0]->nama_web; ?> (<?= get_setting_data()[0]->sub_web; ?>) <br>Universitas Muhammadiyah Kendari</h3><br><br><br><br><br><br><br><br>
     </center>






   </div>
 </section>

  </main><!-- End #main -->