
<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">Data Dokumen</h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <div class="row justify-content-center align-items-stretch">


      <table class="table table-striped" id="dokumenTable" border="1">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Dokumen</th>
            <th>Kategori Dokumen</th>
            <th>Waktu</th>
            <th>File Dokumen</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

      <!-- Pastikan jQuery dimuat sebelum kode JavaScript Anda -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
    // Pastikan untuk menggunakan `jQuery` sebagai pengganti `$` untuk menghindari konflik
        jQuery(document).ready(function() {
        // Menginisialisasi DataTable
          jQuery('#dokumenTable').DataTable({
            "data": <?= json_encode($dokumen); ?>,
            "columns": [
              { "data": null, "render": function(data, type, row, meta) { return meta.row + 1; } },
              { "data": "nama_sop" },
              { "data": "nama_dokumen" },
              { "data": "waktu" },
              { "data": null, "render": function(data, type, row) { 
                    // Periksa apakah properti file_dokumen memiliki nilai yang valid
                if (row.file_sop) {
                        // Gunakan properti file_sop untuk membuat tautan
                  return '<a href="' + row.file_sop + '" target="_blank"><i class="bi bi-file-earmark-pdf" style="font-size: 3em;"></i></a>';
                } else {
                        // Jika properti file_dokumen tidak ada atau kosong, tampilkan pesan kesalahan
                  return 'Tautan tidak tersedia';
                }
              } }
              ]
          });
        });
      </script>

    </div>
  </div>
</div>
