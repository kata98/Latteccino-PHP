<?php 
    session_start();
    include "../../config/connection.php";
    require "../korisnik/forbidden.php"; 
    require_once "functions.php";
   
    if(isset($_POST['insertP'])){
        $naslov = $_POST['naslov'];
        $cena = $_POST['cena'];
        $opis = $_POST['opis'];
        $opis1 = $_POST['opis1'];
          
        $fajl_naziv = $_FILES['slika']['name'];
        $fajl_tmpLokacija = $_FILES['slika']['tmp_name'];
        $fajl_tip = $_FILES['slika']['type'];
        $fajl_velicina = $_FILES['slika']['size'];

        $greske = []; 

        $dozvoljeniFormati = array("image/jpg", "image/jpeg", "image/png"); 

        if(!in_array($fajl_tip, $dozvoljeniFormati)){
            $greske[] = "File type is invalid";
        }

        if($fajl_velicina > 3000000){
            $greske[] = "Size of file must be less than 3MB";
        }

        if(!$naslov){
            $greske[] = "Name is required";
        }

        if(!$cena){
            $greske[] = "Price is required";
        }

        if(!$opis){
            $greske[] = "Description is required";
        } 

        if(count($greske)==0){
            list($sirina, $visina) = getimagesize($fajl_tmpLokacija);

            $postojecaSlika = null;
            switch($fajl_tip){
                case 'image/jpeg':
                    $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                    break;
                case 'image/png':
                    $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                    break;
            }

            $novaSirina = 328;
            $novaVisina = 328;

            $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);

            imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);

        
            $naziv = time().$fajl_naziv;
            $putanjaNovaSlika = 'assets/images/new_'.$naziv;
    
            switch($fajl_tip){
                case 'image/jpeg':
                    imagejpeg($novaSlika, '../../'.$putanjaNovaSlika, 75);
                    break;
                case 'image/png':
                    imagepng($novaSlika, '../../'.$putanjaNovaSlika);
                    break;
            }
    
            $putanjaOriginalnaSlika = 'assets/images/'.$naziv;
    
            if(move_uploaded_file($fajl_tmpLokacija, '../../'.$putanjaOriginalnaSlika)){
                echo "Image is uploaded";
    
                try {
                    $isInserted = insert($naslov, $cena, $opis, $putanjaOriginalnaSlika, $putanjaNovaSlika);
    
                    if($isInserted){
                        echo "Image is not uploaded";
                        header("Location: ../../views/admin.php");
                    }
                    
                } catch(PDOException $ex){
                    echo $ex->getMessage();
                    catchErrors($ex->getMessage());
                }
            
            
            }
        } 
    };
?>