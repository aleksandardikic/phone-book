<!DOCTYPE html>
<?php 
	session_start();
include '../controllers/addNumberConf.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Add number</title>	
</head>
<body>
  	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link active" href="home.php">Home</a>
		</li> 
		<li class="nav-item">
			<a class="nav-link" href="../controllers/logout.php">Logout</a>
		</li>
	</ul>
	<form action="" method="POST">
		<div class="form-group">
			<label for="name">Contact name</label>
			<input type="text" class="form-control w-50" name="mobilename" placeholder="Enter contact name">
		</div>
		<div class="form-group">
			<label for="mobilenumber">Mobile number</label>
			<input type="text" class="form-control w-50" name="mobileNumber" placeholder="Enter your mobile number">
		</div>	
		<button type="submit" class="btn btn-primary mb-2" name="saveNumber">Save this number</button>		
	</form>
	<?php

	?>				
</body>
</html>