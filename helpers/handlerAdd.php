<?php
  $lib = require('./helpers.php');

  $nom = $_POST['nom'];
  $montant = $_POST['montant'];
  $lastDate = date('Y-m-d H:i:sa');

  $lib.ajouter($nom, $montant, $lastDate);