<?php

    session_start();
    include("connection.php");
    include("security.php");
    access_control();

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT label, value FROM saved_temperatures WHERE userid=?");
    $stmt->bind_param("s", $userid);
    $userid = 29;
    $stmt->execute();
    $result = $stmt->get_result();
    $settings = array();

    while ($row = $result->fetch_assoc()) {
        $settings[$row["label"]] = $row["value"];
    }

    echo json_encode($settings);

    $stmt->close();
    $conn->close();
?>