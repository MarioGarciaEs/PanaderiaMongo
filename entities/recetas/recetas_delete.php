<?php
  include_once 'recetas.php';

  $start = microtime(true);
  Recetas::deleteOne($_GET['id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timedelete={$duration}");