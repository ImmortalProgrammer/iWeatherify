<?php
    session_start();
    include("security.php");
    access_control();

    if (isset($_SESSION["user_id"])) {
        echo json_encode(["userid" => $_SESSION["user_id"]]);
    } else {
        echo json_encode(["userid" => null]);
    }
?>