<div id="menu">
        <h2><a name="1">Our Menu</a></h2>
        <div id="baner">

        <?php
         if(isset ($_SESSION['korisnik'])):

        require_once 'config/connection.php';
        require_once 'models/proizvodi/functions.php';

        $product = dohvatiProizvode();

        foreach ($product as $p):
        ?>
            <div class="artikl">
            <img src="<?=$p->slika_src?>" alt='<?=$p->slika_alt?>' />
            <h3><?=$p->ime?></h3><br/>
            <p><?=$p->cena?><br/><br/><?=$p->opis?></p>
            </div>
       <?php endforeach;
        endif;

         
        ?>
        <?php
         if(!isset ($_SESSION['korisnik'])): ?>
        <h4> Register to discover our <br/> DELICIOUS MENU! </h4>
    <?php endif; ?>


</div> 
</div>
</div>
<div class="cleaner"></div>