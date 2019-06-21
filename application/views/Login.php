<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="http://192.168.50.27/CodeIgniter/assets/CSS/InicioSesion.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
session_start();
$hora = date('H:i');
$session_id = session_id();
$Token = hash('sha512', $hora.$session_id);
 
$_SESSION['Token'] = $Token;
 
//echo $_SESSION['token'];
?>

<!DOCTYPE html>
<html>
<head>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
  
    </div>
  </nav>
  <title>Formulario</title>
</head>

<h4 style="text-align: center"> Iniciar sesión</h4>
<div class="container login-container animated fadeInLeft">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Registro</h3>
                    <form id="Form4" action="Guardar_Usuario" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Usuario" placeholder="Usuario" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="Contrasena" placeholder="Contraseña" value="" required/>
                        </div>
                        <center>
                            <div class="form-group">
                                <input type="button" onClick="Registrar()" id="Btn4" class="btn btn-outline-primary" value="Registrar" />
                            </div>
                        </center>
                    </form>
                </div>
                <script type="text/javascript">
    $("#Btn4").on('click',function Registrar(e){
      e.preventDefault(); 
      swal({
        title: "Guardado correctamente",
        text: "Usuario modificado",
        icon: "success",
        button: "Continuar",
      }).then(function() {
    window.location = "http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado";
    $("#Form4").submit()
    }   
});
});
  </script>
                <div class="col-md-6 login-form-2 bg-primary">
                    <h3>Inicio de sesión</h3>
                    <form action="login" method="POST">
                        <div class="form-group">
                            <input name="Usuario" type="text" class="form-control" placeholder="Usuario" value="" />
                        </div>
                        <div class="form-group">
                            <input name="Contrasena" type="password" class="form-control" placeholder="Contraseña" value="" />
                        </div>
                        <center>
                            <div class="form-group">
                            <button type="submit" class="btn btn-outline-light">Iniciar</button>
                            <input type="text" name="Token" value="<?= $Token ?>" hidden> </input>
                            </div>
                            <div class="form-group">

                                <a href="#" class="ForgetPwd" value="Login">Olvide mi contraseña</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        

</body>
</html>
