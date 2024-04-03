<?php 

class Sop extends CI_Controller
{

  function __construct() {
    parent::__construct();
    $this->load->model('M_lengkap');
    $this->load->library('upload');

  }

  public function index() {
    $data['title'] = 'SOP';

   

       # Template
    $dashboard_user = 'SOP/v_sop';#view file;
    $this->load->view('template_user/header_user',$data);
    $this->load->view('template_user/topbar_user',$data);
    $this->load->view($dashboard_user,$data);
    $this->load->view('template_user/footer_user',$data);
    
    }

    public function get_sops() {
        $sops = $this->M_lengkap->get_sops();
        echo json_encode(['data' => $sops]);
    }
  
  

  



}

?>
