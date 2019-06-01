<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="http://localhost/CodeIgniter/assets/CSS/InicioSesion.css">

<head>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <a class="navbar-brand" href="http://localhost/CodeIgniter/index.php/Usuarios/Login">Formulario</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/index">Agregar <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Editar">Editar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Listado">Listado</a>
        </li>

      </ul>
    </div>
  </nav>
  <title>Formulario</title>
</head>

<div class="container login-container ">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Registro</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Correo electronico" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" value="" />
                        </div>
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="Registrar" />
                            </div>
                        </center>
                    </form>
                </div>
                <div class="col-md-6 login-form-2 bg-primary">
                    <h3>Inicio de sesión</h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input name="CORREO" type="email" class="form-control" placeholder="Correo electronico" value="" />
                        </div>
                        <div class="form-group">
                            <input name="CONTRASENA" type="password" class="form-control" placeholder="Contraseña" value="" />
                        </div>
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-light" value="Iniciar" />
                            </div>
                            <div class="form-group">

                                <a href="#" class="ForgetPwd" value="Login">Olvide mi contraseña</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>