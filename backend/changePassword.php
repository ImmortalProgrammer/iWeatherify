<?php

    include("connection.php");
    include("security.php");
    access_control();

    session_start();
    
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        
        $old_password = htmlspecialchars(trim($_POST["old_password"]), ENT_QUOTES);
        $new_password = htmlspecialchars(trim($_POST["new_password"]), ENT_QUOTES);
        $user_id = $_SESSION["user_id"];

        $query = "SELECT password FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];
        $hashed_new_password = ""; 

        if (password_verify($old_password, $hashed_password)){
            
           
            if (!contains_char_and_num($new_password)){
                $response["status"] = "error";
                $response["message"] = "Your new password should be a mix between characters and numbers";
            } else if (!is_long_password($new_password)){
                $response["status"] = "error";
                $response["message"] = "Your new password needs to be at least 8 characters long";
            } else {
                
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query = "UPDATE users SET password = ? WHERE user_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("si", $hashed_new_password, $user_id);
                $stmt->execute();
                $response["message"] = "Password updated successfully";
            }
        } else {
            $response["status"] = "error";
            $response["message"] = "The current password you entered is incorrect";
        }

        echo json_encode($response);
    }
?>



