<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Direccion">Agregar <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Editar">Editar</a>
        </li>
        <li class="nav-item active">
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
  <h4 style="text-align: center">Listado de usuarios</h4>

  <form class="form-inline" method="GET" enctype="multipart/form-data" action="Listado">
    <h5 style="text-align: center">Filtrar por:</h5>
    <div class="form-row">
      <div class="col">

        <input type="text" class="form-control" name="Nombres" placeholder="Nombre:" action="Listado">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="Apellidos" placeholder="Apellido:" action="Listado">
      </div>
      <div class="col">
        <input type="number" class="form-control" name="Telefono" placeholder="Telefono:" action="Listado">
      </div>
      <div class="col">
        <input type="email" class="form-control" name="Correo" placeholder="Correo:" action="Listado">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </div>
  </form>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr style="text-align: center">
        <th scope="col">Id</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Opcion</th>
        <th scope="col">Opcion</th>
      </tr>
    </thead>

    <?php
    foreach ($Query as $key => $Usuarios) {

      ?>

      <tr style="text-align: center">
        <td><?php echo $Usuarios['Id'] ?></td>
        <td><?php echo $Usuarios['Nombres'] ?></td>
        <td><?php echo $Usuarios['Apellidos'] ?></td>
        <td><?php echo $Usuarios['Telefono'] ?></td>
        <td><?php echo $Usuarios['Correo'] ?></td>
        <form method="GET" action="Modificar_Usuario" enctype="multipart/form-data">
          <td>
            <button class="btn btn-secondary" type="submit">Editar</button>
            <input type="text" name="Editar" value="<?= $Usuarios['Id'] ?>" hidden> </input>
          </td>
        </form>

        <form id="Form1" method="POST" action="Eliminar_Usuario" enctype="multipart/form-data">
          <td>
          <input type="text" name="Eliminar" value="<?= $Usuarios['Id'] ?>" ></input>
            <button class="btn btn-danger" name="Eliminar" onClick="Editar()" type="button">Eliminar</button>
          </td>
        </form>

      </tr>
    <?php
  }
  ?>
  </table>
  </form>
  </div>
</body>

</html>
<script type="text/javascript">
      function Editar() {
        swal({
            title: "¿Esta seguro?",
            text: "Los registros no se pueden recuperar",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Se ha borrado el registro exitosamente", {
                icon: "success",
              }).then(function() {
                window.location = "http://localhost/CodeIgniter/index.php/Usuarios/Listado";
                $("#Form1").submit();
              });
            } else {
              swal("No se ha borrado ningun registro");

            }
          });
      }
    </script>
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
