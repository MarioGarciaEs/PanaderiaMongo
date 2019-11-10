<?php
  include_once 'panes.php';

  $start = microtime(true);
  Panes::deleteOne($_GET['id']);
  $end = microtime(true);
  $duration = $end - $start;

  header("Location: index.php?timedelete={$duration}");