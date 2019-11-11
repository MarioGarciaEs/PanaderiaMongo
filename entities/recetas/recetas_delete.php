<?php
  include_once 'recetas.php';

  $start = microtime(true);
  Recetas::deleteOne($_GET['id']);
  $end = microtime(true);
  $duration = $end - $start;
  $duration = $duration / (1e+6);
  $duration = number_format($duration, 11);

  header("Location: index.php?timedelete={$duration}");