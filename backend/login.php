<?php 

    // Citation: https://www.youtube.com/watch?v=ai7T1p3Xj8A&t=134s&ab_channel=DigitalFox
    include("connection.php");
    include("security.php");
    header("Access-Control-Allow-Credentials: true");
    access_control();

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

            //Create the cookie and the hashed version of the cookie
            // $cookie = create_token();
            $cookie = array(
                "token" => create_token(),
                "expire" => time() + 60 // set at 1 minute will change to 20 min after testing
            )
            
            $hashed_cookie = hash("sha256", $cookie);

            // Store username with hashed cookie into database
            add_auth_user($username, $hashed_cookie, $cookie['expire']);

            // Input validation before actually logging in user
            if($data == NULL){
                echo json_encode("There are no registered users with that username and/or password");
            }
            if(password_verify($password, $hash) == FALSE){
                $res = array("status" => 0);
            } else {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $data["user_id"];
                $_SESSION["username"] = $username;
                $_SESSION["auth_token"] = $cookie;

                $res = array(
                    "status" => 1,
                    "auth_token" => $cookie,
                    "user_id" => $_SESSION["user_id"],
                );
            }
            echo json_encode($res);
        }
    }
?>
