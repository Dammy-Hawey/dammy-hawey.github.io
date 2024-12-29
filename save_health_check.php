<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $conn = new mysqli('localhost', 'root', '', 'deexcellence');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO health_records (name, age, weight, height, bmi, status, symptoms, bloodPressure, heartRate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "siddssssi",
        $data['name'], $data['age'], $data['weight'], $data['height'], $data['bmi'],
        $data['status'], implode(', ', $data['symptoms']), $data['bloodPressure'], $data['heartRate']
    );

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Health data saved successfully!']);
        // include_once('fetch_bmi.php');
    } else {
        echo json_encode(['error' => 'Error saving data.']);
    }

    $stmt->close();
    $conn->close();
}
?>
