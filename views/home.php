<!DOCTYPE html>
<?php 
	session_start();
	include '../controllers/homeConf.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>			
</head>
<body>
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link active" href="home.php">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="addnumber.php">Enter new number</a>
		</li>
  
		<li class="nav-item">
			<a class="nav-link" href="../controllers/logout.php">Logout</a>
		</li>
	</ul>
	<?php echo "<h1>Welcome ". $user ."</h1>" ?>	
	<div>
		<h3>Search your numbers by name</h3>
		<form method="POST" action="">
			<div class="form-group">
				<label for="mobilename">Enter name</label>
				<input type="text" class="form-control w-50" name="mobilename" placeholder="Enter name">
			</div>
			<button type="submit" class="btn btn-primary" name="btnname">Search by name</button>
		</form>
			<p>
			</p>
	</div>	
	<div>
		<h3>Search your numbers by number</h3>
		<form action="" method="POST">
			<div class="form-group">
			<label for="mobileNumber">Mobile number</label>
			<input type="text" class="form-control w-50" name="mobileNumber" placeholder="Enter mobile number">
			<button type="submit" class="btn btn-primary" name="btnNumber">Search number</button>
			</div>
		</form>					
			<p id="pBroj">
			</p>
	</div>
	<div name="contacts">
        <h3> Your contacts</h3>
		<?php
			if($brojKontakata>0){
				echo "<table class='table table-dark w-50'>";
				$red3=mysqli_fetch_array($rez3);
				foreach($rez3 as $element){					
					echo "<tr scope='row'><td>".$element['name']."</td><td>".$element['phone_number']."</td></tr>";
				}												
				echo "</table>";
			}
			else{
				echo "List of contacts is empty";
			}
		?>
	</div>   
</body>
</html>