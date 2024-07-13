<?php
session_start();
require_once './php/DBConnector.php';
require_once './php/Basics.php';

$result;


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["user"])) {
  if (isset($_GET["user"])) {
    $user = test_input($_GET["user"]);
  } else {
    $user = test_input($_POST["user"]);
  }

  $result = getUser($user)[0];
} else {
  header("Location: status.php");
}

function printInfo()
{
  global $result, $user;
  if (empty($result)) {
    header("Location: status.php");
  } else {
    echo '<h1 class="bookInfoText">Username: ' . $result['title'] . '</h1>';
    echo '<p class="textNoMargin">Author: ' . $result['author'] . '</p>';
    echo '<p class="textNoMargin">Date of publication: ' . $result['dOP'] . '</p>';
    echo '<p class="textNoMargin">Description: ' . $result['description'] . '</p>';
    if (isset($_SESSION['user']) && $_SESSION['user']['Id'] == $result['UId']) {
      echo '<a class="formButton formElementColor border" href="./EditLivro.php?book=' . $user . '">Edit</a>';
      echo '<a class="formButton formElementColor border" href="./AddFile.php?book=' . $user . '">Add file</a>';

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
  </div>
</body>

</html>