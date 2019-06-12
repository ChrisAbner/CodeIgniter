<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
if (!$this->session->userdata("login")) {
  redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/login');
}
?>

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
    <a class="navbar-brand" href="http://192.168.50.27/CodeIgniter/index.php/Usuarios/login">Formulario</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="http://192.168.50.27/CodeIgniter/index.php/Usuarios/Direccion">Agregar <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="http://192.168.50.27/CodeIgniter/index.php/Usuarios/Editar">Editar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado">Listado</a>
        </li>

      </ul>
    </div>
    <form id="Form2" action="logout" class="form-inline my-2 my-lg-0">
            <button class="btn btn-secondary my-2 my-sm-0" onClick="Cerrar()" type="button" >Cerrar sesión</button>
          </form>
  </nav>
  <title>Formulario</title>
</head>
<body>


  <div class="container">
    <h4 style="text-align: center"> Modificar usuario</h4>
    <form id="Form2" action="Modificar_Usuario" method="POST" enctype="multipart/form-data">

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
        <button id="Btn1" class="btn btn-lg btn btn-success"  onClick="Confirmar()" type="submit">Confirmar</button>
      </center>

    </form>
  </div>
  <script type="text/javascript">
    document.getElementById("Id_Telefono").value = <?php echo $Usuarios["Telefono"] ?>;

    $("#Btn1").on('click',function Confirmar(e){
      e.preventDefault(); 
      swal({
        title: "Guardado correctamente",
        text: "Usuario modificado",
        icon: "success",
        button: "Continuar",
      }).then(function() {
    window.location = "http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado";
    $("#Form2").submit()
    }   
});
});
  </script>
</body>

</html>
<script type="text/javascript">
      function Cerrar() {
        swal({
            title: "¿Esta seguro?",
            text: "Recuerde memorizar su contraseña",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Hasta pronto", {
                icon: "success",
              }).then(function() {
                $("#Form2").submit();
              });
            } else {
              swal("Se ha cancelado la operacion");

            }
          });
      }
    </script>