<?php
    session_start();
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

    if (isset($_SESSION["user_id"])) {
        echo json_encode(["userid" => $_SESSION["user_id"]]);
    } else {
        echo json_encode(["userid" => null]);
    }
?>