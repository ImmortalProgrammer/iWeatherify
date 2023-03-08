<!-- Citation: https://www.youtube.com/watch?v=ai7T1p3Xj8A&t=134s&ab_channel=DigitalFox -->

<?php 
    // session_start();
    // include("connection.php");
    // include("functions.php");

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
        // something was posted
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(!empty($username) && !empty($password) && !is_numeric($username)){
            //Read username and password from database
            $query = "select username, password from users where username = ?"; //TODO - this assumes that everyone has a unique username -> will need to be a future task
            $query = $conn -> prepare($query);
            $query -> bind_param("s", $username);
            $query -> execute();
            $result = $query -> get_result();
            $data = $result -> fetch_assoc();

            if($data == NULL){
                return "Wrong username or password";
            }

            if(password_verify($password, $data["password"]) == FALSE){
                return "Wrong username or password";
            } else {
                $_SESSION['user_id'] = $user_data["user_id"];
                
                // Redirect to the index page - handled in WebsiteLoginPage.vue
                exit();
            }
        }
    }
?>