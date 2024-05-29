<?php
    session_start();
    
    if (!isset($_SESSION["user_activity"])) {
        $_SESSION["user_activity"] = array();
    }

    include("login_functions.php");
    require_once("../user_activity/user_activity.classes.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["user_name"];
        $password = $_POST["password"];

        $userName = getUserName($name);
        $result = loginUser($name, $password); // can be seen at login_functions.php

        if($result){
            $_SESSION["username"] = $userName;
            $_SESSION['user_activity'][] = new UserActivity($userName, "Logged In", date("Y-m-d h:i:sa"));
            header("location: ../home/index.php?error=none");
            exit();
        }
    }