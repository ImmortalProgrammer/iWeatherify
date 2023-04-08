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

    $message = "";

    // Validate the file that was uploaded. Ensure that it was an image
    if(isset($_FILES['image']['name'])){

        $targetDir = "uploads/";
        $imageName = basename($_FILES["image"]["name"]); //basename() may prevent filesystem traversal attacks
        $uploadPath = $targetDir . $imageName;
        $extension = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));
        $tmp_name = $_FILES['image']['tmp_name'];

        $valid_extensions = array("jpg","jpeg","png");
        if(in_array($extension, $valid_extensions)){
            
            // Check if the image is a valid upload file. (i.e uploaded via HTTP post upload mechanism)
            if(move_uploaded_file($tmp_name, $uploadPath)){
                //Insert the image path name in the database. Sotre the image in the /uploads folder

    
                $sql = "INSERT INTO `my_items` (`name`, `upload_path`) VALUES (`$imageName`, `$uploadPath`)";
                mysqli_query($conn, $sql);

                $message = "Successful insertion";
            }                
        }else{
            $message = 'Only .jpg, .jpeg and .png images allowed to be upload';
        }
        
    }else{
        $message = 'Select an image';
    }

    $output = array(
        "name" => $_FILES['image']['name'],
        'isset' => $_FILES['image'],
        // "extension" => $extension,
        'message' => $message,
        "size" => $_FILES["image"]["size"]
    );
    
    echo json_encode($output);

    // $stmt->close();
    // $conn->close();
?>