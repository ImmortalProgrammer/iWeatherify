<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

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
?>