<div id="pictures">

<?php
    require_once 'config/connection.php';
    require_once 'models/proizvodi/functions.php';
    $data=dohvatiSlike1();

    foreach ($data as $d):
    ?>
        <div class="prva">
        <img src="<?=$d->src?>" alt="<?=$d->alt?>" /></div>
    <?php  endforeach; ?>

</div>
<div class="cleaner"></div>