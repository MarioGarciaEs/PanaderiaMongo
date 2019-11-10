<?php
  include_once 'panes.php';

  $start = microtime(true);
  Panes::insert($_POST['receta_id'], $_POST['producto_id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timeadd={$duration}");