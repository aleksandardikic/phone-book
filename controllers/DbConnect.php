<?php
require_once('config.php');
try{
    $konekcija=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);

}
catch(PDOException $e){
    echo "Greska u konekciji ka bazi: ".$e->getMessage();
    if(mysqli_connect_errno()){
        header("location: logout.php");
    }
}
