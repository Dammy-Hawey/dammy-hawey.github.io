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
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$state = $_POST['state'];
$maritalStatus = $_POST['maritalStatus'];
$eduLevel = $_POST['eduLevel'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$religion = $_POST['religion'];
$subject = $_POST['subject'];
$healthStatus = $_POST['healthStatus'];
$teachingStatus = $_POST['teachingStatus'];

// Check if all required fields are filled
if (
    !empty($firstName) && !empty($otherName) && !empty($lastName) && !empty($gender) &&
    !empty($dob) && !empty($phone) && !empty($email) && !empty($address) && !empty($state) &&
    !empty($maritalStatus) && !empty($eduLevel) && !empty($password) && !empty($cpassword) &&
    !empty($religion) && !empty($subject) && !empty($healthStatus) && !empty($teachingStatus)
) {
    // Check if passwords match
    if ($password === $cpassword) {
        // Establish the connection
        $conn = mysqli_connect("localhost", "root", "", "deexcellence") or die("Couldn't connect to the database!");

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO staffreg (firstName, otherName, lastName, gender, dob, phone, email, address, state, maritalStatus, eduLevel, password, religion, subject, healthStatus, teachingStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Hash the password before storing it (optional, but recommended)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Bind parameters (s = string, i = integer, etc.)
        $stmt->bind_param(
            "ssssssssssssssss", 
            $firstName, $otherName, $lastName, $gender, $dob, $phone, $email, $address, $state, 
            $maritalStatus, $eduLevel, $hashedPassword, $religion, $subject, $healthStatus, $teachingStatus
        );

        // Execute the statement
        if ($stmt->execute()) {
            echo "Staff registration successful!".'<br>'. $firstName && $lastName;
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