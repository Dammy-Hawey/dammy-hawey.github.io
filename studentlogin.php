<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Staff Login Page</title>
	<style>
	body {
		color: cornsilk;
		font-weight: bold;
		font-size: 22px;
		background-color: darkgray;
		font-family: Imprint MT Shadow;
		text-align: center;
	}
    #view {
        text-decoration: none;
        color: white;
    }
    button {
        border-radius: 5px;
        padding: 3px;
        background-color: rgb(13, 13, 31);
    }
    button:hover {
        background-color: rgb(13, 13, 31);
        padding: 4px;
    }
	</style>
</head>
<body>

<?php
// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        if(isset($_POST['submit'])){
            $conet = mysqli_connect("localhost","root","","deexcellence");
            $pasword = $_POST['password'];
            if($password != ' '){
            $pick = "SELECT * FROM studentsreg WHERE cpassword = '$password'";
            $namepick = "SELECT * FROM studentsreg";
            $final = mysqli_query($conet, $pick) or die(mysqli_error($mysql));
            $count = mysqli_fetch_row($final);
            
                if($count){
                $result = mysqli_query($conet,$namepick);
            while($row = mysqli_fetch_array($result)) {
                
            $name = $row['firstName']." ". $row['lastName'];
                echo "<br/>";
            }
                echo "You are welcome $name";
                "<br>";
                echo "<br>";
                echo "<button><a id=\"view\" href=\"schoolupdate.html\" target=\"_blank\">View Updates</a></button>";
                
                }
                    else{
                        echo "You have to register because your password doesn't match!";
                    }
                }
                else{
                    echo "Enter the correct password!";
                }
            }
    $conet->close();
?>


</body>
</html>

