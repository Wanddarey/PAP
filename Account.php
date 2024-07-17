<?php
session_start();
require_once './php/DBConnector.php';
require_once './php/Basics.php';

$result;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["u"])) {
    $user = test_input($_GET["u"]);

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
    echo '<h1 class="bookInfoText">' . $result['userName'] . '</h1>';
    if (!empty($result['description'])) {
      echo '<p class="textNoMargin">Description: ' . $result['description'] . '</p>';
    }
    if (isset($_SESSION['user']) && $_SESSION['user']['Id'] == $result['Id']) {
      echo '<a class="formButton formElementColor border" href="./accountEdit.php?u=' . $user . '">Edit</a>';
    }
  }
}
function setImg()
{
  global $result;
  if (empty($result['pfp'])) {
    $displayImage = '<img class="bookInfoImage" src="./resources/noimg.webp">';
  } else {
    $displayImage = '<img class="bookInfoImage" src="./imagens/pfp/' . $result['pfp'] . '.webp">';
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

<body><script>0</script>
  <?php require_once './html/header2.php'; ?>
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