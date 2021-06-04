<?php
session_start();
require_once('./utils/fnDB.php');

if (!$_SESSION['Username']) {
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
  <?php
  require('./components/header.php');
  ?>
  <main>
    <div class="" id="modalBlur">
      <h3>Inventaire</h3><br>
      <table class="table">
        <thead>
          <tr>
            <th>ID.EMP</th>
            <th>SKU</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date</th>
            <th colspan="2">Options</th>
          </tr>
          <?php
          function select($query)
          {
            global $conn;
            try {
              $handler = $conn->prepare($query);
              $handler->execute();

              $resultat = $handler->fetchAll(PDO::FETCH_ASSOC);
              $i = 0;
              foreach ($resultat as $row) {
              $i++;
            ?>
                <tr>
                  <td> <?php echo $i ?> </td>
                  <td> <?php echo $row['Id']; ?></td>
                  <td> <?php echo $row['Nom']; ?></td>
                  <td> $<?php echo $row['Montant']; ?></td>
                  <td> <?php echo $row['LastDate']; ?></td>
                  <td style="display: flex; gap: 1em;">
                    <?php require('./components/modifyModal.php'); ?>
                    <?php require('./components/deleteModal.php'); ?>
                  </td>
                </tr>
            <?php
              }
            } catch (PDOException $e) {
              $now = new DateTime();
              echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $e->getMessage();
            }
            return $resultat;
          }
          select("SELECT * FROM Produits");
          ?>
        </thead>
      </table>
    </div>
    <div>
      <h3>Actions</h3><br>
      <div>
        <?php
          require('./components/addModal.php');
        ?>
      </div>
    </div>
  </main>
</body>

</html>