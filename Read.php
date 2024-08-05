<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <?php require_once './html/basicImports.html'; ?>
    <style>
        @import url('./css/livro.css');
    </style>
</head>

<body style="overflow: hidden">

    <?php require_once './html/header2.php'; ?>
    <?php require_once './html/sideMenu.php'; ?>

    <div class="lowerBodyRead">
        <?php
        require_once './php/DBConnector.php';
        
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["file"])) {
            $fileId = test_input($_GET["file"]);
            $file = dbGetBookFile($fileId);
            if (empty($file)) {
            echo '<div class="noResult"><h2>File not found</h2></div>';
            } else {
                if (isMobileChromium()) {
                    echo '<embed class="pdfEmbed" src="http://docs.google.com/gview?url=https://' . $_SERVER["SERVER_NAME"] . '/pap/resources/pdf/' . $file[0]['fileName'] . '&embedded=true" />';
                }else {
                    echo '<embed class="pdfEmbed" src="./resources/pdf/' . $file[0]['fileName'] . '" />';
                }
            
            }
        } else {
            echo '<div class="noResult"><h2>File not found</h2></div>';
        }

        ?>
    </div>

</body>