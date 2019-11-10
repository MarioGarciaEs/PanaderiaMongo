<?php
  include_once 'inventariopan.php';

  $start = microtime(true);
  InventarioPan::insert($_POST['piezas'], $_POST['pan_id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timeadd={$duration}");