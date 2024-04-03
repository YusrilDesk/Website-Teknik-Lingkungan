<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span><?= get_setting_data()[0]->sub_web; ?></span></strong>. Created By DSTI
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= base_url() ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/quill/quill.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/quill/quill.min2.js"></script>
<script src="<?= base_url() ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>

<script>
  function showFileInput() {
    var fileInput = document.getElementById('fileInput');
    fileInput.style.display = 'block';
    fileInput.click();
  }

  function showFileInput2() {
    var fileInput2 = document.getElementById('fileInput2');
    fileInput2.style.display = 'block';
    fileInput2.click();
  }
</script>

<?php if($this->session->flashdata('pesanAlert')){ ?>

  <script src="<?php echo base_url('toastr/toastr.min.js'); ?>"></script>

  <script>

    var bel = new Audio('<?php echo base_url("toastr/audio/Plonk.mp3") ?>');

    $(bel)[0].play();

    $(function() {

      <?php echo($this->session->flashdata('pesanAlert'));unset($_SESSION['pesanAlert']); ?>

    });

  </script>

<?php } ?>



<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: "#editor_field_2",
      // Atur opsi konfigurasi tambahan di sini
  });
</script>


<script src="<?= base_url(); ?>assets/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>

<script type="text/javascript">
  CKEDITOR.replace('content');
  CKEDITOR.replace('content2');
</script>

<script>
 $(document).ready(function() {
  $('#editor1').summernote({
   height: 200,
         // Konfigurasi lainnya
 });

  $('#editor2').summernote({
   height: 200,
         // Konfigurasi lainnya
 });

  $('#editor3').summernote({
   height: 200,
         // Konfigurasi lainnya
 });

   $('#editor4').summernote({
   height: 200,
         // Konfigurasi lainnya
 });

      // Inisialisasi lebih banyak editor jika diperlukan
});
</script>





</body>

</html>