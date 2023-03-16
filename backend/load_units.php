<?php
    session_start();
    include("connection.php");
    include("security.php");
    access_control();

    $userid = 29;

    $sql = "SELECT temperature, wind, pressure, distance FROM saved_units WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode($row);

    $stmt->close();
    $conn->close();
?>