<?php 

    $dbhost = "oceanus.cse.buffalo.edu:3306";
    $dbuser = "vwong27";
    $dbpass = "50342607";
    $dbname = "cse442_2023_spring_team_a_db";

    // Local stuff
    // $dbhost = "localhost";
    // $dbuser = "root";
    // $dbpass = "";
    // $dbname = "cse442";
    // $dbname = "vue_php_cdn_db";


    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_errno) {
        die("Connection failed: " . $conn->connect_error);
    }
?>