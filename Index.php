<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<?php require_once './html/header.php'; ?>
<?php require_once './html/sideMenu.php'; ?>
<?php require_once './php/Basics.php';
    print_r($_SESSION);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once './html/basicImports.html'; ?>
</head>

<body>

    <div id="lowerBody" class="lowerBody">

    </div>
</body>

</html>