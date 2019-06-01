<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

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
		//	$this->get_value();
		$this->load->view('Direccion');
	}

	public function Editar()
	{
		$this->load->view('Editar');
		if ($this->input->get('Editar')) { }
	}
	public function Login()
	{
		$this->load->view('Login');
		if ($this->input->get('Login')) { }
	}


	public function Guardar_Usuario()
	{
		$this->load->model('Usuarios_model');
		$Nombres = $this->input->post('Nombres');
		$Apellidos = $this->input->post('Apellidos');
		$Telefono = $this->input->post('Telefono');
		$Correo = $this->input->post('Correo');

		$Datos = array(
			'Nombres' => $Nombres,
			'Apellidos' => $Apellidos,
			'Correo' => $Correo,
			'Telefono' => $Telefono,
		);

		$this->Usuarios_model->Agregar_Usuario($Datos);
		$this->load->helper('url');
			redirect('http://localhost/CodeIgniter/index.php/Usuarios/Listado');	
	}

	public function Modificar_Usuario()
	{
		$this->load->model('Usuarios_model');
		$Id = $this->input->post('Id');
		$Nombres = $this->input->post('Nombres');
		$Apellidos = $this->input->post('Apellidos');
		$Telefono = $this->input->post('Telefono');
		$Correo = $this->input->post('Correo');
		$Llave = $this->input->get('Editar');

		$Usuarios = "";
		if ($this->input->get("Editar")) {
			$Llave = $this->input->get("Editar");

			$Usuarios = $this->Usuarios_model->Filtro($Llave, "", "", "", "");
		}
		//$this->Usuarios_model->Sobrescribir_Usuario($Datos1, $Datos);

		$Datos = array(
			'Nombres' => $Nombres,
			'Apellidos' => $Apellidos,
			'Correo' => $Correo,
			'Telefono' => $Telefono,
		);
		$Datos1 = array(
			'Id' => $Id,
			'Nombres' => $Nombres,
			'Apellidos' => $Apellidos,
			'Correo' => $Correo,
			'Telefono' => $Telefono,
		);
		$this->Usuarios_model->Modificar_Usuario($Datos1, $Datos);
		if ($this->input->get('Editar')) {
			$Query = array(
				"Usuarios" => $Usuarios[0],
			);

			$this->load->view('Editar', $Query);
		} else {
			$this->Usuarios_model->Modificar_Usuario($Datos1, $Datos);
			$this->load->helper('url');
			redirect('http://localhost/CodeIgniter/index.php/Usuarios/Listado');	
		}
	}

	public function Eliminar_Usuario()
	{
		$this->load->model('Usuarios_model');
		$Id = $this->input->post('Eliminar');
		$Nombres = $this->input->post('Nombres');
		$Apellidos = $this->input->post('Apellidos');
		$Telefono = $this->input->post('Telefono');
		$Correo = $this->input->post('Correo');

		$Datos = array(
			'Nombres' => $Nombres,
			'Apellidos' => $Apellidos,
			'Correo' => $Correo,
			'Telefono' => $Telefono,
		);
		$Datos1 = array(
			'Id' => $Id,
			'Nombres' => $Nombres,
			'Apellidos' => $Apellidos,
			'Correo' => $Correo,
			'Telefono' => $Telefono,
		);

		$Id = array(
			'Id' => $Id,
		);
		$this->Usuarios_model->Eliminar_Usuario($Datos1, $Datos);
		$this->load->helper('url');
			redirect('http://localhost/CodeIgniter/index.php/Usuarios/Listado');
	}

	public function Listado()
	{
		$this->load->model('Usuarios_model');
		$Usuarios = $this->Usuarios_model->Listado();
		if ($this->input->get("Id")) {
			$Id = $this->input->get("Id");
			$Usuarios = $this->Usuarios_model->Filtro($Id, "", "", "", "");
		} elseif ($this->input->get("Nombres")) {
			$Nombres = $this->input->get("Nombres");
			$Usuarios = $this->Usuarios_model->Filtro("", $Nombres, "", "", "");
		} elseif ($this->input->get("Apellidos")) {
			$Apellidos = $this->input->get("Apellidos");
			$Usuarios = $this->Usuarios_model->Filtro("", "", $Apellidos, "", "");
		} elseif ($this->input->get("Telefono")) {
			$Telefono = $this->input->get("Telefono");
			$Usuarios = $this->Usuarios_model->Filtro("", "", "", $Telefono, "");
		} elseif ($this->input->get("Correo")) {
			$Correo = $this->input->get("Correo");
			$Usuarios = $this->Usuarios_model->Filtro("", "", "", "", $Correo);
		} else {
			$Usuarios = $this->Usuarios_model->Listado();
		}

		$Query = array(
			"Query" => $Usuarios,
		);

		$this->load->view('Listado', $Query);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
