<?php
session_start();
include "../config/connection.php";
require "../models/korisnik/forbidden.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Latteccino</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="keywords" content="latteccino, coffee, food, pastry, snack" />
    <meta name="description" content="Latteccino uses the highest quality arabica coffee as the base for its espresso drinks. Learn about our unique coffees and espresso drinks today." />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" href="../assets/images/logo2.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">
</head>

<body>
    <div id="slajder">
        <div id="centar">
            <div id="meni">
                <ul class="lista">
                    <?php if(!isset ($_SESSION['korisnik'])): ?>
                        <li><a href="#2">REGISTER</a></li>
                    <?php endif; ?>
                    <?php if(isset ($_SESSION['korisnik'])): ?>
                        <li><a href="../models/korisnik/logout.php">LOG OUT</a></li>
                        <a href="admin.php"><i class="fa fa-user"></i></a>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="cleaner"></div>
            <div id="logo">
                <div id="logo1">
                    <a href="../index.php"><img src="../assets/images/logo1.png" alt="Latteccino" /></a>
                </div>
                <div id="adresa">
                    <h1>Welcome, admin!</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="cleaner"></div>
    <div id="drugi">
        <div id="booking">
            <form action="../models/proizvodi/proveraInsertProizvod.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="naslov" placeholder="Product name" value="" class="naslov" id="naslov"><br/>
                <input type="text" name="cena" placeholder="Product price" value="" class="cena" id="cena"><br/>
                <input type="text" name="opis" placeholder="Product description" value="" class="opis" id="opis"><br>
                <input type="text" name="opis1" placeholder="Image description" value="" class="opis" id="opis"><br/>
                <input type="file" name="slika" value="" class="slika" id="slika"><br>

                <input class="dugme" type="submit" value="INSERT ITEM" name="insertP" id="insert">

                
            </form>
        </div>
    </div>
    <div class="cleaner"></div>
    <div id="futer">
        <div id="info">
            <div id="levo">
                <h3><a name="3">CONTACT</a></h3>
                <p>500 Terry Francois St. San Francisco, CA 94158<br/><br/>Open daily 10AM-10PM
                </p>
            </div>
            <div id="desno">
                <h3>AUTHOR</h3>
                <p>Tel: 123-456-7890<br/><br/>


            </div>
        </div>
        <div id="forma">
            <h3>MAILING LIST</h3>
            <form action="#" method="post">
                E-mail:<br/>
                <input type="text" name="email" placeholder="Email address" value="" class="mejl" id="mejl"><br/>
                <input class="prijava" type="button" value="SUBSCRIBE">
            </form>
            <div id="fafa">
                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com" target="-blank"><i class="fa fa-twitter"></i></a>
                <a href="sitemap.xml" target="_blank"><i class="fa fa-sitemap"></i></a>
            </div>
        </div>
    </div>
    <div class="cleaner"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/js/main.js" type="text/javascript"></script>
</body>

</html>