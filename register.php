<?php
session_start();
require_once('./utils/fnDB.php');

if (isset($_POST['submit'])) {
  if (isset($_POST['name'], $_POST['username'], $_POST['password']) && !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $options = array("cost" => 4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    if ($username) {
      $sql = 'select * from utilisateurs where username = :username';
      $stmt = $conn->prepare($sql);
      $p = ['username' => $username];
      $stmt->execute($p);

      if ($stmt->rowCount() == 0) {
        $sql = "insert into utilisateurs (Name, Username, Password) values(:name,:username,:pass)";

        try {
          $handle = $conn->prepare($sql);
          $params = [
            ':name' => $name,
            ':username' => $username,
            ':pass' => $hashPassword,
          ];

          $handle->execute($params);

          $success = 'User has been created successfully';
        } catch (PDOException $e) {
          $errors[] = $e->getMessage();
        }
      } else {
        $valName = $name;
        $valUsername = '';
        $valPassword = $password;

        $errors[] = 'Username already registered';
      }
    }
  } else {
    if (!isset($_POST['name']) || empty($_POST['name'])) {
      $errors[] = 'Name is required';
    } else {
      $valName = $_POST['name'];
    }

    if (!isset($_POST['username']) || empty($_POST['username'])) {
      $errors[] = 'Username is required';
    } else {
      $valUsername = $_POST['username'];
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
      $errors[] = 'Password is required';
    } else {
      $valPassword = $_POST['password'];
    }
  }
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="./assets/css/auth.css">
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <div class="fadeIn first">
        <img src="https://t4.ftcdn.net/jpg/04/21/45/51/360_F_421455125_uq2szZSTeL8LoFZ6QJPBt95Hz8xDgECQ.jpg" id="icon" alt="User Icon" />
      </div>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" value="<?php echo ($valUsername ?? '') ?>">
        <input type="text" id="name" class="fadeIn second" name="name" placeholder="Nom Complet" value="<?php echo ($valName ?? '') ?>">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="<?php echo ($valPassword ?? '') ?>">
        <input type="password" id="cpassword" class="fadeIn third" name="cpassword" placeholder="Confirm Password">
        <input type="submit" class="fadeIn fourth" name="submit" value="Register">
      </form>
      <?php
      if (isset($errors) && count($errors) > 0) {
        foreach ($errors as $error_msg) {
          echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        }
      }

      if (isset($success)) {

        echo '<div class="alert alert-success">' . $success . '</div>';
      }
      ?>
      <div id="formFooter">
        <a class="underlineHover" href="./login.php">Login</a>
      </div>
    </div>
  </div>
</body>
<?php

?>

</html>