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

function dbQuery($query)
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
}

function dbGetBook($book)
{
    global $conn;
    if (tryconnect()) {
        $sql = "SELECT * FROM `books` WHERE `Id` = '$book'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //echo 'DB not found';
}

function dbGetFile($bookId)
{
    global $conn;
    if (tryconnect()) {
        $sql = "SELECT * FROM `pdffiles` WHERE `Id` = '$bookId'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>