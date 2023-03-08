<?php
    function access_control(){
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
    }

    function random_num($length){
        $text = "";
        if($length < 5){
            $length = 5;
        }

        $len = rand(4, $length);
        for ($i=0; $i < $len; $i++) { 
            $text .= rand(0, 9);
        }

        return $text;
    }
?>
