<!DOCTYPE html>
<html lang="en">

<?php
include './php/Basics.php';
include './php/DBConnector.php';
$userName;
$userNameError = "";
$password;
$passwordError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["userName"] == "" && $_POST["password"] == "") {
    $userName = test_input($_POST["userName"]);
    $password = test_input($_POST["password"]);
    $user = Login($userName)[0];
    consoleLog($user["Id"] . ", " . $user["userName"] . ", " . $user["password"]);
    if (isset($user)) {
        if ($user["password"] == $password) {
            $userNameError ="hehehehaw";
        } else {
            $passwordError = "<p>Incorrect Password</P>";
        }
    } else {
        $userNameError = "<p>This user doesn't exist</P>";
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["userName"])) {
        $userNameError = "<p>Please fill in this field</P>";
    }
    if (empty($_POST["password"])) {
        $passwordError = "<p>Please fill in this field</P>";
    }
} else {
    $userNameError = "";
    $passwordError = "";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
    include './html/basicImports.html';
    ?>
    <style>
        @import url('./css/login.Css');
    </style>
</head>

<body>
    <?php include './html/header.php'; ?>
    <?php include './html/sideMenu.html'; ?>

    <div class="lowerBody">

        <form class="forms" action="./Login.php" method="post">
            <h1>Login</h1>
            <input id="" class="formElement formElementColor border" placeholder="Username" type="text" name="userName">
            <?php echo $userNameError;?>
            <input id="" class="formElement formElementColor border" placeholder="Password" type="password" name="password">
            <?php echo $passwordError;?>
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Login</button>
        </form>

    </div>

</body>