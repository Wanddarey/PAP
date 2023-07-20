<?php
//$servername = "sql212.infinityfree.com"; //localhost
//$username = "if0_34623021"; //root
//$password = "vSFEzWq8xLlucvL"; //
$DBname = "pap_test_db";
$servername = "localhost";
$username = "root";
$password = "";
$conn;
include_once 'Basics.php';

function tryconnect() {
    global $servername, $username, $password, $conn, $DBname;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        return true;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}

function dbQuery($query) {
    global $conn;
    if(tryconnect()) {
        $sql = "SELECT `ID`, `Nome`, `Autor`, `DdP`, `Editora`, `Capa` FROM `livros` WHERE `Nome` LIKE '%$query%' OR `Autor` LIKE '%$query%' OR `DdP` LIKE '%$query%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
    echo 'DB not found';
}

?>