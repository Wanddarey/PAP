<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['']) {


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once './html/basicImports.html'; ?>
</head>
<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: ./Login.php');
}

?>
<body>
    <?php require_once './html/header.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <form class="forms" action="">
            <h1>User Name</h1>
            <input id="userName" class="formElement formElementColor border" placeholder="userName" type="text" name="userName">
            <h1>Password</h1>
            <input id="password" class="formElement formElementColor border" placeholder="password" type="text" name="password">
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Submit</button>
        </form>
    </div>
</body>



</html>