<?php 
    // Citation: Adapted from https://www.youtube.com/watch?v=Zn4Xa406lJo&list=PLUoIt0OrSPCsrvjwFjrhKBbgvhA5W8Iwi&index=4&ab_channel=TheMaker
    include("connection.php");
    include("security.php");
    access_control();
    
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        //Sanitize inputs
        $username = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES);
        $email = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
        $password = htmlspecialchars(trim($_POST["password"]), ENT_QUOTES);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //Generate random userid, save username and email 
        $user_id = random_num(10);

        //Invalidate if the email is already registered, as well as password requirements
        if (email_exists($email) && username_exists($username)){
            $response["status"] = "error";
            $response["message"] = "Both the email and username are taken. Try logging in";
        } else if (email_exists($email)){
            $response["status"] = "error";
            $response["message"] = "This email is already in use";
        } else if (username_exists($username)){
            $response["status"] = "error";
            $response["message"] = "This username is already in use";
        } else if (!contains_char_and_num($password)){
            $response["status"] = "error";
            $response["message"] = "Your password should be a mix between characters and numbers";
        } else if (!is_long_password($password)){
            $response["status"] = "error";
            $response["message"] = "Your password needs to be at least 9 characters long";
        } else if (!empty($username) && !empty($password) && !is_numeric($username)){
            $query = "INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            if (!$stmt) {
                die('Error: ' . htmlspecialchars($conn->error));
            }
            $stmt->bind_param("isss", $user_id, $username, $email, $hashed_password);
            if (!$stmt->execute()) {
                die('Error: ' . htmlspecialchars($stmt->error));
            }
            $response["message"] = "Successful insertion";
        } else {
            $response["status"] = "error";
            $response["message"] = "Please enter some valid information!";
        }
        echo json_encode($response);
    }
?>