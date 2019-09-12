<?php
 include "../../config/connection.php";
 $status = 404;
 $poruka = null; 

 if(isset($_POST['send'])) {
	$ime =$_POST['firstname'];
  $prezime =$_POST['lastname'];
  $mejl =$_POST['email'];
	$lozinka = $_POST['lozinka'];

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

    if(count($greske)>0){
      $status = 422;
   
    }else{
      $upit_mail = "SELECT * FROM registracija WHERE email = :mejl"; 
      $rez_mail = $konekcija->prepare($upit_mail);
      $rez_mail->bindParam(":mejl", $mejl);

      $rez_mail->execute(); 
      $registracija = $rez_mail->fetch();
      
      if($registracija != null){
      $status = 409; 

      }else{
      $lozinkaMD5=md5($_POST['lozinka']);
      $query = "INSERT INTO registracija(id,ime,prezime,email,lozinka,id_uloga, aktivan) VALUES (null,:ime, :prezime, :mejl, :lozinka,2,'0')";

      $rez=$konekcija->prepare($query);

      $rez->bindParam(":ime", $ime);
      $rez->bindParam(":prezime", $prezime);
      $rez->bindParam(":mejl", $mejl);
      $rez->bindParam(":lozinka", $lozinkaMD5);
      
      try{
        $izvrseno = $rez->execute(); 
        if($izvrseno){
          $status = 201;
          $poruka = "Registation has been successful!";
        }
        else{
          $status = 500;
          for($i=0; $i<count($greske); $i++){
            catchErrors($greske[$i]);
         }
          $poruka = "Error with DB"; 
        }
      }

      catch(PDOException $ex){
        $status = 412;
        catchErrors($ex->getMessage());
        
      }
    }
  }
};

echo $poruka;
http_response_code($status); 
?>



