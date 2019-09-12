<?php



    function update($ime, $cena, $opis, $putanjaOriginalnaSlika, $putanjaNovaSlika, $id){
        global $konekcija;
        $update = $konekcija->prepare("UPDATE menu1 SET ime=?, cena=?, opis=?, slika_alt=?, slika_src=? WHERE id=?");
        $isUpdated = $update->execute([$ime, $cena, $opis, $putanjaOriginalnaSlika, $putanjaNovaSlika, $id]);
        return $isUpdated;
    }

    function insert($ime, $cena, $opis, $putanjaOriginalnaSlika, $putanjaNovaSlika){
        global $konekcija;
        $insert = $konekcija->prepare("INSERT INTO menu1 VALUES(null, ?, ?, ?, ?, ?)");
        $isInserted  = $insert->execute([$ime, $cena, $opis, $putanjaOriginalnaSlika, $putanjaNovaSlika]);
        return $isInserted;
    }

    function dohvatiProizvode(){
        return executeQuery("SELECT * FROM menu1");
    }

    function dohvatiSortiranje(){
        return "SELECT * FROM menu1";
    }


    function dohvatiSlike2(){
        return executeQuery("SELECT * FROM slike2");
    }

    function dohvatiSlike1(){
        return executeQuery("SELECT * FROM slike1");
    }


?>