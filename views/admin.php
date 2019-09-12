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
            <h2>Registered users</h2>
                <table id="tabela">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        <thead>    
                        <tbody>
                            <?php 
                            require_once "../config/connection.php";
                            require_once "../models/korisnik/funkcije.php";
                            $red=dohvatiKorisnike();
                            foreach ($red as $r):
                                ?>
                                <tr>
                                    <td><?=$r->id?></td>
                                    <td><?=$r->ime?></td>
                                    <td><?=$r->prezime?></td>
                                    <td><?=$r->email?></td>
                                    <td><?=$r->id_uloga?></td>
                                    <td><a href="update.php?id=<?=$r->id?>">Update</a></td> 
                                    <td><a href="../models/korisnik/delete.php?id=<?=$r->id?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    

                </table>
                <a class="promena" href="insert.php">INSERT</a><br/>
        </div>
        <div class="cleaner"></div>
        <div id="treci">
            <h2>Active users</h2>
                <table id="tabela1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                            </tr>
                        <thead>    
                        <tbody>
                            <?php 
                            require_once "../config/connection.php";
                            require_once "../models/korisnik/funkcije.php";
                            $aktivni=prikaziAktivne();
                            foreach ($aktivni as $a):
                                ?>
                                <tr>
                                    <td><?=$a->id?></td>
                                    <td><?=$a->ime?></td>
                                    <td><?=$a->prezime?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    

                </table>

        </div>
        <div class="cleaner"></div>
        <div id="pictures">

            <?php
                require_once "../config/connection.php";
                require_once "../models/proizvodi/functions.php";
                $data=dohvatiSlike1();

                foreach ($data as $d):
            ?>
                    <div class="prva">
                    <img src="../<?=$d->src?>" alt="<?=$d->alt?>" /></div>
            <?php  endforeach; ?>



        </div>
        <div class="cleaner"></div>
        <div id="menu">
            <h2><a name="1">Our Menu</a></h2>
            <div id="red">
                <a class="promena" href="insertProizvod.php">INSERT NEW ITEM</a>
                <a class="promena" href="../models/proizvodi/excel.php">EXPORT TO EXCEL</a><br/>
            </div>
            <div id="sort">
                <div id="porudzbina">
                    <div id="ddl">
                        <input type="text" id="naziv" placeholder="Search here..." class="validate">
                    </div>
                    <div id="sortiranje1">
                        <select id="sortiranje" name="sort" class="ddl">
                            <option value="0">Sort by</option>
                                <?php

                                    $options = [
                                        [
                                            "value" => 1,
                                            "text"=> "Name - ASC"
                                        ],
                                        [
                                            "value" => 2,
                                            "text" => "Name - DESC"
                                        ],
                                        [
                                            "value" => 3,
                                            "text" => "Price - ASC" 
                                        ],
                                        [
                                            "value" => 4,
                                            "text" => "Price - DESC"
                                        ]
                            
                                    ];

                                    foreach($options as $option): 
                                ?>

                                    <option value="<?= $option['value'] ?>"> <?= $option['text'] ?> </option>

                                <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="cleaner"></div>
                        
                            
        
                </div>
            </div>
            
            <div class="cleaner"></div>
            <div id="baner">



            <?php
                require_once "../config/connection.php";
                require_once "../models/proizvodi/functions.php";
                $product=dohvatiProizvode();

                foreach ($product as $p):
            ?>

                    <div class="artikl">
                    <img src="../<?=$p->slika_src?>"alt="<?=$p->slika_alt?>" />
                    <h3><?=$p->ime?></h3><br/>
                    <p><?=$p->cena?><br/><br/><?=$p->opis?></p>
                    <a class="promena" href="updateProizvod.php?id=<?=$p->id?>">UPDATE ITEM</a><br/>
                    <a class="promena" href="../models/proizvodi/deleteProizvod.php?id=<?=$p->id?>">DELETE ITEM</a><br/>
                    </div>
                <?php endforeach; ?>

                
                </div> 
                </div> 
                </div> 
            </div> 
            <div class="cleaner"></div>
            <div id="slider">
                <div id="centar1">
                    <i class="fa fa-coffee"></i>
                    <h2>Our Menu is on Fire!</h2>
                    <p>We’re proud of the range of both the coffee beverages that our cafe has, just as well as the range of snacks, pastry and lunches that we also do offer!</p>
                </div>
            </div>
            <div class="cleaner"></div>
            <div id="pictures1">

            <?php
            require_once "../config/connection.php";
            require_once "../models/proizvodi/functions.php";
            $data=dohvatiSlike2();

            foreach ($data as $d):
        ?>
                <div class="prva">
                <img src="../<?=$d->src?>" alt="<?=$d->alt?>" /></div>
        <?php  endforeach; ?>

        </div>

        <div class="cleaner"></div>



        <?php
            if(!isset ($_SESSION['korisnik'])):
        ?>
        <div id="booking">
            <h2><a name="2">Register here</a></h2>
            <form action="../models/korisnik/registracija.php" method="POST">

                <div id="booking1">

                    <input type="text" name="firstname" placeholder="First name" value="" class="ime" id="ime">
                    <p id="imeError"></p>
                    <input type="text" name="lastname" placeholder="Last name" value="" class="prezime" id="prezime">
                    <p id="prezimeError"></p>

                </div>
                <div id="booking2">

                    <input type="text" name="email" placeholder="Email address" value="" class="mejl1" id="mejl1">
                    <p id="mejlError"></p>
                    <input type="password" name="lozinka" placeholder="Password" value="" class="lozinka" id="lozinka">
                    <p id="lozinkaError"></p>

                    <input class="dugme" type="button" value="REGISTER" name="register" id="register">

                </div>
            </form>
            <form action="../models/korisnik/login.php" method="POST">

                <div id="booking3">

                    <input type="text" name="email2" placeholder="Email address" value="" class="mejl2" id="mejl2">
                    <p id="mejlError1"></p>
                    <input type="password" name="lozinka2" placeholder="Password" value="" class="lozinka2" id="lozinka2">
                    <p id="lozinkaError1"></p>

                    <input class="dugmeLog" type="submit" value="LOG IN" name="login" id="login">

                </div>
            </form>
        </div>
            <?php endif; ?>

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
                        <a href="author.php">About author</a><br/><br/>
                        <a href="Document (1).pdf">Documentation</a></p>

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