    <?php

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
    
    function getProfileLastname(){
        $profile = getUserProfile();
        return $profile ? $profile['Last Name'] : "Missing";
    }

    function getProfileMiddlename(){
        $profile = getUserProfile();
        return $profile ? $profile['Middle Name'] : "Missing";
    }

    function getProfileFirstname(){
        $profile = getUserProfile();
        return $profile ? $profile['First Name'] : "Missing";
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