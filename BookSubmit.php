<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ./Login.php');
}
require_once './php/Basics.php';
require_once './php/DBConnector.php';

$title;
$author;
$description;
$cover;
$dOP;
$aR;

if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && $_POST["title"] != ""
    && $_POST["author"] != ""
    && $_POST["description"] != ""
    /*&& isset($cover)*/
    && $_POST["dOP"] != ""
    && $_SESSION['user']['statusId'] != 2
) {

    $title = test_input($_POST["title"]);
    $author = test_input($_POST["author"]);
    $description = test_input($_POST["description"]);
    $cover = "";
    $dOP = test_input($_POST["dOP"]);
    $aR;
    if (empty($_POST["ageRestricted"])) {
        $aR = 0;
    } else {
        $aR = 1;
    }

    consoleLog($title . " | " . $author);
    consoleLog($dOP);

    addBook($_SESSION['user']['Id'], $title, $author, $description, $cover, $aR, $dOP);

    header('Location : ./Account.php');


} else {
    consoleLog("ahhhh");
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once './html/basicImports.html'; ?>
</head>
<?php


?>

<body>
    <?php require_once './html/header.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <form class="forms" method="post" enctype="multipart/form-data">
            <h1>Title</h1>
            <input id="title" class="formElement formElementColor border" placeholder="title" type="text" name="title">
            <h1>Author</h1>
            <input id="author" class="formElement formElementColor border" placeholder="author" type="text"
                name="author">
            <h1>Description</h1>
            <textarea id="description" class="formElement formElementColor border" placeholder="description" type="text"
                maxlength="600" name="description"> </textarea>
            <h1>Cover</h1>
            <input id="cover" class="formElement formElementColor border" placeholder="cover" type="file"
                accept="image/png, image/jpeg, image/webp" name="cover">
            <h1>Date of publication</h1>
            <input id="dOP" class="formElement formElementColor border" placeholder="dOP" type="date" name="dOP">
            <h1>18+</h1>
            <input id="ageRestricted" checked class="formElement formElementColor border" placeholder="ageRestricted"
                type="checkbox" name="ageRestricted">
            <button class="formButton formElementColor border" type="reset">Clear</button>
            <button class="formButton formElementColor border" type="submit">Submit</button>
        </form>
    </div>
</body>



</html>