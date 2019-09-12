<?php

require_once "config.php";

zabeleziPristup();

try {
    $konekcija = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $konekcija;
    return $konekcija->query($query)->fetchAll();
}


function zabeleziPristup(){
    $open = fopen(LOG_FAJL, "a");
    if($open){
        $date = date('d-m-Y H:i:s');
        fwrite($open, "{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
        fclose($open);
    }
}

function catchErrors($greske){
    @$open = fopen(ERROR_FILE, "a+");
    $unos = $greske."\t".date('d-m-Y H:i:s'). "\n";
    @fwrite($open, $unos);
    @fclose($open);
}
