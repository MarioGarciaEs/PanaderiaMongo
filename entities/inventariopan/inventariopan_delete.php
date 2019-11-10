<?php
  include_once 'inventariopan.php';

  $start = microtime(true);
  InventarioPan::deleteOne($_GET['id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timedelete={$duration}");