<?php
require_once './php/DBConnector.php';
require_once './php/Basics.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['dob'])) {
    consoleLog('ha');
    $timeStamp = time();
    $tmpUserName = test_input($_POST['userName']);
    $tmpUserPass = test_input($_POST['password']);
    $tmpdob = test_input($_POST['dob']);

    if (is_null(doLogin($tmpUserName))) {
        $tmpUserPass = hash('sha512', $tmpUserPass . $timeStamp);
        createUser($tmpUserName, $tmpUserPass, $tmpdob);
    } else {
        $accountCreateUserNameError = "User already exists";
        consoleLog($accountCreateUserNameError);
    }

} else {
    consoleLog('he');
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
    header('Location: ./Index.php');
}

?>
<body>
    <?php require_once './html/header.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <form class="forms" action="" method="POST">
            <h1>User Name</h1>
            <input id="userName" class="formElement formElementColor border" placeholder="userName" type="text" name="userName">
            <h1>Password</h1>
            <input id="password" class="formElement formElementColor border" placeholder="password" type="text" name="password">
            <h1>Date of birth</h1>
            <input id="dob" class="formElement formElementColor border" placeholder="dob" type="date" name="dob">
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Submit</button>
        </form>
    </div>
</body>



</html>