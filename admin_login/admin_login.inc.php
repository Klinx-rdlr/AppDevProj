<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminID = $_POST["adminID"];
    $adminPass = $_POST["password"];
    
    if($adminID == "admin" && $adminPass == "12345678"){
        session_start();
        $_SESSION["adminID"] = "1";
        header("location: ../home/index.php?error=none");
    }else{
        header("location: admin_login.php?error=status3"); //status 3 - wrong input
    }
}