<!DOCTYPE html>
<html>
    <head>
        <title>Latteccino</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="robots" content="noindex,nofollow" />
        <meta name="keywords" content="latteccino, coffee, food, pastry, snack" />
        <meta name="description" content="Latteccino uses the highest quality arabica coffee as the base for its espresso drinks. Learn about our unique coffees and espresso drinks today." />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shorcut icon" href="assets/images/logo2.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">
    </head>
    <body>
    <div id="slajder">
        <div id="centar">
            <div id="meni">
                <ul class="lista">

                <?php
                    require_once "config/connection.php";
                    require_once "models/fje.php";
                    $link = dohvatiNav();

                    foreach ($link as $l):
                    ?>
                        <li><a href="<?=$l->ahref?>"><?=$l->naziv?></a></li>';
                    <?php endforeach; ?>

                <?php if(!isset ($_SESSION['korisnik'])): ?>
                    <li><a href="#2">REGISTER</a></li>
                <?php endif; ?>
                <?php if(isset ($_SESSION['korisnik'])): ?>
                    <li><a href="models/korisnik/logout.php">LOG OUT</a></li>
                <?php endif; ?>
                </ul>
            </div>
            <div class="cleaner"></div>
            <div id="logo">
                <div id="logo1">
                    <a href="index.php"><img src="assets/images/logo1.png" alt="Latteccino" /></a>
                </div>
                <div id="adresa">
                    <p>Alexandria, 32 Washingtorn str, 22303<br/>Opening hours: Mo-Fr 11:00-00:00, Sa-Sa 15:00-00:00<br/>Call (555)123-4567</p>
                </div>
            </div>
        </div>
    </div>
    <div class="cleaner"></div>
    <div id="drugi">
        <div class="text">
            <h1>Latteccino Welcomes You!</h1>
            <h2>The perfect place to enjoy the life and food.</h2>
            <div id=sakriveno>
                <p>Back in the day, when our up-and-coming coffee shop was just making first rounds among numerous coffee junkies in the local area, a concept of our operations has been developed.</p>
            </div>
            <input type="submit" name="readMore" value="READ MORE" id="dugmence">
        </div>
        <div class="slika">
            <img src="assets/images/icon.png" alt="coffee" />
        </div>
    </div>
    <div class="cleaner"></div>