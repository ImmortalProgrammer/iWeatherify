<?php
    include("connection.php");
    include("security.php");
    access_control();

    //Variables to return back to the front end
    $data = []; // Want to return back to the frontend a list of dictionaries

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $user_id =  $input["user_id"];

    $query = "SELECT * FROM `saved_items` WHERE `user_id` = ?";
    $query = $conn->prepare($query);
    $query->bind_param("i", $user_id);
    $query->execute();
    $result = $query->get_result();

    // If there are any rows associated with the query, load all the rows
    if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
            // An associative array acts like a dictionary in python
            $row = [
                "location" => $rows["location"],
                "temp_category" => $rows["temp_category"],
                "temp" => $rows["temp"],
                "temp_unit" => $rows["temp_unit"],
                "outerwear_name" => $rows["outerwear_name"],
                "outerwear_img" => $rows["outerwear_img"],
                "middlewear_name" => $rows["middlewear_name"],
                "middlewear_img" => $rows["middlewear_img"],
                "innerwear_name" => $rows["innerwear_name"],
                "innerwear_img" => $rows["innerwear_img"],
                "pants_name" => $rows["pants_name"],
                "pants_img" => $rows["pants_img"],
                "headwear_name" => $rows["headwear_name"],
                "headwear_img" => $rows["headwear_img"],
                "shoes_name" => $rows["shoes_name"],
                "shoes_img" => $rows["shoes_img"],
                "time_stamp" => $rows["time_stamp"],
            ];
            array_push($data, $row);
        }
    }


    $res = array(
        "message" => $data,
        "userid" => $user_id
    );    

    echo json_encode($res);

?>