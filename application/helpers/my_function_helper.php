<?php 


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
        if ($meta === true) {
            return "<meta property='og:url' content='" . current_url() . "'>\n" .
                   "<meta property='og:title' content='" . $title . "'>\n" .
                   "<meta property='og:image' content='" . $image . "'>\n";
        }
        return '';
    }
}