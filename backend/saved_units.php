<?php
    // Connection Setup
    header("Content-Type: application/json; charset=UTF-8");
    $allowed_origins = array(
        'https://www-student.cse.buffalo.edu',
        'http://localhost:8080'
    );
      
    // Check if the request has an 'Origin' header
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Check if the origin is in the list of allowed origins
        if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
            header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        }
    }
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Credentials: true");
    $servername = "oceanus";
    $username = "jpan26";
    $password = "50314999";
    $dbname = "cse442_2023_spring_team_a_db";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "cse442";

    // Get the user settings from the request
    $data = json_decode(file_get_contents("php://input"), true);
    $userid = $data["userid"];
    $temperature = $data["temperature"];
    $wind = $data["wind"];
    $pressure = $data["pressure"];

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user settings already exist
    $sql = "SELECT COUNT(*) as count FROM saved_units WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row["count"];

    if ($count > 0) {
        // Update the existing user settings
        $sql = "UPDATE saved_units SET temperature = ?, wind = ?, pressure = ? WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $temperature, $wind, $pressure, $userid);
    } else {
        // Insert new user settings
        $sql = "INSERT INTO saved_units (userid, temperature, wind, pressure) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $userid, $temperature, $wind, $pressure);
    }

    if ($stmt->execute()) {
        echo json_encode(array("message" => "User settings saved successfully."));
    } else {
        echo json_encode(array("message" => "Error saving user settings."));
    }

    $stmt->close();
    $conn->close();
?>