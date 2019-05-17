<?php

$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos ="formulario";

$conexion = mysqli_connect  ($servidor,$usuario,"") or die ("No se ha podido conectar con el servidor de Base de datos");


$db = mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar a la Base de datos");


    //recuperar las variables
    $Eliminar = $_POST["Eliminar"];
    $Editar = $_POST["Editar"];
    #print_r($Eliminar);
    #return false;
 
//sentencia sql
 
 $sql="delete from usuarios where Nombres='$Eliminar'";

//ejecutamos la sentencia de sql
$ejecutar=mysqli_query($conexion, $sql);
//verificacion de la ejecucioon
if(!$ejecutar){
    echo"Hubo algun error";
}else{
    echo"Datos borrados correctamente <br><a href='index.php'>Volver</a>";
    
}
 
?>
