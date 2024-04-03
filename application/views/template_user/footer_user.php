<div class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="widget">
          <h3>About</h3>
          <span><?= get_setting_data()[0]->nama_web; ?></span>
        </div> <!-- /.widget -->
        <div class="widget">
          <address><?= get_setting_data()[0]->alamat; ?></address>
          <ul class="list-unstyled links">
            <li><a href="<?= get_setting_data()[0]->no_telp; ?>"><?= get_setting_data()[0]->no_telp; ?></a></li>
            <li><a href="<?= get_setting_data()[0]->email; ?>"><?= get_setting_data()[0]->email; ?></a></li>
          </ul>
        </div> <!-- /.widget -->
      </div> <!-- /.col-lg-4 -->
      <div class="col-lg-2">
        <div class="widget">
          <h3>Company</h3>
          <ul class="list-unstyled float-start links">
            <li><a href="https://umkendari.ac.id/">UM Kendari</a></li>
            <li><a href="https://admisi.umkendari.ac.id/">Admisi UM Kendari</a></li>
            <li><a href="https://teknik.umkendari.ac.id/">Teknik UM Kendari</a></li>
          </ul>
        </div> <!-- /.widget -->
      </div> <!-- /.col-lg-4 -->
      <div class="col-lg-6">
        <div class="widget">
          <h3>Navigation</h3>
          <ul class="list-unstyled float-start links">
            <li><a href="#">About</a></li>
            <li><a href="#">Information</a></li>
            <li><a href="#">Layanan</a></li>
          </ul>

          <ul class="list-unstyled float-start links">
            <li><a href="#">Tim</a></li>
            <li><a href="#">Dokumen</a></li>
            <li><a href="#">Contact</a></li>
          </ul>

          <h3>Social</h3>
          <ul class="list-unstyled social">
            <li><a href="<?= get_setting_data()[0]->instagram; ?>"><span class="icon-instagram"></span></a></li>
            <li><a href="#"><span class="icon-twitter"></span></a></li>
            <li><a href="<?= get_setting_data()[0]->facebook; ?>"><span class="icon-facebook"></span></a></li>
            <li><a href="#"><span class="icon-linkedin"></span></a></li>
          </ul>
        </div> <!-- /.widget -->
      </div> <!-- /.col-lg-4 -->
    </div> <!-- /.row -->

    <div class="row mt-5">
      <div class="col-12 text-center">

  
      
      <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. <?= get_setting_data()[0]->sub_web; ?>. &mdash; Designed by. <a href="https://dsti.umkendari.ac.id">DSTI</a>
      </span>
    </div>
  </div>
</div> <!-- /.container -->
</div> <!-- /.site-footer -->

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>


<script src="<?= base_url() ?>assets2/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets2/js/tiny-slider.js"></script>

<script src="<?= base_url() ?>assets2/js/flatpickr.min.js"></script>

<script type="text/javascript">
  window.addEventListener('scroll', function() {
    var nav = document.querySelector('.site-nav');
    var navHeight = nav.offsetHeight;
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    var root = document.documentElement;
    var primaryColor = getComputedStyle(root).getPropertyValue('--bs-primary').trim();

    if (scrollTop > navHeight) {
      nav.classList.add('sticky');
      nav.style.backgroundColor = primaryColor;
    } else {
      nav.classList.remove('sticky');
      nav.style.backgroundColor = 'transparent';
    }
  });
</script>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    let slider = document.querySelector('.slider');
    let images = document.querySelectorAll('.slider img');
    let currentImageIndex = 0;
    let imageWidth = images[0].clientWidth;

    function nextSlide() {
      currentImageIndex++;
      if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
      }
      updateSlide();
    }

    function updateSlide() {
      slider.style.transform = `translateX(-${currentImageIndex * imageWidth}px)`;
    }

  setInterval(nextSlide, 3000); // Ganti gambar setiap 3 detik
});
</script>


<script src="<?= base_url() ?>assets2/js/aos.js"></script>
<script src="<?= base_url() ?>assets2/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets2/js/navbar.js"></script>
<script src="<?= base_url() ?>assets2/js/counter.js"></script>
<script src="<?= base_url() ?>assets2/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</body>
</html>

