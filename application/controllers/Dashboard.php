<?php 
class Dashboard extends CI_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->model('m_pustaka');

		if ($this->session->userdata('username')=== null) {
			$text = 'Anda Belum Login!';
			$this->session->set_flashdata(
				'pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$text.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
			);
			redirect('auth');
		}
	}

	public function index(){
		$data['title'] = 'dashboard';


		

		$data_pustaka = $this->m_pustaka->get_mahasiswa($this->session->userdata('id_mahasiswa'));
		if ($data_pustaka == NULL) {
			$data['data_null'] = 0;
		}else{
			$data['data_null'] = 1;
			$data['data_pustaka'] = $data_pustaka;
		}
		















		# Template
		$dashboard_admin = 'admin/dashboard_admin';
		$this->load->view('template_admin/header_admin',$data);
		$this->load->view('template_admin/sidebar_admin',$data);
		$this->load->view($dashboard_admin,$data);
		$this->load->view('template_admin/footer_admin',$data);
	}

	



}

?>
