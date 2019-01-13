<!DOCTYPE html>
<?php 
	session_start();
	require_once('config.php');
	$konekcija=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
	if(mysqli_connect_errno()){
		header("location: logout.php");
	}
	if(!(isset($_SESSION['imepodatka']))){
		header("location: login.php");
	}
	$user=$_SESSION['imepodatka'];
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
			<a class="nav-link" href="logout.php">Logout</a>
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
		if(isset($_POST['saveNumber'])){
			if($_POST['mobilename']!=""&& $_POST['mobileNumber']!=""){
				$mobname=$_POST['mobilename'];
				$mobNum=$_POST['mobileNumber'];				
				$upitU="SELECT `user_id` FROM `users` WHERE `username`='$user'";
				$rezU=mysqli_query($konekcija,$upitU);
				if(mysqli_num_rows($rezU)>=1)
					{							
						$userID=mysqli_fetch_array($rezU);
						echo $userID[0];
					}	
				else{
						echo "Id doesnt find";
					}								
				if($rez=mysqli_query($konekcija,("INSERT INTO `phone_numbers`(`name`,`phone_number`,`user_id`)VALUES('$mobname','$mobNum','$userID[0]')"))){
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
</body>
</html>