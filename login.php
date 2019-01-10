<!DOCTYPE html>
<?php session_start();
require_once('config.php');
$konekcija=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
if(mysqli_connect_errno()){
die ("Neuspela konekcija sa bazom <br>Poruka o gresci:".mysqli_connect_error());
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Log in</title>
	
	
</head>
<body>
  	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link active" href="index.php">Phone book</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="register.php">Register</a>
		</li>
	</ul>
	<form class="form-inline" method="POST" action="">
		<div class="form-group mb-2">
			<label for="staticemail2" class="sr-only">username</label>
			<input type="text" class="form-control" name="tfUser" placeholder="Enter your username">
		</div>
		<div class="form-group mx-sm-3 mb-2">
			<label for="inputpassword2" class="sr-only">password</label>
			<input type="password" class="form-control" name="tfpassword" placeholder="password" maxlength="30">
		</div>
		<button type="submit" class="btn btn-primary mb-2" name="btnLogin">Log in</button>
	</form>
	
	<?php
	
		if(isset($_POST['btnLogin'])){
			if($_POST['tfUser']!=""&& $_POST['tfpassword']!=""){
				$user=$_POST['tfUser'];
				$pass=$_POST['tfpassword'];				
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
	
</div>

</body>
</html>