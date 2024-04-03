<style type="text/css">
  .post-card {
    border: none;
    padding: 20px;
    margin: 0 0 20px 0;
    display: flex;
    align-items: center;
  }

  .post-card img {
    max-width: 120px;
    max-height: 90px;
    margin-right: 20px;
  }

  .post-content h4 {
    font-size: 20px;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 140px; /* Adjust the width as needed */
  }

  .post-content time {
    color: #777;
  }

  .title {
    font-size: 24px; /* Sesuaikan ukuran font sesuai kebutuhan */
    margin: 0;
    white-space: normal;
    word-wrap: break-word;
  }
</style>

<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">Struktur Organisasi <br><?= get_setting_data()[0]->sub_web; ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <div class="row justify-content-center align-items-stretch">

      <article class="col-lg-8 order-lg-2 px-lg-5">

        <img src="<?= base_url('uploads/foto_struktur/') . $foto['foto_struktur']; ?>" alt="Foto Struktur Organisasi" class="img-fluid rounded">


      </article>


      <div class="col-lg-4 mb-5 mb-lg-0 order-lg-3">
        <h2>Pengumuman <span class="bi bi-megaphone"></span></h2>
        <div class="mb-4">
          <div class="sidebar-item categories">
            <h5 class="card-title"><?= $pengumuman[0]->nama_pengumuman; ?></h5>
            <p><?= $pengumuman[0]->isi_pengumuman; ?></p>
          </div>
        </div>


        <h2>Berita <i class="bi bi-newspaper"></i></h2>
        <div class="mb-4">
          <?php foreach ($berita as $key => $bl): ?>
            <div class="post-card">
              <a href="<?= base_url('berita/baca_berita/'.$bl->slug_berita) ?>">
                <img src="<?= base_url('uploads/foto_berita/'.$bl->foto_berita) ?>" alt="" title="News image">
              </a>
              <div class="post-content">
                <h4><a href="<?= base_url('berita/baca_berita/'.$bl->slug_berita) ?>"><?= $bl->nama_berita ?></a></h4>
                <time datetime="2020-01-01"><?= $bl->waktu ?></time>
              </div>
            </div><!-- End recent post card-->
          <?php endforeach ?>
        </div>   

      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("copy-link").addEventListener("click", function() {
    var textArea = document.createElement("textarea");
    textArea.value = window.location.href;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    alert("Tautan telah disalin ke papan klip.");
  });
</script>