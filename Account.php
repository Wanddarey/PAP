<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<?php require_once './html/header.php'; ?>
<?php require_once './html/sideMenu.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <?php require_once './html/basicImports.html'; ?>
</head>

<body>
    <div id="lowerBody" class="lowerBody">
      <?php
      
         if (empty($_SESSION['user'])) {
            header("Location: Login.php");
         } else {
            
         }

      ?>
    </div>
</body>

</html>