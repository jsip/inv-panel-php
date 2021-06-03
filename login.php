<!DOCTYPE html>
<?php
session_start();
require_once('./utils/fnDB.php');

if (isset($_POST['submit'])) {
  if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username) {
      try {
        $handle = $conn->prepare("SELECT * from utilisateurs where username = :Username ");
        $handler = $handle->execute(array(':Username' => $username));
      } catch (PDOException $err) {
        $now = new DateTime();
        echo "[" . $now->format('Y-m-d H:i:s') . "] - Erreur en relation au DB: " . $err->getMessage();
      }
      if ($handle->rowCount() > 0) {
        $getRow = $handle->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $getRow['Password'])) {
          unset($getRow['Password']);
          $_SESSION = $getRow;
          header('location:index.php');
          exit();
        } else {
          $errors[] = "Wrong username or Password";
        }
      } else {
        $errors[] = "Wrong username or Password";
      }
    } else {
      $errors[] = "username is not valid";
    }
  } else {
    $errors[] = "username and Password are required";
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="./assets/css/auth.css">
  <title>Login</title>
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <div class="fadeIn first">
        <img src="https://t4.ftcdn.net/jpg/04/21/45/51/360_F_421455125_uq2szZSTeL8LoFZ6QJPBt95Hz8xDgECQ.jpg" id="icon" alt="User Icon" />
      </div>
      <?php
      if (isset($errors) && count($errors) > 0) {
        foreach ($errors as $error_msg) {
          echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        }
      }
      ?>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
        <input type="submit" name="submit" class="fadeIn fourth" value="Login">
      </form>
      <div id="formFooter">
        <a class="underlineHover" href="./register.php">Register</a>
      </div>
    </div>
  </div>
</body>
<?php

?>

</html>