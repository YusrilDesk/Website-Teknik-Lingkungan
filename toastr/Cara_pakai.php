<?php  
/**
* --------------------------------------------------------------------------
* Notif Toastr
* 
* Copyrigt(c) 2022
* 
* @author      🎓 Mas harun-ID
* @link        http://facebook.com/masharun.i
* @link        masharunid@gmail.com
* @category    Helper
* @copyright   2022 - Mas harun-ID
* 
* on our office
* --------------------------------------------------------------------------
*/
?>


<!-- ============================================== -->
<!-- ===============CARA PAKAI===================== -->
<!-- ============================================== -->
<!--
	SIMPAN FOLDER (toastr) TEMPAT FILE INI, KEDALAM FODER
	CODEIGNITER SEJAJAR DENGAN FOLDER (application)
	SETELAH TERSIMPAN LAKUKAN LANGKAH-LANGKAH BERIKUT
-->


<!-- ============================================== -->
<!-- 1. PASANG SECRIPT CSS DI BAWAH INI PADA FOOTER SEBELUM TAG </head> -->
<!-- ============================================== -->
<?php if($this->session->flashdata('pesanAlert')){ ?>
	<link rel="stylesheet" href="<?php echo base_url('toastr/toastr.min.css'); ?>">
<?php } ?>




<!-- ============================================== -->
<!-- 2. PASANG SECRIPT JAVSCRIPT DI BAWAH INI PADA FOOTER SEBELUM TAG </body> -->
<!-- ============================================== -->
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



<!-- ============================================== -->
<!-- 3. PASANG SECRIPT PHP DI BAWAH INI PADA FILE HELPER MILIK ANDA -->
<!-- Untuk cara membuat helper silahkan cek di internet -->
<!-- ============================================== -->
<?php 
// ===============Ini secript nya================
if(!function_exists('getAlert1')){
	function getAlert1($toastrStatus, $toastrMessage){
            # $status = warning,error,info,success
		get_instance()->session->set_flashdata('pesanAlert','toastr.'.$toastrStatus.'("'.$toastrMessage.'");');
	}
}
// ==============================================
?>





<!-- ============================================== -->
<!-- 4. GUNAKAN SECRIPT INI UNTUK MEMBUAT PESAN NOTIF NYA-->
<!-- Gunakan pada  -->
<!-- ============================================== -->
<?php 
// ===============Ini secript nya================
$toastrStatus  = "success";# = warning,error,info,success
$toastrMessage = "Informasi yang akan di sampaikan";
getAlert1($toastrStatus, $toastrMessage);
// ==============================================
?>