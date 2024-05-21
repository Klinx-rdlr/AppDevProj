<?php
session_start();

if(!isset($_SESSION["profileList"])) {
    $_SESSION["profileList"] = array();
}

function addNewProfile($userID){
    $newProfile = array(
        'Status' => 0, //0 for new profile, 1 for edited profile
        'Fullname' => "",
        'Address' => "",
        'Phone Number' => "",
        'Birthday' => "",
        'VideosAdded' => "",
        'VideosRented'=> "",
    );

    $_SESSION["profileList"][$userID] = $newProfile;
}


function editProfile($status, $fullname, $address, $phone_number, $birthday){
    $newProfile = array(
        'Status' => $status, //0 for new profile, 1 for edited profile
        'Fullname' => $fullname,
        'Address' => $address,
        'Phone Number' => $phone_number,
        'Birthday' => $birthday,
        'VideosAdded' => "",
        'VideosRented'=> "",
    );

    $_SESSION["profileList"][$_SESSION["userID"]] = $newProfile;
    return true;
}