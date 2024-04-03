

<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">Pengumuman</h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <div class="row justify-content-center align-items-stretch">


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
