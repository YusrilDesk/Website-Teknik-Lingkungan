<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model dan library yang diperlukan
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }

    public function index() {
     $data['title'] = 'Login';


    # Template
    $dashboard_admin = 'admin/login';#view file;
    $this->load->view($dashboard_admin,$data);
}

public function proses_login() {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('admin/login');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      
      $user = $username;
      $pass = sha1($password);
      
      $cek  = $this->M_login->cek_login($user, $pass);
      if($cek->num_rows() > 0){

        foreach ($cek->result() as $ck) {

            $sess_data['id'] = $ck->id;

            $sess_data['username']   = $ck->username;

            $sess_data['nama'] = $ck->nama;

            $sess_data['foto_admin'] = $ck->foto_admin;

            $this->session->set_userdata($sess_data);
        }

        redirect('admin/dashboard_admin');
        
    }else {
                // Login gagal, tampilkan pesan error
        $this->session->set_flashdata('pesan',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username atau Password Anda Salah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        $this->load->view('admin/login');
    }
}
}

public function logout() {
        // Hapus session dan redirect ke halaman admin/auth
    $this->session->sess_destroy();
    redirect('admin/auth');
}

}