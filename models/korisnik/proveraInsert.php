<?php
    
 session_start();
 include '../../config/connection.php';
 require_once "funkcije.php";
 $poruka=null;

 if(isset($_POST['insert'])) {
	$ime =$_POST['firstname'];
    $prezime =$_POST['lastname'];
    $mejl =$_POST['email'];
    $lozinka = $_POST['lozinka'];
    $id_uloga=$_POST['uloga'];

    $regIme = "/^[A-Z][a-z]{2,10}$/";
    $regPrezime = "/^[A-Z][a-z]{2,10}$/";
    $regMejl =  "/^(([A-z]{4,})|([a-z]{2,11}\.[a-z]{2,13}\.[1-9][0-9]*[0-9]*\.[1-9][0-9]))\@(ict.edu.rs|gmail.com|yahoo.com|hotmail.com|eunet.rs)$/";
    $regLozinka = "/^[A-z0-9]{6,20}$/";

    $greske=[];

    if(!preg_match($regIme, $ime)){
		$greske[]="First name is not valid";
    }

    if(!preg_match($regPrezime, $prezime)){
		$greske[]="Last name is not valid";
    }

    if(!preg_match($regMejl, $mejl)){
		$greske[]="Email is not valid";
    }

    if(!preg_match($regLozinka, $lozinka)){
		$greske[]="Password is not valid";
    
    }

    if(count($greske)==0){
        
        
        $upit1="SELECT * FROM registracija WHERE email=:mejl";
        $lozinka=md5($_POST['lozinka']);

        $rezultat1=$konekcija->prepare($upit1);
        $rezultat1->bindParam(':mejl', $mejl);

        $rezultat1->execute();

        $korisnici=$rezultat1->fetch();

        if($korisnici != null){
            echo "User with this email already exists";
        }else{
            try{
                $isInserted=insertuj($ime, $prezime, $mejl, $lozinka, $id_uloga);
                if($isInserted){
                    echo "User has been successfully added";
                    header("Location: ../../views/admin.php");
                }
            }catch(PDOException $ex){
                http_response_code(500);
                
                catchErrors($ex->getMessage());
                
                
                
            }
        }
 
        
    }else{
        
        for($i=0; $i<count($greske); $i++){
           catchErrors($greske[$i]);
        }
        echo "User has not been inserted";
    }
}
?>
