<?php

require_once('config.php');
$konekcija=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
if(mysqli_connect_errno()){
    header("location: logout.php");
}
if(!(isset($_SESSION['imepodatka']))){
    header("location: login.php");
}
$user=$_SESSION['imepodatka'];

//DRUGI DEO

if(isset($_POST['saveNumber'])){
    if($_POST['mobilename']!=""&& $_POST['mobileNumber']!=""){
        $mobname=$_POST['mobilename'];
        $mobNum=$_POST['mobileNumber'];
        $upitU="SELECT `id` FROM `users` WHERE `username`='$user'";
        $rezU=mysqli_query($konekcija,$upitU);
        if(mysqli_num_rows($rezU)>=1)
        {
            $userID=mysqli_fetch_array($rezU);
            echo $userID[0];
        }
        else{
            echo "Id doesnt find";
        }
        if($rez=mysqli_query($konekcija,("INSERT INTO `phone_numbers`(`name`,`phone_number`,`id`)VALUES('$mobname','$mobNum','$userID[0]')"))){
            echo "<script type='text/javascript'>alert('Broj je unet');</script>";
        }
        else{
            echo "Poruka o gresci:".mysqli_error($konekcija);
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Nisu popunjena sva polja');</script>";
    }
}

mysqli_close($konekcija);






?>