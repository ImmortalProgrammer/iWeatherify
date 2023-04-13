<?php
    session_start();

    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    $message = "Please select an image that is less than 2MB";
    $status = 1;

    //Max size is going to be 2 mb as specified in upload_max_filesize directive in `php -i`
    function isValidSize($imgSize){
        if($imgSize < 2000000){ 
            return true;
        }
        return false;
    }

    //! #80 This function is no longer is use because we rename the image to be an alphanumeric string. Originally used the same image name that the user used -> would run into an issue if another user named their image the same thing
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
        // $targetDir = "../src/assets/";
        $targetDir = "../uploads/";
        $imageBaseName = basename($_FILES["image"]["name"]); //basename() may prevent filesystem traversal attacks
        $extension = strtolower(pathinfo($imageBaseName, PATHINFO_EXTENSION)); //jpg, jpeg, or png 
        $imageName = create_token(10); //Create a random alphanumeric string as image name so that attackers can't guess the image and also prevent users from acessing same named images
        $fullImageName = $imageName . "." . $extension;
        $targetPath = $targetDir . $fullImageName;
        $tmp_name = $_FILES['image']['tmp_name'];

        $user_id = intval($_POST["user_id"]);
        $clothing_name = htmlspecialchars($_POST["clothing_name"], ENT_QUOTES);
        $temp_category = $_POST['temp_category'];
        $clothing_category = $_POST["clothing_category"];

        $valid_extensions = array("jpg","jpeg","png");

        //Check image size
        if (!isValidSize($_FILES["image"]["size"])){
            $status = 0;
            $message = "Your image can't be larger than 2MB";
        } elseif(in_array($extension, $valid_extensions)){
            if(move_uploaded_file($tmp_name, $targetPath)){ //Store image path in database. Store actual image in ../src/assets/
                $query = "INSERT INTO `my_items` (`user_id`, `temp_category`, `clothing_category`, `clothing_name`, `name`, `upload_path`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn -> prepare($query);
                if(!$stmt){
                    $status = 0;
                    $message = "Couldn't make the connection prepare the query";
                    die('Error: ' . htmlspecialchars($conn -> error));
                }
                $stmt->bind_param('isssss', $user_id, $temp_category, $clothing_category, $clothing_name, $fullImageName, $targetPath);
                if (!$stmt->execute()) {
                    $status = 0;
                    $message = "Couldn't execute the sql statement";
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
        $message = 'Select an image that is less than 2MB'; //Actually handled by front end, but for safety measure
        $status = 0;
    }

    $output = array(
        'message' => $message,
        'status' => $status,
        'file' => $_FILES
    );
    
    echo json_encode($output);

    // $stmt->close();
    $conn->close();
?>