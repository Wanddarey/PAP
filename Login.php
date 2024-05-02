<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(E_ALL);
require_once './php/Basics.php';
require_once './php/DBConnector.php';
$userName;
$userNameError = "";
$password;
$passwordError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["userName"] != "" && $_POST["password"] != "" && !empty($_POST["userName"]) && !empty($_POST["password"])) {
    $userName = test_input($_POST["userName"]);
    $password = test_input($_POST["password"]);
    consoleLog($userName . ", " . $password);
    $user = doLogin($userName);
    consoleLog($user[0]["Id"] . ", " . $user["userName"] . ", " . $user["password"]);

    if (isset($user)) {
        if ($user["password"] == $password) {
            $userNameError ="hehehehaw";
            
        } else {
            $passwordError = "<p>Incorrect Password</P>";
        }
    } else {
        $userNameError = "<p>This user doesn't exist</P>";
    }

} else {
    if (empty($_POST["userName"])) {
        $userNameError = "<p>Please fill in this field</P>";
    }
    if (empty($_POST["password"])) {
        $passwordError = "<p>Please fill in this field</P>";
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
    <?php require_once './html/sideMenu.html'; ?>

    <div class="lowerBody">

        <form class="forms" action="Login.php" method="post">
            <h1>Login</h1>
            <input id="userName" class="formElement formElementColor border" placeholder="Username" type="text" name="userName">
            <?php echo $userNameError;?>
            <input id="password" class="formElement formElementColor border" placeholder="Password" type="password" name="password">
            <?php echo $passwordError;?>
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Login</button>
        </form>

    </div>

</body>