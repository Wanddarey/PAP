<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<?php require_once './html/header.php'; ?>
<?php require_once './html/sideMenu.php'; ?>
<?php require_once './php/Basics.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once './html/basicImports.html'; ?>
</head>

<body>
    <div id="lowerBody" class="lowerBody">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["s"])) {
                $s = $_GET["s"];
                if ($s == 403) {
                    echo '<img class="fofimg" src="./resources/accessDenied.jpg" alt="403">';
                }
            } else {
                echo '<img class="fofimg" src="./resources/cao404.jpg" alt="404">';
            }
        ?>
    </div>
</body>

</html>