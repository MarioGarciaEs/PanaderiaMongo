<?php

  include_once 'panes.php';

  $start = microtime(true);
  Panes::updateOne($_POST['id'], $_POST['receta_id'], $_POST['producto_id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timeupdate={$duration}");