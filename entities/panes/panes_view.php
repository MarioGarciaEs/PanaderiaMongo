<?php
  include_once "panes.php";
  include_once "../recetas/recetas.php";
  
  $start = microtime(true);
  $pan = Panes::getById($_GET['id']);
  $end = microtime(true);
  $duration = $end - $start;
  $duration = $duration / (1e+6);
  $duration = number_format($duration, 11);
  
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
          <div class="alert alert-success">La consulta tardo <?php echo $duration; ?> segundos</div>
          <h2 class="mb-3">Actualizar Pan</h2>
          <form method="post" action="panes_update.php">
            <input type="hidden" name="id" value="<?php echo $pan->_id; ?>">
            <div class="form-group">
              <label for="receta">Receta: </label>
              <select id="receta" name="receta_id" class="form-control" value="<?php echo $pan->receta_id; ?>">
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
              <input type="text" id="producto" class="form-control" name="producto_id" placeholder="Id del producto"
                value="<?php echo $pan->producto_id; ?>">
            </div>
            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-danger form-control col-5">Cancelar</a>
              <input type="submit" class="btn btn-success form-control col-5" value="Actualizar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>