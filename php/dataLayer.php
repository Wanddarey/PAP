<?php
include_once 'DBConnector.php';
include_once 'Basics.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["query"])) {

    $query = test_input($_GET["query"]);
    $res = dbQuery($query);
    $searchResult = array();
    if(!empty($res)) {
        $searchResult = [
            "livros" => $res,
            "status" => "Success"
        ];
    } else if (empty($res)){
        $errors = [
            'status' => '404',
            'code'=> '0',
            'title'=> 'not found'
        ];
        $searchResult = [
            'data' => 'null',
            'errors' => $errors
        ];
    } else {
    }
    header('Content-Type: application/json');
    echo $jsonformat = json_encode($searchResult);
} else {
    http_response_code(404);
    echo 'Not Found';
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_POST["GET"])) {
    
}

?>