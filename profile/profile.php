<?php

include_once "../home/header.php";
include_once "profile_functions.php";

$userProfile = getUserProfile();

?>
<?php
    if(getProfileStatus() == 0){
    echo<<<EOT
    <div class="row d-flex flex-column" style="margin: 300px auto; width: 600px; height: 100px; background-color: white; border: 2px solid red; border-radius: 5px">
      <p class="text-center mt-2">Profile is not yet set, please set it</p>
      <button class="btn btn-block btn-primary" onClick="location.href = 'editProfile.php';" style="margin: 0px auto; width: 300px">Continue</button>
    </div>
    EOT;
    }else{
        $lastname = getProfileLastname();
        $middlename = getProfileMiddlename();
        $firstname = getProfileFirstname();
        $houseno = getHouseNo();
        $street = getStreet();
        $baranggay = getBaranggay();
        $city = getCity();
        $postal = getPostal();
        $phoneNumber = getProfilePhone();
        $birthday = getProfileBirthday();    
    echo<<<EOT
    <div class="Profile card mt-5" style="width: 600px; margin: auto;">
    <div class="card-header">
        <p class="text-center" style="margin: 0px"> Profile Information </p>
    </div>
    <div class="card-body">
        <div class="form-group">
            <p> First Name: $firstname </p>
</div>
<div class="form-group">
            <p> Last Name: $lastname</p>
</div>
<div class="form-group">
            <p> Middle Name: $middlename </p>
</div>
<div class="form-group">
    <p> House No: $houseno </p>
</div>
<div class="form-group">
    <p> Street Name: $street </p>
</div>
<div class="form-group">
    <p> Baranggay: $baranggay </p>
</div>
<div class="form-group">
    <p> Municipality or City No: $city </p>
</div>
<div class="form-group">
    <p> Postal: $postal </p>
</div>
<div class="form-group">
    <p> Phone Number: $phoneNumber </p>
</div>
<div class="form-group">
    <p> Birthday: $birthday </p>
</div>
</div>
  
<div class="card-footer">
<button class="btn btn-block btn-dark" onclick="location.href='editProfile.php'"> Edit Profile </button>
</div>
        </div>
EOT;

}
?>