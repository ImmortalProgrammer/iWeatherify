<?php

    include("connection.php");
    include("security.php");
    access_control();

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $user_id =  $input["userid"];
    $clothing_name = $input["clothing_name"];
    $image_name = $input["image_name"];
    $clothing_category = $input["clothing_category"];

    //Column names
    $clothing_category_name = $clothing_category . "_name";
    $clothing_category_img = $clothing_category . "_img";

    // Delete the user's my item
    $query = "DELETE FROM `my_items` WHERE `user_id` = ? AND `clothing_name` = ? AND `name` = ?";
    $stmt = $conn -> prepare($query);
    if(!$stmt){
        $status = 0;
        $message = "Couldn't make the connection to prepare the query";
        die("Error: " . htmlspecialchars($conn -> error));
    } else {
        $stmt -> bind_param('iss', $user_id, $clothing_name, $image_name);
        if(!$stmt -> execute()){
            $status = 0;
            $message = "Couldn't execute the sql statement";
            die('Error: ' . htmlspecialchars($stmt -> error));
        } else {
            $status = 1;
            $message = "Successful deletion";
        }
    }

    //Update any saved outfits where the deleted item was part of a saved outfit
    $update_query = "UPDATE `saved_items` SET `${clothing_category_name}` = '', `${clothing_category_img}` = '' WHERE `user_id` = ? AND `${clothing_category_name}` = ? AND `${clothing_category_img}` = ?";
    $stmt = $conn -> prepare($update_query);
    if(!$stmt){
        $status = 0;
        $message = "Couldn't make the connection to prepare the query";
        die("Error: " . htmlspecialchars($conn -> error));
    } else {
        $stmt -> bind_param('iss', $user_id, $clothing_name, $image_name);
        if(!$stmt -> execute()){
            $status = 0;
            $message = "Couldn't execute the update sql statement";
            die('Error: ' . htmlspecialchars($stmt -> error));
        } else {
            $status = 1;
            $message = "Successful update";
        }
    }

    //If there are any saved outfits where there are no items, then we should just remove the row entirely
    $query = "DELETE FROM `saved_items` WHERE `user_id` = ? AND `outerwear_name` = '' AND `outerwear_img` = '' AND `middlewear_name` = '' AND `middlewear_img` = '' AND `innerwear_name` = '' AND `innerwear_img` = '' AND `pants_name` = '' AND `pants_img` = '' AND `headwear_name` = '' AND `headwear_img` = '' AND `shoes_name` = '' AND `shoes_img` = ''";
    $stmt = $conn -> prepare($query);
    if(!$stmt){
        $status = 0;
        $message = "Couldn't make the connection to prepare the query";
        die("Error: " . htmlspecialchars($conn -> error));
    } else {
        $stmt -> bind_param('i', $user_id);
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
        "message" => $message,
        "clothing_category_name" => $clothing_category_name,
        "clothing_category_img" => $clothing_category_img
    );    

    echo json_encode($res);

?>