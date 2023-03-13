<?php

    session_start();
    include("connection.php");
    access_control();

    // Get the POST data sent from the client
    $hot = $_POST['hotInputValue'];
    $warm = $_POST['warmInputValue'];
    $ideal = $_POST['idealInputValue'];
    $chilly = $_POST['chillyInputValue'];
    $cold = $_POST['coldInputValue'];
    $freezing = $_POST['freezingSliderValue'];

    // Save the data to the database using SQL queries

    // Return a response to the client to indicate that the data was saved
    echo 'Temperatures saved successfully';
?>