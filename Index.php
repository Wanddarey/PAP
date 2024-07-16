<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<?php require_once './php/Basics.php';

require_once './php/DBConnector.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once './html/basicImports.html'; ?>
    <style>
        @import url('./css/grid2.css');
    </style>
</head>

<body>

    <?php require_once './html/header.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div id="lowerBody" class="lowerBody">
        <div id="recentes" class="sideScrollDisplay">
            <?php
            $results = retrieveRecent();

            foreach ($results as $book) {
                $displayCard = '<span class="displayCardGrid">';
                if (empty($book['cover'])) {
                    $displayImage = '<a href="./livro.php?book=' . $book['Id'] . '" Title="' . $book['title'] . '"><img class="displayImage" src="./imagens/gridImages/loremGrid.webp" alt"no Image"></a>';
                } else {
                    $displayImage = '<a href="./livro.php?book=' . $book['Id'] . '" Title="' . $book['title'] . '"><img class="displayImage" src="./imagens/gridImages/' . $book['cover'] . 'Grid.webp" alt="' . $book['title'] . '"></a>';
                }
                echo $displayCard . $displayImage . '</span>';
            }

            ?>
        </div>
    </div>
</body>

</html>