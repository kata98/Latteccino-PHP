<?php
 session_start();
 include '../../config/connection.php';
 require_once "funkcije.php";

 if(isset($_POST['update'])) {
    $id=$_POST['id'];
	$ime =$_POST['firstname2'];
    $prezime =$_POST['lastname2'];
    $mejl =$_POST['email2'];
    $lozinka = $_POST['lozinka2'];
    $id_uloga=$_POST['uloga2'];

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
        
        try {
            $isUpdated = updejtuj($id, $ime, $prezime, $mejl, $lozinka, $id_uloga);

            if($isUpdated){
                echo "User is updated";
                http_response_code(204);
                header("Location: ../../views/admin.php");
            }
            
        } catch(PDOException $ex){
            catchErrors($ex->getMessage());
            http_response_code(500);
        }

    }else{
        for($i=0; $i<count($greske); $i++){
            catchErrors($greske[$i]);
         }
        echo "User has not been updated";
        http_response_code(400);
    }
}


?>
