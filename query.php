<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<?php require_once './html/header.php'; ?>
<?php require_once './html/sideMenu.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livros</title>
  <?php require_once './html/basicImports.html'; ?>
</head>

<body>

  <div class="lowerBody">
    <?php
    
    require_once './php/DBConnector.php';
    require_once './php/Basics.php';
    $pgs = 0;

    function mkbtn($query, $pg) {
      $currentPageLink = 'http://localhost/dashboard/pap/query.php?query=' . $query . '&pg=';
      $pageButtonContainer = '<div class="pageButtonContainer"> ';

      $pgs = countQueryResults($query);
      //consoleLog('pgs - ' . $pgs);
      $pg = 1;
      if (isset($_GET["pg"])) {
        $pg = test_input($_GET["pg"]);
      }

      if ($pg - 10 >= 1) {
        $pageButtonContainer .= '<a class="pageButton" href="' . $currentPageLink . ($pg - 10) . '"><<</a>';
      }

      if ($pg > 1) {
        $pageButtonContainer .= '<a class="pageButton" href="' . $currentPageLink . ($pg - 1) . '"><</a>';
      }

      $pageButtonContainer .= '<p class="pageButton">' . $pg . '/' . $pgs . '</p>';

      if ($pgs > $pg ) {
        $pageButtonContainer .= '<a class="pageButton" href="' . $currentPageLink . ($pg + 1) . '">></a>';
      }
      if ($pgs >= $pg + 10) {
        $pageButtonContainer .= '<a class="pageButton" href="' . $currentPageLink . ($pg + 10) . '">>></a>';
      }
      return $pageButtonContainer . '</div>';
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["query"]) || isset($_GET["pg"])) {
      $query = '';
      if (isset($_GET["query"])) {
        $query = test_input($_GET["query"]);
      }
      $pg = 1;
      if (isset($_GET["pg"])) {
        $pg = test_input($_GET["pg"]);
      }
      $result = standartQuery($query, $pg);
      if (!empty($result)) {
        $pgs = countQueryResults($query);
        echo mkbtn($query, $pg);
        displayQuery($result);
        
      } else if (empty($result)) {
        echo '<div class="noResult" style="margin: 0px"><h2>No Results</h2></div>';
      } else {
      }

    } else {
      $query = '';
      $pg = 1;
      $result = standartQuery($query, $pg);
      if (!empty($result)) {
        $pgs = countQueryResults($query);
        echo mkbtn($query, $pg);
        displayQuery($result);
      } else if (empty($result)) {
        echo '<div class="noResult" style="margin: 0px"><h2>No Results</h2></div>';
      } else {
      }
    }
    ?>
  </div>
</body>

</html>
<?php
function displayQuery($books)
{
  //Mostra o corpo principal da pagina
  echo '<div id="cardDisplay" class="cardDisplayGrid">';

  foreach ($books as $book) {
    $displayCard = '<a href="http://localhost/dashboard/pap/livro.php?book=' . $book['Id'] . '" Title=' . $book['title'] . '><div class="displayCardGrid">';
    $displayHalf = '<div class="displayHalf">';
    if (empty($book['cover'])) {
      $displayImage = '<img class="displayImage" src="./imagens/gridImages/loremGrid.webp">';
    } else {
      $displayImage = '<img class="displayImage" src="./imagens/gridImages/' . $book['cover'] . 'Grid.webp">';
    }
    $displayHalf .= $displayImage . '</div>';

    $displayHalf2 = '<div class="displayHalf2">';
    $displayTitle = '<h1 class="displayTitle">' . $book['title'] . '</h1>';
    $textSeparator = '<div class="textSeparator"></div>';
    $displayParagraph = '<p class="displayParagraph">' . $book['description'] . '</p>';
    $displayHalf2 .= $displayTitle . $textSeparator . $displayParagraph . '</div>';

    $displayCard .= $displayHalf . $displayHalf2 . '</div></a>';

    echo $displayCard;
  }

  echo '</div>';
  
  global $pg, $query, $pgs;
  echo mkbtn($query, $pg);
}
?>