<?php
  include_once 'recetas.php';

  $start = microtime(true);
  Recetas::insert($_POST['nombre'], $_POST['descripcion']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timeadd={$duration}");