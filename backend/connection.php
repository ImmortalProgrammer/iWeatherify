<?php 

    $dbhost = "oceanus";
    $dbuser = "vwong27";
    $dbpass = "50342607";
    $dbname = "cse442_2023_spring_team_a_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>