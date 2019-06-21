
<?
session_start();
$token = $_POST['token'];

if ($_SESSION['token'] == $token) {
  $nombre = $_POST['nombre'];
  echo "Hola " . $nombre;
} else {
  echo "Has intentado acceder sin cumplir con el token";
}
?>
<?php
if (!$this->session->userdata("login")) {
  redirect('http://192.168.50.27/CodeIgniter/index.php/Usuarios/login');
}
?>

<!DOCTYPE html>
<html lang="es">
<?php $this->load->view('Esencial/Header');?>

<body>
  <div class="container login-container animated fadeInLeft">
    <h4 style="text-align:center">
      <?php echo ('Bienvenido '); ?>
      <?php print_r($this->session->userdata('Nombres'))?>
    </h4>
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

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>
<script>
  window.addEventListener("load", function() {
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#edeff5",
          "text": "#838391"
        },
        "button": {
          "background": "#4b81e8"
        }
      },
      "theme": "classic",
      "content": {
        "message": "Este sitio web utiliza cookies para mejorar su experiencia en el sitio web.",
        "dismiss": "Entendido",
        "link": "Leer más",
        "href": "#"
      }
    })
  });
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