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

if (isset($_POST['submit'])) {
    // Get and format the email input
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "deexcellence");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query with placeholder for email
    $sql = "SELECT firstName, lastName, password FROM staffreg WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    // Bind and execute the statement
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, now fetch the hashed password
        $stmt->bind_result($firstName, $lastName, $hashedPassword);
        $stmt->fetch();

        // Verify the password using password_verify()
        if (password_verify($password, $hashedPassword)) {
            // Password matches, login successful
            $fullName = $firstName . " " . $lastName;
            echo "You are welcome $fullName!<br>";
            echo "<br>";
            echo "<button><a id=\"view\" href=\"schoolupdate.html\" target=\"_blank\">View Updates</a></button>";
        } else {
            echo "Invalid password! Please try again.";
        }
    } else {
        echo "No user found with this email. Please register.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>

