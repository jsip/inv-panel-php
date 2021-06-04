<?php
  $lib = require('./helpers.php');
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    echo $id;
    $lib.supprimer($id, $conn);
  }