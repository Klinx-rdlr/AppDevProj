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
            $_SESSION["userEmail"] = $specificUser["Email"];
        }
    }
    return true;
}


function getUserName($name){
    foreach($_SESSION["userList"] as $users){
        if($name == $users['Email']){
            return $users['Username'];
        }else if($name == $users['Username']){
            return $users['Username'];
        }
    }
    return null;
}