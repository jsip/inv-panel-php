<head>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<footer>
  <div>
    <h1>Welcome <?php echo ucfirst($_SESSION['Name']); ?></h1>
  </div>  
  <div>
    <a href="./utils/logout.php">Logout</a>
  </div>
</footer>