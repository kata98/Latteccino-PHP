window.onload = function() {

    $("#sortiranje").change(function() {
        let sort = $(this).val();

        $.ajax({
            url: "../models/proizvodi/sort.php",
            method: "POST",
            data: {
                sort: sort
            },
            dataType: 'json',
            success: function(podaci) {
                console.log(podaci);
                showProducts(podaci);
            },
            error: function(greska) {
                console.log(greska);
            }
        })
    });

    $("#naziv").keyup(function() {
        let naziv = $(this).val();

        $.ajax({
            url: "../models/proizvodi/filter.php",
            method: "POST",
            data: {
                naziv: naziv
            },
            dataType: 'json',
            success: function(podaci) {
                console.log(podaci);
                showProducts(podaci);
            },
            error: function(greska) {
                console.log(greska);
            }
        })
    });



    document.getElementById('register').addEventListener("click", provera);





};

function showProducts(podaci) {
    let html = "";
    for (let proizvod of podaci) {
        html += `
            <div class="artikl">
            <img src="../${proizvod.slika_src}"alt="${proizvod.slika_alt}" />
            <h3>${proizvod.ime}</h3><br/>
            <p>${proizvod.cena}<br/><br/>${proizvod.opis}</p>
            <a class="promena" href="updateProizvod.php?id=${proizvod.id}">UPDATE ITEM</a><br/>
            <a class="promena" href="../models/proizvodi/deleteProizvod.php?id=<${proizvod.id}">DELETE ITEM</a><br/>
            </div>
        `;
    }
    $("#baner").html(html);
}


function provera2() {

    var mejl = document.getElementById("mejl2").value.trim();
    var lozinka = document.getElementById("lozinka2").value.trim();

    var mejlError = document.getElementById("mejlError1");
    var lozinkaError = document.getElementById("lozinkaError1");

    var regMejl = /^(([A-z]{4,})|([a-z]{2,11}\.[a-z]{2,13}\.[1-9][0-9]*[0-9]*\.[1-9][0-9]))\@(ict.edu.rs|gmail.com|yahoo.com|hotmail.com|eunet.rs)$/;
    var regLozinka = /^[A-z0-9]{6,20}$/;

    if (mejl == "") {
        mejlError.textContent = "Email is required";
    } else if (!regMejl.test(mejl)) {
        mejlError.textContent = "Email is not valid";

    } else {
        mejlError.textContent = "";
    }

    if (lozinka == "") {
        lozinkaError.textContent = "Password is required";
    } else if (!regLozinka.test(lozinka)) {
        lozinkaError.textContent = "Password is not valid";

    } else {
        lozinkaError.textContent = "";
    }

}



$('#dugmence').click(function() {
    $('#sakriveno').slideToggle("slow");
});

$('#tabela tbody tr:odd').css('backgroundColor', '#F5EDE2');
$('#tabela1 tbody tr:odd').css('backgroundColor', '#F5EDE2');

function provera() {
    var ime = document.getElementById("ime").value.trim();
    var prezime = document.getElementById("prezime").value.trim();
    var mejl = document.getElementById("mejl1").value.trim();
    var lozinka = document.getElementById("lozinka").value.trim();


    var imeError = document.getElementById("imeError");
    var prezimeError = document.getElementById("prezimeError");
    var mejlError = document.getElementById("mejlError");
    var lozinkaError = document.getElementById("lozinkaError");


    var regIme = /^[A-Z][a-z]{2,10}$/;
    var regPrezime = /^[A-Z][a-z]{2,10}$/;
    var regMejl = /^(([A-z]{4,})|([a-z]{2,11}\.[a-z]{2,13}\.[1-9][0-9]*[0-9]*\.[1-9][0-9]))\@(ict.edu.rs|gmail.com|yahoo.com|hotmail.com|eunet.rs)$/;
    var regLozinka = /^[A-z0-9] {6,20}$/;

    var greske = [];

    if (ime == "") {
        imeError.textContent = "First name is required";
        greske.push("First name is required");
    } else if (!regIme.test(ime)) {
        imeError.textContent = "First name is not valid";
        greske.push("First name is not valid");
    } else {
        imeError.textContent = "";
    }

    if (prezime == "") {
        prezimeError.textContent = "Last name is required";
        greske.push("Last name is not required");
    } else if (!regPrezime.test(prezime)) {
        prezimeError.textContent = "First name is not valid";
        greske.push("Last name is not valid");
    } else {
        prezimeError.textContent = "";
    }

    if (mejl == "") {
        mejlError.textContent = "Email is required";
        greske.push("Email is required");
    } else if (!regMejl.test(mejl)) {
        mejlError.textContent = "Email is not valid";
        greske.push("Email is not valid");
    } else {
        mejlError.textContent = "";
    }

    if (lozinka == "") {
        lozinkaError.textContent = "Password is required";
        greske.push("Password is required");
    } else if (!regIme.test(ime)) {
        lozinkaError.textContent = "Password is not valid";
        greske.push("Password is not valid");
    } else {
        lozinkaError.textContent = "";
    }

    if (greske.length == 0) {
        $.ajax({
            url: "models/korisnik/registracija.php",
            method: "POST",
            data: {
                send: true,
                firstname: ime,
                lastname: prezime,
                email: mejl,
                lozinka: lozinka
            },
            success: function(data) {
                alert("Registration has been succesful");

            },
            error: function(xhr, status, error) {
                var status = xhr.status;
                switch (status) {
                    case 422:
                        alert('Informations are not good!');
                        break;
                    case 409:
                        alert('Mail already exist.');
                        break;
                    case 500:
                        alert("Error with DataBase.");
                        break;
                    case 412:
                        alert("User already exists.");
                        break;
                    default:
                        alert("Error:" + xhr.status);
                }
            }
        });
    }


};