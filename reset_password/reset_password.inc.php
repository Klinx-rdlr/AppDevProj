<?php
include_once "../sign_in/signin_functions.php"; // used for pwdMatch() && getUserID();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $token = $_POST["token"];
    $password =  $_POST["password"];
    $re_password = $_POST["re_password"];
 
    $token_hash = hash("sha256", $token);

    $result = getUserToken($token_hash);
    $user = $result['user'];
    $userID = $result['userID'];

    echo "<pre>";
    echo $token_hash;
    echo "</pre>";

    if($user === null){
        die("token not found");
    }
    
    if(strtotime($user["Reset_Token_Expires"]) <= time()){
        die("token has expired");
    }
    
    if(pwdMatch($password, $re_password) == false){
        header("location: reset_password.php?token=$token&error=status2");
        exit();
    }else{
        $newUser = $_SESSION["userList"][$userID];
        $newUser["Password"] = $password;
        $newUser["Reset_Token"] = null;
        $newUser["Reset_Token_Expires"] = null;
        
        $_SESSION["userList"][$userID] = $newUser;

        header("location: ../home/index.php");
    }
}   

function getUserToken($token){
    foreach($_SESSION["userList"] as $userID => $user){
        if($user['Reset_Token'] == $token){
            return array('user' => $user, 'userID' => $userID);
        }
    }
    return null;
}




// function getUserToken($token){
//     foreach($_SESSION["userList"] as $user){
//         if($user['Reset_Token'] == $token){
//             return $user;
//         }
//     }
//     return null;
// }
// ?>