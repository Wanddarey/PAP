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

<?php
function displayQuery($livros)
{
  echo '<div id="cardDisplay" class="cardDisplayGrid">';

  foreach ($livros as $livro) {
    $displayCard = '<div class="displayCardGrid">';
    $displayHalf = '<div class="displayHalf">';
    $displayImage = '<img class="displayImage" src="./imagens/displayImages/' . $livro['Capa'] . '">';
    $displayHalf .= $displayImage . '</div>';

    $displayHalf2 = '<div class="displayHalf2">';
    $displayTitle = '<a class="displayTitle" href="http://localhost/dashboard/pap/livro.php?livro=' . $livro['ID'] . '" Title=' . $livro['Nome'] . '>' . $livro['Nome'] . '</a>';
    $textSeparator = '<div class="textSeparator"></div>';
    $displayParagraph = '<p class="displayParagraph">' . $livro['Descricao'] . '</p>';
    $displayHalf2 .= $displayTitle . $textSeparator . $displayParagraph . '</div>';

    $displayCard .= $displayHalf . $displayHalf2 . '</div>';

    echo $displayCard;
  }
  echo '</div>';
}
?>