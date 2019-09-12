<?php 

$sql = "SELECT COUNT(*) as count FROM menu1";
$result = $konekcija->query($sql);
$r=$result->fetch();
$numrows = $r->count;

$rowsperpage = 6;

$totalpages = ceil($numrows / $rowsperpage);


if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
    $currentpage = (int) $_GET['currentpage'];
} else {
$currentpage = 1;
} 


if ($currentpage > $totalpages) {
    $currentpage = $totalpages;
} 
if ($currentpage < 1) {
    $currentpage = 1;
} 
$offset = ($currentpage - 1) * $rowsperpage;
$range = 2;
echo '<div id="paginacija">';
if ($currentpage > 1) {
    $prevpage = $currentpage - 1;
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a>";
} 

for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
    if ($x == $currentpage) {
        echo " [<b>$x</b>] ";
    } else {
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
    } 
} 
} 

if ($currentpage != $totalpages) {
    $nextpage = $currentpage + 1;
    echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
} 

echo '</div>';

$upit = "SELECT * FROM menu1 LIMIT $offset, $rowsperpage";
$rezultat = $konekcija->query($upit);
while ($niz = $rezultat->fetch())
{
    
    echo ' <div class="artikl">
        <img src="../'.$niz->slika_src.'"alt="'.$niz->slika_alt.'" />
        <h3>'.$niz->ime.'</h3><br/>
        <p>'.$niz->cena.'<br/><br/>'.$niz->opis.'</p>
        <a class="promena" href="updateProizvod.php?id='.$niz->id.'">UPDATE ITEM</a><br/>
        <a class="promena" href="../models/proizvodi/deleteProizvod.php?id='.$niz->id.'">DELETE ITEM</a><br/>
    </div>';

}
?>