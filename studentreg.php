<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Staff Registration page</title>
	<style>
	body{
		color:cornsilk;
		font-weight:bold;
		font-size:22px;
		background-color:darkgray;
		font-family:Imprint MT Shadow;
		text-align:center;
	}
	</style>
</head>
<body>
	
<?php
// Collect form data
$firstName = $_POST['firstName'];
$otherName = $_POST['otherName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$address = $_POST['address'];
$state = $_POST['state'];
$class = $_POST['class'];
$parentPhone = $_POST['parentnumber'];
$healthstatus = $_POST['healthstatus'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$religion = $_POST['religion'];


// Check if all required fields are filled
if (
    !empty($firstName) && !empty($otherName) && !empty($lastName) && !empty($gender) &&
    !empty($dob) && !empty($email) && !empty($address) && !empty($state) &&!empty($class) && 
    !empty($parentPhone)&& !empty($healthstatus) && !empty($password) && !empty($cpassword) &&
    !empty($religion)) {
    // Check if passwords match
    if ($password === $cpassword) {
        // Establish the connection
        $conn = mysqli_connect("localhost", "root", "", "deexcellence") or die("Couldn't connect to the database!");

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO studentsreg (firstName, otherName, lastName, gender, dob, email, address, state, class, parentPhone, healthstatus, password, cpassword, religion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Hash the password before storing it (optional, but recommended)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Bind parameters (s = string, i = integer, etc.)
        $stmt->bind_param(
            "ssssssssssssss", 
            $firstName, $otherName, $lastName, $gender, $dob, $email, $address, $state, $class,
            $parentPhone, $healthstatus, $hashedPassword,$cpassword, $religion);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Student registration successful!".'<br>'. $firstName && $lastName;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Passwords do not match!";
    }
} else {
    echo "All fields are required!";
}
?>

                <br>
                <br>

	</body>
</html>