<?php
include_once './php/DBConnector.php';
include_once './php/Basics.php';

$result;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["book"]) /*&& is_int($_GET["book"])*/) {

    $book = test_input($_GET["book"]);
    consoleLog($book);
    $result = dbGetBook($book)[0];
    if (empty($result)) {
        echo '<div class="noResult"><h2>ERRO</h2></div>';
    }

} else {
    echo '<div class="noResult"><h2>ERRO</h2></div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <?php include './html/basicImports.html'; ?>
    <style>
        @import url('./css/livro.css');
    </style>
</head>

<body>
    <?php include './html/header.html'; ?>
    <?php include './html/sideMenu.html'; ?>

    <div id="lowerBody" class="lowerBody">
        <card class="bookInfoCard">
            <div class="bookInfoCardHalf">
                <?php
                if (empty($result['cover'])) {
                $displayImage = '<img class="bookInfoImage" src="./imagens/displayImages/placeholder.png">';
                } else {
                $displayImage = '<img class="bookInfoImage" src="./imagens/displayImages/' . $result['cover'] . '">';
                }
                echo $displayImage;
                ?>
            </div>
            <div class="bookInfoCardHalf">
                <?php
                echo '<h1 class="bookInfoTitle">Title: ' . $result['title'] . '</h1>';
                echo '<p class="textNoMargin">Author: ' . $result['author'] . '</p>';
                echo '<p class="textNoMargin">Date of publication: '. $result['dOP'] . '</p>';
                echo '<p class="textNoMargin">Description: ' . $result['description'] . '</p>';
                ?>
                <div class="filesDisplay">
                    <?php
                        $files = dbGetFile($result[ID]);
                        foreach ($files as $file) {
                            $filedp = '<div class="">'
                        }
                    ?>
                </div>
            </div>
        </card>
    </div>
</body>

</html>