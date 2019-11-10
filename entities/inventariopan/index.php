<?php
  include_once "inventariopan.php";
  include_once "../panes/panes.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario pan</title>
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
          <li class="nav-item">
            <a class="nav-link" href="../panes/">Panes</a>
          </li>
          <li class="nav-item  active">
            <a class="nav-link" href="index.php">InventarioPan</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row mb-5">
        <div class="col">
          <h2 class="mb-3">Agregar nuevo inventario pan</h2>

          <?php 
            if(isset($_GET['timeadd'])) {
              echo "<div class='alert alert-success'>El registro se guardo en {$_GET['timeadd']} microsegundos</div>";
            }
          ?>
          
          <form method="post" action="inventariopan_add.php">
            <div class="form-group">
              <label for="pan">Pan: </label>
              <select id="pan" name="pan_id" class="form-control">
                <?php 
                  $panes = Panes::getAll();
                  foreach($panes as $pan) {
                    echo "<option value='{$pan->_id}'>{$pan->_id}</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="piezas">Piezas: </label>
              <input type="text" id="piezas" class="form-control" name="piezas" placeholder="Piezas horneadas del pan">
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
                <th scope="col">Fecha</th>
                <th scope="col">Pan</th>
                <th scope="col">Piezas</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $inventariosPan = InventarioPan::getAll();
                foreach($inventariosPan as $inventarioPan) {
                  echo "
                  <tr>
                    <td> {$inventarioPan->_id} </td>
                    <td> {$inventarioPan->fecha} </td>
                    <td> {$inventarioPan->pan_id} </td>
                    <td> {$inventarioPan->piezas} </td>
                    <td> 
                      <a href='inventariopan_view.php?id={$inventarioPan->_id}' class='btn btn-primary'>Actualizar</a>
                      <a href='inventariopan_delete.php?id={$inventarioPan->_id}' class='btn btn-danger'>Eliminar</a>
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