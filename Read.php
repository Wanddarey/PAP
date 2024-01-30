<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <?php include './html/basicImports.html'; ?>
    <style>
        @import url('./css/ReadCss');
    </style>
</head>

<body>
    <?php include './html/header.php'; ?>
    <?php include './html/sideMenu.html'; ?>

    <div class="lowerBody">
        <?php
        include_once 'DBConnector.php';
        
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["file"])) {
            $fileId = test_input($_GET["file"]);
            $file = getFile($fileId);

        } else {
            echo '<div class="noResult"><h2>File not found</h2></div>';
        }

        ?>
    </div>

</body>