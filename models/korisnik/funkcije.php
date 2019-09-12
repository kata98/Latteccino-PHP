<?php

function insertuj($ime, $prezime, $mejl, $lozinka, $id_uloga){
    global $konekcija;
    $insertuj = $konekcija->prepare("INSERT INTO registracija VALUES(null, ?, ?, ?, ?, ?, '0')");
    $isInserted  = $insertuj->execute([$ime, $prezime, $mejl, $lozinka, $id_uloga]);
    return $isInserted;
}

function updejtuj($id, $ime, $prezime, $mejl, $lozinka, $id_uloga){
    global $konekcija;
    $updejtuj = $konekcija->prepare('UPDATE registracija SET ime=?, prezime=?, email=?, lozinka=?, id_uloga=? WHERE id=?');
    $isUpdated = $updejtuj->execute([$ime, $prezime, $mejl, $lozinka, $id_uloga, $id]);
    return $isUpdated;
}

function dohvatiKorisnike(){
    return executeQuery("SELECT * FROM registracija");
}

function dohvatiUloge(){
    return executeQuery("SELECT * FROM uloga");
}

function prikaziAktivne(){
    return executeQuery("SELECT * FROM registracija WHERE aktivan='1'");
}
?>