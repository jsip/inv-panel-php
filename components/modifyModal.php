<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .modal-backdrop {
      opacity: 0.1 !important;
    }
  </style>
</head>

<?php

?>
<div class="">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1" name="modifier">Modifier</button>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modification d'un Produit</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="helpers/handlerModify.php" id="modalForm2">
            <input type="text" value="" name="nom" id="nameItem" placeholder="<?php echo $row['Nom']; ?>"><br><br>
            <input type="number" value="" name="montant" id="montantVal" placeholder="<?php echo $row['Montant']; ?>">
            <div class="modal-footer">
              <button class="btn btn-success" name="modify" type="submit" data-dismiss="modal" onclick="submitForm()">
                Modifier
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const submitForm2 = () => {
    document.getElementById('modalForm2').submit();
  }
</script>

</html>