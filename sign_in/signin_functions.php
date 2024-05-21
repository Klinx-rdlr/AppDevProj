<?php

    include("../account_handler/userList.php");

    
    function checkUser($email, $user_name){
        // //for first time
        // if(isset($_SESSION["userList"])){
        //     return true;
        // }

        foreach($_SESSION["userList"] as $users){
            if($users['Email'] == $email && $users['Username'] == $user_name){
                return false;
            }
        }
        return true;
    }
    
    
  
    //Series of checks, to validate user's input
    function signupUser($user_name, $email, $password, $re_password){
        if(invalidUid($user_name) == false){
            header("location: signin.php?error=invalidusername");
            exit();
        }
        if(invalidEmail($email) == false){
            header("location: signin.php?error=invalidemail");
            exit();
        }
        if(pwdMatch($password, $re_password) == false){
            header("location: signin.php?error=invalidPassword");
            exit();
        }
        if(nameTakenCheck($email, $user_name) == false){
            header("location: signin.php?error=usernameTaken");
            exit();
        }

        addUser($user_name, $email, $password); //can be seen at userList.php
        return true;
    }

    function invalidUid($user_name){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    function invalidEmail($email){
            $result;
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
    
    function pwdMatch($password, $re_password){
        $result;
        if($password !== $re_password){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

  function nameTakenCheck($user_name, $email){
        $result;
        if(!checkUser($user_name, $email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }