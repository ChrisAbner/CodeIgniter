
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/login');
		}
	}
	public function index()
	{
		$this->load->view("Direccion");
		


	}
}

