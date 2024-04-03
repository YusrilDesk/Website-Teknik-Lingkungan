<style type="text/css">
  .post-card {
    border: none;
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
    max-width: 140px; /* Adjust the width as needed */
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
</style>

<div class="hero overlay inner-page">
  <img src="images/blob.svg" alt="" class="img-fluid blob">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center pt-5">
      <div class="col-lg-6">
        <h1 class="heading text-white mb-3" data-aos="fade-up" data-aos-delay="100">TIM/STAFF <br><?= get_setting_data()[0]->sub_web; ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container article">
    <div class="row justify-content-center align-items-stretch">


      <?php if($tim){  $no=1; foreach($tim as $key){ ?>
      <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="0">
        <img src="<?php echo base_url('uploads/foto_pengurus/').$key->foto_pengurus; ?>" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
        <h5 class="text-black"><?= $key->nama_pengurus ?></h5>
        <p><?= $key->jabatan ?></p>
      </div>

      <?php $no++; }}else{
        echo '
        <tr>
        <td colspan="5">Tidak ada ditemukan</td>
        </tr>
        ';
      }?>
      
    </div>
  </div>
</div>

<script>
  document.getElementById("copy-link").addEventListener("click", function() {
    var textArea = document.createElement("textarea");
    textArea.value = window.location.href;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    alert("Tautan telah disalin ke papan klip.");
  });
</script>