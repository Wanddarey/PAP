<?php
include_once 'DBConnector.php';
include_once 'Basics.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["query"])) {

    $query = test_input($_GET["query"]);
    $res = dbQuery($query);
    $searchResult = array();
    if(!empty($res)) {
        $data = array();
        foreach ($res as $row) {
            $id = $row["ID"];
            $nome = $row["Nome"];
            $autor = $row["Autor"];
            $DdP = $row["DdP"];
            $editora = $row["Editora"];
            $capa = $row["Capa"];
            $data[] = array('id' => $id, 'nome' => $nome, 'autor' => $autor, 'DdP' => $DdP, 'editora' => $editora, 'capa' => $capa);
        }
        $searchResult = [
            "livros" => $data,
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