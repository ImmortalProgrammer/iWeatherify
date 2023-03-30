<?php 
    // Citation: Adapted from https://www.youtube.com/watch?v=Zn4Xa406lJo&list=PLUoIt0OrSPCsrvjwFjrhKBbgvhA5W8Iwi&index=4&ab_channel=TheMaker
    
    // session_start();
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
        if(email_exists($email) && username_exists($username)){
            // echo "Both the email and username are taken. Try logging in";
        } elseif(email_exists($email)){
            // echo "This email is already in use";
        } elseif(username_exists($username)){
            // echo "This username is already in use";
        } elseif(!contains_char_and_num($password)){
            // echo "Your password should be a mix between characters and numbers";
        } else if(!is_long_password($password)){
            // echo "Your password needs to be at least 8 characters long";
        } elseif(!empty($username) && !empty($password) && !is_numeric($username)){
            $query = "INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            if (!$stmt) {
            die('Error: ' . htmlspecialchars($conn->error));
            }
            $stmt->bind_param("isss", $user_id, $username, $email, $hashed_password);
            if (!$stmt->execute()) {
                    die('Error: ' . htmlspecialchars($stmt->error));
            }
            // echo "Successful insertion";
        } else {
            echo "Please enter some valid information!";
        }
    }
?>