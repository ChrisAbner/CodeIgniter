
<?php

$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos ="formulario";

$conexion = mysqli_connect  ($servidor,$usuario,"") or die ("No se ha podido conectar con el servidor de Base de datos");


$db = mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar a la Base de datos");


    //recuperar las variables
    $Id= $_POST["Id"];
    $Nombres = $_POST["Nombres"];
    $Apellidos =$_POST["Apellidos"];
    $Telefono =$_POST["Telefono"];
    $Correo =$_POST["Correo"];
    
 
//sentencia sql
$sql="update usuarios set Nombres='$Nombres', Apellidos='$Apellidos', Telefono='$Telefono', Correo='$Correo' WHERE Id='$Id'";
//ejecutamos la sentencia de sql
$ejecutar=mysqli_query($conexion, $sql);
//verificacion de la ejecucioon
if(!$ejecutar){
    echo"Hubo algun error";
}else{
    echo"Datos guardado correctamente <br><a href='index.php'>Volver</a>";
    
}
 
?>