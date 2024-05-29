<?php

include_once "../account_handler/userList.php"; //used for signUpUser();
require_once "../user_activity/user_activity.classes.php";
if (!isset($_SESSION["user_activity"])) {
    $_SESSION["user_activity"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verification = intval($_POST["VerifyCode"]);
    if (isset($_SESSION["userTempList"])) {
        $user = $_SESSION["userTempList"];

        if (empty($verification)) {
            header("location: signin_confirmation.php?error=status1"); //status 1 - no input
            exit();
        }

        if ($verification !== $user["VerifyCode"]) {
            header("location: signin_confirmation.php?error=status2"); //status 2 - code doesn't match
            exit();
        } else {
            $result = signUpUser($user["Username"], $user["Email"], $user["Password"]); //can be seen at userList.php
            if ($result) {
                unset($_SESSION["userTempList"]);
                $_SESSION['user_activity'][] = new UserActivity($user["Username"], "Signed Up", date("Y-m-d h:i:sa"));
                header("location: signin.php?error=none");
                exit();
            } else {
                header("location: signin.php?error=result-error");
                exit(); 
            }
        }
    } else {
        header("location: signin_confirmation.php?error=session-not-set"); //session variable not set
        exit();
    }
}






?>