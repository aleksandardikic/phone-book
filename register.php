<?php session_start();
require_once('config.php');
$konekcija=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(mysqli_connect_errno()){
die ("Neuspela konekcija sa bazom <br>Poruka o gresci:".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Register</title>
	
	
</head>
<body>
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link active" href="home.php">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="login.php">Log in</a>
		</li>
	</ul>
	<form action="" method="POST">
	<div class="form-group">
			<label for="name">Your name</label>
			<input type="text" class="form-control w-50" name="name" placeholder="Enter your name">
		</div>
		<div class="form-group">
			<label for="username">Korisnicko ime</label>
			<input type="text" class="form-control w-50" name="username" placeholder="Enter your username">
		</div>
		<div class="form-group">
			<label for="exampleInputemail1">email address</label>
			<input type="email" class="form-control w-50" name="mail" aria-describedby="emailHelp" placeholder="Enter email">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
			
		</div>
		<div class="form-group">
			<label for="password">password</label>
			<input type="password" class="form-control w-50" name="pass" placeholder="Enter your password" maxlength="30">
		</div>
		<div class="form-group">
			<label for="mobilenumber">Mobile number</label>
			<input type="text" class="form-control w-50" name="mobilenumber" placeholder="Enter your mobile number">
		</div>			
		<input type="submit" class="btn btn-primary" name='register'  value="Register">
			
	</form>
	<?php
	
		if(isset($_POST['register'])){
			
			if($_POST['username']!="" && $_POST['name']!="" && $_POST['mail']!="" && $_POST['pass']!="" && $_POST['mobilenumber']!=""){
				$user=$_POST['username'];
				$name=$_POST['name'];		
				$mail=$_POST['mail'];
				$pass=$_POST['pass'];
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
   

</body>
</html>