<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="ajouter">Ajouter un Produit</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajout d'un Produit</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="helpers/handlerAdd.php" id="modalForm">
            <input type="text" name="nom" placeholder="Nom de l'item" value="nom"><br><br>
            <input type="number" name="montant" placeholder="Montant $" value="10">
            <div class="modal-footer">
              <button type="submit" name="ajouter" class="btn btn-success" data-dismiss="modal" onclick="submitForm()">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const submitForm = () => {
    document.getElementById('modalForm').submit();
  }
</script>
</html>
