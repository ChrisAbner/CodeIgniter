
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_Token extends CI_Controller{
   
session_start();
$hora = date('H:i');
$session_id = session_id();
$token = hash('sha256', $hora.$session_id);
 
$_SESSION['token'] = $token;
 
echo $_SESSION['token'];
?>
<br>
<a href="formulario.php">formulario</a>
   }
