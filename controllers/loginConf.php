<?php
if((isset($_SESSION['imepodatka']))){
    header("location: home.php");
}
require_once('config.php');
$konekcija=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
if(mysqli_connect_errno()){
    header("location: logout.php");
}

//Klik na dugme
if(isset($_POST['btnLogin'])){
    if($_POST['tfUser']!=""&& $_POST['tfpassword']!=""){
        $user=$_POST['tfUser'];
        $pass=$_POST['tfpassword'];
        $pass=md5($pass);
        mysqli_query($konekcija, "SET nameS UTF8");
        $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
        $result = mysqli_query($konekcija, $sql);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['imepodatka'] = $user;
            header("location: home.php");
        }
        else if(mysqli_num_rows($result) == 1) {
            header("location: index.php");
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Nisu popunjena sva polja');</script>";
    }
}




?>