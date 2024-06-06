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


function getEmail($name){
    foreach($_SESSION["userList"] as $users){
        if($name == $users['Email']){
            return $users['Email'];
        }
    }
    return null;
}


function getUsername($name){
    foreach ($_SESSION['userList'] as $user) {
        if ($user['Email'] == $name) {
            $username = $user['Username'];
            return $username;
        }
    }
}