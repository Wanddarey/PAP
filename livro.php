<?php
session_start();
require_once './php/DBConnector.php';
require_once './php/Basics.php';

$result;


if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["book"]) || isset($_POST["book"])) {
    if (isset($_GET["book"])) {
        $book = test_input($_GET["book"]);
    } else {
        $book = test_input($_POST["book"]);
    }

    $result = dbGetBook($book)[0];
} else {
    header("Location: status.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Comment"]) && isset($_SESSION['user']) && $_SESSION['user']['statusId'] != 2) {

    $comment = test_input($_POST["Comment"]);

    addComment($_SESSION['user']['Id'], $book, $comment);

}

function printInfo()
{
    global $result, $book;
    if (empty($result)) {
        header("Location: status.php");
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
            echo '<a class="formButton formElementColor border" href="./EditLivro.php?book=' . $book . '">Edit</a>';
            echo '<a class="formButton formElementColor border" href="./AddFile.php?book=' . $book . '">Add file</a>';

        }
    }
}
function setImg()
{
    global $result;
    if (empty($result['cover'])) {
        $displayImage = '<img class="bookInfoImage" src="./resources/noimg.webp">';
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
                    foreach ($comments as $comm)

                        if ($comm['UId'] == $_SESSION['user']['Id']) {
                            echo '<div class="CommentDiv youComment">
                                    <div>
                                        <p>By: You</p>
                                    </div>
                                    <p>' . $comm['content'] . '</p>
                                </div>';
                        } else {
                            echo '<div class="CommentDiv">
                                    <div>
                                        <p>By: ' . getUser($comm['UId'])[0]['userName'] . '</p>
                                    </div>
                                    <p>' . $comm['content'] . '</p>
                                </div>';
                        }


                }

                ?>

            </div>
            <form action="./livro.php?book=<?php echo $book; ?>" method="POST" class="commentBox">
                <textarea placeholder="Comment" name="Comment" class="commentContentInput formElementColor border"
                    name="" id=""></textarea>
                <div class="commenButtons">
                    <button class="formButton formElementColor border" type="reset">Cancel</button>
                    <button class="formButton formElementColor border" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>