<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		 # Template
    $dashboard_admin = 'landing_page/landingpage';#view file;
 
    $this->load->view($dashboard_admin);
	}
}
