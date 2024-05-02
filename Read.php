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

    <div class="lowerBodyRead">
        <?php
        require_once './php/DBConnector.php';
        
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["file"])) {
            $fileId = test_input($_GET["file"]);
            $file = dbGetBookFile($fileId);
            if (empty($file)) {
            echo '<div class="noResult"><h2>File not found</h2></div>';
            } else {
            echo '<embed class="pdfEmbed" src="./resources/pdf/' . $file[0]['fileName'] . '.pdf" />';
            }
        } else {
            echo '<div class="noResult"><h2>File not found</h2></div>';
        }

        ?>
    </div>

</body>