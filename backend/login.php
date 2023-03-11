<?php 

    // Citation: https://www.youtube.com/watch?v=ai7T1p3Xj8A&t=134s&ab_channel=DigitalFox

    session_start();
    include("connection.php");
    include("security.php");
    access_control();

    //Data to send back to the frontend
    $res[] = array();
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        $username = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES);
        $password = htmlspecialchars(trim($_POST["password"]), ENT_QUOTES);

        if(!empty($username) && !empty($password) && !is_numeric($username)){
            //Read username and password from database
            $query = "SELECT `user_id`, `password` FROM `users` WHERE `username` = ? limit 1";
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
                $_SESSION["username"] = $data["username"];
                setcookie("username_server", $data["username"], time()+3600, "/");  /* expire in 1 hour */
                $res[] = array("status" => 1);
            }
            echo json_encode($res);
            exit;
        }
    }
?>