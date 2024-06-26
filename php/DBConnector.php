<?php
error_reporting(E_ALL);
//$servername = "sql212.infinityfree.com";
//$username = "if0_34623021";
//$password = "vSFEzWq8xLlucvL";
$DBname = "demo";
$servername = "localhost";
$username = "root";
$dbPassword = "";
$conn;
require_once 'Basics.php';

function tryconnect()
{
    global $servername, $username, $dbPassword, $conn, $DBname;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        return true;
    } catch (PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
        return false;
    }
}

function executeStatement($sql)
{
    global $conn;
    if (tryconnect()) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } else {
        consoleLog('Failed to connect to DB');
    }
}

/*
function dbQuery($query)
{
    global $conn;
    if (tryconnect()) {
        $sql = "SELECT * LIMIT 2 FROM `books` WHERE `title` LIKE '%$query%' OR `author` LIKE '%$query%' OR `dOP` LIKE '%$query%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //echo 'DB not found';
}

function dbQueryP($query, $pgNumber)
{
    global $conn;
    if (tryconnect()) {
        $sql = "SELECT * FROM `books` WHERE `title` LIKE '%$query%' OR `author` LIKE '%$query%' OR `dOP` LIKE '%$query%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //echo 'DB not found';
}

function dbDefaultQuery()
{
    global $conn;
    if (tryconnect()) {
        $sql = "SELECT * FROM `books` ORDER BY `Id` DESC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //echo 'DB not found';
}*/
function standartQuery($query, $pgNumber)
{
    consoleLog($query);
    $sql = 'SELECT * FROM `books` ';
    if (isset($query) && $query != '') {
        $sql = $sql . "WHERE `title` LIKE '%" . $query . "%' OR `author` LIKE '%" . $query . "%' OR `dOP` LIKE '%" . $query . "%' ";
    } else {
        $sql = $sql . 'ORDER BY `Id` DESC ';
    }
    $pgNumber = $pgNumber - 1;
    $sql = $sql . 'LIMIT ' . $pgNumber * 20 . ', 20;';
    //consoleLog('stm: ' . $sql);
    return executeStatement($sql);
}

function countQueryResults($query) {
    if (empty($query)) {
        $sql = "SELECT COUNT(Id) AS total FROM `books`;";
    } else {
        $sql = "SELECT COUNT(Id) AS total FROM `books` WHERE `title` LIKE '%" . $query . "%' OR `author` LIKE '%" . $query . "%' OR `dOP` LIKE '%" . $query . "%' AND `statusId` = 1;";
    }

    $result = executeStatement($sql);

    // Check if result is valid
    if (!empty($result) && isset($result[0]['total'])) {
        $totalCount = (int)$result[0]['total'];

        // Calculate number of pages (assuming 20 results per page)
        //consoleLog('num paginas - '. ceil($totalCount / 20));
        $pages = ceil($totalCount / 20);

        return $pages;
    } else {
        return 0; // or handle the error in an appropriate way
    }
}




function dbGetBook($book)
{
    $sql = "SELECT * FROM `books` WHERE `Id` = '$book';";
    return executeStatement($sql);
}

function dbGetFiles($bookId)
{
    $sql = "SELECT * FROM `pdffiles` WHERE `bookId` = '$bookId';";
    return executeStatement($sql);
}

function dbGetBookFile($fileId) {
    $sql = "SELECT * FROM `pdffiles` WHERE `Id` = '$fileId';";
    return executeStatement($sql);
}

function dbGetLang($langId) {
    $sql = "SELECT * FROM `language` WHERE `Id` = '$langId';";
    return executeStatement($sql);
}

function doLogin($userName) {
    $sql = "SELECT * FROM `users` WHERE `userName` = '$userName';";

    return executeStatement($sql); 
}

function getUser($Id) {
    $sql = "SELECT * FROM `users` WHERE `Id` = $Id ;";

    return executeStatement($sql);
}

function createUser($un, $pw, $dob, $unixTimeStamp) {
    $sql = "INSERT INTO `users` (`userName`, `password`, `birthDate`, `timeStamp`) VALUES ('$un', '$pw', '$dob', $unixTimeStamp);";
    executeStatement($sql);
}

function addBook($uId, $title, $author, $description, $cover, $aR, $dOP) {
    $time = time();
    $sql = "INSERT INTO `books` (`UId`, `title`, `author`, `description`, `cover`, `ageRestricted`, `dOP`, `statusId`, `timeStamp`) 
        VALUES ($uId, '$title', '$author', '$description', '$cover', '$aR', '$dOP', 1, $time)";
    return executeStatement($sql);

}

function editBook($book, $title, $author, $description, $cover, $aR, $dOP) {
    $sql = "UPDATE `books` (`title`, `author`, `description`, `cover`, `ageRestricted`, `dOP`) VALUES ('$title', '$author', '$description', '$cover', '$aR', '$dOP') WHERE `Id` = $book";

    executeStatement($sql);
}

function getComments($bookId) {
    $sql = "SELECT * FROM `comments` WHERE `bookId` = $bookId;";
    return executeStatement($sql);
}

function addComment($UId, $bid, $content) {
    $sql = "INSERT INTO `comments` (`UId`, `bookId`, `statusId`, `content`, `timeStamp`) VALUES ($UId, $bid, 1, '$content', " . time() . ");";

    executeStatement($sql);
}