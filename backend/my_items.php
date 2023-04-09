<?php
    session_start();

    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    $message = "";
    $status = 1;

    // Validate the file that was uploaded. Ensure that it was an image
    if(isset($_FILES['image']['name'])){

        // Set the target directory to store the images as uploads/
        $targetDir = "../uploads/";
        $imageName = basename($_FILES["image"]["name"]); //basename() may prevent filesystem traversal attacks
        $targetPath = $targetDir . $imageName;
        
        $extension = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        $tmp_name = $_FILES['image']['tmp_name'];
        $clothing_name = htmlspecialchars($_POST["clothing_name"], ENT_QUOTES);
        $temp_category = $_POST['temp_category'];
        $clothing_category = $_POST["clothing_category"];

        $valid_extensions = array("jpg","jpeg","png");


        if(in_array($extension, $valid_extensions)){            
            // Check if the image is a valid upload file. (i.e uploaded via HTTP post upload mechanism)
            if(move_uploaded_file($tmp_name, $targetPath)){
                //Insert the image path name in the database. Sotre the image in the /uploads folder
                $query = "INSERT INTO `my_items` (`temp_category`, `clothing_category`, `clothing_name`, `name`, `upload_path`) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn -> prepare($query);
                if(!$stmt){
                    $status = 0;
                    die('Error: ' . htmlspecialchars($conn -> error));
                }
                $stmt->bind_param('sssss', $temp_category, $clothing_category, $clothing_name, $imageName, $targetPath);
                if (!$stmt->execute()) {
                    $status = 0;
                    die('Error: ' . htmlspecialchars($stmt->error));
                }
                $message = "Successful image insertion";
            }                
        }else{
            $status = 0;
            $message = 'Only .jpg, .jpeg and .png images allowed to be upload';
        }
        
    }else{
        $message = 'Select an image';
    }

    $output = array(
        'message' => $message,
        'status' => $status,
        'user_id' => $_SESSION, //TODO: Testing
    );
    
    echo json_encode($output);

    // $stmt->close();
    $conn->close();
?>