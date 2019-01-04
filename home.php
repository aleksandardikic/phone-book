<!DOCTYPE html>
<?php session_start();

if(!(isset($_SESSION['imepodatka']))){
	header("location: login.php");
}
$konekcija=mysqli_connect("127.0.0.1","root","","phone_book");
if(mysqli_connect_errno()){
die ("Neuspela konekcija sa bazom <br>Poruka o gresci:".mysqli_connect_error());
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
			<a class="nav-link" href="logout.php">Logout</a>
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
				Search result by name:
				<br>
				<?php
				
				if(isset($_POST['btnname'])){
					if($_POST['mobilename']!=""){
						$tmpname=$_POST['mobilename'];
						
						$upit="SELECT * FROM `phone_numbers` WHERE name='$tmpname' AND `user_id`= ( SELECT `user_id` FROM `users` WHERE username='$user' ) ";
						$rez=mysqli_query($konekcija,$upit);
						if(mysqli_num_rows($rez)>=1)
						{
							
							$red=mysqli_fetch_array($rez);
							echo "name: ".$red['name']." Number: ".$red['phone_number']."<hr>";
						}	
						else {
							echo "No search result";
						}
					}
					else{ 
						echo "<script type='text/javascript'>alert('Nisu popunjena sva polja');</script>";	
					}						
				}
				
				?>
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
		
			
			<p>
				Search result by number:
				<br>
				<?php
				
				if(isset($_POST['btnNumber'])){
					if($_POST['mobileNumber']!=""){
						$tmpNumber=$_POST['mobileNumber'];
						$sql="SELECT * FROM `phone_numbers` WHERE `phone_number`='$tmpNumber' AND `user_id`= ( SELECT `user_id` FROM `users` WHERE username='$user' )";
						$rez2=mysqli_query($konekcija,$sql);
						if(mysqli_num_rows($rez2)>=1)
						{
							
							$red2=mysqli_fetch_array($rez2);
							echo "name: ".$red2['name']." Number: ".$red2['phone_number']."<hr>";
						}	
						else {
							echo "No search result";
						}
					}
					else{ 
						echo "<script type='text/javascript'>alert('Nisu popunjena sva polja');</script>";	
					}						
				}
				
				?>
			</p>
	</div>
	
	<div name="contacts">
		<?php
			//ISPIS SVIH BROJEVA KORISNIKA
			echo "<h3> Your contacts</h3>";
			$sqlSvi="SELECT * FROM `phone_numbers` WHERE `user_id`= ( SELECT `user_id` FROM `users` WHERE username='$user' )";
			$rez3=mysqli_query($konekcija,$sqlSvi);
			$brojKontakata=mysqli_num_rows($rez3);
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