<?php
include_once './php/DBConnector.php';
include_once './php/Basics.php';

$resultLivro;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["livro"]) && is_int($_GET["livro"])) {

    $livro = test_input($_GET["livro"]);
    $resultLivro = dbGetBook($livro);
    if (empty($resultLivro)) {
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
            <div class="bookInfoCardHalf1">
                <img class="bookInfoImage" src="./imagens/displayImages/kleeRaytheon.png" alt="">
            </div>
        </card>
    </div>
</body>

</html>