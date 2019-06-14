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
	public function __construct()
	{
		parent::__construct();


		$this->load->model("Usuarios_model");
	}
	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect('http://192.168.50.27/CodeIgniter/index.php/Dashboard');
		} else {
			$this->load->view("login");
		}
	}

	public function Editar()
	{
		$this->load->view('Editar');
		if ($this->input->get('Editar')) { }
	}
	public function Direccion()
	{
		$this->load->view('Direccion');
		if ($this->input->get('Direccion')) { }
	}
	public function login()
	{
		$this->load->view('login');
		$this->load->model('Usuarios_model');
		$username = $this->input->post("Usuario");
		$password = $this->input->post("Contrasena");
		$res = $this->Usuarios_model->login($username, sha1($password));

		if (!$res) {
			$this->session->set_flashdata("error", "El usuario y/o contraseña son incorrectos");
		} else {
			$data  = array(
				'Id' => $res->Id,
				'Nombres' => $res->Nombres,
				'login' => TRUE
			);

			$this->session->set_userdata($data);
			$hora = date('H:i');
			$session_id = session_id();
			$Token = hash('sha1', $hora . $session_id);
			$_SESSION['Token'] = $Token;
			$Usuario = $this->input->post('Usuario');
			$Token = $this->input->post('Token');
			$_SESSION['Token'] = $_POST['Token'];
			//$Token = $this->input->post($_SESSION['Token']);
			/////////////////////////////////////////////////////////////////
			$name   = 'Auth_Token';
			$value  = $Token;
			$expire = time() + 1000;
			$path  = '/';
			$secure = TRUE;
			setcookie($name, $value, $expire, $path);
			/////////////////////////////////////////////////////////////////
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['Usuario'] = $_POST['Usuario'];
			$_SESSION['ip'] = sha1(time() . rand() . $_SERVER['SERVER_NAME']);
			setcookie('Ip', $_SESSION['ip']);
			/////////////////////////////////////////////////////////////////
			
			$Datos = array(
				'Token' => $Token,
			);
			$where = array(
				'Usuario' => $Usuario,

				//'Token' => $Token,
			);
			
			$this->load->helpers('site',$_SESSION['Token']);
			//	$this->load->helpers('site');
			$this->load->helper('cookie');
			$this->Usuarios_model->Token($Datos, $where);
			redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/Direccion');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/login');
	}


	public function Guardar_Usuario()
	{
		$this->load->model('Usuarios_model');
		//$this->load->library('encryption');
		$Nombres = $this->input->post('Nombres');
		$Apellidos = $this->input->post('Apellidos');
		$Telefono = $this->input->post('Telefono');
		$Usuario = $this->input->post('Usuario');
		$Correo = $this->input->post('Correo');
		$Contrasena = sha1($this->input->post('Contrasena'));

		$Datos = array(
			'Nombres' => $Nombres,
			'Apellidos' => $Apellidos,
			'Correo' => $Correo,
			'Telefono' => $Telefono,
			'Usuario' => $Usuario,
			'Contrasena' => $Contrasena,
		);

		$this->Usuarios_model->Agregar_Usuario($Datos);
		$this->load->helper('url');
		redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado');
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
			redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado');
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
		redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado');
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
