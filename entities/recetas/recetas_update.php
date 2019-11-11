<?php

  include_once 'recetas.php';

  $start = microtime(true);
  Recetas::updateOne($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['preparacion']);
  $end = microtime(true);
  $duration = $end - $start;
  $duration = $duration / (1e+6);
  $duration = number_format($duration, 11);

  header("Location: index.php?timeupdate={$duration}");