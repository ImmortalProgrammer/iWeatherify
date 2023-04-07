<?php
    // Connection Setup
    header("Content-Type: application/json; charset=UTF-8");
    $allowed_origins = array(
        'https://www-student.cse.buffalo.edu',
        'http://localhost:8080'
    );
      
    // Check if the request has an 'Origin' header
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Check if the origin is in the list of allowed origins
        if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
            header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        }
    }
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Credentials: true");
    
    // $servername = "oceanus";
    // $username = "vwong27";
    // $password = "50342607";
    // $dbname = "cse442_2023_spring_team_a_db";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vue_php_cdn_db";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate the file that was uploaded. Ensure that it was an image
    $image = '';
    if(isset($_FILES['image']['name'])){

        $image_name = $_FILES['image']['name'];
        $valid_extensions = array("jpg","jpeg","png");
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        
        if(in_array($extension, $valid_extensions)){
            // $message = "The image name is: " . $image_name;
            
            // $upload_path = 'upload/' . time() . '.' . $extension;
            // if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)){
            // $message = 'Image Succesfully Uploaded';
            // $image = $upload_path;
            // }else{
            // $message = 'There is an error while uploading image';
            // }

            $img_upload_path = 'uploads/' . $image_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Insert into Database
            $sql = "INSERT INTO `my_items` (`name`, `img`) VALUES (`$image_name`, `$img_upload_path`)";
            mysqli_query($conn, $sql);

            $message = "Successful insertion?";
        }else{
            $message = 'Only .jpg, .jpeg and .png Image allowed to upload';
        }
    }else{
        $message = 'Select Image';
    }
    
    $output = array(
    'message'  => $message,
    'image'   => $image,
    'extension' => $extension, 
    );
    
    echo json_encode($output);

    // $stmt->close();
    // $conn->close();
?>