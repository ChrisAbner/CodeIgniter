
<?php

$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos ="formulario";

$conexion = mysqli_connect  ($servidor,$usuario,"") or die ("No se ha podido conectar con el servidor de Base de datos");


$db = mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar a la Base de datos");


    //recuperar las variables
    $Nombres = $_POST["Nombres"];
    $Apellidos =$_POST["Apellidos"];
    $Telefono =$_POST["Telefono"];
    $Correo =$_POST["Correo"];
    
 
//sentencia sql
$sql="INSERT INTO usuarios 
(Nombres,Apellidos,Telefono,Correo) 
VALUES ('$Nombres','$Apellidos','$Telefono','$Correo')";

//ejecutamos la sentencia de sql
$ejecutar=mysqli_query($conexion, $sql);
//verificacion de la ejecucioon
if(!$ejecutar){
    echo"Hubo algun error";
}else{
    echo"Datos guardado correctamente <br><a href='index.php'>Volver</a>";
    
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Refresh" content="1" URL="Listado.php">
    <title>Formulario</title>
</head>
<body>
    
</body>
</html>