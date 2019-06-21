<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
//En los controladores se hace asi
echo $this->session->userdata('site');
//Pero en helpers y librerias, haces asi
$CI = &get_instance();
echo $CI->session->userdata('site');

$ci = &get_instance();
$ci->load->database();

 */
$this->db->select('Nombres');
$this->db->where('Token', $_SESSION['Token']);
$query = $this->db->get('usuarios');
$row = $query->row();
$_SESSION['Nombres'] = $row->Nombres;

//print_r(array(['Usuarios']));
//print_r($query);

$Objeto = new Objeto(); // Objeto
$Objeto->Usuario = $_POST['Usuario'];
$Objeto->Token = $_POST['Token'];
$Objeto->Ip = $_SESSION['ip'];

//printCaracteristicas($Objeto);
echo "\n";

echo 'Datos del usuario: ' . $Objeto->Usuario;
echo "\n";
echo 'Datos del token: ' . $Objeto->Token;
echo "\n";
echo 'Datos de la ip: ' . $Objeto->Ip;
echo "\n";
print_r($Objeto->Usuario);
echo "\n";
print_r($Objeto);
//print_r(Objeto());
//return false;

$this->load->view('Direccion');


if (!$_SESSION['Nombres']) {
    /////////////////////////////////////////////////////////////////
    $name   = 'Usuario';
    $value  = $_SESSION['Token'];
    $expire = time() + 1000;
    $path  = '/';
    $secure = TRUE;
    setcookie($name, $value, $expire, $path);
    /////////////////////////////////////////////////////////////////
    return true;
} else {
    return false;
}

class Objeto
{
    // Contenido de la clase
    public $Usuario;
    public $Token;
    public $Ip;

    public function getUsuario()
    {
        return $this->Usuario;
    }

    public function getToken()
    {
        return $this->Token;
    }

    public function getIp()
    {
        return $this->Ip;
    }
}

function printCaracteristicas($Objeto_Concreto)
{
    echo 'Usuario: ' . $Objeto_Concreto->postUsuario();
    echo "\n";
    echo 'Token: ' . $Objeto_Concreto->postToken();
    echo "\n";
    echo 'Ip: ' . $Objeto_Concreto->postIp();
}
