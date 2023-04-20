<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    // Get the input data - recommended outfit
    $input = json_decode(file_get_contents("php://input"), true);
    $outerwear_name = $input["outerwear"]["name"];
    $outerwear_img = $input["outerwear"]["image"];

    $middlewear_name = $input["middlewear"]["name"];
    $middlewear_img = $input["middlewear"]["image"];

    $innerwear_name = $input["innerwear"]["name"];
    $innerwear_img = $input["innerwear"]["image"];

    $pants_name = $input["pants"]["name"];
    $pants_img = $input["pants"]["image"];

    $headwear_name = $input["headwear"]["name"];
    $headwear_img = $input["headwear"]["image"];

    $shoes_name = $input["shoes"]["name"];
    $shoes_img = $input["shoes"]["image"];
    
    $user_id = $input["user_id"];
    $location = $input["location"];
    $temp_category = $input["temp_category"];
    $temp = $input["temp"];
    $temp_unit = $input["temp_unit"];

    // $output = array(
    //     "middlewear" => $middlewear,
    //     "innerwear" => $innerwear,
    //     "pants" => $pants,
    //     "headwear" => $headwear,
    //     "shoes" => $shoes,
    //     "user_id" => $user_id,
    //     "location" => $location,
    //     "temp_category" => $temp_category,
    //     "temp" => $temp,
    //     "temp_unit" => $temp_unit
    // );
    
    // echo json_encode($output);

    //Check if there already exists the saved outfit
    $check_query = "SELECT * FROM saved_items WHERE `user_id` = ? AND `location` = ? AND `temp_category` = ? AND `temp` = ? AND `temp_unit` = ? AND `outerwear_name` = ? AND `outerwear_img` = ? AND `middlewear_name` = ? AND `middlewear_img` = ? AND `innerwear_name` = ? AND `innerwear_img` = ? AND `pants_name` = ? AND `pants_img` = ? AND `headwear_name` = ? AND `headwear_img` = ? AND `shoes_name` = ? AND `shoes_img` = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("sssisssssssssssss", $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo json_encode(array("result" => "You already saved this outfit"));
        $check_stmt->close();
    } else {
        //Only input to the database if there doesn't exist a row with the same exact information
        $query = "INSERT INTO `saved_items` (`user_id`, `location`, `temp_category`, `temp`, `temp_unit`, `outerwear_name`, `outerwear_img`, `middlewear_name`, `middlewear_img`, `innerwear_name`, `innerwear_img`, `pants_name`, `pants_img`, `headwear_name`, `headwear_img`, `shoes_name`, `shoes_img`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssisssssssssssss", $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img);
    
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(array("result" => "success"));
            } else {
                echo json_encode(array("result" => "no_changes", "message" => "No changes were made"));
            }
        } else {
            echo json_encode(array("result" => "error", "message" => $stmt->error));
        }
        $stmt->close();
    }


?>