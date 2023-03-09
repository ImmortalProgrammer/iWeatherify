<!-- Citation: https://www.youtube.com/watch?v=Zn4Xa406lJo&list=PLUoIt0OrSPCsrvjwFjrhKBbgvhA5W8Iwi&index=4&ab_channel=TheMaker -->

<?php 
    session_start();
    include("connection.php");
    include("security.php");

    access_control();
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!empty($username) && !empty($password) && !is_numeric($username)){
            //Generate random userid, save username and email 
            $user_id = random_num(20);

            //Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

            $query = "INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES ('$user_id','$username','$email', '$hashed_password')";
            $res = $conn -> query($query);
            echo "Successful insertion";
        } else {
            echo "Please enter some valid information!";
        }
    }
?>