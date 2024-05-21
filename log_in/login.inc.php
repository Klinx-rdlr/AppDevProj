<?php
    session_start();
    include("login_functions.php");


    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["user_name"];
        $password = $_POST["password"];

        $result = loginUser($name, $password); // can be seen at login_functions.php

        if($result){
            header("location: ../home/index.php?error=none");
            exit();
        }
    }