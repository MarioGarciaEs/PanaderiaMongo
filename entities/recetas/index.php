<?php
  include_once "recetas.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recetas</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Recetas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../panes/">Panes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../inventariopan/">InventarioPan</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="m-5">
      <div class="row mb-5 justify-content-md-center">
        <div class="col-6">
          <h2 class="mb-3">Agregar nueva receta</h2>

          <?php 
            if(isset($_GET['timeadd'])) {
              echo "<div class='alert alert-success'>El registro se guardo en {$_GET['timeadd']} segundos</div>";
            }
          ?>
          
          <form method="post" action="receta_add.php">
            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción">
            </div>
            <div class="form-group">
              <label for="preparacion">Preparación</label>
              <textarea id="preparacion" class="form-control" name="preparacion" rows="4" maxlength="255">Ingresa la preparación de la receta</textarea>
            </div>
            <input type="submit" class="btn btn-success form-control" value="Guardar">
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php 
            if(isset($_GET['timedelete'])) {
              echo "<div class='alert alert-success'>El registro se eliminó en {$_GET['timedelete']} segundos</div>";
            }

            if(isset($_GET['timeupdate'])) {
              echo "<div class='alert alert-success'>El registro se actualizó en {$_GET['timeupdate']} segundos</div>";
            }
          ?>
          <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Preparación</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $start = microtime(true);
                $recetas = Recetas::getAll();
                $end = microtime(true);
                $duration = $end - $start;
                $duration = $duration / (1e+6);
                $duration = number_format($duration, 11);

                echo "<div class='alert alert-success'>La consulta tardo {$duration} segundos</div>";

                foreach($recetas as $receta) {
                  echo "
                  <tr>
                    <td> {$receta->_id} </td>
                    <td> {$receta->nombre} </td>
                    <td> {$receta->descripcion} </td>
                    <td> {$receta->preparacion} </td>
                    <td>
                      <a href='recetas_view.php?id={$receta->_id}' class='btn btn-primary'>Actualizar</a>
                      <a href='recetas_delete.php?id={$receta->_id}' class='btn btn-danger'>Eliminar</a>
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