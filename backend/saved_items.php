<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    // Get the input data - recommended outfit
    $input = json_decode(file_get_contents("php://input"), true);
    if(isset($input["outerwear"])){
        $outerwear_name = $input["outerwear"]["name"];
        $outerwear_img = $input["outerwear"]["image"];
    } else {
        $outerwear_name = "";
        $outerwear_img = "";
    }

    if(isset($input["middlewear"])){
        $middlewear_name = $input["middlewear"]["name"];
        $middlewear_img = $input["middlewear"]["image"];
    } else {
        $middlewear_name = "";
        $middlewear_img = "";
    }

    if(isset($input["innerwear"])){
        $innerwear_name = $input["innerwear"]["name"];
        $innerwear_img = $input["innerwear"]["image"];
    } else {
        $innerwear_name = "";
        $innerwear_img = "";
    }

    if(isset($input["pants"])){
        $pants_name = $input["pants"]["name"];
        $pants_img = $input["pants"]["image"];
    } else {
        $pants_name = "";
        $pants_img = "";
    }

    if(isset($input["headwear"])){
        $headwear_name = $input["headwear"]["name"];
        $headwear_img = $input["headwear"]["image"];
    } else {
        $headwear_name = "";
        $headwear_img = "";
    }

    if(isset($input["shoes"])){
        $shoes_name = $input["shoes"]["name"];
        $shoes_img = $input["shoes"]["image"];
    } else {
        $shoes_name = "";
        $shoes_img = "";
    }
    
    $user_id = $input["user_id"];
    $location = $input["location"];
    $temp_category = $input["temp_category"];
    $temp = $input["temp"];
    $temp_unit = $input["temp_unit"];
    $time_stamp = $input["time_stamp"];

    //Functions
    //Check if there already exists the saved outfit
    function isThereSavedOutfit($conn, $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img,      $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img){
        $check_query = "SELECT * FROM saved_items WHERE `user_id` = ? AND `location` = ? AND `temp_category` = ? AND `temp` = ? AND `temp_unit` = ? AND `outerwear_name` = ? AND `outerwear_img` = ? AND `middlewear_name` = ? AND `middlewear_img` = ? AND `innerwear_name` = ? AND `innerwear_img` = ? AND `pants_name` = ? AND `pants_img` = ? AND `headwear_name` = ? AND `headwear_img` = ? AND `shoes_name` = ? AND `shoes_img` = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("sssisssssssssssss", $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        return $check_result;
    }

    //Main function
    if(!isset($input)){
        echo json_encode(array("result" => "No outfit to save"));
    } elseif (isset($input["checkingForSavedOutfit"]) && $input["checkingForSavedOutfit"]){
        $check_result = isThereSavedOutfit($conn, $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img);

        if ($check_result->num_rows > 0) {
            echo json_encode(array("result" => "You already saved this outfit", "status" => 0));
        }
    } else {
        //Check if there already exists the saved outfit
        $check_result = isThereSavedOutfit($conn, $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img);

        if ($check_result->num_rows > 0) {
            echo json_encode(array("result" => "You already saved this outfit", "status" => 0));
        } else {
            //Only input to the database if there doesn't exist a row with the same exact information
            $query = "INSERT INTO `saved_items` (`user_id`, `location`, `temp_category`, `temp`, `temp_unit`, `outerwear_name`, `outerwear_img`, `middlewear_name`, `middlewear_img`, `innerwear_name`, `innerwear_img`, `pants_name`, `pants_img`, `headwear_name`, `headwear_img`, `shoes_name`, `shoes_img`, `time_stamp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssissssssssssssss", $user_id, $location, $temp_category, $temp, $temp_unit, $outerwear_name, $outerwear_img, $middlewear_name, $middlewear_img, $innerwear_name, $innerwear_img, $pants_name, $pants_img, $headwear_name, $headwear_img, $shoes_name, $shoes_img, $time_stamp);
        
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo json_encode(array("result" => "success", "status" => 1));
                } else {
                    echo json_encode(array("result" => "no_changes", "message" => "No changes were made", "status" => 2));
                }
            } else {
                echo json_encode(array("result" => "error", "message" => $stmt->error, "status" => 3));
            }
            $stmt->close();
        }
    }


    // $output = array(
    //     "middlewear" => $middlewear,
    //     "innerwear" => $innerwear,
    //     "pants" => $pants,
    //     "headwear" => $headwear,
    //     "shoes" => $shoes,
    //     "input" => $input,
    //     "user_id" => $user_id,
    //     "location" => $location,
    //     "temp_category" => $temp_category,
    //     "temp" => $temp,
    //     "temp_unit" => $temp_unit
    // );
    
    // echo json_encode($output);
?>