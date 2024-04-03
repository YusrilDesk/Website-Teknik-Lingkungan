 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url() ?>assets/img/news-4.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Data Dokumen <?= get_setting_data()[0]->sub_web; ?></h2>
    <ol>
      <li><a href="<?= site_url('landing_page') ?>">Home</a></li>
      <li>Dokumen</li>
  </ol>

</div>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Details Section ======= -->
<section id="blog" class="blog">
  <h3>Data Dokumen</h3>
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <table class="table table-striped" id="kinerja_table" border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Dokumen</th>
          <th>Kredit</th>
          <th>Debit</th>
          <th>Jumlah Anggaran</th>
          <th>Waktu</th>
      </tr>
  </thead>
  <tbody>
    <?php $counter = 1; ?>
    <?php foreach ($anggaran as $data) { ?>
      <tr>
        <td><?= $counter ?></td>
        <td><?= $data->nama_anggaran ?></td>
        <td><?= $data->kredit ?></td>
        <td><?= $data->debit ?></td>
        <td><?= $data->jumlah_anggaran ?></td>
        <td><?= $data->waktu ?></td>
    </tr>
    <?php $counter++; ?>
<?php } ?>
</tbody>
</table>
</table>

</div>
</section>


