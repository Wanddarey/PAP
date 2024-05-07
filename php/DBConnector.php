<?php
error_reporting(E_ALL);
//$servername = "sql212.infinityfree.com";
//$username = "if0_34623021";
//$password = "vSFEzWq8xLlucvL";
$DBname = "DemoPAPdb";
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
        echo "Connected successfully";
        return true;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}

function executeStatement($sql)
{
    global $conn;
    //TODO: descobrir porque é que esta bosta devolve false no login
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
    consoleLog('stm: ' . $sql);
    return executeStatement($sql);
}

function countQueryResults($query) {
    if (empty($query)) {
        $sql = "SELECT COUNT(Id) AS total FROM `books`;";
    } else {
        $sql = "SELECT COUNT(Id) AS total FROM `books` WHERE `title` LIKE '%" . $query . "%' OR `author` LIKE '%" . $query . "%' OR `dOP` LIKE '%" . $query . "%';";
    }

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

function doLogin($userName) {
    $sql = "SELECT * FROM `users` WHERE `userName` = '$userName';";
    //consoleLog(executeStatement($sql));
    //consoleLog($sql);
    //executeStatement

    return executeStatement($sql);
    
}