<?php
session_start();
if (empty($_SESSION['user'])) {
   header('Location: ./Login.php');
}
require_once './php/Basics.php';
require_once './php/DBConnector.php';

$title;
$author;
$description;
$cover;
$dOP;
$aR;

if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["b"]) || isset($_POST["b"])) {
   if (isset($_GET["book"])) {
      $book = test_input($_GET["book"]);
   } else {
      $book = test_input($_POST["book"]);
   }

   $result = dbGetBook($book)[0];

   if ($_SESSION['user']['Id'] != $result['UId'] || $_SESSION['user']['role'] != 0) {
      header("Location: status.php?s=403");
   }
} else {
   header("Location: status.php");
}

if (
   $_SERVER["REQUEST_METHOD"] == "POST"
   && isset($_POST["title"])
   && isset($_POST["author"])
   && isset($_POST["description"])
   && isset($_FILES['cover'])
   && isset($_POST["dOP"])
   && $_SESSION['user']['statusId'] != 2
) {

   $title = test_input($_POST["title"]);
   $author = test_input($_POST["author"]);
   $description = test_input($_POST["description"]);
   $dOP = test_input($_POST["dOP"]);
   $aR;
   if (empty($_POST["ageRestricted"])) {
      $aR = 0;
   } else {
      $aR = 1;
   }

   editBook($title, $author, $description, $aR, $dOP);


   //header('Location: ./Account.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>
   <?php require_once './html/basicImports.html'; ?>
   <script src="./javascript/loadImg.js"></script>
</head>
<?php


?>

<body>
   <?php require_once './html/header.php'; ?>
   <?php require_once './html/sideMenu.php'; ?>

   <div id="lowerBody" class="lowerBody">
      <form class="forms" method="POST" enctype="multipart/form-data">
         <h1>Title</h1>
         <input id="title" class="formElement formElementColor border" placeholder="Title" type="text" name="title">
         <h1>Author</h1>
         <input id="author" class="formElement formElementColor border" placeholder="Author" type="text" name="author">
         <h1>Description</h1>
         <textarea id="descrpition" class="formElement formElementColor border" type="text" maxlength="600"
            name="description"> </textarea>
         <h1>Cover</h1>
         <img class="addBookImage" id="coverImg" src="" alt="">
         <input onchange="imgchng()" id="cover" class="formElement formElementColor border" placeholder="cover"
            type="file" accept="image/png, image/jpeg, image/webp" name="cover">
         <h1>Date of publication</h1>
         <input id="dOP" class="formElement formElementColor border" placeholder="dOP" type="date" name="dOP">
         <h1>18+</h1>
         <input id="ageRestricted" class="formElement formElementColor border" placeholder="ageRestricted"
            type="checkbox" name="ageRestricted">
         <button class="formButton formElementColor border" type="reset">Clear</button>
         <button class="formButton formElementColor border" type="submit">Submit</button>
      </form>
   </div>
</body>



</html>