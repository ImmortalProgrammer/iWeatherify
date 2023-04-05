<?php

    function access_control(){
        if (isset($_SERVER["HTTP_ORIGIN"])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is the one that you want to allow
            // header("Access-Control-Allow-Origin: http://localhost:8080");
            header("Access-Control-Allow-Origin: https://www-student.cse.buffalo.edu");
            header("Access-Control-Allow-Credentials: true");
            header("Access-Control-Max-Age: 1000");
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
            if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"])) {
                header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
            }
            if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"])) {
                header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
            }
            exit(0);
        }
    }

    //Check whether or not an email has already been taken
    function email_exists($sanitized_email){
        include("connection.php");

        $query = "SELECT * FROM users WHERE email = ?";
        $query = $conn -> prepare($query);
        $query -> bind_param("s", $sanitized_email);
        $query -> execute();
        $result = $query -> get_result();

        if (mysqli_num_rows($result)) {
            return true;
        } else {
            return false;
        }
    }

    //Check whether or not a username has already been taken
    function username_exists($sanitized_username){
        include("connection.php");
        
        $query = "SELECT * FROM users where username = ?";
        $query = $conn -> prepare($query);
        $query -> bind_param("s", $sanitized_username);
        $query -> execute();
        $result = $query -> get_result();

        if (mysqli_num_rows($result)) {
            return true;
        } else {
            return false;
        }
    }

    // Returns true if the string has both characters and numbers
    function contains_char_and_num($string){
        return (preg_match('/[A-Za-z]/', $string) && preg_match('/[0-9]/', $string));
    }

    function is_long_password($password){
        return strlen($password) > 8;
    }

    // To make a random user_id value
    function random_num($length){
        $text = "";
        if($length < 5){
            $length = 5;
        }

        for ($i=0; $i < $length; $i++) { 
            $text .= rand(0, 9);
        }

        return $text;
    }

    // To make an alphanumeric cookie of default length 20
    function create_token($length = 20){
        $bytes = random_bytes($length);
        $token = bin2hex($bytes);
        return $token;
    }

    //When the user logs in, create an auth_token, hash it, store in data base with their username as an authenticated user
    function add_auth_user($username, $hashed_cookie){
        include("connection.php");
        $query = "INSERT INTO `auth_users` (`username`, `auth_token`) VALUES (?, ?)";
        $query = $conn -> prepare($query);
        $query -> bind_param("ss", $username, $hashed_cookie);
        $query -> execute();
    }

    // When a user tries to access any restricted page, if they have an authenticated cookie associated with them, let them in
    function is_valid_auth_token($username, $auth_token){
        include("connection.php");
        
        $query = "SELECT `username`, `auth_token` FROM auth_users where `username` = ?";
        $query = $conn -> prepare($query);
        $query -> bind_param("s", $username);
        $query -> execute();
        $result = $query -> get_result();
        $data = $result -> fetch_assoc();
        $hashed_auth_token = $data["auth_token"]; // Get the stored hashed authentication token for this user from the database

        if(hash("sha256", $auth_token) === $hashed_auth_token){
            return true;
        } else {
            return false;
        }
    }

    // TODO: When implementing logout functionality, would need to delete the instance of the auth_token from the database
    function delete_auth_token($username){
        include("connection.php");
        
        $query = "DELETE FROM auth_users where `username` = ?";
        $query = $conn -> prepare($query);
        $query -> bind_param("s", $username);
        $query -> execute();
    }
?>
