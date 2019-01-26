<?php
include 'DbConnect.php';
if(!(isset($_SESSION['imepodatka']))){
    header("location: login.php");
}


$user=$_SESSION['imepodatka'];

//PRETRAGA PO BROJU

if(isset($_POST['btnname'])){
    if($_POST['mobilename']!=""){
        $tmpname=$_POST['mobilename'];
        $upit="SELECT * FROM `phone_numbers` WHERE name='$tmpname' AND `id`= ( SELECT `id` FROM `users` WHERE username='$user' ) ";
        $rez=mysqli_query($konekcija,$upit);
        if(mysqli_num_rows($rez)>=1)
        {
            $red=mysqli_fetch_array($rez);
            echo "<script>alert('name:".$red['name']." Number: ".$red['phone_number']."')</script>";
           // echo "name: ".$red['name']." Number: ".$red['phone_number']."<hr>";
        }
        else {
            echo "No search result";
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Nisu popunjena sva polja');</script>";
    }
}

//PRETRAGA PO BROJU
if(isset($_POST['btnNumber'])){
    if($_POST['mobileNumber']!=""){
        $tmpNumber=$_POST['mobileNumber'];
        $sql="SELECT * FROM `phone_numbers` WHERE `phone_number`='$tmpNumber' AND `id`= ( SELECT `id` FROM `users` WHERE username='$user' )";
        $rez2=mysqli_query($konekcija,$sql);
        if(mysqli_num_rows($rez2)>=1)
        {
            $red2=mysqli_fetch_array($rez2);
            echo "<script>alert('name:".$red2['name']." Number: ".$red2['phone_number']."')</script>";

        }
        else {
            echo "No search result";
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Nisu popunjena sva polja');</script>";
    }
}

//LISTANJE BROJEVA
$sqlSvi="SELECT * FROM `phone_numbers` WHERE `id`= ( SELECT `id` FROM `users` WHERE username='$user' )";
$rez3=mysqli_query($konekcija,$sqlSvi);
$brojKontakata=mysqli_num_rows($rez3);


?>