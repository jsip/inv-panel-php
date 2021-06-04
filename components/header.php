<head>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<header>
  <div>
    <h2>Bonjour, <?php echo ucfirst($_SESSION['Name']); ?></h2>
  </div>  
  <div>
    <a href="./utils/logout.php">Logout</a>
  </div>
</header>