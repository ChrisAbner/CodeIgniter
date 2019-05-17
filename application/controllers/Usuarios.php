<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Direccion');
	}
	public function Editar()
	{
		$this->load->view('Editar');
	}
	public function Borrarr()
	{
		$this->load->view('Borrar');
	}
	public function Guardar_Usuario(){
		$Nombres=$this->input->post('Nombres');
		$Apellidos=$this->input->post('Apellidos');
		$Telefono=$this->input->post('Telefono');
		$Correo=$this->input->post('Correo');

		$Datos = array(
			'Nombres'=> $Nombres,
			'Apellidos'=> $Apellidos,
			'Correo'=> $Correo,
			'Telefono'=>$Telefono,
		);

		$this->Usuarios_Model->Guardar_Usuario($Datos);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */