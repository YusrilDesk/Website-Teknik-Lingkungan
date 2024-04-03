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
        <p data-aos="fade-up" class="meta">by <a href="#"><?= $baca_berita->nama ?></a> &bullet; on <a href="#"><?= $baca_berita->waktu ?></a> </p>
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100"><?= $baca_berita->nama_berita ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <div class="row justify-content-center align-items-stretch">

      <article class="col-lg-8 order-lg-2 px-lg-5">

        <img src="<?= base_url('uploads/foto_berita/'.$baca_berita->foto_berita) ?>" alt="Image" class="img-fluid rounded">

        <h3><?= $baca_berita->nama_berita ?></h3>
        <p><?= $baca_berita->isi_berita ?></p>




      </article>

      <div class="col-md-12 col-lg-1 order-lg-1">
        <div class="share ">
          <h3>Share</h3>
          <ul class="list-unstyled share-article">
            <li><a href="#" id="copy-link"><span class="icon-share"></span></a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 mb-5 mb-lg-0 order-lg-3">
        <h3>Berita <i class="bi bi-newspaper"></i></h3>
        <div class="mb-4">
          <?php foreach ($berita_lain as $key => $bl): ?>
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