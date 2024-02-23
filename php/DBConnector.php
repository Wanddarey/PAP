<?php
//$servername = "sql212.infinityfree.com";
//$username = "if0_34623021";
//$password = "vSFEzWq8xLlucvL";
$DBname = "papdb";
$servername = "localhost";
$username = "root";
$password = "";
$conn;
include_once 'Basics.php';

function tryconnect()
{
    global $servername, $username, $password, $conn, $DBname;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $password);
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
    consoleLog('stm: ' . $sql);
    return executeStatement($sql);
}

function countQueryResults($query) {
    // Construct SQL query
    if (empty($query)) {
        $sql = "SELECT COUNT(Id) AS total FROM `books`;";
    } else {
        $sql = "SELECT COUNT(Id) AS total FROM `books` WHERE `title` LIKE '%" . $query . "%' OR `author` LIKE '%" . $query . "%' OR `dOP` LIKE '%" . $query . "%';";
    }

    // Execute the query
    $result = executeStatement($sql);

    // Check if result is valid
    if (!empty($result) && isset($result[0]['total'])) {
        $totalCount = (int)$result[0]['total'];

        // Calculate number of pages (assuming 20 results per page)
        consoleLog('num paginas - '. ceil($totalCount / 20));
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

function Login($userName) {
    $sql = "SELECT * FROM `users` WHERE `userName` = '$userName';";
    return executeStatement($sql);
}

?>