



<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url() ?>assets/img/news-4.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Layanan Mahasiswa</h2>
    <ol>
      <li><a href="<?= site_url('landing_page') ?>">Home</a></li>
      <li>Layanan</li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Details Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <form action="<?= base_url('layanan/tampilkanForm') ?>" method="post">
      <label for="status_pengguna">Pilih Status Pengguna:</label>
      <select name="status_pengguna" id="status_pengguna">
        <option value="">Pilih Status : </option>
        <option value="mahasiswa">Mahasiswa</option>
        <option value="alumni">Alumni</option>
      </select>
      <button type="submit">Pilih</button>
    </form>

    <form action="<?= base_url('layanan/tambah_MHS') ?>" method="post" role="form">

      <div class="my-3">
        <div class="error-message"></div>
        <div class="sent-message"><?php echo $this->session->flashdata('pesan') ?></div>
      </div>
      <div class="row">
        <div class="col-md-6 form-group">
          <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Nama" required>
        </div>
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <input type="text" class="form-control" name="asal_pelanggan" id="asal_pelanggan" placeholder="Program Studi" required>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6 form-group">
          <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="No Telpon" required>
        </div>
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <select class="form-select" aria-label="Default select example" name="kategori_layanan" autocomplete="off" required="required">
            <option value="">Pilih Layanan:</option>
            <?php foreach ($layanan as $row) : ?>
              <option value="<?= $row->id_layanan; ?>"><?= $row->nama_layanan; ?></option>
            <?php endforeach ?>
          </select> 
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-6 form-group">
          <input type="text" name="email_pengguna" class="form-control" id="email_pengguna" placeholder="Email Pengguna" required>
        </div>
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <input type="number" name="nim_mhs" class="form-control" id="nim_mhs" placeholder="NIM Mahasiswa" required>
        </div>
      </div>

      <div class="form-group mt-3">
        <textarea class="form-control" name="deskripsi_layanan" rows="5" placeholder="Deskripsi" required></textarea>
      </div>
      <br>
      <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
    </form> 

  </div>
</section><!-- End Blog Details Section -->

