<?php
include_once "profileList.php"; // needed for addUser()
include_once "cartList.php"; // needed for addUser()

if(!isset($_SESSION["userList"])) {
    $_SESSION["userList"] = array();
}

if(!isset($_SESSION["userTemporaryList"])) {
    $_SESSION["userTemporaryList"] = array();
}

if(!isset($_SESSION["userCount"])) {
    $_SESSION["userCount"] = 1;
}


function tempAddUser($user_name, $email, $password, $verifyCode){
    $newUser = array(
        'Username' => $user_name,
        'Email' => $email,
        'Password' => $password,
        'VerifyCode' => $verifyCode,
    );
    $_SESSION["userTempList"] = $newUser;
}

function signUpUser($user_name, $email, $password){
    $newUser = array(
        'Username' => $user_name,
        'Email' => $email,
        'Password' => $password,
        'Reset_Token' => "",
        'Reset_Token_Expires' => "",
    );

    addNewProfile($_SESSION["userCount"]); //can be seen at profileList.php
    addNewCart($_SESSION["userCount"]);
    $_SESSION["userList"][$_SESSION["userCount"]] = $newUser;
    $_SESSION["userCount"]++;

    return true;
}