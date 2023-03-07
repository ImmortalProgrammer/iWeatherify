<!-- Citation: https://www.youtube.com/watch?v=Zn4Xa406lJo&list=PLUoIt0OrSPCsrvjwFjrhKBbgvhA5W8Iwi&index=4&ab_channel=TheMaker -->

<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    if (isset($_SERVER["HTTP_ORIGIN"])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is the one that you want to allow
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 1000");
    }

    if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
        if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"])) {
            header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        }
        if (isset($_SERVER["HTTP_ACESS_CONTROL_REQUEST_HEADERS"])) {
            header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
        }
        exit(0);
    }
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){

        $user_name = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            //Generate random userid, save username and email 
            $user_id = random_num(20);
            $query = "INSERT INTO `test` (`user_id`, `user_name`, `email`) VALUES ('$user_id','$user_name','$email')";
            $res = $conn -> query($query);
        } else {
            echo "Please enter some valid information!";
        }
    }
?>