<?php
    session_start();

    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    $message = "default";
    // $status = 1;

    //Max size is going to be 0.5 gb or 500 mb
    function isValidSize($imgSize){
        if($imgSize < 500000000){ 
            return true;
        }
        return false;
    }

    function image_exists($user_id, $image_path, $temp_category, $clothing_category){
        include("connection.php");

        $query = "SELECT * FROM my_items WHERE `user_id` = ? AND `upload_path` = ? AND `temp_category` = ? AND `clothing_category` = ?";
        $query = $conn -> prepare($query);
        $query -> bind_param("isss", $user_id, $image_path, $temp_category, $clothing_category);
        $query -> execute();
        $result = $query -> get_result();

        if (mysqli_num_rows($result)) {
            return true;
        } else {
            return false;
        }
    }
    
    // Validate the file that was uploaded. Ensure that it was an image
    if(isset($_FILES['image']['name'])){

        // Set the target directory to store the images as uploads/
        $targetDir = "../uploads/";
        $imageName = basename($_FILES["image"]["name"]); //basename() may prevent filesystem traversal attacks
        $targetPath = $targetDir . $imageName;
        
        $extension = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        $tmp_name = $_FILES['image']['tmp_name'];
        $user_id = intval($_POST["user_id"]);
        $clothing_name = htmlspecialchars($_POST["clothing_name"], ENT_QUOTES);
        $temp_category = $_POST['temp_category'];
        $clothing_category = $_POST["clothing_category"];

        $valid_extensions = array("jpg","jpeg","png");

        //Check image size
        if (!isValidSize($_FILES["image"]["size"])){
            $status = 0;
            $message = "Your image can't be larger than 50mb";
        //Check if the image already exists on the backend
        } elseif(image_exists($user_id, $targetPath, $temp_category, $clothing_category)){
            $status = 0;
            $message = "This image has already been uploaded";
        } elseif(in_array($extension, $valid_extensions)){
            if(move_uploaded_file($tmp_name, $targetPath)){ //Insert image path name in the database. Store image in /uploads
                $query = "INSERT INTO `my_items` (`user_id`, `temp_category`, `clothing_category`, `clothing_name`, `name`, `upload_path`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn -> prepare($query);
                if(!$stmt){
                    $status = 0;
                    die('Error: ' . htmlspecialchars($conn -> error));
                }
                $stmt->bind_param('isssss', $user_id, $temp_category, $clothing_category, $clothing_name, $imageName, $targetPath);
                if (!$stmt->execute()) {
                    $status = 0;
                    die('Error: ' . htmlspecialchars($stmt->error));
                }
                $message = "Successful image insertion";
                $status = 1;
            } 
        } else {
            $status = 0;
            $message = 'Only .jpg, .jpeg and .png images allowed to be upload';
        }
        
    } else {
        $message = 'Select an image'; //Actually handled by front end, but for safety measure
        $status = 0;
    }

    $output = array(
        'message' => $message,
        'status' => $status,
    );
    
    echo json_encode($output);

    // $stmt->close();
    $conn->close();
?>