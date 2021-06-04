<?php
$lib = require('./helpers.php');

if (isset($_POST['modifier'])) {
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $montant = $_POST['montant'];
  $lastDate = date('Y-m-d H:i:sa');
  $lib . modifier($nom, $montant, $lastDate, $id);
}
