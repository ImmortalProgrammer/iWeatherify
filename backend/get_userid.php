<?php
    session_start();
    header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Origin: https://www-student.cse.buffalo.edu");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Credentials: true");

    if (isset($_SESSION["user_id"])) {
        echo json_encode(["userid" => $_SESSION["user_id"]]);
    } else {
        echo json_encode(["userid" => null]);
    }
?>