<?php

  include_once 'inventariopan.php';

  $start = microtime(true);
  InventarioPan::updateOne($_POST['id'], $_POST['piezas'], $_POST['fecha'], $_POST['pan_id'], $fecha);
  $end = microtime(true);
  $duration = $end - $start;
  $duration = $duration / (1e+6);
  $duration = number_format($duration, 11);
  
  header("Location: index.php?timeupdate={$duration}");