<?php

$conn = require('../utils/fnDB.php');

function ajouter($nom, $montant, $lastDate)
{
  global $conn;
  try {
    $handler = $conn->prepare("INSERT INTO produits (Nom, Montant, LastDate) VALUES (:nom, :montant, :lastDate)");
    $handler->bindParam(':nom', $nom);
    $handler->bindParam(':montant', $montant);
    $handler->bindParam(':lastDate', $lastDate);
    $handler->execute();
  } catch (PDOException $err) {
    $now = new DateTime();
    echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
  }
  header('location: ../index.php');
}

function modifier($nom, $montant, $lastDate, $id)
{
  global $conn;
  try {
    $handler = $conn->prepare("ALTER TABLE produits MODIFY (Nom, Montant, LastDate) (:nom, :montant, :lastDate) WHERE Id = :id");
    $handler->bindParam(':nom', $nom);
    $handler->bindParam(':montant', $montant);
    $handler->bindParam(':lastDate', $lastDate);
    $handler->bindParam(':id', $id);
    $handler->execute();
  } catch (PDOException $err) {
    $now = new DateTime();
    echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
  }
  header('location: ../index.php');
}

function supprimer($id, $conn)
{
  try {
    $handler = $conn->prepare("DELETE from produits where Id = :id");
    $handler->bindParam(':id', $id);
    $handler->execute();
  } catch (PDOException $err) {
    $now = new DateTime();
    echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
  }
  header('location: ../index.php');
}
