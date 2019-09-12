<?php

function dohvatiNav(){
    return executeQuery("SELECT * FROM navigacija");
}

function getInfo(){
    return "SELECT * FROM auotor";
}


?>