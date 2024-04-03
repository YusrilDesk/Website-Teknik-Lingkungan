<?php 

class Pengurus extends CI_Controller
{

  function __construct() {
    parent::__construct();
    $this->load->model('M_lengkap');
    $this->load->library('upload');

  }
  
  public function index(){

    $data['title'] = 'Tim';
    $data['tim'] = $this->M_lengkap->ambil_data();

    
   

    # Template
    $dashboard_user = 'landing_page/v_tim';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data);
    $this->load->view('template_user/footer_user',$data);
    


   
  // $email = 'yusril@gmail.com';
  // $pecah = explode('@', $email);
  // var_dump($pecah);
  // die();
  }

  



}

?>
