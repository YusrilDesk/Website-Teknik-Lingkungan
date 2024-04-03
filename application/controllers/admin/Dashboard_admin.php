<?php 
class Dashboard_admin extends CI_Controller
{

  function __construct() {
    parent::__construct();
    $this->load->model('M_lengkap');

    if (!$this->session->userdata('username')) {
      $text = 'Anda Belum Login!';
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $text . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('auth');
    }
  }
  
  public function index(){

    $data['title'] = 'dashboard';
    $data ['setting'] = $this->M_lengkap->setting();


    # Template
    $dashboard_admin = 'admin/dashboard';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
  }

  public function tambah(){

    $data['title'] = 'Tambah Data';

    # Template
    $dashboard_admin = 'admin/tambah_data';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
  }

  public function edit(){
    if(!$this->uri->segment(4)){redirect('admin/data_admin');}
    $id=$this->uri->segment(4);
    $data['title'] = 'Edit Data';
    $data['tunggakan'] = $this->M_tunggakan->get($id);

    # Template
    $dashboard_admin = 'admin/edit_data';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
  }

  public function update() {
        // csrfValidate();
        // POST
    $data['id_tunggakan']      = $this->input->post('id_tunggakan');
    $data['id_mahasiswa'] = $this->input->post('id_mahasiswa');
    $data['nim'] = $this->input->post('nim');
    $data['prodi'] = $this->input->post('prodi');
    $data['sejak_tanggal'] = $this->input->post('sejak_tanggal');
    $this->M_tunggakan->update($data);
    
    // ALERT
    $text = 'Data user '.$this->input->post('id_mahasiswa').' berhasil di update';
    $status = 'success';
    $this->session->set_flashdata(
      'pesan','<div class="alert alert-'.$status.' alert-dismissible fade show" role="alert">'.$text.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
    );

    redirect('admin/data_admin');
  }

  public function detail(){
    if(!$this->uri->segment(4)){redirect('admin/data_admin');}

    $data['title'] = 'Detail Data';
    $id = $this->uri->segment(4);
    $idmahasiswa = $this->session->userdata('id_mahasiswa');

    
    $data ['detail'] = $this->M_tunggakan->get($id);
    $data ['bukti'] = $this->M_tunggakan->getwis($id);




    # Template
    $dashboard_admin = 'admin/detail_data';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
  }

  public function delete() {
        // POST
    $id = $this->uri->segment(4);
    $this->M_tunggakan->delete($id);

    redirect('admin/data_admin');

  }   




}

?>
