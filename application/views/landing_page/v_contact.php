
<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">Contact</h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
        <div class="contact-info">

          <div class="address mt-2">
            <i class="icon-room"></i>
            <h4 class="mb-2">Location:</h4>
            <p><?= get_setting_data()[0]->alamat; ?></p>
          </div>

          <div class="open-hours mt-4">
            <i class="icon-clock-o"></i>
            <h4 class="mb-2">Open Hours:</h4>
            <p>
              Senin-Jum'at:<br>
              08:00 AM - 16-00 PM
            </p>
          </div>

          <div class="email mt-4">
            <i class="icon-envelope"></i>
            <h4 class="mb-2">Email:</h4>
            <p><?= get_setting_data()[0]->email; ?></p>
          </div>

          <div class="phone mt-4">
            <i class="icon-phone"></i>
            <h4 class="mb-2">Call:</h4>
            <p><?= get_setting_data()[0]->no_telp; ?></p>
          </div>

        </div>
      </div>
      <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.1055949725683!2d122.50626137486437!3d-3.9987086959750173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98ecde057e49d9%3A0xee318b8f3b9185ca!2sUniversitas%20Muhammadiyah%20Kendari!5e0!3m2!1sid!2sid!4v1709100786058!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
<br>