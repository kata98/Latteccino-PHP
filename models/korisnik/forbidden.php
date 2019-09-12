<?php

if(isset($_SESSION['korisnik'])){
    if($_SESSION['korisnik']->id_uloga != 1){
    header("Location: ../index.php");
    }
    } else {
    header("Location: ../index.php");
} 