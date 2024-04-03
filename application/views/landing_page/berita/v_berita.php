

<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">Semua Berita</h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <div class="row justify-content-center align-items-stretch">


      <div class="row">
        <?php foreach ($berita as $key): ?>
          <div class="col-lg-4 mb-5">
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
</div>
