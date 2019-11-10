<?php
  include_once "panes.php";
  include_once "../recetas/recetas.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panes</title>
  </head>
  <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../recetas/">Recetas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Panes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../inventariopan/">InventarioPan</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row mb-5">
        <div class="col">
          <h2 class="mb-3">Agregar nuevo Pan</h2>

          <?php 
            if(isset($_GET['timeadd'])) {
              echo "<div class='alert alert-success'>El registro se guardo en {$_GET['timeadd']} microsegundos</div>";
            }
          ?>
          
          <form method="post" action="panes_add.php">
            <div class="form-group">
              <label for="receta">Receta: </label>
              <select id="receta" name="receta_id" class="form-control">
                <?php 
                  $recetas = Recetas::getAll();
                  foreach($recetas as $receta) {
                    echo "<option value='{$receta->_id}'>{$receta->_id} - {$receta->nombre}</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="producto">Producto: </label>
              <input type="text" id="producto" class="form-control" name="producto_id" placeholder="Id del producto">
            </div>
            <input type="submit" class="btn btn-success form-control" value="Guardar">
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php 
            if(isset($_GET['timedelete'])) {
              echo "<div class='alert alert-success'>El registro se eliminó en {$_GET['timedelete']} microsegundos</div>";
            }

            if(isset($_GET['timeupdate'])) {
              echo "<div class='alert alert-success'>El registro se actualizó en {$_GET['timeupdate']} microsegundos</div>";
            }
          ?>
          <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Receta</th>
                <th scope="col">Producto</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $panes = Panes::getAll();
                foreach($panes as $pan) {
                  echo "
                  <tr>
                    <td> {$pan->_id} </td>
                    <td> {$pan->receta_id} </td>
                    <td> {$pan->producto_id} </td>
                    <td> 
                      <a href='panes_view.php?id={$pan->_id}' class='btn btn-primary'>Actualizar</a>
                      <a href='panes_delete.php?id={$pan->_id}' class='btn btn-danger'>Eliminar</a>
                    </td>
                  </tr>
                  ";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>