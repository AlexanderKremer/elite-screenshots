<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> </title>
    <meta name="description" content="<?= $desc ?>">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
    <script src="https://use.fontawesome.com/c9a6fcc362.js"></script>
    <script src="js/vendor/jquery.js"></script>
  </head>

    <nav class="row expanded" data-sticky-container style="height:76px;">
    <div class="sticky" data-sticky data-margin-top="0">
      <div class="columns large-4">
        <a href="index.php?page=home"><img src="img/logo-test.png" alt=""></a>
      </div>
      <div class="columns large-4">
       <form action="index.php?page=search" method="post">
          <div class="input-group">
            <input type="search" name="search" placeholder="Search" class="input-group-field">
              <div class="input-group-button">
            <input type="submit" class="submit-button">
          </div>
        </form>
      </div>
        
      </div>
      <div class="columns large-4">
        <ul>
              <?php if (isset($_SESSION['id'])): ?>
                <li><a href="index.php?page=logout">Log Out</a></li>
              <?php endif; ?>
              
              <?php if (!isset($_SESSION['id'])): ?>
                <li><a href="index.php?page=login">Login</a></li>
                <li><a href="index.php?page=register">Register</a></li>
              <?php endif; ?>

              <?php if (isset($_SESSION['id'])): ?>
                <li><a href="index.php?page=account"><?= $_SESSION['username']?></a></li>
              <?php endif; ?>
          </ul>
      </div>
      </div>
    </nav>
    
    <?= $this->section('content') ?>


    <footer class="row expanded">
      <div class="columns large-8 large-centered">
        <p> &copy; Alexander Kremer 2015-2016. This website was created using assets and imagery from Elite: Dangerous, with the permission of Frontier Developments plc, for non-commercial purposes. It is not endorsed by nor reflects the views or opinions of Frontier Developments and no employee of Frontier Developments was involved in the making of it.</p>
      </div>
    </footer>

    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>