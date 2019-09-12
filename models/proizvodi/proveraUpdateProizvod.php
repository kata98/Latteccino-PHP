<?php
    session_start();
    include "../../config/connection.php";
    require_once "functions.php";

    if(isset($_POST['updateU'])){
        $naslov = $_POST['naslov2'];
        $cena = $_POST['cena2'];
        $opis = $_POST['opis2']; 
        $id_up = $_POST['id_up'];

        $fajl_naziv = $_FILES['slika2']['name'];
        $fajl_tmpLokacija = $_FILES['slika2']['tmp_name'];
        $fajl_tip = $_FILES['slika2']['type'];
        $fajl_velicina = $_FILES['slika2']['size'];

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
        }
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
                    $isUpdated = update($naslov, $cena, $opis, $putanjaOriginalnaSlika, $putanjaNovaSlika, $id_up);
    
                    if($isUpdated){
                        echo "Image is updated";
                        header("Location: ../../views/admin.php");
                    }
                    
                } catch(PDOException $ex){
                    echo $ex->getMessage();
                    catchErrors($ex->getMessage());
                }
            }
        
    };
?>