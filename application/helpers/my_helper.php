<?php



    /**

     * --------------------------------------------------------------------------

     * SITE Helper

     * 

     * Copyrigt(c) 2021

     * 

     * @author      Kambing Sakit

     * @link        http://facebook.com/akerman

     * @link        akerman30062001@gmail.com

     * @category    Helper

     * @copyright   2022 - kambing sakit

     * 

     * Using as a core base helper for codeigniter framework

     * on our office

     * --------------------------------------------------------------------------

     */

    defined('BASEPATH') OR exit('No direct script access allowed');





    /**

     * HELPER HARI TANGGAL BULAN TAHUN INDONESIA

     * --------------------------------------------------------------------------

     * Using for set total row page

     * 

     * @param   string  string for base url after click pagination

     * 

     */

    if ( ! function_exists('nama_hari')) {

        function nama_hari($tanggal) {

            $hari = date('D', strtotime($tanggal));

            if ($hari == 'Sun') {

                return 'Minggu';

            } elseif ($hari == 'Mon') {

                return 'Senin';

            } elseif ($hari == 'Tue') {

                return 'Selasa';

            } elseif ($hari == 'Wed') {

                return 'Rabu';

            } elseif ($hari == 'Thu') {

                return 'Kamis';

            } elseif ($hari == 'Fri') {

                return 'Jumat';

            } elseif ($hari == 'Sat') {

                return 'Sabtu';

            }

        }

    }



    if ( ! function_exists('bulan_panjang')) {

        function bulan_panjang($bulan) {

            switch ($bulan) {

                case 1:

                return 'Januari';

                break;

                case 2:

                return 'Februari';

                break;

                case 3:

                return 'Maret';

                break;

                case 4:

                return 'April';

                break;

                case 5:

                return 'Mei';

                break;

                case 6:

                return 'Juni';

                break;

                case 7:

                return 'Juli';

                break;

                case 8:

                return 'Agustus';

                break;

                case 9:

                return 'September';

                break;

                case 10:

                return 'Oktober';

                break;

                case 11:

                return 'November';

                break;

                case 12:

                return 'Desember';

                break;

            }

        }

    }

    if ( ! function_exists('bulan_pendek')) {

        function bulan_pendek($bulan) {

            switch ($bulan) {

                case 1:

                return 'Jan';

                break;

                case 2:

                return 'Feb';

                break;

                case 3:

                return 'Mar';

                break;

                case 4:

                return 'Apr';

                break;

                case 5:

                return 'Mei';

                break;

                case 6:

                return 'Jun';

                break;

                case 7:

                return 'Jul';

                break;

                case 8:

                return 'Agu';

                break;

                case 9:

                return 'Sep';

                break;

                case 10:

                return 'Okt';

                break;

                case 11:

                return 'Nov';

                break;

                case 12:

                return 'Des';

                break;

            }

        }    

    }

    if ( ! function_exists('tanggal_indonesia')) {

        function tanggal_indonesia($tanggal) {

            $ubahTanggal = gmdate($tanggal, time()+60*60*8);

            $pecahTanggal = explode('-', $ubahTanggal);

            $tanggal = $pecahTanggal[2];

            $bulan = bulan_panjang($pecahTanggal[1]);

            $tahun = $pecahTanggal[0];

            return $tanggal.' '.$bulan.' '.$tahun;

        }

    }

    if ( ! function_exists('tanggal_indonesia_lengkap')) {

        function tanggal_indonesia_lengkap($tanggal) {

            $ubahTanggal = gmdate($tanggal, time()+60*60*8);

            $pecahTanggal = explode('-', $ubahTanggal);

            $tanggal = $pecahTanggal[2];

            $bulan = $pecahTanggal[1];

            $tahun = $pecahTanggal[0];

            $namaHari = nama_hari(date('l', mktime(0, 0, 0, $bulan, $tanggal, $tahun)));

            return $namaHari.', '.$tanggal.' '.bulan_pendek($bulan).' '.$tahun;

        }

    }



    /**

     * HELPER ID ACAK

     * --------------------------------------------------------------------------

     * Using for set id acak

     * 

     * @param 

     * 

     */

    if (! function_exists('id_acak')){

        function id_acak(){

            $id_acak = time().'_'.substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);

            return $id_acak;

        }

    }



    if (! function_exists('id_acak_long')){

        function id_acak_long($panjang){

            $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

            $id_acak = '';

            for ($i=0; $i < $panjang; $i++) { 

                $pos = rand(0, strlen($karakter)-1);

                $id_acak .= $karakter[$pos];

            }

            return $id_acak;

        }

    }







    if(!function_exists('getAlert1')){

        function getAlert1($toastrStatus, $toastrMessage){

            # $status = warning,error,info,success

            get_instance()->session->set_flashdata('pesanAlert','toastr.'.$toastrStatus.'("'.$toastrMessage.'");');

        }

    }





    if(!function_exists('totalpustaka')){

        function totalpustaka(){  

            get_instance()->load->model('M_pustaka');

            $totalpustaka = count((array)get_instance()->M_pustaka->readLengkap('status_pustaka','tbl_pustaka','', '',array('status_pustaka' => 'menunggu'),'','', '', ''));

            // $totalpustaka = count((array)get_instance()->M_pustaka->read('','',''));

            return $totalpustaka;

        }

    }



    if(!function_exists('totalbtq')){

        function totalbtq(){  

            get_instance()->load->model('M_btq');

            $totalbtq = count((array)get_instance()->M_btq->readLengkap('status_btq','tbl_btq','', '',array('status_btq' => 'menunggu'),'','', '', ''));

            // $totalbtq = count((array)get_instance()->M_btq->read('','',''));

            return $totalbtq;

        }

    }



    if(!function_exists('totaltunggakan')){

        function totaltunggakan(){  

            get_instance()->load->model('M_tunggakan');

            $totaltunggakan = count((array)get_instance()->M_tunggakan->readLengkap('status_tunggakan','tbl_tunggakan','', '',array('status_tunggakan' => 'menunggu'),'','', '', ''));

            // $totaltunggakan = count((array)get_instance()->M_tunggakan->read('','',''));

            return $totaltunggakan;

        }

    }



    if(!function_exists('totalijazah')){

        function totalijazah(){  

            get_instance()->load->model('m_pengusulan');

            $totalijazah = count((array)get_instance()->m_pengusulan->readLengkap('status_pengambilan','tbl_pengambilan_ijazah','', '',array('status_pengambilan' => 'menunggu'),'','', '', ''));

            // $totalijazah = count((array)get_instance()->M_ijazah->read('','',''));

            return $totalijazah;

        }

    }





    if (! function_exists('alert')){

        function alert($text,$status){

            get_instance()->session->set_flashdata(

              'pesan','<div class="alert alert-'.$status.' alert-dismissible fade show" role="alert">'.$text.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'

          );

        }





    }



    function helper_log($tipe = "", $str = ""){

        $CI =& get_instance();



        if (strtolower($tipe) == "login"){

            $log_tipe   = 0;

        }

        elseif(strtolower($tipe) == "logout")

        {

            $log_tipe   = 1;

        }

        elseif(strtolower($tipe) == "add"){

            $log_tipe   = 2;

        }

        elseif(strtolower($tipe) == "edit"){

            $log_tipe  = 3;

        }

        elseif(strtolower($tipe) == "hapus"){

            $log_tipe  = 4;

        }

        elseif(strtolower($tipe) == "usulan"){

            $log_tipe  = 5;

        }

        elseif(strtolower($tipe) == "download"){

            $log_tipe  = 6;

        }

        else{

            $log_tipe  = 7;

        }



    // paramter

        $param['log_user']      = $CI->session->userdata('username');

        $param['log_tipe']      = $log_tipe;

        $param['log_desc']      = $str;





    //load model log

        $CI->load->model('M_log');



    //save to database

        $CI->M_log->save_log($param);



    }



    if(!function_exists('log_sistem)')){

        function log_sistem(){  

           get_instance()->load->model('M_log');



           $log_sistem = get_instance()->M_log->readLengkap('*','tabel_log', '', '','','log_id','', '', '');

           return $log_sistem;



       }

   }





   function helper_log_pengusulan($tipe = "", $str = ""){

    $CI =& get_instance();



    if (strtolower($tipe) == "usulan ijazah"){

        $log_tipe_pengusulan   = 0;

    }

    elseif(strtolower($tipe) == "usulan btq")

    {

        $log_tipe_pengusulan   = 1;

    }

    elseif(strtolower($tipe) == "usulan tunggakan"){

        $log_tipe_pengusulan   = 2;

    }

    elseif(strtolower($tipe) == "usulan pustaka"){

        $log_tipe_pengusulan  = 3;

    }

    elseif(strtolower($tipe) == "hapus"){

        $log_tipe_pengusulan  = 4;

    }

    else{

        $log_tipe_pengusulan  = 5;

    }



    // paramter

    $param['log_user_pengusulan']      = $CI->session->userdata('username');

    $param['log_tipe_pengusulan']      = $log_tipe_pengusulan;

    $param['log_aktivitas_pengusulan']      = $str;





    //load model log

    $CI->load->model('M_logAktivitas');



    //save to database

    $CI->M_logAktivitas->save_log($param);



}



if(!function_exists('log_aktivitas_pengusulan)')){

    function log_aktivitas_pengusulan(){  

       get_instance()->load->model('M_logAktivitas');



       $log_aktivitas_pengusulan = get_instance()->M_logAktivitas->readLengkap('*','tbl_log_pengusulan', '', '','','id_log_pengusulan','', '', '');

       return $log_aktivitas_pengusulan;



   }

}



if(!function_exists('status_wisuda)')){

    function status_wisuda(){  

       get_instance()->load->model('M_logAktivitas');



        $status_wisuda = get_instance()->M_logAktivitas->readLengkap('*','tbl_pengambilan_ijazah', '', '',array('id_mahasiswa' => get_instance()->session->userdata('id_mahasiswa')),'id_mahasiswa','', '', '');

        

        

       return $status_wisuda;





   }

}



if(!function_exists('status_btq)')){

    function status_btq(){  

       get_instance()->load->model('M_logAktivitas');



        $status_btq = get_instance()->M_logAktivitas->readLengkap('*','tbl_btq', '', '','','id_mahasiswa','', '', '');

       return $status_btq;



   }

}



if(!function_exists('status_keuangan)')){

    function status_keuangan(){  

       get_instance()->load->model('M_logAktivitas');



        $status_keuangan = get_instance()->M_logAktivitas->readLengkap('*','tbl_tunggakan', '', '','','id_mahasiswa','', '', '');

       return $status_keuangan;



   }

}



if(!function_exists('status_pustaka)')){

    function status_pustaka(){  

       get_instance()->load->model('M_logAktivitas');



        $status_pustaka = get_instance()->M_logAktivitas->readLengkap('*','tbl_pustaka', '', '','','id_mahasiswa','', '', '');

       return $status_pustaka;



   }

}



if(!function_exists('status_turnitin)')){

    function status_turnitin(){  

       get_instance()->load->model('M_logAktivitas');



        $status_turnitin = get_instance()->M_logAktivitas->readLengkap('*','tbl_turnitin', '', '','','id_mahasiswa','', '', '');

       return $status_turnitin;



   }

}



if(!function_exists('data_mahas)')){

        function data_mahas(){  

           get_instance()->load->model('m_mahasiswa');



           $data_mahas = get_instance()->m_mahasiswa->readLengkap('*','tbl_mahasiswa', '', '',array('id_mahasiswa' => get_instance()->session->userdata('id_mahasiswa')),'id_mahasiswa','', '', '');

           return $data_mahas;



       }

   }

   if (!function_exists('generate_og_meta_tags')) {
    function generate_og_meta_tags($meta, $title, $image) {
        if ($meta === true) {
            return "<meta property='og:url' content='" . current_url() . "'>\n" .
                   "<meta property='og:title' content='" . $title . "'>\n" .
                   "<meta property='og:image' content='" . $image . "'>\n";
        }
        return '';
    }
}

if (!function_exists('cek_ajax')) {
    function cek_ajax()
    {
        $ci =& get_instance();
        if (!$ci->input->is_ajax_request()) {
            echo "akses denied";
            return exit();
        }
    }
}

if (!function_exists('cek_post')) {
    function cek_post()
    {
        if (!count($_POST)) {
            echo "akses denied";
            return exit();
        }
    }
}

function waktu_lalu($timestamp)
{
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}


function tanggal_indo($tanggal)
{
    $bulan = [
        1 =>    'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'oktober',
                'November',
                'Desember'
    ];

    $pecahkan = explode('-', $tanggal);

    return  $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] ;
}


function nama_hari_indo($tgl)
{
    $daftar_hari = [
        "Sunday"    => "Minggu",
        "Monday"    =>"Senin",
        "Tuesday"   => "Selasa",
        "Wednesday" =>"Rabu",
        "Thursday"  => "Kamis",
        "Friday"    => "Jum'at",
        "Saturday"  =>"Sabtu"
    ];

    $hr = date('l', strtotime($tgl));
    $nama_hari = $daftar_hari[$hr];
    return $nama_hari;
}

function pengaturan_tgl($tanggal)
{
    $tgl = substr($tanggal, 8,2);
    $bln = substr($tanggal, 5,2);
    $thn = substr($tanggal, 0,4);

    return $tgl.'/'.$bln.'/'.$thn;
}

function tgl_balik($tanggal)
{
    $tgl = substr($tanggal, 8,2);
    $bln = substr($tanggal, 5,2);
    $thn = substr($tanggal, 0,4);

    return $tgl.'-'.$bln.'-'.$thn;
}

function tgl_jadwal($tanggal)
{
    $tgl = substr($tanggal, 3,2);
    $bln = substr($tanggal, 0,2);
    $thn = substr($tanggal, 6,4);

    return $tgl.'-'.$bln.'-'.$thn;
}

function tgl($tanggal)
{
    
   return $tgl = substr($tanggal, 8,2);
 
}

function thn($tanggal)
{
    
   return $thn = substr($tanggal, 0,4);
 
}

function bulan($tanggal)
{

    $nama_bulan = date('F', strtotime($tanggal));
    return $nama_bulan;
 
}

function thn_adm($tanggal)
{
    
   return $thn = substr($tanggal, 6,4);
 
}

function cari_semester()
{
    date_default_timezone_set('Asia/Jakarta');

    $bulan = date('m');

    switch ($bulan) {
        case 3:
        case 4;
        case 5;
        case 6;
        case 7;
        case 8;
        return "Genap"; 
            break;
        case 9:
        case 10;
        case 11;
        case 12;
        case 1;
        case 2;
        return "Ganjil"; 
            break;
    }

}

function cari_thn_akademik()
{
    date_default_timezone_set('Asia/Jakarta');

    $thn = date('Y');
    $smt = cari_semester();

    if ($smt == "Ganjil") {
        $ket = 1;
    }else{
        $ket = 2;
    }

    $hasil = $thn.$ket;
    return $hasil;

}

function cari_status_akademik()
{
    date_default_timezone_set('Asia/Jakarta');

    $thn = date('Y');
    $smt = cari_semester();

    if ($smt == "Ganjil") {
        $ket = "Ganjil";
    }else{
        $ket = "Genap";
    }

    return $ket;

}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }           
    return $hasil;
}

// Fungsi untuk mengambil data prodi
if (!function_exists('get_prodi')) {
    function get_prodi() {
        // Ambil instance CI
        $ci =& get_instance();
        
        // Load model yang digunakan untuk mengambil data prodi (gantilah dengan nama model yang sesuai)
        $ci->load->model('prodi_model'); 
        
        // Panggil model untuk mengambil data prodi dari database (gantilah dengan metode yang sesuai)
        $data_prodi = $ci->prodi_model->getAllProdi(); 
       

        // Kembalikan data prodi
        return $data_prodi;
    }

}

// Fungsi untuk mengambil data prodi
if (!function_exists('get_jurnal')) {
    function get_jurnal() {
        // Ambil instance CI
        $ci =& get_instance();
        
        // Load model yang digunakan untuk mengambil data jurnal (gantilah dengan nama model yang sesuai)
        $ci->load->model('jurnal_model'); 
        
        // Panggil model untuk mengambil data jurnal dari database (gantilah dengan metode yang sesuai)
        $data_jurnal = $ci->jurnal_model->getAllJurnal(); 
       

        // Kembalikan data jurnal
        return $data_jurnal;
    }

}






if (!function_exists('generate_og_meta_tags')) {
    function generate_og_meta_tags($meta, $title, $image) {
        // Buat tag og meta sesuai dengan variabel yang diberikan
        $og_meta_tags = '<meta property="og:title" content="'.$title.'" />' . PHP_EOL;
        $og_meta_tags .= '<meta property="og:description" content="Deskripsi berita" />' . PHP_EOL; // Ganti dengan deskripsi yang sesuai
        $og_meta_tags .= '<meta property="og:image" content="'.$image.'" />' . PHP_EOL;

        return $og_meta_tags;
    }
}


if (!function_exists('get_setting_data')) {
    function get_setting_data()
    {
        // Load CodeIgniter instance
        $CI = &get_instance();

        // Load the model
        $CI->load->model('M_lengkap');

        // Call the setting method from M_lengkap model
        return $CI->M_lengkap->setting();
    }
}

// Tambahkan fungsi tambahan untuk mengakses semua data setting
if (!function_exists('get_all_settings')) {
    function get_all_settings()
    {
        // Panggil get_all_setting_data untuk mendapatkan semua data setting
        $allSettingData = get_all_setting_data();

        // Ambil nilai setting
        return $allSettingData['setting'];
    }
}


if (!function_exists('send_mail')) {
    function send_mail($subject, $body, $email_address, $website)
    {
        $ci =& get_instance();
        $ci->load->model('M_lengkap');
        $settings = $ci->M_lengkap->fetch_email();

        $ci->load->library('phpmailer_lib');
        $mail = $ci->phpmailer_lib->load();

        $mail->isSMTP();
        $mail->Host         = $settings[0]->host_email;
        $mail->SMTPAuth     = true;
        $mail->Username     = $settings[0]->email;
        $mail->Password     = $settings[0]->pass_email;
        $mail->SMTPSecure   = $settings[0]->SMTP_email;
        $mail->Port         = $settings[0]->port_email;

        $mail->setFrom('no-reply@email.com', $website);
        $mail->addAddress($email_address);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->isHTML(true);

        if (!$mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}















?>