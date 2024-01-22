<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livros</title>
  <?php include './html/basicImports.html'; ?>
</head>

<body>
  <?php include './html/header.html'; ?>
  <?php include './html/sideMenu.html'; ?>

  <div class="lowerBody">
    <?php
    include_once './php/DBConnector.php';
    include_once './php/Basics.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["query"])) {

      $query = test_input($_GET["query"]);
      $result = dbQuery($query);
      if (!empty($result)) {
        displayQuery($result);
      } else if (empty($res)) {
        echo '<div class="noResult"><h2>No Results</h2></div>';
      } else {
      }

    } else {
      $result = dbDefaultQuery();
      if (!empty($result)) {
        displayQuery($result);
      } else if (empty($res)) {
        echo '<div class="noResult"><h2>No Results</h2></div>';
      } else {
      }
    }
    ?>
  </div>
</body>

</html>
<h1 class="displayTitle"> </h1>
<?php
function displayQuery($books)
{
  echo '<div id="cardDisplay" class="cardDisplayGrid">';

  foreach ($books as $book) {
    $displayCard = '<a href="http://localhost/dashboard/pap/livro.php?book=' . $book['Id'] . '" Title=' . $book['title'] . '><div class="displayCardGrid">';
    $displayHalf = '<div class="displayHalf">';
    if (empty($book['cover'])) {
      $displayImage = '<img class="displayImage" src="./imagens/displayImages/placeholder.png">';
    } else {
      $displayImage = '<img class="displayImage" src="./imagens/displayImages/' . $book['cover'] . '">';
    }
    $displayHalf .= $displayImage . '</div>';

    $displayHalf2 = '<div class="displayHalf2">';
    $displayTitle = '<h1 class="displayTitle">' . $book['title'] .'</h1>';
    $textSeparator = '<div class="textSeparator"></div>';
    $displayParagraph = '<p class="displayParagraph">' . $book['description'] . '</p>';
    $displayHalf2 .= $displayTitle . $textSeparator . $displayParagraph . '</div>';

    $displayCard .= $displayHalf . $displayHalf2 . '</div></a>';

    echo $displayCard;
  }
  echo '</div>';
}
?>