<?php
class Usuarios_model extends CI_Model
{


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // $this->load->model('Usuarios_Model');
    }

    public function login($username, $password){
		$this->db->where("Usuario", $username);
		$this->db->where("Contrasena", $password);

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

    public function Agregar_Usuario($Datos)
    {
        $this->db->insert('usuarios', $Datos);
    }

    public function Token($Datos, $where)
    {
        print_r($Datos);
        print_R($where);
        $this->db->update('usuarios',$Datos, "Usuario =". $where['Usuario']);
        //$this->db->update('usuarios', $Datos, array('Id' => $Datos1["Id"]));
        return true;
    }

    public function Modificar_Usuario($Datos1, $Datos)
    {
        $this->db->update('usuarios', $Datos, array('Id' => $Datos1["Id"]));
        return true;
    }

    public function Eliminar_Usuario($Datos1, $Datos)
    {
        $this->db->delete('usuarios',  array('Id' => $Datos1["Id"]));
        //$this->db->where(array('Id'=>$Datos1["Id"]));
        return true;
        
    }

    public function Listado()
    {
        $Query = $this->db->get('usuarios');
        return  $Query->result_array();
    }

    public function Filtro($Id = "", $Nombres = "", $Apellidos = "", $Telefono = "", $Correo = "")
    {
        if ($Id != "") {
            $Filtrar = $this->db->get_where('usuarios', array('Id' => $Id));
        } elseif ($Nombres != "") {
            $Filtrar = $this->db->get_where('usuarios', array('Nombres' => $Nombres));
        } elseif ($Apellidos != "") {
            $Filtrar = $this->db->get_where('usuarios', array('Apellidos' => $Apellidos));
        } elseif ($Telefono != "") {
            $Filtrar = $this->db->get_where('usuarios', array('Telefono' => $Telefono));
        } elseif ($Correo != "") {
            $Filtrar = $this->db->get_where('usuarios', array('Correo' => $Correo));
        }
        return $Filtrar->result_array();
    }

}
