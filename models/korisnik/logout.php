<?php
    header("Location: ../../index.php");
    session_start();
    include "../../config/connection.php";
    if(isset($_SESSION['korisnik'])){
        $id=$_SESSION['korisnik'] = $korisnikLogin;
    if(session_destroy()){
        
        
           
        $apdejt="UPDATE registracija SET aktivan='0' WHERE id=:id";
        $pripremaApdejt = $konekcija->prepare($apdejt);
        $pripremaApdejt->bindParam(':id', $id);
        $rezultatApdejt = $pripremaApdejt->execute();
    }
    }
    header("Location: ../../index.php");
    

           
