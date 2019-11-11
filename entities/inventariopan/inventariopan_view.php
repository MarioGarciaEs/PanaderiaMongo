<?php
  include_once "inventariopan.php";
  include_once "../panes/panes.php";

  $start = microtime(true);
  $inventarioPan = InventarioPan::getById($_GET['id']);
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
          <li class="nav-item active">
            <a class="nav-link" href="../panes/">Panes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">InventarioPan</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row mb-5">
        <div class="col">
          <div class="alert alert-success">La consulta tardo <?php echo $duration; ?> segundos</div>
          <h2 class="mb-3">Actualizar inventario pan</h2>
          <form method="post" action="inventariopan_update.php">
            <input type="hidden" name="id" value="<?php echo $inventarioPan->_id; ?>">
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
              <input type="text" id="piezas" class="form-control" name="piezas" placeholder="Piezas que se hornearon" 
                value="<?php echo $inventarioPan->piezas; ?>">
            </div>
            <div class="form-group">
              <label for="fecha">Fecha: </label>
              <input type="date" id="fecha" class="form-control" name="fecha" placeholder="Fecha en la que se horneó el pan"
                value="<?php echo $inventarioPan->fecha; ?>">
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