<?php
session_start();

if(!isset($_SESSION["profileList"])) {
    $_SESSION["profileList"] = array();
}

function addNewProfile($userID){
    $newProfile = array(
        'Status' => 0, //0 for new profile, 1 for edited profile
        'First Name' => "",
        'Last Name' => "",
        'Middle Name' => "",
        //'Address' => "",
        'House No' => "", 
        'Street' => "",
        'Baranggay' => "",
        'City' => "",
        'Postal' => 0,
        'Phone Number' => "",
        'Birthday' => "",
    );
    $_SESSION["profileList"][$userID] = $newProfile;
}


function editProfile($status, $firstName, $lastName, $middleName, 
                     $houseNo, $street, $baranggay, $city, $postal, 
                     $phone_number, $birthday) {

    // Retrieve the existing VideosRented field if it exists
    $videoRents = null;
    $movieHistory = null;
    if (isset($_SESSION['profileList'][$_SESSION['userID']]['VideosRented'])) {
        $videoRents = $_SESSION['profileList'][$_SESSION['userID']]['VideosRented'];
    }
    if (isset($_SESSION['profileList'][$_SESSION['userID']]['History'])) {
        $movieHistory = $_SESSION['profileList'][$_SESSION['userID']]['History'];
    }

    // Create the new profile array, including the existing VideosRented field
    $newProfile = array(
        'Status' => $status, // 0 for new profile, 1 for edited profile
        'First Name' => $firstName,
        'Last Name' => $lastName,
        'Middle Name' => $middleName,
        'House No' => $houseNo,
        'Street' => $street,
        'Baranggay' => $baranggay,
        'City' => $city,
        'Postal' => $postal,
        'Phone Number' => $phone_number,
        'Birthday' => $birthday,
        'VideosRented' => $videoRents,
        'History' => $movieHistory, // Ensure it retains the original VideosRented field
    );

    // Update the profile in the session
    $_SESSION['profileList'][$_SESSION['userID']] = $newProfile;
    return true;
}