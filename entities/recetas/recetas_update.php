<?php

  include_once 'recetas.php';

  $start = microtime(true);
  Recetas::updateOne($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timeupdate={$duration}");