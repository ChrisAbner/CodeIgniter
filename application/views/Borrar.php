<?php 
$Conexion = mysqli_connect('localhost','root','','formulario');
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Editar">Editar</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/CodeIgniter/index.php/Usuarios/Borrar">Eliminar</a>
      </li>
    
    </ul>
  </div>
</nav>
    <title>Formulario</title>
</head>
<body>
<h4 style="text-align: center">Eliminar usuario</h4>
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
    $Consulta ="SELECT * FROM usuarios";
    $Resultado =mysqli_query($Conexion,$Consulta);

    while($Mostrar=mysqli_fetch_array($Resultado)){
        ?>

        <tr style="text-align: center">
            <td><?php echo $Mostrar['Id']?></td>
            <td><?php echo $Mostrar['Nombres']?></td>
            <td><?php echo $Mostrar['Apellidos']?></td>
            <td><?php echo $Mostrar['Telefono']?></td>
            <td><?php echo $Mostrar['Correo']?></td>
            <form method="POST" action="Editar.php">
            <td><form class="form-inline my-2 my-lg-0">
            <button class="btn btn-secondary my-2 my-sm-0" type="button" data-toggle="modal" data-target="#EditarModal">Editar</button>
          </form></td>
            <input type="text" name="Editar" value="<?=$Mostrar['Nombres'] ?>" hidden> </input>
            </form>
            <form method="POST" action="Eliminar.php">
            <td><button class="btn btn-danger" type="submit">Eliminar</button></td>
            <input type="text" name="Eliminar" value="<?=$Mostrar['Nombres'] ?>" hidden> </input>
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
<div class="modal" id="EditarModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Editar datos:</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
              <form class="form-signin">
          
                <div class="form-label-group">
                    <label >Nombres</label>
                  <input type="text" class="form-control" name="Nombres" placeholder="Cambiar nombres" >
                </div>
                <br>
                <div class="form-label-group">
                    <label >Apellido</label>
                    <input type="password"  class="form-control" name="Apellidos" placeholder="Cambiar apellidos" required>
                </div>
                <br>
                <div class="form-label-group">
                    <label >Telefono</label>
                    <input type="text"  class="form-control" name="Telefono" placeholder="Cambiar telelefono" required>
                </div>
                <br>
                <div class="form-label-group">
                    <label for="inputPassword">Correo</label>
                    <input type="email"  class="form-control" name="Correo" placeholder="Cambiar correo electronico" required>
                </div>
          
                <div class="checkbox mb-3">
                 
                </div>
                <p class="mt-5 mb-3 text-muted text-center">©2019 Ehecatl, Inc.</p>
              </form>
          
                </div>
                <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar</button>
            </form>
                </div>
              </div>
            </div>
          </div>