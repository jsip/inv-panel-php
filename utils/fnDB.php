<?php

function creationDb(
  $servername,
  $username,
  $password
) {

  try {
    connexionDb("localhost", "root", "", "");
    $conn = new PDO("mysql:host=$servername;port=3306", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $err) {
    $now = new DateTime();
    echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
  }

  $createDB = "CREATE DATABASE IF NOT EXISTS S3; use S3";
  $conn->exec($createDB);

  $createTable =
    "CREATE TABLE IF NOT EXISTS Utilisateurs(
    Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(100) NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Password CHAR(60) NOT NULL
  )";

  $createTable2 =
    "CREATE TABLE IF NOT EXISTS Produits(
    Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Montant INT(10) NOT NULL,
    LastDate DATE NOT NULL
  ) AUTO_INCREMENT = 100;";

  $conn->exec($createTable);
  $conn->exec($createTable2);

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
$conn = connexionDb("localhost", "root", "", "S3");
