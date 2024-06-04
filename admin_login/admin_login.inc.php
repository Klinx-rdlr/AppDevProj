<?php
require_once("../admin_logs/admin_action.classes.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminID = $_POST["adminID"];
    $adminPass = $_POST["password"];
    
    if($adminID == "admin" && $adminPass == "12345678"){
        session_start();
        if (!isset($_SESSION['admin_logs'])) {
            $_SESSION['admin_logs'] = [];
        }
        $_SESSION["adminID"] = "1";
        header("location: ../home/index.php?error=none");
        $_SESSION['admin_logs'][] = new AdminAction($_SESSION["adminID"], "Logged In", date("Y-m-d h:i:sa"), "No Further Details");
    }else{
        header("location: admin_login.php?error=status3"); //status 3 - wrong input
    }
}