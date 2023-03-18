<?php
    // Connection Setup
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Allow-Headers: Content-Type");
    $servername = "oceanus";
    $username = "jpan26";
    $password = "50314999";
    $dbname = "cse442_2023_spring_team_a_db";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $userid = 1;

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT hot, warm, ideal, chilly, cold, freezing FROM saved_temperatures WHERE userid = ?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($hot, $warm, $ideal, $chilly, $cold, $freezing);
    if ($stmt->fetch()) {
        echo json_encode(array("hot" => $hot, "warm" => $warm, "ideal" => $ideal, "chilly" => $chilly, "cold" => $cold, "freezing" => $freezing));
    } else {
        echo json_encode(array("result" => "error", "message" => "No data found for the specified user ID"));
    }

    $stmt->close();
    $conn->close();
?>