<?php

require_once "../../config/connection.php";
include "functions.php";

$proizvod = dohvatiProizvode();

$excel = new COM("Excel.Application");

$excel->Visible = 1;

$workbook = $excel->Workbooks->Open("http://localhost/Latteccino1/models/proizvodi/Kafe.xlsx") or die('Did not open filename');

$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$br = 1;
foreach($proizvod as $p){
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $p->id;

    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $p->ime;

    $polje = $sheet->Range("C{$br}");
    $polje->activate;
    $polje->value = $p->cena;

    $polje = $sheet->Range("D{$br}");
    $polje->activate;
    $polje->value = $p->opis;

    $br++;
}

$workbook->_SaveAs("http://localhost/Lattecino1/models/proizvodi/Kafe.xlsx", -4143);
$workbook->Save();

$workbook->Saved=true;
$workbook->Close;

$excel->Workbooks->Close();
$excel->Quit();

unset($sheet);
unset($workbook);
unset($excel);