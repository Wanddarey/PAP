<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ./Login.php');
}
require_once './php/Basics.php';
require_once './php/DBConnector.php';

$book;

if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["book"]) || isset($_POST["book"])) {

    if (isset($_GET["book"])) {
        $book = test_input($_GET["book"]);
    } else {
        $book = test_input($_POST["book"]);
    }

    $result = dbGetBook($book)[0];
    if (empty($result)) {
        header("Location: status.php");
    }

    if ($_SESSION['user']['Id'] !== $result['UId'] && $_SESSION['user']['role'] != 0) {
        header("Location: status.php?s=403");
    }
} else {
    header("Location: status.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['pdf']) && get_mime_type($_FILES['pdf']['tmp_name']) == 'application/pdf' && isset($_POST['lang'])) {

    $lang = dbGetLang(test_input($_POST['lang']));
    if (isset($lang)) {
        $fileName = sha1($_SESSION['user']['Id'] . time() . 'pdf') . '.pdf';
        addFile($book, $fileName, $lang[0]['Id']);
        move_uploaded_file($_FILES['pdf']['tmp_name'], "C:/xampp/htdocs/dashboard/pap/resources/pdf/" . $fileName);
        header('Location: Livro.php?book=' . $book);
    }
} else {
    consoleLog('ha');
}



?>
<!DOCTYPE html>
<html lang="en">


<?php require_once './php/Basics.php';
print_r($_SESSION);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add file</title>
    <?php require_once './html/basicImports.html'; ?>
    <script src="./javascript/loadImg.js"></script>
</head>

<body><script>0</script>

<?php require_once './html/header2.php'; ?>
<?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <form class="forms" method="POST" enctype="multipart/form-data">
            <h1>Add file</h1>
            <h4>Cover</h4>
            <img class="addBookImage" id="coverImg" src="" alt="">
            <input id="pdf" class="formElement formElementColor border" placeholder="cover" type="file"
                accept="application/pdf" name="pdf">
            <h4>Language</h4>
            <select class="formElement formElementColor border" id="lang" name="lang" type="text">

                <?php

                $langs = dbGetLangs();

                foreach ($langs as $lang) {
                    echo '<option value="' . $lang['Id'] . '">' . $lang['short'] . '</option>';
                }

                ?>

            </select>

            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Submit</button>
        </form>
    </div>

</body>

</html>