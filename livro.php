<?php
session_start();
require_once './php/DBConnector.php';
require_once './php/Basics.php';

$result;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["book"])) {
    $book = test_input($_GET["book"]);
    $result = dbGetBook($book)[0];
} else {
    echo '<div class="noResult"><h2>ERRO</h2></div>';
}

function printInfo()
{
    global $result;
    if (empty($result)) {
        echo '<div class="noResult"><h2>ERRO</h2></div>';
    } else {
        echo '<h1 class="bookInfoText">Title: ' . $result['title'] . '</h1>';
        echo '<p class="textNoMargin">Author: ' . $result['author'] . '</p>';
        echo '<p class="textNoMargin">Date of publication: ' . $result['dOP'] . '</p>';
        echo '<p class="textNoMargin">Description: ' . $result['description'] . '</p>';
        echo '<h1 class="bookInfoText">Files:</h1>';
        echo '<div class="filesDisplay">';
        $files = dbGetFiles($result['Id']);
        if (empty($files)) {
            echo '<div class="noResult"><h2>No Files</h2></div>';
        } else {
            foreach ($files as $file) {
                $fileRow = '<a href="./read.php?file=' . $file['Id'] . '" class="fileRow">';
                $lang = dbGetLang($file['langId'])[0];
                $fileName = '<h3 class="fileRowElement" title=" Name: ' . $file['fileName'] . '">' . $file['fileName'] . '</h3>';
                $fileLang = '<h3 class="fileRowElement" title=" Language: ' . $lang['language'] . '">' . $lang['short'] . '</h3>';
                $fileRow .= $fileName . $fileLang . '</a>';
                echo $fileRow;
            }
        }
        echo '</div>';
        if (isset($_SESSION['user']) && $_SESSION['user']['Id'] == $result['UId']) {
            echo '<a class="formButton formElementColor border" href="./">Edit</a>';
        }
    }
}
function setImg()
{
    global $result;
    if (empty($result['cover'])) {
        $displayImage = '<img class="bookInfoImage" src="./imagens/displayImages/placeholder.webp">';
    } else {
        $displayImage = '<img class="bookInfoImage" src="./imagens/displayImages/' . $result['cover'] . '.webp">';
    }
    return $displayImage;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <?php require_once './html/basicImports.html'; ?>
    <style>
        @import url('./css/livro.css');
    </style>
</head>

<body>
    <?php require_once './html/header.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <card class="bookInfoCard">
            <div class="bookInfoCardHalf">
                <?php
                echo setImg();
                ?>
            </div>
            <div class="bookInfoCardHalf">
                <div class="bookInfoContainer">
                    <?php
                    printInfo();
                    ?>
                </div>
            </div>
        </card>
        <div class="commentSection">
            <div class="commentDisplay">
            
            <?php

            $comments = getComments($result['Id']);

            if (empty($comments)) {
                echo '<div class="noResult"><h2>No Comments</h2></div>';
            } else {

            }

            ?>

            </div>
            <form action="" method="POST" class="commentBox">
                <textarea class="commentContentInput formElementColor border" name="" id=""></textarea>
            </form>
        </div>
    </div>
</body>

</html>