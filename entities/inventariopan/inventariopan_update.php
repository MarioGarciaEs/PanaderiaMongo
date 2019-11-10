<?php

  include_once 'inventariopan.php';

  $start = microtime(true);
  InventarioPan::updateOne($_POST['id'], $_POST['piezas'], $_POST['fecha'], $_POST['pan_id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timeupdate={$duration}");