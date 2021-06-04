<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" name="effacer">Effacer</button>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Voulez-vous vraiment effacer cet item?</h4>
        </div>
        <div class="modal-body">
          <div class="modal-footer">
            <button type="submit" name="ajouter" class="btn btn-success" data-dismiss="modal">Retour</button>
            <a href="helpers/handlerDel.php?delete=<?php echo $row['Id']; ?>" class="btn btn-danger">Effacer</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</html>