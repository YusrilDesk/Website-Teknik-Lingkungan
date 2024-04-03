

<style type="text/css">
  .custom-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  select, button {
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
  }

  button {
  background-color: #3CB371;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #4CAF50; /* Ubah warna saat mouse di atas tombol */
}
</style>


<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url() ?>assets/img/news-4.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Layanan <?= get_setting_data()[0]->sub_web; ?></h2>
    <ol>
      <li><a href="<?= site_url('landing_page') ?>">Home</a></li>
      <li>Layanan</li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Details Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <?php echo $this->session->flashdata('info') ?>
    <!-- Filter Status Pengguna -->
    <form action="<?= base_url('layanan/tampilkanForm') ?>" method="post" class="custom-form">
      <div class="form-group">
        <label for="status_pengguna">Pilih Status Pengguna:</label>
        <select name="status_pengguna" id="status_pengguna" class="form-control">
          <option value="mahasiswa">Mahasiswa</option>
          <option value="alumni">Alumni</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Pilih</button>
    </form>

    <!-- Tampilkan formulir berdasarkan status_pengguna -->
    <?php if (isset($statusPengguna)): ?>
      <?php $this->load->view('landing_page/layanan/v_layanan_' . $statusPengguna); ?>
    <?php endif; ?>

  </div>
</section><!-- End Blog Details Section -->

<br>
<br>
<br>
<br>
<br>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Auto close alert after 5 seconds
  setTimeout(function() {
    $('#autoCloseAlert').alert('close');
    }, 6000); // 5000 milidetik = 5 detik
  </script>

