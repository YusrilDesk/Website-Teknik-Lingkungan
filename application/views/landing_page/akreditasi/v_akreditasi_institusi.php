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

      <h2>Akreditasi</h2>
      <ol>
        <li><a href="<?= site_url('landing_page') ?>">Home</a></li>
        <li>Akreditasi Institusi</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Details Section ======= -->
  <section id="alt-services-2" class="alt-services section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        <div class="col-lg-9">

          <h3>Akreditasi Institusi</h3>

          <table class="table table-striped" id="standarTable" border="1">
            <thead>
              <tr>
                <th>Perguruan Tinggi</th>
                <th>No. SK</th>
                <th>Peringkat</th>
                <th>Tahun SK - Tanggal Kadaluarsa</th>
              </tr>
            </thead>
            <tbody>
              <!-- Isi data di sini -->
            </tbody>
          </table>

          <script>
            $(document).ready(function() {
              $('#standarTable').DataTable({
                data: <?= json_encode($akreditasi1); ?>,
                columns: [
                {
                  data: 'perguruan_tinggi',
                  render: function (data, type, row, meta) {
                    if (type === 'display') {
                      return '<a href="' + row.file_akreditasi + '" target="_blank">' + data + '</a>';
                    }
                    return data;
                  }
                },
                {
                  data: 'no_sk',
                  render: function (data, type, row, meta) {
                    if (type === 'display') {
                      return '<a href="' + row.file_sk + '" target="_blank">' + data + '</a>';
                    }
                    return data;
                  }
                },

                { data: 'peringkat' },
                {
                  data: null,
                  render: function (data, type, row, meta) {
                    if (type === 'display') {
                      return row.tahun_sk + ' - ' + row.tanggal_kadaluarsa;
                    }
                    return data;
                  }
                },
                ]
              });
            });
          </script>



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
              <h3 class="sidebar-title">Data Menu</h3>
              <ul class="mt-3">
                <li><a href="#">Daftar Dokumen <span>(<?= $total_rows_dok ?>)</span></a></li>
                <li><a href="#">Standart Mutu <span>(<?= $total_rows_standart ?>)</span></a></li>
                <li><a href="#">Prosedur Oprasional Standart <span>(<?= $total_rows_sop ?>)</span></a></li>
                <li><a href="#">Laporan SPMI <span>(<?= $total_rows_laporan ?>)</span></a></li>
                <li><a href="#">Akreditasi Institusi<span>(<?= $total_rows_institusi ?>)</span></a></li>
                <li><a href="#">Akreditasi Institusi <span>(<?= $total_rows_prodi ?>)</span></a></li>
                <li><a href="#">Berita <span>(<?= $total_rows_berita ?>)</span></a></li>
              </ul>
            </div><!-- End sidebar categories-->



          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->

  </main><!-- End #main -->