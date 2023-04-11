<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    // Get the user settings from the request
    $data = json_decode(file_get_contents("php://input"), true);
    $userid = $data["userid"];
    $city = $data["city"];
    $toggle = $data["toggle"];

    // Check if the user settings already exist
    $sql = "SELECT COUNT(*) as count FROM saved_location WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row["count"];

    if ($count > 0) {
        // Update the existing user settings
        $sql = "UPDATE saved_location SET city = ?, toggle = ? WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $city, $toggle, $userid);
    } else {
        // Insert new user settings
        $sql = "INSERT INTO saved_location (userid, city, toggle) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $userid, $city, $toggle);
    }

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Location settings saved successfully."));
    } else {
        echo json_encode(array("message" => "Error saving user settings."));
    }

    $stmt->close();
?>
