<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?
session_start();
$token = $_POST['token'];
 
if($_SESSION['token'] == $token){
    $nombre = $_POST['nombre'];
    echo "Hola " . $nombre;
}else{
    echo "Has intentado acceder sin cumplir con el token";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <a class="navbar-brand" href="http://localhost/CodeIgniter/index.php/Usuarios/login">Formulario</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Direccion">Agregar <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Editar">Editar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Listado">Listado</a>
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
    <h4 style="text-align: center"> Añadir usuario</h4>
    <form action="Guardar_Usuario" method="POST" enctype="multipart/form-data">
      <p class="p-title-0">Nombres:</p>
      <input class="form-control form-control-md" name="Nombres" type="text" placeholder="Introduce un nombre" style="text-align: center" value="" required>
      <br>
      <p class="p-title-0">Apellidos:</p>
      <input class="form-control form-control-md" name="Apellidos" placeholder="Introduce un apellido" type="text" style="text-align: center" value="" required>
      <br>
      <p class="p-title-0">Telefono:</p>
      <input class="form-control form-control-md" name="Telefono" type="number" placeholder="Introduce un telefono" style="text-align: center" value="" required>
      <br>
      <p class="p-title-0">Usuario:</p>
      <input class="form-control form-control-md" name="Usuario" type="text" placeholder="Introduce un usuario" style="text-align: center" value="" required>
      <br>
      <p class="p-title-0">Correo:</p>
      <input class="form-control form-control-md" name="Correo" type="email" placeholder="Introduce un correo" style="text-align: center" value="" required>
      <br>
      <p class="p-title-0">Contraseña:</p>
      <input class="form-control form-control-md" name="Contrasena" type="password" placeholder="Introduce una contraseña" style="text-align: center" value="" required>
      <br>

      <div>
      </div>
      <center>
        <button class=" btn btn-lg btn btn-success" type="submit">Confirmar</button>
      </center>


    </form>
  </div>
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