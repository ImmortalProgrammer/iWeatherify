<?php 

    // Citation: https://www.youtube.com/watch?v=ai7T1p3Xj8A&t=134s&ab_channel=DigitalFox

    include("connection.php");
    include("security.php");
    access_control();

    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        $username = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES);
        $password = htmlspecialchars(trim($_POST["password"]), ENT_QUOTES);

        //Make a cookie value
        $cookie = random_num(20);

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
                echo json_encode("There are no registered users with that username and/or password");
            }
            if(password_verify($password, $hash) == FALSE){
                $res = array("status" => 0);
            } else {
                session_start();
                $_SESSION["loggedin"] = true; //TODO: Need to look at this more closely
                $_SESSION['user_id'] = $data["user_id"]; //Store their user id as a user's authentication token
                $res = array(
                    "status" => 1,
                    "auth_token" => $cookie,
                );
            }
            echo json_encode($res);
            exit;
        }
    }
?>