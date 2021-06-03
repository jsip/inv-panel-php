<?php

function creationDb(
  $servername,
  $username,
  $password
) {

  try {
    connexionDb("localhost", "root", "", "");
    $dbco = new PDO("mysql:host=$servername;port=3306", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $err) {
    $now = new DateTime();
    echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
  }

  $createDB = "CREATE DATABASE IF NOT EXISTS S3; use S3";
  $dbco->exec($createDB);

  $createTable =
    "CREATE TABLE IF NOT EXISTS Utilisateurs(
    Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(100) NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Password CHAR(72) NOT NULL
  )";

  $createTable2 =
    "CREATE TABLE IF NOT EXISTS Produits(
    Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Montant INT(10)
  ) AUTO_INCREMENT = 100;";

  $dbco->exec($createTable);
  $dbco->exec($createTable2);

  connexionDb("localhost", "root", "", "S3");
}

function connexionDb(
  $servername,
  $username,
  $password,
  $dbname
) {
  try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $err) {
    $now = new DateTime();
    echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
  }

  return $conn;
}

creationDb("localhost", "root", "");
return connexionDb("localhost", "root", "", "S3");
