<?php
  include_once 'inventariopan.php';

  $start = microtime(true);
  InventarioPan::insert($_POST['piezas'], $_POST['pan_id'], $_POST['fecha']);
  $end = microtime(true);
  $duration = $end - $start;
  $duration = $duration / (1e+6);
  $duration = number_format($duration, 11);
  
  header("Location: index.php?timeadd={$duration}");