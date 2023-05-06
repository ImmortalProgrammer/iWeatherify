<?php

include("connection.php");
include("security.php");
access_control();

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // delete the auth_token from the database for the logged-in user
    delete_auth_token($_SESSION["username"]);

    // unset session variables and destroy the session
    unset($_SESSION["loggedin"]);
    unset($_SESSION["user_id"]);
    unset($_SESSION["username"]);
    unset($_SESSION["auth_token"]);
    session_destroy();

    // send response indicating successful logout
    $res = array("status" => 1);
    echo json_encode($res);
}
?>