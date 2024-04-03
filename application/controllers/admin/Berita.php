<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model', 'berita');
        $this->load->model('kategori_model', 'kategori');

        if (!$this->session->userdata('username')) {
          $text = 'Anda Belum Login!';
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $text . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('auth');
      }


  }

  public function index()
  {
    $berita = $this->berita->getAllBerita();

    $data = [   'title'     => 'Admin - List Berita',
    'berita'    => $berita
];

         # Template
    $dashboard_admin = 'pemberitaan/v_berita';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}



public function tambah()
{
    $kategori   = $this->kategori->getAllKategori();
    $akhir      = $this->berita->akhir();

    $this->form_validation->set_rules('nama_berita', 'Judul Berita', 'required|trim',
        ['required' => '%s harus di isi']);
    $this->form_validation->set_rules('isi_berita', 'isi_berita', 'required|trim',
        ['required' => '%s tidak boleh kosong']);
    $this->form_validation->set_rules('status_berita', 'status_berita', 'required|trim',
        ['required' => '%s tidak boleh kosong']);


    if ($this->form_validation->run()) {

        $config['upload_path']      = './uploads/foto_berita/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '5400';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto_berita')){

            $data = array(  'title'     => 'Tambah Berita',
                'kategori'  => $kategori,
                'errors'    => $this->upload->display_errors()
            );


                     # Template
    $dashboard_admin = 'pemberitaan/tambah_berita';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data,FALSE);
    $this->load->view('template_admin/footer_admin',$data);
    
}else{
                // masuk database

    $upload_foto = array('upload_data' => $this->upload->data());
                // CREATE THUMBNAIL GAMBAR
    $config['image_library']    = 'gd2';
    $config['source_image']     = './assets/img/berita/'.$upload_foto['upload_data']['file_name'];
    $config['new_image']        = './assets/img/berita/thumbs/'.$upload_foto['upload_data']['file_name'];
    $config['create_thumb']     = TRUE;
    $config['maintain_ratio']   = TRUE;
                $config['width']            = 2000; //pixel
                $config['height']           = 2000; //pixel
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();


                
                $url_akhir  = $akhir->id_berita + 1;
                $slug       = $url_akhir.'-'.url_title($this->input->post('nama_berita'), 'dash', TRUE);

                $data = [   'id'           => $this->session->userdata('id'),
                'id_divisi'=> $this->input->post('tbl_divisi'),
                'slug_berita'       => $slug,
                'nama_berita'             => $this->input->post('nama_berita'),
                'isi_berita'               => $this->input->post('isi_berita'),
                'status_berita'     => $this->input->post('status_berita'),
                'foto_berita'            => $upload_foto['upload_data']['file_name'],
                'waktu'           => date('Y-m-d')];

                
                $this->berita->tambah($data);

                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Data Berita berhasil di tambah ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/berita');
            }}


            $data = [   'title'     => 'Admin - Tambah Berita',
            'kategori'  => $kategori
        ];

                 # Template
    $dashboard_admin = 'pemberitaan/tambah_berita';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data,FALSE);
    $this->load->view('template_admin/footer_admin',$data);

}

public function edit($id_berita)
{

    $berita     = $this->berita->getById($id_berita);
    $kategori   = $this->kategori->getAllKategori();
    $akhir      = $this->berita->akhir();

    $this->form_validation->set_rules('nama_berita', 'Nama Berita', 'trim');
    $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim');
    $this->form_validation->set_rules('status_berita', 'Status Berita', 'trim');

    
    if ($this->form_validation->run()) {
        if(!empty($_FILES['foto_berita']['name'])){
            $config['upload_path']      = './uploads/foto_berita/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '3400';
            $config['max_width']        = '3024';
            $config['max_height']       = '3024';
            
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('foto_berita')){


                $data = [   'title'     => 'Edit Berita',
                'kategori'  => $kategori,
                'berita'    => $berita,
                'errors'    => $this->upload->display_errors()
            ];
                $dashboard_admin = 'pemberitaan/edit_berita';#view file;
                $this->load->view('template_admin/header_admin',$data);
                $this->load->view('template_admin/sidebar_admin',$data);
                $this->load->view($dashboard_admin,$data,FALSE);
                $this->load->view('template_admin/footer_admin',$data);

            }else{

            // masuk database

                $upload_foto = array('upload_data' => $this->upload->data());
            // CREATE THUMBNAIL GAMBAR
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/img/berita/'.$upload_foto['upload_data']['file_name'];
                $config['new_image']        = './assets/img/berita/thumbs/'.$upload_foto['upload_data']['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
            $config['width']            = 2000; //pixel
            $config['height']           = 2000; //pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            if ($berita->foto_berita !="") {
                unlink('uploads/foto_berita/'.$berita->foto_berita);
            }

            $url_akhir  = $akhir->id_berita + 1;
            $slug       = $url_akhir.'-'.url_title($this->input->post('nama_berita'), 'dash', TRUE);

            $data = [   'id_berita'         => $id_berita,
            'id'           => 1,
            'id_divisi'=> $this->input->post('tbl_divisi'),
            'slug_berita'       => $slug,
            'nama_berita'             => $this->input->post('nama_berita'),
            'isi_berita'               => $this->input->post('isi_berita'),
            'status_berita'     => $this->input->post('status_berita'),
            'foto_berita'            => $upload_foto['upload_data']['file_name'],
            'waktu'           => date('Y-m-d')];
            


            $this->berita->edit($data);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Berita berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/berita');

        }} else {

            // proses edit tanpa mengganti gambar/foto
            $url_akhir  = $akhir->id_berita + 1;
            $slug       = $url_akhir.'-'.url_title($this->input->post('nama_berita'), 'dash', TRUE);


            $data = [   'id_berita'         => $id_berita,
            'id'           => 1,
            'id_divisi'=> $this->input->post('tbl_divisi'),
            'slug_berita'       => $slug,
            'nama_berita'             => $this->input->post('nama_berita'),
            'isi_berita'               => $this->input->post('isi_berita'),
            'status_berita'     => $this->input->post('status_berita'),
                        // 'gambar'         => $upload_foto['upload_data']['file_name'],
            'waktu'           => date('Y-m-d')
        ];




        $this->berita->edit($data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><strong>sukses ! </strong> Berita berhasil di update ! <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/berita');
    }}


    $data = [  'title'      => 'Admin - Edit Berita',
    'kategori'  => $kategori,
    'berita'    => $berita
];

          $dashboard_admin = 'pemberitaan/edit_berita';#view file;
          $this->load->view('template_admin/header_admin',$data);
          $this->load->view('template_admin/sidebar_admin',$data);
          $this->load->view($dashboard_admin,$data,FALSE);
          $this->load->view('template_admin/footer_admin',$data);
      }


      public function hapus($id_berita)
      {
        $berita = $this->berita->getById($id_berita);
        
        unlink('./uploads/foto_berita/'.$berita->foto_berita);
        $data = ['id_berita'    => $id_berita];

        $this->berita->delete($data);
        $this->session->set_flashdata('sukses', ' di hapus');
        redirect('admin/berita');
    }







}
