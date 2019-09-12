<?php
    include '../../config/connection.php';
    if(!isset($_GET['id'])){
        header("Location: ../../views/admin.php");
    }   

    $id=$_GET['id'];
    $upit= "DELETE FROM registracija WHERE id=:id";

    $priprema = $konekcija->prepare($upit);
    $priprema->bindParam(":id",$id);
    $rez=$priprema->execute();
    
    header("Location: ../../views/admin.php");
?>