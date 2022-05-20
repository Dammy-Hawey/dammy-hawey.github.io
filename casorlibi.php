<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>casor_e-library.com</title>
	<style>
	body{
		color:rgb(2, 2, 68);
		font-weight:bold;
		font-size:22px;
		background-color:ghostwhite;
		font-family:Imprint MT Shadow;
		text-align:center;
	}
	</style>
</head>
<body>
	
				<?php
				
				$username=$_POST['username'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				
				if(isset($_POST['submit'])){
					$conet = mysqli_connect("localhost","root","","haweytech");
					//$pasword = $_POST['passiword'];
					if($password != ' '){
					$pick = "SELECT * FROM library WHERE password = '$password'";
					$final = mysqli_query($conet, $pick) or die(mysqli_error());
					$count = mysqli_fetch_row($final);
					   if($count){
						echo "You are welcome " . $username;
						"<br>";
						"<br>";
						include_once("books.html");
					   }
						 else{
							 echo "you have to register because your password doesn't match!";
						 }
						}
						else{
							echo "Enter the correct password!";
						}
					}		
				
                ?>
				<?php
					//include_once("books.html");

				?>

	</body>
</html>