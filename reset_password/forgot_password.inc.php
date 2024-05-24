<?php
include_once "../sign_in/signin_functions.php"; //needed for userResetPassword();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 2);

    $result = userResetPassword($email, $token_hash, $expiry); 
    if($result){

        $mail = require __DIR__ ."../../mailer.php";

        $mail->setFrom("xyzvideorentals@gmail.com");
        $mail->addAddress($email);
        $mail->setSubject = "Password Reset";
        $mail->Body =  <<<END
        <a href="http://localhost/appdevproj/reset_password/reset_password.php?token=$token"> Click Here </a>
        to reset your password.
        
        END;

        try{
            $mail->send();
            header("location: forgot_password_confirmation.php?error=none");
        }catch(Exception $e){
            echo "Message could not be sent. Mail error: {$mail->$ErrorInfo}";
        }

    }else{
        header("location: forgot_password_confirmation.php?error=status3"); //forgot password set failed
        exit();
    }
}

function userResetPassword($user_name, $token_hash, $expiry){
    if(getUserID($user_name) !== null){
       $userID = getUserID($user_name);//can be seen at signin_functions.php
       $newUser = $_SESSION["userList"][$userID];
       $newUser["Reset_Token"] = $token_hash;
       $newUser["Reset_Token_Expires"] = $expiry;

       $_SESSION["userList"][$userID] = $newUser;
       return true;
    } 
    return false;
}