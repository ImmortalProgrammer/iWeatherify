<?php

    include("connection.php");
    include("security.php");
    access_control();

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $user_id =  $input["user_id"];
    $location = $input["location"];
    $temp_category = $input["temp_category"];
    $temp = $input["temp"];
    $temp_unit = $input["temp_unit"];
    $outerwear_name = $input["outerwear_name"];
    $outerwear_img = $input["outerwear_img"];
    $middlewear_name = $input["middlewear_name"];
    $middlewear_img = $input["middlewear_img"];
    $innerwear_name = $input["innerwear_name"];
    $innerwear_img = $input["innerwear_img"];
    $pants_name = $input["pants_name"];
    $pants_img = $input["pants_img"];
    $headwear_name = $input["headwear_name"];
    $headwear_img = $input["headwear_img"];
    $shoes_name = $input["shoes_name"];
    $shoes_img = $input["shoes_img"];

    // Delete the user's saved outfti
    $query = "DELETE FROM `saved_items` WHERE 
    `user_id` = ? AND 
    `location` = ? AND 
    `temp_category` = ? AND 
    `temp` = ? AND 
    `temp_unit` = ? AND 
    `outerwear_name` = ? AND 
    `outerwear_img` = ? AND 
    `middlewear_name` = ? AND 
    `middlewear_img` = ? AND 
    `innerwear_name` = ? AND 
    `innerwear_img` = ? AND 
    `pants_name` = ? AND 
    `pants_img` = ? AND 
    `headwear_name` = ? AND 
    `headwear_img` = ? AND 
    `shoes_name` = ? AND 
    `shoes_img` = ?";
    $stmt = $conn -> prepare($query);
    if(!$stmt){
        $status = 0;
        $message = "Couldn't make the connection to prepare the query";
        die("Error: " . htmlspecialchars($conn -> error));
    } else {
        $stmt -> bind_param("ississsssssssssss", $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img);
        if(!$stmt -> execute()){
            $status = 0;
            $message = "Couldn't execute the sql statement";
            die('Error: ' . htmlspecialchars($stmt -> error));
        } else {
            $status = 1;
            $message = "Successful deletion";
        }
    }

    $res = array(
        "status" => $status,
        "message" => $message
    );    

    echo json_encode($res);

?>