<style type="text/css">
  .post-card {
    border: 1px solid #e0e0e0;
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
    max-width: 200px; /* Adjust the width as needed */
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

  .post-content h4 a {
    color: black; /* Ganti dengan warna biru yang diinginkan */
  }
</style>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url() ?>assets/img/news-4.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Laporan Rencana Kinerja</h2>
      <ol>
        <li><a href="<?= site_url('landing_page') ?>">Home</a></li>
        <li>Profil</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->



  <!-- ======= Blog Details Section ======= -->
  <section id="alt-services-2" class="alt-services section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        <div class="col-lg-9">
          <h3>Rencana Kinerja</h3>
          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <form action="<?= site_url('landing_page/laporan_kinerja') ?>" method="get">
              <label for="filter_waktu">Tahun:</label>
              <select id="filter_waktu" name="filter_waktu">
                <option value="">Pilih</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
              <br>
              <label for="filter_jenis_dokumen">Jenis Dokumen:</label>
              <select id="filter_jenis_dokumen" name="filter_jenis_dokumen">
                <option value="">Pilih</option>
                <option value="Laporan Kinerja">Laporan Kinerja</option>
                <option value="Rencana Kerja Tahunan">Rencana Kerja Tahunan</option>
                <option value="Rencana Strategis">Rencana Strategis</option>
              </select>
              <br>
              <button type="submit">Filter</button>
            </form>
            <br>

            <table class="table table-striped" id="kinerja_table" border="1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dokumen</th>
                  <th>Jenis Dokumen</th>
                  <th>Waktu</th>
                  <th>File Dokumen</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($laporan as $data) { ?>
                  <tr>
                    <td><?= $counter ?></td>
                    <td><?= $data->nama_dokumen ?></td>
                    <td><?= $data->jenis_dokumen ?></td>
                    <td><?= $data->waktu ?></td>
                    <td><a href="<?= $data->file_dokumen ?>" target="_blank"><i class="bi bi-file-earmark-pdf" style="font-size: 3em;"></i></a></td>
                  </tr>
                  <?php $counter++; ?>
                <?php } ?>
              </tbody>
            </table>
          </table>
        </div>
      </div>


      <div class="col-lg-3">

        <div class="sidebar">

          <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Recent Posts</h3>

            <div class="mt-3">
              <?php foreach ($berita as $key => $bl): ?>
                <div class="post-item mt-3">
                  <a href="<?= base_url('berita/baca_berita/' . $bl->slug_berita) ?>">
                    <img src="<?= base_url('uploads/foto_berita/' . $bl->foto_berita) ?>" alt="" class="img-fluid recent-post-image">
                  </a>
                  <div class="post-content">
                    <h4><a href="<?= base_url('berita/baca_berita/'.$bl->slug_berita) ?>"><?= $bl->nama_berita ?></a></h4>
                    <time datetime="2020-01-01"><?= $bl->waktu ?></time>
                  </div>
                </div><!-- End recent post item-->
              <?php endforeach ?>
            </div>

          </div><!-- End sidebar recent posts-->
          <br>
          <div class="sidebar-item categories">
            <h3 class="sidebar-title"><p>Pengumuman</p></h3>
            <h5 class="card-title"><?= $pengumuman[0]->nama_pengumuman; ?></h5>
            <p><?= $pengumuman[0]->isi_pengumuman; ?></p>
          </div>



        </div><!-- End Blog Sidebar -->

      </div>
    </div>

  </div>
</section><!-- End Blog Details Section -->


</main><!-- End #main -->


