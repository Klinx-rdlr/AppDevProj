<?php
    session_start();
    include("login_functions.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["user_name"];
        $password = $_POST["password"];


        $userName = getUserName($name);
        $result = loginUser($name, $password); // can be seen at login_functions.php

        if($result){
            $_SESSION["username"] = $userName;
            header("location: ../home/index.php?error=none");
            exit();
        }
    }