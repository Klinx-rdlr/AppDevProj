<?php
include_once "profileList.php"; // needed for addUser()

if(!isset($_SESSION["userList"])) {
    $_SESSION["userList"] = array();
}

if(!isset($_SESSION["userCount"])) {
    $_SESSION["userCount"] = 1;
}

function addUser($user_name, $email, $password){
    $newUser = array(
        'Username' => $user_name,
        'Email' => $email,
        'Password' => $password,
        'Reset_Token' => "",
        'Reset_Token_Expires' => "",
    );

    addNewProfile($_SESSION["userCount"]); //can be seen at profileList.php
    $_SESSION["userList"][$_SESSION["userCount"]] = $newUser;
    $_SESSION["userCount"]++;

}