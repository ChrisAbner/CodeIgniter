<?php 
if (!$this->session->userdata("login")) {
  redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/login');
}
?>

<!DOCTYPE html>
<html lang="es">
<?php $this->load->view('Esencial/Header');?>
<body>
  
  <h4 style="text-align: center">Listado de usuarios</h4>
  <form class="form-inline" method="GET" enctype="multipart/form-data" action="Listado">
    <h5 style="text-align: center">Filtrar por:</h5>
    <div class="form-row container login-container animated fadeInLeft">
      <div class="col ">

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
        <th scope="col">Usuario</th>
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
        <td><?php echo $Usuarios['Usuario'] ?></td>
        <td><?php echo $Usuarios['Correo'] ?></td>
        <form method="GET" action="Modificar_Usuario" enctype="multipart/form-data">
          <td>
            <button class="btn btn-secondary" type="submit">Editar</button>
            <input type="text" name="Editar" value="<?= $Usuarios['Id'] ?>" hidden> </input>
          </td>
        </form>

        <form id="Form1" method="POST" action="Eliminar_Usuario" enctype="multipart/form-data">
          <td>
          <input type="text" name="Eliminar" value="<?= $Usuarios['Id'] ?>" hidden></input>
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
                window.location = "http://192.168.50.27/CodeIgniter/index.php/Usuarios/Listado";
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
