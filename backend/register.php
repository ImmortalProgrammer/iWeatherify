<!-- Citation: https://www.youtube.com/watch?v=Zn4Xa406lJo&list=PLUoIt0OrSPCsrvjwFjrhKBbgvhA5W8Iwi&index=4&ab_channel=TheMaker -->

<?php 
    session_start();
    include("connection.php");
    include("functions.php");
    
    if($_SERVER["REQUEST_METHOD"]  == "POST"){

        $user_name = $_POST["user_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            //Generate random userid, save username and email 
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,email) values ('$user_id','$user_name','$email')";
            mysqli_query($con, $query);
        } else {
            echo "Please enter some valid information!";
        }
    }
?>