<?php
session_start();
 include "../../config/connection.php";

 if(isset($_POST['login'])){
    $mailLogin = $_POST['email2'];
    $passLogin = $_POST['lozinka2'];

    $reMailLogin = "/^(([A-z]{4,})|([a-z]{2,11}\.[a-z]{2,13}\.[1-9][0-9]*[0-9]*\.[1-9][0-9]))\@(ict.edu.rs|gmail.com|yahoo.com|hotmail.com|eunet.rs)$/";
    $rePassLogin = "/^[A-z0-9]{6,20}$/";
    $errorsLogin = [];

    if(!preg_match($reMailLogin, $mailLogin)){
        $errorsLogin[] = "Email is not valid";
    }

    if(!preg_match($rePassLogin, $passLogin)){
        $errorsLogin[] = "Password is not valid";
    }

    if(count($errorsLogin) != 0){
        $codeLogin = 422;
    }

    else{
        $mailLogin2 = $_POST['email2'];
        $passLogin2 = md5($_POST['lozinka2']);
        $upitLogin = "SELECT * FROM registracija WHERE email=:email AND lozinka=:lozinka";

        $pripremaLogin = $konekcija->prepare($upitLogin);
        $pripremaLogin->bindParam(':email', $mailLogin2);
        $pripremaLogin->bindParam(':lozinka', $passLogin2);
        $rezultatLogin = $pripremaLogin->execute();

        if($rezultatLogin){
        if($pripremaLogin->rowCount()==1){
            $korisnikLogin = $pripremaLogin->fetch();
            $_SESSION['korisnik_id'] = $korisnikLogin->id;
            $_SESSION['korisnik'] = $korisnikLogin;
            $id=$_SESSION['korisnik_id'] = $korisnikLogin->id;

            $apdejt="UPDATE registracija SET aktivan='1' WHERE id=:id";
            $pripremaApdejt = $konekcija->prepare($apdejt);
            $pripremaApdejt->bindParam(':id', $id);
            $rezultatApdejt = $pripremaApdejt->execute();

            if($_SESSION['korisnik']->id_uloga == 1){
                    header("Location: ../../views/admin.php");
                }else{
                    header("Location: ../../index.php");
                    catchErrors($ex->getMessage());
                }
            }
        }
    }
} 

?>

