<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url() ?>assets2/img/umk.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <?php if ($latestBerita !== null): ?>
        <h2>Kegiatan (Divisi: <?= $latestBerita->divisi; ?>)</h2>
      <?php else: ?>
        <p>Tidak ada berita yang tersedia.</p>
      <?php endif; ?>
      <ol>
        <li><a href="<?= site_url('landing_page') ?>">Beranda</a></li>
        <li>Kegiatan</li>
      </ol>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-5">
        <div class="col-lg-8">
          <!-- Konten berita akan dimuat di sini -->
          <div id="berita-content">
            <?php if ($semua_berita !== null): ?>
              <?php foreach ($semua_berita as $berita): ?>
                <article class="blog-details">
                  <div class="post-img">
                    <img src="<?= base_url('uploads/foto_berita/') . $latestBerita->foto_berita; ?>" class="img-fluid" alt="">
                  </div>
                  <h2 class="title"><?= $latestBerita->nama_berita ?></h2>
                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="<?= $latestBerita->waktu; ?>"><?= date('M j, Y', strtotime($latestBerita->waktu)); ?></time></a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                    </ul>
                  </div><!-- End meta top -->
                  <div class="content">
                    <p><?= $latestBerita->isi_berita ?></p>
                  </div><!-- End post content -->
                  <div class="meta-bottom">
                    <i class="bi bi-whatsapp"></i>
                    <ul class="cats">
                      <li><a href="#" onclick="shareOnWhatsApp()"> Share WhatsApp</a></li>
                    </ul>
                    <i class="bi bi-facebook"></i>
                    <ul class="cats">
                      <li><a href="#" onclick="shareOnFacebook()">Share Facebook</a></li>
                    </ul>
                    <i class="bi bi-link"></i>
                    <ul class="cats">
                      <li><a href="#" onclick="copyLinkToClipboard()">Copy Link</a></li>
                    </ul>
                  </div><!-- End meta bottom -->
                </article><!-- End blog post -->
              <?php endforeach; ?>
            <?php else: ?>
              <p>Tidak ada berita yang tersedia.</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-item tags">
              <h3 class="sidebar-title">Tags</h3>
              <ul class="mt-3">
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End sidebar tags-->
          </div><!-- End Blog Sidebar -->
        </div>
      </div>
    </div>
  </section><!-- End Blog Details Section -->
</main><!-- End #main -->


