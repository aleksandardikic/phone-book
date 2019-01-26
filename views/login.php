<!DOCTYPE html>
<?php 
	session_start();
    include '../controllers/loginConf.php';
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
</body>
</html>