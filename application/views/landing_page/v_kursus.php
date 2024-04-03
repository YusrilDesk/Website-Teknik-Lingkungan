
<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">Kurikulum <?= get_setting_data()[0]->sub_web; ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <label for="filter-semester">Filter Semester:</label>
    <select id="filter-semester">
      <option value="">Semua Semester</option>
      <option value="1">Semester 1</option>
      <option value="2">Semester 2</option>
      <option value="3">Semester 3</option>
      <option value="4">Semester 4</option>
      <option value="5">Semester 5</option>
      <option value="6">Semester 6</option>
      <option value="7">Semester 7</option>
      <option value="8">Semester 8</option>
      <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
    </select>
    <div class="row justify-content-center align-items-stretch">

      <table class="table table-striped" id="kursusTable" border="1">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kursus</th>
            <th>Semester</th>
            <th>Waktu</th>
            <th>Silabus</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

      <!-- Pastikan jQuery dimuat sebelum kode JavaScript Anda -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

      <script>
  // Pastikan untuk menggunakan `jQuery` sebagai pengganti `$` untuk menghindari konflik
        jQuery(document).ready(function() {
          var table = jQuery('#kursusTable').DataTable({
            "data": <?= json_encode($kursus); ?>,
            "columns": [
              { "data": null, "render": function(data, type, row, meta) { return meta.row + 1; } },
              { "data": "kursus" },
              { "data": "semester" },
              { "data": "waktu" },
              { "data": null, "render": function(data, type, row) { 
          // Periksa apakah properti file_dokumen memiliki nilai yang valid
                if (row.silabus) {
            // Gunakan properti silabus untuk membuat tautan
                  return '<a href="' + row.silabus + '" target="_blank"><i class="bi bi-file-earmark-pdf" style="font-size: 3em;"></i></a>';
                } else {
            // Jika properti file_dokumen tidak ada atau kosong, tampilkan pesan kesalahan
                  return 'Tautan tidak tersedia';
                }
              } }
              ]
          });

    // Menerapkan filter berdasarkan semester
          jQuery('#filter-semester').on('change', function() {
            var selectedSemester = jQuery(this).val();
            table.column(2).search(selectedSemester).draw();
          });
        });
      </script>

    </div>
  </div>
</div>
