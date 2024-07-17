<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ./Login.php');
}
require_once './php/Basics.php';
require_once './php/DBConnector.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["u"]) || isset($_POST["u"])) {
    if (isset($_GET["u"])) {
        $user = test_input($_GET["u"]);
    } else {
        $user = test_input($_POST["u"]);
    }

    $result = getUser($user)[0];
    if (empty($result)) {
        header("Location: status.php");
    }

    if ($_SESSION['user']['Id'] != $result['Id'] && $_SESSION['user']['role'] != 0) {
        header("Location: status.php?s=403");
    }
} else {
    header("Location: status.php");
}

if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && isset($_POST["userName"])
    && isset($_POST["description"])
    && isset($_POST["dob"])
    && $_SESSION['user']['statusId'] != 2
) {
    $tmpUserName = test_input($_POST["userName"]);
    $tmpDescription = test_input($_POST["description"]);
    $tmpdob = test_input($_POST["dob"]);

    $create = true;

    if (isset($_POST['password']) && $_POST != '' && !empty($_POST['password'])) {
        consoleLog('p ' . $_POST['password']);
        $timeStamp = time();
        $tmpUserPass = test_input($_POST["password"]);
        $tmpUserPass = hash('sha512', $tmpUserPass . $timeStamp);
        editUserPass($user, $tmpUserPass, $timeStamp);
    }

    if (!empty($_FILES['pfp']['tmp_name'])) {
        $mimet = get_mime_type($_FILES['pfp']['tmp_name']);
        if ($mimet == 'image/png' || $mimet == 'image/jpg' || $mimet == 'image/jpeg' || $mimet == 'image/webp') {
            $fileName = sha1($_SESSION['user']['Id'] . time());
            editUserPfp($user, $fileName);
            shell_exec("ffmpeg -i " . $_FILES['pfp']['tmp_name'] . " ./imagens/pfp/" . $fileName . ".webp");
        }
    }

    if (!empty(doLogin($tmpUserName)) && $_SESSION['user']['userName'] != $tmpUserName) {
        $create = false;
        $accountCreateUserNameError = "User already exists";
    }

    if ($create == true) {
        editUser($user, $tmpUserName, $tmpDescription, $tmpdob);
        $result = getUser($user)[0];
        $_SESSION["user"] = $result;
    }

    header('Location: Account.php?u=' . $user);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once './html/basicImports.html'; ?>
    <script src="./javascript/loadImg.js"></script>
</head>
<?php


?>

<body>
    <script>0</script>
    <?php require_once './html/header2.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <form class="forms" method="POST" enctype="multipart/form-data">
            <h1>Edit book</h1>
            <h4>User Name</h4>
            <input id="userName" value="<?php echo $result['userName']; ?>" class="formElement formElementColor border"
                placeholder="userName" type="text" name="userName">
            <h4>Password</h4>
            <input id="password" class="formElement formElementColor border" placeholder="password" type="password"
                name="password">
            <h4>Date of birth</h4>
            <input id="dob" value="<?php echo $result['birthDate']; ?>" class="formElement formElementColor border"
                placeholder="dob" type="date" name="dob">
            <h4>Description</h4>
            <textarea id="descrpition" value="<?php echo $result['description']; ?>"
                class="formElement formElementColor border" type="text" maxlength="600"
                name="description"><?php echo $result['description']; ?></textarea>
            <h4>pfp</h4>
            <img class="addBookImage" id="coverImg" src="" alt="">
            <input onchange="imgchng()" id="imgFile" class="formElement formElementColor border" placeholder="pfp"
                type="file" accept="image/png, image/jpeg, image/webp" name="pfp">
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Save</button>
        </form>
    </div>
</body>

</html>