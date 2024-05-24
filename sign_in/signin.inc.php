<?php
    include("signin_functions.php");


    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = $_POST["user_name"];
        $email_address = $_POST["email"];
        $password = $_POST["password"];
        $re_password = $_POST["re-password"];


        $verifyCode = rand(100000, 999999);
        $temporaryResult = signupTempUser($user_name, $email_address, $password, $re_password, $verifyCode); //can be seen at signin_functions.php
        
        

    
        $mail = require __DIR__ ."../../mailer.php";
        //<a href="http://localhost/appdevproj/sign_in/signin.inc.php?status=status5"> Click Here </a>
        $mail->setFrom("xyzvideorentals@gmail.com");
        $mail->addAddress($email_address);
        $mail->setSubject = "Account Verification";
        $mail->Body =  <<<END
        
        This is your verification code: $verifyCode
        
        END;
        
        //status 5 - account activated

        try{
            $mail->send();
            header("location: signin_confirmation.php?error=none");
        }catch(Exception $e){
            echo "Message could not be sent. Mail error: {$mail->$ErrorInfo}";
        }
    }
    ?>