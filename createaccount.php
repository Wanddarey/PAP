<?php
require_once './php/DBConnector.php';
require_once './php/Basics.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['dob'])) {
    $timeStamp = time();
    $tmpUserName = test_input($_POST['userName']);
    $tmpUserPass = test_input($_POST['password']);
    $tmpdob = test_input($_POST['dob']);
    $accountCreateUserNameError = "";

    if (empty(doLogin($tmpUserName))) {
        $tmpUserPass = hash('sha512', $tmpUserPass . $timeStamp);
        createUser($tmpUserName, $tmpUserPass, $tmpdob, $timeStamp);
        header("Location: Login.php");
    } else {
        $accountCreateUserNameError = "User already exists";
    }

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
<body><script>0</script>
    <?php require_once './html/header2.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <form class="forms" action="" method="POST">
            <h1>Sign-up</h1>
            <h4>User Name</h4>
            <input id="userName" class="formElement formElementColor border" placeholder="userName" type="text" name="userName">
            <p class="formError"><?php global $accountCreateUserNameError; echo $accountCreateUserNameError; ?></p>
            <h4>Password</h4>
            <input id="password" class="formElement formElementColor border" placeholder="password" type="text" name="password">
            <h4>Date of birth</h4>
            <input id="dob" class="formElement formElementColor border" placeholder="dob" type="date" name="dob">
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Submit</button>
        </form>
    </div>
</body>



</html>