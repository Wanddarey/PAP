<?php
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
                $lang = dbGetLang($file['langId']);
                $fileName = '<h3 class="fileRowElement" title=" Name: ' . $file['fileName'] . '">' . $file['fileName'] . '</h3>';
                $fileLang = '<h3 class="fileRowElement" title=" Language: ' . $lang[0]['language'] . '">' . $lang[0]['short'] . '</h3>';
                $fileRow .= $fileName . $fileLang . '</a>';
                echo $fileRow;
            }
        }
        echo '</div>';
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
    <?php require_once './html/sideMenu.html'; ?>

    <div id="lowerBody" class="lowerBody">
        <card class="bookInfoCard">
            <div class="bookInfoCardHalf">
                <?php
                echo setImg();
                ?>
            </div>
            <div class="bookInfoCardHalf">
                <div class="infoContainer">
                    <?php
                    printInfo();
                    ?>
                </div>
            </div>
        </card>
    </div>
</body>

</html>