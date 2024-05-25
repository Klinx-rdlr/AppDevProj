<?php
    include("../account_handler/profileList.php");


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $status = intval($_POST['status']);
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $middleName = $_POST["middlename"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $birthday = $_POST["birthday"];

        $result = editProfile($status, $firstName, $lastName, $middleName, $address, $phone_number, $birthday); //function can be seen at profileList.php

        if($result){
            header("Location: profile.php?error=none");
            exit();
        }else{
            header("Location: profile.php?error=status2"); // status2 - error in setting up the updated profile
        }
        
    }