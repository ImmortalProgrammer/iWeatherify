<?php

    session_start();
    include("connection.php");
    include("security.php");
    access_control();

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $userid = $input["userid"];
    $label = $input["label"];
    $value = $input["value"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO saved_temperatures (userid, label, value) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE value=?");
    $stmt->bind_param("ssss", $userid, $label, $value, $value);

    if ($stmt->execute()) {
        echo json_encode(array("result" => "success"));
    } else {
        echo json_encode(array("result" => "error"));
    }

    $stmt->close();
    $conn->close();
?>