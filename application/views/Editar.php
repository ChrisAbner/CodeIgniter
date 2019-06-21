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

<?php $this->load->view('Esencial/Header');?>
<body>


  <div class="container login-container animated fadeInLeft">
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