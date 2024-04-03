<?php 

class Landing_page extends CI_Controller
{

  function __construct() {
    parent::__construct();
    $this->load->model('M_lengkap');
    $this->load->library('upload');
    $this->load->model('Berita_model');
    $this->load->helper('my_helper');


  }
  
  public function index(){

    $data['title'] = 'Landing_page';
    $data['berita'] = $this->Berita_model->home_berita();
    $data['berita_terbaru'] = $this->M_lengkap->get_latest_news();
    $data['sambutan'] = $this->M_lengkap->getKetuaSambutan();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();
    $data['slider'] = $this->M_lengkap->ambil_data_slider();

    
    $data['total_rows_berita'] = $this->M_lengkap->countDataBerita();
    $data['total_rows_sop'] = $this->M_lengkap->countDataSop();
    $this->load->language('common');
    


    # Template
    $dashboard_admin = 'landing_page/landingpage';#view file;

    $this->load->view($dashboard_admin,$data);

  }

  public function change_language($language) {
    $this->session->set_userdata('site_lang', $language);
    redirect($_SERVER['HTTP_REFERER']); // Redirect ke halaman sebelumnya
}

public function get_articles($language) {
    $title_column = ($language == 'english') ? 'title_en' : 'title_id';
    $this->db->select($title_column);
    return $this->db->get('articles')->result_array();
}

  public function sejarah(){

    $data['title'] = 'sejarah';

    $data['sambutan'] = $this->M_lengkap->getKetuaSambutan();
    $data['berita'] = $this->M_lengkap->ambil_data_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_sejarah';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function akreditasi(){

    $data['title'] = 'akreditasi';

    $data['akreditasi'] = $this->M_lengkap->getAkreditasi();
    $data['berita'] = $this->M_lengkap->ambil_data_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_akreditasi';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function visi_misi(){

    $data['title'] = 'visi_misi';
    $data['visi'] = $this->M_lengkap->getvisi();
    $data['misi'] = $this->M_lengkap->getmisi();
    $data['tujuan'] = $this->M_lengkap->getTujuan();

    $data['berita'] = $this->Berita_model->home_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_visimisi_user';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function struktur_organisasi(){

    $data['title'] = 'struktur';
    $data['struktur'] = $this->M_lengkap->getStruktur();
    $data['foto'] = $this->M_lengkap->getFotoStruktur();
    $data['berita'] = $this->Berita_model->home_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_struktur_user';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function pengumuman(){

    $data['title'] = 'pengumuman';
    $data['berita'] = $this->Berita_model->home_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();


    # Template
    $dashboard_user = 'landing_page/v_pengumuman';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function dokumenDAKA(){

   $data['title'] = 'sop';

   $data['berita'] = $this->Berita_model->home_berita();
   $data['dokumen'] = $this->M_lengkap->ambil_data_sop();

   

   $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_dokumen';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function kursus(){

   $data['title'] = 'kursus';

   $data['kursus'] = $this->M_lengkap->ambil_data_kursus();

   


    # Template
    $dashboard_user = 'landing_page/v_kursus';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function laporan_anggaran(){

   $data['title'] = 'anggaran';

   $data['berita'] = $this->Berita_model->home_berita();
   $data['anggaran'] = $this->M_lengkap->get_anggaran();
   

   $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_laporan_anggaran';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }

  public function detail_anggaran($anggaran_id) {
    $data['title'] = 'detail_anggaran';
    $data['detail'] = $this->M_lengkap->getDetailAnggaranById($anggaran_id);

    # Template
    $detail_page = 'landing_page/v_detail_anggaran'; 
    $this->load->view('template_user/header_user', $data);
    $this->load->view('template_user/topbar_user', $data);
    $this->load->view($detail_page, $data);
    $this->load->view('template_user/footer_user', $data);
  }

  public function laporan_kinerja() {
    // Mendapatkan nilai dari input
    $year = $this->input->get('filter_waktu');
    $jenis_dokumen = $this->input->get('filter_jenis_dokumen');

    // Mendapatkan data laporan berdasarkan tahun dan jenis dokumen
    $data['title'] = 'laporan';
    $data['laporan'] = $this->M_lengkap->get_laporan_by_year($year, $jenis_dokumen);
    $data['berita'] = $this->Berita_model->home_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    // Memuat view
    $dashboard_user = 'landing_page/v_laporan_kinerja'; // Nama view file
    $this->load->view('template_user/header_user', $data);
    $this->load->view('template_user/topbar_user', $data);
    $this->load->view($dashboard_user, $data);
    $this->load->view('template_user/footer_user', $data);
  }

  public function rencana_tahunan(){

   $data['title'] = 'rencana_tahunan';
   $data['rencana2'] = $this->M_lengkap->get_rencana_tahunan();




    # Template
    $dashboard_user = 'landing_page/v_rencana_tahunan';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data);
    $this->load->view('template_user/footer_user',$data);


  }

  public function rencana_strategis(){

   $data['title'] = 'rencana_strategis';
   $data['rencana'] = $this->M_lengkap->get_rencana_strategis();




    # Template
    $dashboard_user = 'landing_page/v_rencana_strategis';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data);
    $this->load->view('template_user/footer_user',$data);


  }

  public function tugas_pokok(){

    $data['title'] = 'tugas_pokok';
    $data['tugas'] = $this->M_lengkap->getTugasPokok();
    $data['berita'] = $this->Berita_model->home_berita();
    $data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();

    # Template
    $dashboard_user = 'landing_page/v_tgspokok_user';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data,FALSE);
    $this->load->view('template_user/footer_user',$data);


  }



  public function baca_berita($slug_berita)
  {
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

        // Load helper my_helper


        // Panggil view dan lewatkan variabel
    $data['meta'] = $meta;
    $data['title'] = $title;
    $data['image'] = $image;

     $dashboard_user = 'landing_page/berita/baca_berita';#view file;
     $this->load->view('template_user/header_user',$data);
     $this->load->view('template_user/topbar_user',$data);
     $this->load->view($dashboard_user,$data,FALSE);
     $this->load->view('template_user/footer_user',$data);

   }

   public function filterByDivisi() {
        // Mendapatkan data divisi dari form
    $data['title'] = 'Kegiatan';
    $divisi = $this->input->get('divisi');
    $data['detail_berita'] = $this->M_lengkap->getDetailBeritaById($id_berita);
        // Panggil model untuk mengambil berita berdasarkan divisi
    $data['daftar_berita'] = $this->M_lengkap->beritadivisi($divisi);

        // Load view untuk menampilkan hasil filter
        $dashboard_user = 'landing_page/v_berita';#view file;
        $this->load->view('template_user/header_user',$data);
        $this->load->view('template_user/topbar_user',$data);
        $this->load->view($dashboard_user,$data);
        $this->load->view('template_user/footer_user',$data);
      }


      public function contact(){

        $data['title'] = 'contact';




    # Template
    $dashboard_user = 'landing_page/v_contact';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data);
    $this->load->view('template_user/footer_user',$data);
    

  }


}

?>
