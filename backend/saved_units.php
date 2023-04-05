<?php
    // Connection Setup
    header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Origin: https://www-student.cse.buffalo.edu");
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
    $distance = $data["distance"];

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
        $sql = "UPDATE saved_units SET temperature = ?, wind = ?, pressure = ?, distance = ? WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $temperature, $wind, $pressure, $distance, $userid);
    } else {
        // Insert new user settings
        $sql = "INSERT INTO saved_units (userid, temperature, wind, pressure, distance) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $userid, $temperature, $wind, $pressure, $distance);
    }

    if ($stmt->execute()) {
        echo json_encode(array("message" => "User settings saved successfully."));
    } else {
        echo json_encode(array("message" => "Error saving user settings."));
    }

    $stmt->close();
    $conn->close();
?>