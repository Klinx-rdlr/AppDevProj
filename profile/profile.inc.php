<?php
    include("../account_handler/profileList.php");


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $status = intval($_POST['status']);
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $middleName = $_POST["middlename"];
        $houseNo = $_POST["houseno"];
        $street = $_POST["street"];
        $baranggay = $_POST["baranggay"];
        $city = $_POST["city"];
        $postal = $_POST["postal"];
        $phone_number = $_POST["phone_number"];
        $birthday = $_POST["birthday"];

        $result = editProfile($status, $firstName, $lastName, $middleName, 
                              $houseNo, $street, $baranggay, $city, $postal, 
                              $phone_number, $birthday); //function can be seen at profileList.php

        if($result){
            header("Location: profile.php?error=none");
            exit();
        }else{
            header("Location: profile.php?error=status2"); // status2 - error in setting up the updated profile
        }
        
    }