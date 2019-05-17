<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="es">
<head>
<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
  <a class="navbar-brand" href="#">Formulario</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/index">Agregar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Editar">Editar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Borrar">Eliminar</a>
      </li>
    
    </ul>
  </div>
</nav>
    <title>Formulario</title>
</head>
<body>

<div class="container">
<h4 style="text-align: center"> Modificar usuario</h4>
<form action="Modificar.php" method="POST" enctype="multipart/form-data">

<!--<p class="p-title-0">Id:</p>
<select  class="form-control">
  <option>1</option>
  <option>2</option>
  <option>3</option>
</select>-->
<p class="p-title-0">Id:</p>
<input class="form-control form-control-md" name="Id" type="text" placeholder="Introduce un id" style="text-align: center" value=""  required>
<br>
<p class="p-title-0">Nombres:</p>
<input class="form-control form-control-md" name="Nombres" type="text" placeholder="Introduce un nombre" style="text-align: center" value=""  required>
	 <br>
   <p class="p-title-0">Apellidos:</p>
<input class="form-control form-control-md" name="Apellidos" placeholder="Introduce un apellido" type="text" style="text-align: center" value=""  required>
	 <br>
   <p class="p-title-0">Telefono:</p>
<input class="form-control form-control-md" name="Telefono" type="text" placeholder="Introduce un telefono" style="text-align: center" value=""  required>
	 <br>
   <p class="p-title-0">Correo:</p>
<input class="form-control form-control-md" name="Correo" type="text" placeholder="Introduce un correo" style="text-align: center" value=""  required>
	 <br>
		<div>
	</div>
    <center>    
    <button class="btn btn-lg btn btn-primary" type="submit">Confirmar</button>
    </center>
    
			
		</form>
	</div>
</body>
</html>