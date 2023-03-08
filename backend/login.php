<?php 

    // Citation: https://www.youtube.com/watch?v=ai7T1p3Xj8A&t=134s&ab_channel=DigitalFox

    session_start();
    include("connection.php");
    include("security.php");

    access_control();
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        // something was posted
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(!empty($username) && !empty($password) && !is_numeric($username)){
            //Read username and password from database
            $query = "SELECT `user_id`, `password` FROM `users` WHERE `username` = ? limit 1"; //TODO - this assumes that everyone has a unique username -> will need to be a future task
            $query = $conn -> prepare($query);
            $query -> bind_param("s", $username);
            $query -> execute();
            $result = $query -> get_result();
            $data = $result -> fetch_assoc();
            $hash = $data["password"];

            if($data == NULL){
                return "Wrong username or password";
            }
            if(password_verify($password, $hash) == FALSE){
                $res[] = array("status" => 0);
            } else {
                $_SESSION['user_id'] = $data["user_id"];
                $res[] = array("status" => 1);
            }
            echo json_encode($res);
            exit;
        }
    }
?>