<head>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<header>
  <div>
    <h4>Bonjour, <?php echo ucfirst($_SESSION['Name']); ?></h4>
  </div>  
  <div>
    <a href="./utils/logout.php">Logout</a>
  </div>
</header>