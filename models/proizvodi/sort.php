<?php
header("Content-Type: application/json");

if(isset($_POST['sort'])){
    $sort = $_POST['sort'];

    include "../../config/connection.php";
    include "functions.php";
    
    $upit = dohvatiSortiranje();

    switch($sort){
        case 1:
            $upit .= " ORDER BY ime ASC";
            break;
        case 2:
            $upit .= " ORDER BY ime DESC";
            break;
        case 3:
            $upit .= " ORDER BY cena ASC";
            break;
        case 4:
            $upit .= " ORDER BY cena DESC";
            break;
    }
    try{
        $rezultat = executeQuery($upit);
        http_response_code(200);
        echo json_encode($rezultat);
    }
    catch(PDOException $ex){
        http_response_code(500);
    }
} else {
    http_response_code(400); 
    echo json_encode(["greska"=> "You did not send sort"]);
}