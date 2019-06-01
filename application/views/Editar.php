<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
if (empty($Usuarios)) {
  $Usuarios['Id'] = "";
  $Usuarios['Nombres'] = "";
  $Usuarios['Apellidos'] = "";
  $Usuarios['Telefono'] = "";
  $Usuarios['Correo'] = "";
}
?>
<!DOCTYPE html>
<html lang="es">

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
        <li class="nav-item active">
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

<body>


  <div class="container">
    <h4 style="text-align: center"> Modificar usuario</h4>
    <form action="Modificar_Usuario" method="POST" enctype="multipart/form-data">

      </select>
      <br>
      <input class="form-control form-control-md" name="Id" type="text" placeholder="Introduce un nombre" style="text-align: center" value="<?= $Usuarios['Id'] ?>" hidden>
      <br>
      <p class="p-title-0">Nombres:</p>
      <input class="form-control form-control-md" id="Id_Nombres" name="Nombres" type="text" placeholder="Introduce un nombre" style="text-align: center" value="<?= $Usuarios['Nombres'] ?>" required>
      <br>
      <p class="p-title-0">Apellidos:</p>
      <input class="form-control form-control-md" id="Id_Apellidos" name="Apellidos" placeholder="Introduce un apellido" type="text" style="text-align: center" value="<?= $Usuarios['Apellidos'] ?>" required>
      <br>
      <p class="p-title-0">Telefono:</p>
      <input class="form-control form-control-md" id="Id_Telefono" name="Telefono" type="number" placeholder="Introduce un telefono" style="text-align: center" value="<?= $Usuarios['Telefono'] ?>" required>
      <br>
      <p class="p-title-0">Correo:</p>
      <input class="form-control form-control-md" id="Id_Correo" name="Correo" type="email" placeholder="Introduce un correo" style="text-align: center" value="<?= $Usuarios['Correo']   ?>" required>
      <br>
      <div>
      </div>
      <center>
        <button class="btn btn-lg btn btn-success" id="Confirmar" onClick="Confirmar(); " type="button">Confirmar</button>
      </center>

    </form>
  </div>
  <script type="text/javascript">
    document.getElementById("Id_Telefono").value = <?php echo $Usuarios["Telefono"] ?>;

    function Confirmar() {
      swal({
        title: "Guardado correctamente",
        text: "Usuario modificado",
        icon: "success",
        button: "Continuar",
      }).then(function() {
        Confirmar.submit();
    window.location = "http://localhost/CodeIgniter/index.php/Usuarios/Listado";
    
});
    }
  </script>
</body>

</html>