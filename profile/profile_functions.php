    <?php

    include_once "../account_handler/profileList.php";

    function getUserProfile() {
        if (isset($_SESSION["profileList"][$_SESSION["userID"]])) {
            return $_SESSION["profileList"][$_SESSION["userID"]];
        } else {
            return null; 
        }
    }
    function getProfileStatus(){
        $profile = getUserProfile();
        return $profile ? $profile['Status'] : "Missing";
    }
    
    function getProfileFullname(){
        $profile = getUserProfile();
        return $profile ? $profile['Fullname'] : "Missing";
    }
    
    function getProfileAddress(){
        $profile = getUserProfile();
        return $profile ? $profile['Address'] : null;
    }
    
    function getProfilePhone(){
        $profile = getUserProfile();
        return $profile ? $profile['Phone Number'] : null;
    }
    
    function getProfileBirthday(){
        $profile = getUserProfile();
        return $profile ? $profile['Birthday'] : null;
    }