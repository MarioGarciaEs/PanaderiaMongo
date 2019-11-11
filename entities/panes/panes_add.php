<?php
  include_once 'panes.php';

  $start = microtime(true);
  Panes::insert($_POST['receta_id'], $_POST['producto_id']);
  $end = microtime(true);
  $duration = $end - $start;
  $duration = $duration / (1e+6);
  $duration = number_format($duration, 11);
  
  header("Location: index.php?timeadd={$duration}");