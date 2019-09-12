<?php
        if(!isset ($_SESSION['korisnik'])):
    ?>
    <div id="booking">
        <h2><a name="2">Register here</a></h2>
        <form action="models/korisnik/registracija.php" method="POST">

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
        <form action="models/korisnik/login.php" method="POST">

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