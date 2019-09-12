<?php
    include "../config/connection.php";
    include "fje.php";

    $authors=getInfo();
    $author=$authors[0];

    $wordApp=new COM("Word.Application");
    $wordApp->Visible=true;

    $wordApp->Documents->Add();
    $wordApp->Selection->TypeText("$author->ime \n $author->prezime \n $author->opis");

    header("Location: ../views/author.php");