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

if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["book"]) || isset($_POST["book"])) {
   if (isset($_GET["book"])) {
      $book = test_input($_GET["book"]);
   } else {
      $book = test_input($_POST["book"]);
   }

   $result = dbGetBook($book)[0];
   if (empty($result)) {
      header("Location: status.php");
   }

   if ($_SESSION['user']['Id'] != $result['UId'] && $_SESSION['user']['role'] != 0) {
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
   isTrue(!empty($_FILES['cover']['tmp_name']));
   if (!empty($_FILES['cover']['tmp_name'])) {
      $mimet = get_mime_type($_FILES['cover']['tmp_name']);
      if ($mimet == 'image/png' || $mimet == 'image/jpg' || $mimet == 'image/jpeg' || $mimet == 'image/webp') {
         $fileName = sha1($_SESSION['user']['Id'] . time());
         editBook($book, $title, $author, $description, $fileName, $aR, $dOP);
         shell_exec("ffmpeg -i " . $_FILES['cover']['tmp_name'] . " ./imagens/displayImages/" . $fileName . ".webp");
         shell_exec("ffmpeg -i  ./imagens/displayImages/" . $fileName . ".webp -vf \"scale=-1:270\" ./imagens/gridImages/" . $fileName . "Grid.webp");
      }

   } else {
      editBookNoCover($book, $title, $author, $description, $aR, $dOP);
   }


   header('Location: Livro.php?book=' . $book);

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

<body><script>0</script>
   <?php require_once './html/header2.php'; ?>
   <?php require_once './html/sideMenu.php'; ?>

   <div id="lowerBody" class="lowerBody">
      <form class="forms" method="POST" enctype="multipart/form-data">
         <h1>Edit book</h1>
         <h4>Title</h4>
         <input id="title" value="<?php echo $result['title']; ?>" class="formElement formElementColor border"
            placeholder="Title" type="text" name="title">
         <h4>Author</h4>
         <input id="author" value="<?php echo $result['author']; ?>" class="formElement formElementColor border"
            placeholder="Author" type="text" name="author">
         <h4>Description</h4>
         <textarea id="descrpition" class="formElement formElementColor border" type="text" maxlength="600" name="description"><?php echo $result['description']; ?></textarea>
         <h4>Cover</h4>
         <img class="addBookImage" id="coverImg" src="" alt="">
         <input onchange="imgchng()" id="imgFile" class="formElement formElementColor border" placeholder="cover"
            type="file" accept="image/png, image/jpeg, image/webp" name="cover">
         <h4>Date of publication</h4>
         <input id="dOP" value="<?php echo $result['dOP']; ?>" class="formElement formElementColor border" placeholder="dOP" type="date" name="dOP">
         <h4>18+</h4>
         <input id="ageRestricted" value="<?php echo $result['ageRestricted']; ?>" class="formElement formElementColor border" placeholder="ageRestricted"
            type="checkbox" name="ageRestricted">
         <button class="formButton formElementColor border" type="reset">Clear</button>
         <button class="formButton formElementColor border" type="submit">Submit</button>
      </form>
   </div>
</body>



</html>