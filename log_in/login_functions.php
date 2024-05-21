<?php
    session_start();

function loginUser($name, $password) {
    $specificUser = null;
    $specificUserId = null;

    
    foreach($_SESSION["userList"] as $id => $user) {
        if ($user['Email'] == $name || $user['Username'] == $name) {
            $specificUser = $user;
            $specificUserId = $id;
        }
    }
    if($specificUser == null) {
        header("Location: login.php?error=status1"); //status1 = notfound
        exit();
    }
    else {
        if ($specificUser["Password"] != $password) {
            header("Location: login.php?error=status2"); //status2 = wrong pass
            exit();
        }
        else{
            $_SESSION["userID"] = $specificUserId;
            $_SESSION["username"] = $specificUser["Email"];
        }
    }
    return true;
}