<?php
    include("signin_functions.php");


    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = $_POST["user_name"];
        $email_address = $_POST["email"];
        $password = $_POST["password"];
        $re_password = $_POST["re-password"];

        $result = signupUser($user_name, $email_address, $password, $re_password);
        
        if($result){
            header("location: signin.php?error=none");
            exit();
        }else{
            header("location: signin.php?error=result-error");
            exit(); 
        }
    }