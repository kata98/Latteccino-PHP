<?php

if(isset($_POST['naziv'])){
    include "../../config/connection.php";
    include "functions.php";

    $naziv = "%".strtolower($_POST['naziv'])."%";
    $upit = dohvatiSortiranje();

    $upit .= " WHERE LOWER(ime) LIKE :naziv";



    $rezultat = $konekcija->prepare($upit);
    $rezultat->bindParam(":naziv", $naziv);

    $rezultat->execute();

   
    try{
        $proizvodi = $rezultat->fetchAll();
        http_response_code(200);
        echo json_encode($proizvodi);
    }
    catch(PDOException $ex){
        http_response_code(500);
    }

} else {
    http_response_code(400);
}