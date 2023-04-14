<?php

    include("connection.php");
    include("security.php");
    access_control();

    //Variables to return back to the front end
    $data = []; // Want to return back to the frontend a list of dictionaries

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $user_id =  $input["user_id"];
    $temp_category = $input["temp_category"];
    $clothing_category = $input["clothing_category"];

    // Check the input data against the database
    $row_exists = false;
    $query = "SELECT * FROM `my_items` WHERE `user_id` = ? AND `temp_category` = ? AND `clothing_category` = ?";
    $query = $conn -> prepare($query);
    $query -> bind_param("iss", $user_id, $temp_category, $clothing_category);
    $query -> execute();
    $result = $query -> get_result();

    //If there any rows associated with the query, load all the clothing_names and upload_paths
    if ($result -> num_rows > 0) {

        while($rows = $result->fetch_assoc()) {
            // An associative array acts like a dictionary in python
            $row = [
                "id" => $rows["id"],
                "clothing_name" => $rows["clothing_name"],
                "upload_path" => $rows["name"]
            ];
            array_push($data, $row);
          }
    }

    $res = array(
        "message" => $data
    );    

    echo json_encode($res);

?>