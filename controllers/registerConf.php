<?php
include 'DbConnect.php';
//Klik na dugme register
if(isset($_POST['register'])){
    if($_POST['username']!="" && $_POST['name']!="" && $_POST['mail']!="" && $_POST['pass']!="" && $_POST['mobilenumber']!=""){
        $user=$_POST['username'];
        $name=$_POST['name'];
        $mail=$_POST['mail'];
        $pass=$_POST['pass'];
        $pass=md5($pass);
        $mobile=$_POST['mobilenumber'];
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $result = mysqli_query($konekcija, $sql);
        if (mysqli_num_rows($result) == 0) {
            if($rez=mysqli_query($konekcija,("INSERT INTO `users`(`name`,`username`,`email`,`password`,`phone_number`)VALUES('$name','$user','$mail','$pass','$mobile')"))){
                echo "<script type='text/javascript'>alert('Account is created');</script>";
                mysqli_close($konekcija);
            }
            else
                echo "Poruka o gresci:".mysqli_error($konekcija);
        }
        else{
            echo "<script type='text/javascript'>alert('username is used');</script>";
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Fill all input');</script>";
    }
}
?>