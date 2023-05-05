<?php 
    $dbhost = "oceanus";
    $dbuser = "vwong27";
    $dbpass = "50342607";
    $dbname = "cse442_2023_spring_team_a_db";
    
    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_errno) {
        die("Connection failed: " . $conn->connect_error);
    }
?>