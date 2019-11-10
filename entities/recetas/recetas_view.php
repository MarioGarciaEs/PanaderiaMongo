<?php
  include_once "recetas.php";
  $receta = Recetas::getById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <div class="container mt-5">
      <div class="row mb-5">
        <div class="col">
          <h2 class="mb-3">Actualizar receta</h2>
          
          <form method="post" action="recetas_update.php">
            <input type="hidden" name="id" value="<?php echo $receta->_id; ?>">
            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" 
                value="<?php echo $receta->nombre; ?> ">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción"
                value="<?php echo $receta->descripcion; ?>">
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