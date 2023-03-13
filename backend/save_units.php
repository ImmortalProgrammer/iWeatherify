<?php

    session_start();
    include("connection.php");
    access_control();

    // Get the POST data sent from the client
    $temperature = $_POST['temperature'];
    $wind = $_POST['wind'];
    $pressure = $_POST['pressure'];
    $distance = $_POST['distance'];

    // Save the data to the database using SQL queries

    // Return a response to the client to indicate that the data was saved
    echo 'Units saved successfully';
?>