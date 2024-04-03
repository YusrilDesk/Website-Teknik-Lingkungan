<?php 

class Berita extends CI_Controller
{

  function __construct() {
    parent::__construct();
    $this->load->model('M_lengkap');
    $this->load->model('Berita_model');
    $this->load->library('upload');
    $this->load->helper('my_helper');

}

public function index() {
   $data['title'] = 'berita';

   $data['berita'] = $this->Berita_model->all_berita();
    # Template
    $dashboard_user = 'landing_page/berita/v_berita';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data);
    $this->load->view('template_user/footer_user',$data);

}

public function baca_berita($slug_berita)
{
    $data['title'] = 'detail berita';
    $baca_berita = $this->Berita_model->getBerita($slug_berita);
    $berita_lain = $this->Berita_model->beritaLain($slug_berita);



    $this->db->query("UPDATE tbl_berita SET view_berita = view_berita+1 WHERE slug_berita = '$slug_berita'");


    $data = [   
        'baca_berita'   => $baca_berita,
        'berita_lain'   => $berita_lain
    ];

    $meta = true;
    $title = "Baca berita | ".$baca_berita->nama_berita;
    $image = base_url('/uploads/foto_berita/'.$baca_berita->foto_berita);
    $og_meta_tags = generate_og_meta_tags($meta, $title, $image);

    // Tambahkan data yang akan digunakan dalam fungsi berbagi
    $data['share_title'] = $baca_berita->nama_berita;
    $data['share_content'] = substr(strip_tags($baca_berita->isi_berita), 0, 100); // Mengambil sebagian konten (100 karakter pertama) untuk dibagikan
    $data['share_image'] = $image;

    // Panggil view dan lewatkan variabel
    $data['meta'] = $meta;
    $data['title'] = $title;
    $data['image'] = $image;


    $data['total_rows_berita'] = $this->M_lengkap->countDataBerita();

    $dashboard_user = 'landing_page/berita/baca_berita'; #view file;
    $this->load->view('template_user/header_bacaberita', $data);
    $this->load->view('template_user/topbar_user', $data);
    $this->load->view($dashboard_user, $data, FALSE);
    $this->load->view('template_user/footer_user', $data);
}








}

?>
