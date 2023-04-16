<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    $userid = $_GET["userid"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT hot, warm, ideal, chilly, cold, freezing FROM saved_temperatures WHERE userid = ?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($hot, $warm, $ideal, $chilly, $cold, $freezing);

    if ($stmt->fetch()) {
        echo json_encode(array("hot" => $hot, "warm" => $warm, "ideal" => $ideal, "chilly" => $chilly, "cold" => $cold, "freezing" => $freezing));
    } else {
        // Insert a new row with default values when no data is found for the user
        $default_values = array("hot" => 0, "warm" => 0, "ideal" => 0, "chilly" => 0, "cold" => 0, "freezing" => 0);
        $insert_stmt = $conn->prepare("INSERT INTO saved_temperatures (userid, hot, warm, ideal, cold, chilly, freezing) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("siiiiii", $userid, $default_values["hot"], $default_values["warm"], $default_values["ideal"], $default_values["cold"], $default_values["chilly"], $default_values["freezing"]);

        if ($insert_stmt->execute()) {
            echo json_encode($default_values);
        } else {
            echo json_encode(array("result" => "error", "message" => "Failed to insert default values for the specified user ID"));
        }
        $insert_stmt->close();
    }

    $stmt->close();
?>