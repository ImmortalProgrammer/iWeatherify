<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    // Get the user settings from the request
    $data = json_decode(file_get_contents("php://input"), true);
    $userid = $data["userid"];
    $temperature = $data["temperature"];
    $wind = $data["wind"];
    $pressure = $data["pressure"];

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
?>