<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once './php/Basics.php';
require_once './php/DBConnector.php';
$userName;
$userNameError = "";
$password;
$passwordError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userName"]) && isset($_POST["password"])) {
    $userName = test_input($_POST["userName"]);
    $password = test_input($_POST["password"]);
    $user = doLogin($userName)[0];

    if (isset($user)) {
        if ($user["password"] == hash('sha512', $password . $user['timeStamp'])) {
            $_SESSION["user"] = $user;
            alert("Logged in sucessfully");
            sleep(5);
            header("Location: Index.php");
            exit();
            
        } else {
            $passwordError = "<p class='formError'>Incorrect Password</P>";
        }
    } else {
        $userNameError = "<p class='formError'>This user doesn't exist</P>";
    }

} else {
    if (empty($_POST["userName"])) {
        $userNameError = "<p class='formError'>Please fill in this field</P>";
    }
    if (empty($_POST["password"])) {
        $passwordError = "<p class='formError'>Please fill in this field</P>";
    }
}
    $userNameError = "";
    $passwordError = "";

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
    require_once './html/basicImports.html';
    ?>
    <style>
        @import url('./css/login.Css');
    </style>
</head>

<body>
    <?php require_once './html/header.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div class="lowerBody">

        <form class="forms" action="Login.php" method="POST">
            <h1>Login</h1>
            <input id="userName" class="formElement formElementColor border" placeholder="Username" type="text" name="userName">
            <?php global $userNameError; echo $userNameError;?>
            <input id="password" class="formElement formElementColor border" placeholder="Password" type="password" name="password">
            <?php global $passwordError; echo $passwordError;?>
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Login</button>
        </form>

    </div>

</body>