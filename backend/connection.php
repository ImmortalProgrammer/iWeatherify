<?php 

    // $dbhost = "oceanus";
    // $dbuser = "vwong27";
    // $dbpass = "50342607";
    // $dbname = "cse442_2023_spring_team_a_db";

    //Local stuff
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "vue_php_cdn_db";

    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>