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

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_GET["userid"];

    $sql = "SELECT temperature, wind, pressure FROM saved_units WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        echo json_encode($row);
    } else {
        // Define default values
        $default_values = array(
            "temperature" => "f",
            "wind" => "mph",
            "pressure" => "hg",
        );
    
        // Insert default values into the database
        $insert_sql = "INSERT INTO saved_units (userid, temperature, wind, pressure) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ssss", $userid, $default_values["temperature"], $default_values["wind"], $default_values["pressure"]);
    
        if ($insert_stmt->execute()) {
            // Return the default values
            echo json_encode($default_values);
        } else {
            echo json_encode(array("result" => "error", "message" => "Failed to insert default values for the specified user ID"));
        }
    
        $insert_stmt->close();
    }

    $stmt->close();
    $conn->close();
?>