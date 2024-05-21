<?php
    include("../account_handler/profileList.php");


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $status = intval($_POST['status']);
        $fullname = $_POST["fullname"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $birthday = $_POST["birthday"];

        $result = editProfile($status, $fullname, $address, $phone_number, $birthday); //function can be seen at profileList.php

        if($result){
            header("Location: profile.php?error=none");
            exit();
        }else{
            header("Location: profile.php?error=status2"); // status2 - error in setting up the updated profile
        }
        
    }